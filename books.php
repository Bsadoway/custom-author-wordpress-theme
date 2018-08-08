<?php /* Template Name: books */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row center-content books-header">
        <h1>Rachelle's Books</h1>
        <img class="ribbon" src="<?php bloginfo('stylesheet_directory'); ?>/images/Ribbon.svg" alt="" />
    </div>
    <div class="row bg-white buffer">
        <?php the_field('book_gallery') ?>
    </div>
</div>

<?php get_footer(); ?>