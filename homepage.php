<?php /* Template Name: homepage */ ?>
<?php get_header(); ?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-sm">
            <?php $image = get_field('feature_book_image'); ?>
            <img class="img-padding" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
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
            <div>
                <h2 class="other-books-title">Other Books</h2>
                <ul class="book-list">
                    <li class="book-thumbnail">
                        <?php $imageThumb1 = get_field('book1_thumb'); ?>
                        <img class="img-padding" src="<?php echo $imageThumb1['url']; ?>" alt="<?php echo $imageThumb1['alt']; ?>" />
                    </li>
                    <li class="book-thumbnail">
                        <?php $imageThumb2 = get_field('book2_thumb'); ?>
                        <img class="img-padding" src="<?php echo $imageThumb2['url']; ?>" alt="<?php echo $imageThumb2['alt']; ?>" />
                    </li>
                    <li class="book-thumbnail">
                        <?php $imageThumb3 = get_field('book3_thumb'); ?>
                        <img class="img-padding" src="<?php echo $imageThumb3['url']; ?>" alt="<?php echo $imageThumb3['alt']; ?>" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>