s$(document).ready(function () {
    var twitterUserLists = $('.twitter-user-list');
    $.each(twitterUserLists, function (index, container) {
        var username = $(container).attr('data-twitter-username');
        var length = $(container).attr('data-twitter-length') || 1;
        var userTimelineQuery = new UserTimelineQuery(username);
        var badge = new TwitterList(container, userTimelineQuery, length, ['author', 'date']);
    });
});