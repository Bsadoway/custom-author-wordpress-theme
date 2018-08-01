<?php /* Template Name: book-page */ ?>
<?php get_header(); ?>
<?php 
    $colour = get_field_object('colour');
    $value = $colour['value'];
?>

<div class="container">
    <div class="book-header row">
        <h1 style="margin: 0;">
            <?php the_field('book_header') ?>
        </h1>
    </div>
    <div class="row">
        <div class="col-md flex">
            <?php $image = get_field('book_image'); ?>
            <img class="img-padding img-feature book-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
        <div class="col-md book-text bg-white">
            <?php the_field('book_description') ?>

            <?php 
            $text = get_field('awards_text');
            if( $text ): ?>
            <div class="awards-wrapper">
                <i class="fa-3x fas fa-award <?php echo $value; ?>"></i>

                <?php the_field('awards_text') ?>
            </div>
            <?php endif; ?>

            <div class="buy-now-links">
                <a class="btn dwn-button <?php echo $value; ?>-bg" href="<?php the_field( 'goodreads')?>">
                
                    <i class="fab fa-goodreads dwn-icon icon-l"></i>
                    Goodreads
                </a>
                <a class="btn dwn-button <?php echo $value; ?>-bg" href="<?php the_field( 'amazon')?>">
                    <i class="fab fa-amazon dwn-icon icon-l"></i>
                    Amazon
                </a>
            </div>
        </div>
    </div>


    <div class="row buffer">
        <?php 

        $test = get_field('testimonial_quote_text');
        $test2 = get_field('testimonial_quote_text2');

        if( $test ): ?>

        <div class="col-md">
            <?php if ($test && $test2): ?>
            <div class="testimonial-container">
                <?php else: ?>
                <div class="testimonial-container one-test">
                    <?php endif; ?>
                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon <?php echo $value; ?>-icon">
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


        if( $test2 ): ?>
            <div class="col-md">
                <div class="testimonial-container">

                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon <?php echo $value; ?>-icon">
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