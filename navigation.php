<div class="container">
	<div class="custom-nav">

		<?php wp_nav_menu( array(
		'theme_location' => 'primary_menu',
		'menu_class' => 'nav nav-main',
		'container' => 'nav',
		'container_class' => 'navbar navbar-expand-md main-nav',
		'fallback_cb' => false
		) ); ?>
	</div>
</div>
<!-- <div class="header-nav">
		
		<ul class="nav nav-social">
			<li class="nav-item">
				<a href="http://instagram.com/rkdelaney">
					<img src="<?php bloginfo('stylesheet_directory');?>/images/instagram-flag.png" class="instagram-flag" title="Instagram" />
				</a>
			</li>
			<li class="nav-item">
				<a href="http://twitter.com/rkdelaney">
					<img src="<?php bloginfo('stylesheet_directory');?>/images/twitter-flag.png" class="twitter-flag" title="Twitter" />
				</a>
			</li>
			<li class="nav-item">
				<a href="http://www.goodreads.com/author/show/2879536.Rachelle_Delaney">
					<img src="<?php bloginfo('stylesheet_directory');?>/images/goodreads-flag.png" class="goodreads-flag" title="Good Reads"
					/>
				</a>
			</li>
		</ul>
<!-- END navigation-->



<!-- END header-->