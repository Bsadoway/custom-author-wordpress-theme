<?php wp_footer(); ?>
<div class="footer-row">
    <div class="container">
        <div class="row">
            <div class="col-sm footer-col">
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rachelle-logo-red-small.png" alt="" />
            </div>
            <div class="col-sm footer-col">
                <?php the_field('contact-list') ?>
            </div>
            <div class="col-sm footer-col">
                <div class="" id="navbarSupportedContent">
                    <?php wp_nav_menu(array(
					'menu'              => 'social2',
    				'theme_location' 	=> 'social_footer',
    				'menu_class' 		=> 'navbar-nav nav-main ml-auto',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'ml-auto',
					'container_id'      => '',
    				'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
    				'walker' 			=> new wp_bootstrap_navwalker(),
				));?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>