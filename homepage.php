<?php /* Template Name: homepage */ ?>
<?php get_header(); ?>

<div class="container">
    <div class="row align-items-top">
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
            <div class="other-books-container">
                <h2 class="other-books-title">Other Books</h2>
                <ul class="book-list">
                    <li class="book-thumbnail">
                        <div class="card">
                            <?php $imageThumb1 = get_field('book1_thumb'); ?>
                            <img class="img-padding card-img-top" src="<?php echo $imageThumb1['url']; ?>" alt="<?php echo $imageThumb1['alt']; ?>" />
                            <div class="card-body">
                                <p class="card-text">
                                    <?php the_field('book1_title'); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="book-thumbnail">
                        <div class="card">
                            <?php $imageThumb2 = get_field('book2_thumb'); ?>
                            <img class="img-padding card-img-top" src="<?php echo $imageThumb2['url']; ?>" alt="<?php echo $imageThumb2['alt']; ?>" />
                            <div class="card-body">
                                <p class="card-text">
                                    <?php the_field('book2_title'); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="book-thumbnail">
                        <div class="card">
                            <?php $imageThumb3 = get_field('book3_thumb'); ?>
                            <img class="img-padding card-img-top" src="<?php echo $imageThumb3['url']; ?>" alt="<?php echo $imageThumb3['alt']; ?>" />
                            <div class="card-body">
                                <p class="card-text">
                                    <?php the_field('book3_title'); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>