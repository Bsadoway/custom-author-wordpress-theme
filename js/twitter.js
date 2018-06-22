/*
 * Copyright Dylan McCall <www.dylanmccall.com>
 * Licensed under the Creative Commons Attribution Share Alike 3.0 Unported license.
 * <http://creativecommons.org/licenses/by-sa/3.0/>
 *
 * Borrowed from ubiquity-slideshow-ubuntu:
 * <https://launchpad.net/ubiquity-slideshow-ubuntu>
 */

function escapeHTML(text) {
	return $('<div/>').text(text).html();
}

if(!Array.indexOf){
	Array.prototype.indexOf = function(obj){
		for(var i=0; i<this.length; i++){
			if(this[i]==obj){
				return i;
			}
		}
		return -1;
	}
}

function spliceText(text, indices) {
	// Copyright 2010, Wade Simmons <https://gist.github.com/442463>
	// Licensed under the MIT license
	var result = "";
	var last_i = 0;
	var i = 0;
	
	for (i=0; i < text.length; ++i) {
		var ind = indices[i];
		if (ind) {
			var end = ind[0];
			var output = ind[1];
			if (i > last_i) {
				result += escapeHTML(text.substring(last_i, i));
			}
			result += output;
			i = end - 1;
			last_i = end;
		}
	}
	
	if (i > last_i) {
		result += escapeHTML(text.substring(last_i, i));
	}
	
	return result;
}



function TweetQuery() {
	var tweetQuery = this;
	
	this.QUERY_URL = '';
	this.request = {};
	
	this.lastUpdate = 0;
	
	/** Time since last update, in seconds */
	this.getTimeSinceUpdate = function() {
		var now = new Date();
		return now.getTime() - this.lastUpdate;
	}
	
	this.getTweetsForData = function(data) {
		var newTweets = [];
		
		$.each(data, function(index, tweetData) {
			var tweet = new Tweet(tweetData, true);
			newTweets.unshift(tweet);
		});
		
		return newTweets;
	}
	
	this.loadTweets = function(loadedCallback) {
		var self = this;
		var newTweets = [];
		
		$.ajax({
			url: this.QUERY_URL,
			dataType: 'jsonp',
			data: this.request,
			timeout: 5000,
			success: function(data, status, xhr) {
				var results = data || [];
				if ('results' in results) results = results.results;
				newTweets = self.getTweetsForData(results);
			},
			complete: function(xhr, status) {
				loadedCallback(newTweets);
			}
		});
		
		var now = new Date();
		this.lastUpdate = now.getTime();
	}
}

function TwitterSearchQuery(query) {
	var listTweetQuery = this;
	
	this.QUERY_URL = 'http://search.twitter.com/search.json';
	this.request = {
		'q' : query,
		'include_entities' : true
	}
}
TwitterSearchQuery.prototype = new TweetQuery();

function ListTweetQuery(screenName, listName) {
	var listTweetQuery = this;
	
	this.QUERY_URL = 'http://api.twitter.com/1/lists/statuses.json';
	this.request = {
		'owner_screen_name' : screenName,
		'slug' : listName,
		'include_entities' : true,
		'include_rts' : true,
		'per_page' : 25
	}
}
ListTweetQuery.prototype = new TweetQuery();

function UserTimelineQuery(screenName) {
	var userTweetQuery = this;
	
	this.QUERY_URL = 'http://api.twitter.com/1/statuses/user_timeline.json';
	this.request = {
		'screen_name' : screenName,
		'include_entities' : true
		//'include_rts' : true
	}
}
UserTimelineQuery.prototype = new TweetQuery();

function UserStatusQuery(screenName) {
	var userStatusQuery = this;
	
	this.QUERY_URL = 'http://api.twitter.com/1/users/show.json';
	this.request = {
		'screen_name' : screenName,
		'include_entities' : true
	}
	
	this.getTweetsForData = function(data) {
		var newTweets = [];
		
		var tweetData = data.status;
		var userData = data;
		var tweet = new Tweet(tweetData, false, userData);
		newTweets.unshift(tweet);
		
		return newTweets;
	}
}
UserStatusQuery.prototype = new TweetQuery();



function Tweet(data, expandRetweet, user) {
	var tweet = this;
	
	var innerData = data;
	if (expandRetweet && data.retweeted_status) innerData = data.retweeted_status;
	
	var user = user || innerData.user;
	var userID = innerData.from_user_id || user.id;
	var userRealName = innerData.from_user_name || user.name;
	var userScreenName = innerData.from_user || user.screen_name;
	
	var linkHashTag = function(hashTag) {
		return 'http://twitter.com/search?q='+escape('#'+hashTag);
	}
	
	var linkUser = function(userName) {
		return 'http://twitter.com/'+escape(userName);
	}
	
	var linkUserID = function(userID) {
		return 'http://twitter.com/account/redirect_by_id?id='+userID;
	}
	
	var linkEntities = function(entities, text) {
		entityIndices = {};
		
		$.each(entities.media || [], function(i, entry) {
			var link = '<a class="twitter-url twitter-media" href="'+escapeHTML(entry.media_url)+'">'+escapeHTML(entry.display_url || entry.url)+'</a>';
			entityIndices[entry.indices[0]] = [entry.indices[1], link];
		});
		
		$.each(entities.urls || [], function(i, entry) {
			var link = '<a class="twitter-url" href="'+escapeHTML(entry.url)+'">'+escapeHTML(entry.display_url || entry.url)+'</a>';
			entityIndices[entry.indices[0]] = [entry.indices[1], link];
		});
		
		$.each(entities.hashtags || [], function(i, entry) {
			var link = '<a class="twitter-hashtag" href="'+linkHashTag(entry.text)+'">'+escapeHTML('#'+entry.text)+'</a>';
			entityIndices[entry.indices[0]] = [entry.indices[1], link];
		});
		
		$.each(entities.user_mentions || [], function(i, entry) {
			var link = '<a class="twitter-mention" href="'+linkUserID(entry.id)+'">'+escapeHTML('@'+entry.screen_name)+'</a>';
			entityIndices[entry.indices[0]] = [entry.indices[1], link];
		});
		
		return spliceText(text, entityIndices);
	}
	var linkedText = linkEntities(innerData.entities, innerData.text);
	
	this.getHtml = function(fields) {
		fields = fields || ['author', 'date'];
		
		var container = $('<div>').attr({
			'class' : 'tweet'
		});
		
		if (fields.indexOf('author') >= 0) {
			var authorDetails = $('<a>').attr({
				'href' : linkUserID(userID),
				/*'target' : '_blank',*/
				'class' : 'tweet-author-details'
			});
		
			var authorName = $('<span>').attr({
				'class' : 'tweet-author-name'
			}).text(userRealName);
		
			var authorID = $('<span>').attr({
				'class' : 'tweet-author-id'
			}).text(userScreenName);
		
			authorDetails.append(authorName, authorID);
			container.append(authorDetails);
		}
		
		if (fields.indexOf('author-id') >= 0) {
			var authorID = $('<a>').attr({
				'href' : linkUserID(userID),
				/*'target' : '_blank',*/
				'class' : 'tweet-author-id'
			}).text('@'+userScreenName+':');
			container.append(authorID);
		}
		
		/*
		if (fields.indexOf('date') >= 0) {
			var date = $('<a>').attr({
				'class' : 'tweet-date',
				'target' : '_blank'
				'href' : linkUserID(userID)
			});
		}
		*/
		
		var text = $('<div>').attr({
			'class' : 'tweet-text'
		});
		text.html(linkedText);
		container.append(text);
		
		return container;
	}
}

function TweetsList(container) {
	var tweetsList = this;
	
	container = $(container);
	var list = $('<ul>').attr({
		'class' : 'tweets-list'
	});
	container.append(list);
	
	this.showTweet = function(tweet, fields) {
		var listItem = $('<li>').html(tweet.getHtml(fields));
		list.append(listItem);
	}
}

function SlidingTweetsList(container) {
	var slidingTweetsList = this;
	
	container = $(container);
	var list = $('<ul>').attr({
		'class' : 'tweets-list'
	});
	container.append(list);
	
	var cleanup = function() {
		var bottom = container.height();
		list.children().each(function(index, listItem) {
			if ($(listItem).position().top > bottom) {
				$(listItem).remove();
			}
		});
	}
	
	this.showTweet = function(tweet, fields) {
		var listItem = $('<li>');
		listItem.html(tweet.getHtml(fields));
		listItem.hide();
		listItem.css('opacity', '0');
		
		list.prepend(listItem);
		
		var expandTime = listItem.height() * 8;
		listItem.animate({
			'height': 'show',
			'opacity': '1'
		}, expandTime, 'linear', function() {
			cleanup();
		});
		
		listItem.slideDown(500);
	}
}


function TweetBuffer(query, order) {
	var tweetBuffer = this;
	
	order = order || 'ascending';
	
	var tweets = [];
	var nextTweetIndex = 0;
	
	var loadedCallback = function(newTweets) {
		if (newTweets.length > 0) {
			tweets = newTweets;
			if (order == 'descending') tweets.reverse();
		}
		nextTweet = 0;
	}
	
	var getNextTweet = function(returnTweet) {
		if (nextTweetIndex < tweets.length) {
			returnTweet(tweets[nextTweetIndex]);
		} else {
			nextTweetIndex = 0;
			if (query.getTimeSinceUpdate() > 15 * 60 * 1000) {
				// load new tweets every 15 minutes
				query.loadTweets(function(newTweets) {
					loadedCallback(newTweets);
					returnTweet(tweets[nextTweetIndex]);
				});
			} else {
				returnTweet(tweets[nextTweetIndex]);
			}
		}
	}
	
	
	this.dataIsAvailable = function(response) {
		getNextTweet(function(tweet) {
			response ( (tweet !== undefined) );
		});
	}
	
	/* Loads (if necessary) the next tweet and sends it asynchronously to
	 * the tweetReceived(tweet) callback. The tweet parameter is undefined
	 * if no tweets are available.
	 */
	this.popTweet = function(tweetReceived) {
		getNextTweet(function(tweet) {
			nextTweetIndex += 1;
			tweetReceived(tweet);
		});
	}
}

function TwitterList(streamContainer, query, length, tweetFields) {
	var twitterList = this;
	tweetFields = tweetFields || ['author', 'date'];
	
	var tweetsContainer = $(streamContainer).children('.twitter-stream-tweets');
	var tweetsList = new TweetsList(tweetsContainer);
	
	var tweetBuffer = new TweetBuffer(query, 'descending');

	var loadTweet = function() {
		tweetBuffer.popTweet(function(tweet) {
			if (tweet) {
				tweetsList.showTweet(tweet, tweetFields);
			}
		});
	}
	
	var _init = function() {
		tweetBuffer.dataIsAvailable(function(available) {
			if (available) {
				// make sure there is some content visible from the start
				for (n = 0; n < length; n++) {
					loadTweet();
				}
			}
		});
	}
	_init();
}

function TwitterStream(streamContainer, query, startLength, tweetFields) {
	var twitterStream = this;
	startLength = startLength || 1;
	tweetFields = tweetFields || ['author', 'date'];

	var tweetsContainer = $(streamContainer).children('.twitter-stream-tweets');
	var tweetsList = new SlidingTweetsList(tweetsContainer);
	
	var tweetBuffer = new TweetBuffer(query, 'ascending');
	
	var showNextInterval = undefined;
	
	var showNextTweet = function() {
		tweetBuffer.popTweet(function(tweet) {
			if (tweet) {
				twitterStream.enable();
				tweetsList.showTweet(tweet, tweetFields);
			} else {
				// this isn't working, so we'll hide the stream
				twitterStream.disable();
			}
		});
	}
	
	var _enabled = false;
	this.isEnabled = function() {
		return _enabled;
	}
	this.enable = function(immediate) {
		if (_enabled) return;
		if (immediate) {
			$(streamContainer).show();
		} else {
			$(streamContainer).fadeIn(150);
		}
		_enabled = true;
	}
	this.disable = function(immediate) {
		if (! _enabled) return;
		if (immediate) {
			$(streamContainer).hide();
		} else {
			$(streamContainer).fadeOut(150);
		}
		_enabled = false;
		this.stop();
	}
	
	this.start = function() {
		this.stop();
		showNextInterval = window.setInterval(showNextTweet, 6000);
	}
	this.stop = function() {
		if (showNextInterval) window.clearInterval(showNextInterval);
	}
	
	var _init = function() {
		tweetBuffer.dataIsAvailable(function(available) {
			if (available) {
				twitterStream.enable(true);
				// make sure there is some content visible from the start
				showNextTweet();
			} else {
				twitterStream.disable(true);
			}
		});
	}
	_init();
}

function TwitterBadge(streamContainer, query, tweetFields) {
	var twitterBadge = this;
	tweetFields = tweetFields || ['date'];
	
	var tweetsContainer = $(streamContainer).children('.twitter-stream-tweets');
	
	var tweetBuffer = new TweetBuffer(query, 'descending');
	
	var showNextInterval = undefined;
	
	var showNextTweet = function() {
		tweetBuffer.popTweet(function(tweet) {
			if (tweet) {
				twitterBadge.enable();
				
				// TODO: would be nice to fade between tweets, but this will do for now :)
				var tweetHtml = tweet.getHtml(tweetFields);
				tweetsContainer.html(tweetHtml);
			} else {
				// this isn't working, so we'll hide the stream
				twitterBadge.disable();
			}
		});
	}
	
	var _enabled = false;
	this.isEnabled = function() {
		return _enabled;
	}
	this.enable = function(immediate) {
		if (_enabled) return;
		if (immediate) {
			$(streamContainer).show();
		} else {
			$(streamContainer).fadeIn(150);
		}
		_enabled = true;
	}
	this.disable = function(immediate) {
		if (! _enabled) return;
		if (immediate) {
			$(streamContainer).hide();
		} else {
			$(streamContainer).fadeOut(150);
		}
		_enabled = false;
		this.stop();
	}
	
	this.showNext = function() {
		showNextTweet();
		this.start();
	}
	
	this.start = function() {
		this.stop();
		showNextInterval = window.setInterval(showNextTweet, 6000);
	}
	this.stop = function() {
		if (showNextInterval) window.clearInterval(showNextInterval);
	}
	
	var _init = function() {
		tweetBuffer.dataIsAvailable(function(available) {
			if (available) {
				twitterBadge.enable(true);
				// make sure there is some content visible from the start
				showNextTweet();
			} else {
				twitterBadge.disable(true);
			}
		});
	}
	_init();
}
