<?php /* Template Name: about */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row about-header">
        <h1 class="">About Rachelle</h1>
    </div>
    <div class="row">
        <div class="col-md bg-white padding-50 about-container">
            <?php $image = get_field('about_rachelle_image'); ?>
            <img class="img-padding about-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <p class="rachelle-p">
                <?php the_field('about_rachelle_text');?>
            </p>
        </div>
        <div class="col-md">

            <div class="twitter-body">
                <a class="twitter-timeline" data-height="600" data-theme="light" href="https://twitter.com/rkdelaney?ref_src=twsrc%5Etfw">Tweets by Rachelle</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>