<div class="nav-container">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
		<a class="nav-logo" href="/">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/Rachelle-logo-2018.png" alt="" />
		</a>
			<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			    aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php wp_nav_menu(array(
					'menu'              => 'primary',
    				'theme_location' 	=> 'primary_menu',
    				'menu_class' 		=> 'navbar-nav nav-main mx-auto',
					'depth'             => 2,
					'container'         => 'div',
					'container_class'   => 'mx-auto',
					'container_id'      => '',
    				'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
    				'walker' 			=> new wp_bootstrap_navwalker(),
				));?>
			</div>
		</nav>
	</div>
</div>