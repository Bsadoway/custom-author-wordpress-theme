<?php /* Template Name: about */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md">
            <div>
                <div>
                    <h1 class="rachelle-h1">ABOUT RACHELLE</h1>
                </div>
                <?php $image = get_field('about_rachelle_image'); ?>
                <img class="img-padding about-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <p class="rachelle-p">
                    <?php the_field('about_rachelle_text');?>
                </p>
            </div>
        </div>
        <div class="col-md">
            <h3 class="twitter-header">
                <?php the_field('twitter_field'); ?>
            </h3>
            <div class="twitter-body">
                <a class="twitter-timeline" href="https://twitter.com/rkdelaney" data-widget-id="364496309341798401">Tweets by @rkdelaney</a>
                <script>
                    ! function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0],
                            p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");
                </script>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>