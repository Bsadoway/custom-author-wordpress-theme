<!-- head -->
<?php include "header.php";?>

<body id="top">
	<div id="wrapper">

		<!-- header/navigation -->

		<?php include "navigation.php";?>


		<div id="content-full">
			<div id="home">

				<div id="home-left">
					<img class="dogs-cover" src="<?php the_field('home_image');?>" width="260" />

				</div>
				<!-- END home-left -->

				<div id="home-right">
					<h5 class="home-title-line1">
						<?php the_field('title_1_small_capital_text');?>
					</h5>
					<h2 class="home-title-line2">
						<?php the_field('title_2_main_title');?>
					</h2>
					<p class="p-home">
						<?php the_field('sub-head');?>
					</p>
					<p>
						<?php the_field('paragraph_text');?>
					</p>

				</div>
				<!--END home-right-->

			</div>
			<!-- END home-->

			<div id="features">
				<div id="features-copy">
					<ul>
						<li class="feature-1">
							<img src="<?php the_field('feature_1_image');?>" width="280" class="img-feature1" alt="Author visits" />
							<h4 class="feature-header">
								<?php the_field('feature_1_title');?>
							</h4>
							<p class="feature-p">
								<?php the_field('feature_1_text');?>
							</p>
						</li>

						<li class="feature-2">
							<img src="<?php the_field('feature_2_image');?>" width="280" class="img-feature2" alt="Rachelle with the stray dogs of Moscow"
							/>
							<h4 class="feature-header">
								<?php the_field('feature_2_title');?>
							</h4>
							<p class="feature-p">
								<?php the_field('feature_2_text');?>
							</p>
						</li>

						<li class="feature-3">
							<img src="<?php the_field('feature_3_image');?>" width="280" class="img-feature3" alt="TD Book Week 2013" />
							<h4 class="feature-header">
								<?php the_field('feature_3_title');?>
							</h4>
							<p class="feature-p">
								<?php the_field('feature_3_text');?>
							</p>
						</li>

					</ul>

				</div>

			</div>
			<!-- END features-->


			<div id="about">
				<div id="about-copy">

					<div id="about-rachelle">
						<div id="about-header">
							<h1 class="rachelle-h1">ABOUT RACHELLE</h1>
						</div>

						<img src="<?php the_field('about_rachelle_image');?>" alt="Rachelle Delaney" width="215" class="rachelle-img" />
						<p class="rachelle-p">
							<?php the_field('about_rachelle_text');?>
						</p>

						<!-- END about-rachelle-->
					</div>
				</div>
			</div>
			<!-- END about-copy-->
			<!-- END about-->

			<div id="in-person-full">
				<div id="in-person-copy">
					<div id="in-person-header">
						<h1 class="in-person-h1">IN PERSON</h1>
					</div>

					<div id="author-visits-left">
						<h1 class="author">
							<?php the_field('in_person_title_1');?>
						</h1>
						<p>
							<?php the_field('in_person_text_1');?>
						</p>

						<br />

						<h1 class="old-story">
							<?php the_field('in_person_title_2');?>
						</h1>
						<p>
							<?php the_field('in_person_text_2');?>
						</p>

					</div>
					<!-- END author-visits-left-->

					<div id="author-visits-right">
						<img src="<?php the_field('in_person_image_1');?>" alt="" width="200" class="school-visit" />

					</div>
					<!-- END author-visits-right -->



					<div id="magnificent-left">
						<!--<img src="<?php the_field('in_person_image_2');?>" alt="" width="200" class="straydog-circle" />-->
					</div>


					<div id="magnificent-right">
						<h1 class="magnificent-h1">
							<?php the_field('in_person_title_3');?>
						</h1>
						<p>
							<?php the_field('in_person_text_3');?>
						</p>


						<br />

						<h1 class="workshops-h1">
							<?php the_field('in_person_title_4');?>
						</h1>
						<p>
							<?php the_field('in_person_text_4');?>
						</p>


					</div>
					<!-- END magnificent right-->



					<div id="workshops-left">


					</div>
					<!-- END workshops left-->

					<div id="workshops-right">

					</div>

					<h4 class="testament-h4">TESTIMONIALS</h4>

					<div id="testament-left">
						<p>
							<?php the_field('testament_quote_left');?>
						</p>
						<p class="testament-name">
							<?php the_field('testament_name_left');?>
						</p>
					</div>
					<!-- END testament-left-->

					<div id="testament-right">
						<p>
							<?php the_field('testament_quote_right');?>
						</p>
						<p class="testament-name">
							<?php the_field('testament_name_right');?>
						</p>

					</div>
					<!-- END testament right-->

				</div>
				<!-- END in person copy-->

			</div>
			<!-- END in person full-->


			<div id="books">
				<div id="books-copy">
					<div id="books-header">
						<h1 class="books-h1">BOOKS</h1>
					</div>

					<div id="metro-left">
						<h1 class="metro-h3">
							<?php the_field('metro_dogs_title');?>
						</h1>
						<h6 class="metro-h5">
							<?php the_field('metro_dogs_subhead');?>
						</h6>
						<p>
							<?php the_field('metro_dogs_text');?>
						</p>

					</div>
					<!-- END metro-left-->

					<div id="metro-right">
						<img class="metrodogs-img" src="<?php the_field('metro_dogs_image');?>" width="230" alt="The Metro Dogs of Moscow" />
						<p>
							<?php the_field('metro_dogs_link_1');?>
						</p>
						<p>
							<?php the_field('metro_dogs_link_2');?>
						</p>

					</div>
					<!-- END metro-right-->


					<img src="<?php bloginfo('stylesheet_directory');?>/images/rachelle-dotted-line.png" class="dotted-line" width="987" />


					<div id="lost-souls-left">
						<h1 class="lost-souls-h3">
							<?php the_field('lost_souls_title');?>
						</h1>
						<p>
							<?php the_field('lost_souls_text');?>
						</p>

					</div>
					<!-- END lost souls left-->

					<div id="lost-souls-right">
						<img class="lost-souls-1-img" src="<?php the_field('lost_souls_image');?>" alt="The Ship of Lost Souls" width="230" />

					</div>
					<!-- END lost souls right-->

					<img src="<?php bloginfo('stylesheet_directory');?>/images/rachelle-dotted-line.png" class="dotted-line" width="987" />

					<div id="islandx-left">
						<img class="lost-souls-2-img" src="<?php the_field('islandx_image');?>" alt="The Lost Souls of Island X" width="230" />
					</div>

					<div id="islandx-right">
						<h1 class="islandx-h3">
							<?php the_field('islandx_title');?>
						</h1>
						<p>
							<?php the_field('islandx_text');?>
						</p>
					</div>



				</div>
				<!-- END books-copy -->

			</div>
			<!-- END books-->


			<div id="contact-full">
				<div id="contact-copy">
					<div id="contact-header">
						<h1 class="contact-h1">CONTACT RACHELLE</h1>
					</div>

					<div id="contact-left">
						<h3 class="contact-title-1">
							<?php the_field('contact_info_title');?>
						</h3>
						<p>
							<?php the_field('contact_info_text');?>
						</p>
					</div>
					<!-- END contact left-->

					<div id="contact-right">
						<div id="contact-form">
							<h3 class="contact-title-2">
								<?php the_field('contact_form_title');?>
							</h3>

							<p>
								<?php the_field('contact_form_text');?>
							</p>

						</div>
						<!-- END contact-form-->


						<!-- END contact twitter-->
					</div>
					<!-- END contact middle-->

				</div>
				<!-- END contact copy-->
			</div>
			<!-- END contact full-->
		</div>
		<!-- END content-full-->
	</div>
	<!-- END wrapper-->
	<?php get_footer(); ?>