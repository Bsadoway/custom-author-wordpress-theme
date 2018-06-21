<?php /* Template Name: homepage */ ?>
<?php get_header(); ?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-sm">
            <?php $image = get_field('feature_book_image'); ?>
            <img class="img-border" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>

        <div class="col-sm">
            <h2>
                <?php the_field('feature_book_title');?>
            </h2>
            <p class="p-home">
                <?php the_field('sub_head');?>
            </p>
            <p>
                <?php the_field('paragraph_text');?>
            </p>

        </div>
        <div class="col-sm">
            <div class="img-border"></div>
        </div>
    </div>

</div>

<?php get_footer(); ?>