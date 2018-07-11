<?php /* Template Name: books */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row center-content expand-top">
        <img class="books-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/Open_Book.png" alt="" />
    </div>
    <div class="row center-content">
        <h1 class="books-header">Rachelle's Books</h1>
    </div>
    <div class="row bg-white buffer">
        <?php the_field('book_gallery') ?>
    </div>
</div>

<?php get_footer(); ?>