<?php /* Template Name: books */ ?>
<?php get_header(); ?>
<div id="books">
    <div id="books-copy">
        <div id="books-header">
            <h1 class="books-h1">BOOKS</h1>
        </div>

        <div id="metro-left">
            <h1 class="metro-h3">
                <?php the_field('book1_title');?>
            </h1>
            <h6 class="metro-h5">
                <?php the_field('book1_subheader');?>
            </h6>
            <p>
                <?php the_field('book1_text');?>
            </p>
        </div>
        <div id="metro-right">
            <?php $image = get_field('book1_image'); ?>
            <img class="img-padding" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <p>
                <?php the_field('book1_link_1');?>
            </p>
            <p>
                <?php the_field('book1_link_2');?>
            </p>
        </div>
    </div>
</div>

<?php get_footer(); ?>