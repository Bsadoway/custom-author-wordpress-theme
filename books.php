<?php /* Template Name: books */ ?>
<?php get_header(); ?>
<div class="container">
    <div class="row center-content">
        <i class="fas fa-book-open fa-4x"></i>
    </div>
    <div class="row center-content">
        <h1 class="books-header">Rachelles Books</h1>
    </div>
    <div class="row">
        <?php the_field('book_gallery') ?>
    </div>
</div>

<?php get_footer(); ?>