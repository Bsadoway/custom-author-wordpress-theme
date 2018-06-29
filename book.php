<?php /* Template Name: book-page */ ?>
<?php get_header(); ?>

<div class="container">

    <h1 class="books-header">
        <?php the_field('book_header') ?>
    </h1>

    <div class="row">
        <div class="col-md flex">
            <?php $image = get_field('book_image'); ?>
            <img class="img-padding img-feature book-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
        <div class="col-md">
            <?php the_field('book_description') ?>
            <?php 
            $text = get_field('awards_text');
            if( $text ): ?>
            <div>
                <?php the_field('awards_text') ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row buffer">
        <?php 

        $test = get_field('testimonial_quote_text');

        if( $test ): ?>

        <div class="col-sm">
            <div class="testimonial-container">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="testimonial-icon">
                            <i class="fa fa-quote-left pad-icon"></i>
                        </div>
                        <div class="description">
                            <?php the_field('testimonial_quote_text');?>
                        </div>
                    </div>
                </div>
                <?php the_field('testimonial_quote_person');?>
            </div>
        </div>
        <?php endif; ?>

        <?php 

        $test2 = get_field('testimonial_quote_text2');

        if( $test2 ): ?>
        <div class="col-sm">
            <div class="testimonial-container">

                <div class="testimonial">
                    <div class="testimonial-content">
                        <div class="testimonial-icon">
                            <i class="fa fa-quote-left pad-icon"></i>
                        </div>
                        <div class="description">
                            <?php the_field('testimonial_quote_text2');?>
                        </div>
                    </div>
                </div>
                <?php the_field('testimonial_quote_person2');?>
            </div>
        </div>
        <?php endif; ?>
    </div>


</div>

<?php get_footer(); ?>