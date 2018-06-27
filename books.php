<?php /* Template Name: books */ ?>
<?php get_header(); ?>
<div class="container">

    <h1 class="header">BOOKS</h1>

    <div class="row">
        <?php the_field('book_gallery') ?>
    </div>
</div>

<?php get_footer(); ?>