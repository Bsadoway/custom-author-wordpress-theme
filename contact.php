<?php /* Template Name: contact */ ?>
<?php get_header(); ?>

<div class="container">
    <div class="contact-header">
        <h1 class="contact-h1">CONTACT RACHELLE</h1>
    </div>
    <div class="row">
        <div class="col-md">
            <h3>
                <?php the_field('contact_info_title');?>
            </h3>
            <p>
                <?php the_field('contact_info_text');?>
            </p>
        </div>

        <div class="col-md">
            <h3>
                <?php the_field('contact_form_title');?>
            </h3>
            <p>
                <?php the_field('contact_form_text');?>
            </p>
        </div>
    </div>
</div>
<?php get_footer(); ?>