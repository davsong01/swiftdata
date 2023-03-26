<?php
if ( ! function_exists( 'advisor_client_testimonials' ) ) {

	function advisor_client_testimonials( $atts ){

			extract( shortcode_atts( array(

				'class_name'         => '',
				'style'    					 => 'style1',
				'autoplay'           => 'true',
				'autoplay_style'     => 'slide',
				'autoplay_time_out'  => '',
				'count'              => 10,
				'order'              => 'DESC',
				'heading'            => 'Happy Customers',
				'text'               => '',
				'text_color'			   => '#000000',
				'bg_image'           => '',
				'layout'           	 => 'overlay',

			), $atts ) );

			if( !empty( $bg_image ) ){


				$bg_image = wp_get_attachment_url($bg_image , 'full', false);

				?>
                <style>
				.testi-bg{

					background: url(<?php echo $bg_image; ?>) no-repeat;
					background-attachment: fixed;
    			background-size: cover;

				}
				</style>
                <?php

			} else {

				$bg_image = '';

			}
			if( empty( $order ) ){

				$order = 'DESC';

		  }
			$counter = 0;
			if( $style == 'style1' && $layout == 'overlay' ) {

				$counter = 2;

			} else {

				$counter = $count;

			}
			$args = array(

					'post_type' 			=> 'testimonial',
					'orderby'  		 		=> 'date',
					'order'     			=> $order,
					'post_status'     => 'publish',
					'posts_per_page' 	=> $counter,

			);


    	$advisor_testimonials = new WP_Query( $args );

			if ( $autoplay == 'true') {
				$autoplay = 'true';
			} else {
				$autoplay = 'false';
			}?>

			<?php if ( !empty ($autoplay_time_out) ) {
				$autoplay_time_out = $autoplay_time_out;
			} else {
				$autoplay_time_out = 0;
			}

			ob_start();
			?>

			<?php if ( $style == 'style1' ) { ?>

      <section class="<?php if( empty( $bg_image ) ){ echo 'bg-blue'; } else { echo 'testi-bg parallax'; } ?> <?php esc_attr_e( $class_name ); ?>">
				<div class="container">
					<div class="heading text-center animate bounceIn">

           <?php if( !empty( $heading ) ){ ?>

							<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

           <?php } ?>

          <?php if( !empty( $text ) ){ ?>

						<p><?php _e( $text , 'advisor-core'); ?></p>

          <?php } ?>

					</div>
					<?php if( $layout == 'overlay' ) { ?>

					<div class="row">

					<?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();


								  $testimonial_star_disabled  = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
									$testimonial_stars          = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
									$client_designation       	= get_post_meta( get_the_ID(), 'advisor_client_designation', true );
									$client_feedback          	= get_post_meta( get_the_ID(), 'advisor_client_feedback', true );
									$client_thumbnail 		 			= get_the_post_thumbnail(  get_the_ID() , array(100,100) , array( 'class' => 'img-circle' ));
									$client_name              	= get_the_title();


								?>
								<div class="col-md-6">
									<div class="testimonial animate fadeInUp">
		                <?php if( !empty( $client_feedback ) ){ ?>
										<div class="testimonial-content">

											<p><?php esc_html_e( $client_feedback , 'advisor-core'); ?></p>

										</div>
		                <?php } ?>
										<div class="row">
											<div class="col-md-6">

												<div class="testimonials-author">
		                                         <?php

												 if( !empty( $client_thumbnail ) ){

															echo $client_thumbnail;

		                      }
		                      if( !empty( $client_name ) ){ ?>

														<p><?php esc_html_e( $client_name , 'advisor-core'); ?><span>(<?php esc_html_e( $client_designation , 'advisor-core'); ?>)</span></p>

		                    <?php } ?>

												</div>

											</div>
											<div class="col-md-6">
												<div class="text-right">
		                    <?php if( $testimonial_star_disabled == false ){ ?>

													<ul class="rating">
		                      <?php

													 if( !empty( $testimonial_stars ) ){

													 	echo advisor_testimonial_rating( $testimonial_stars );

		                        }

													 ?>

													</ul>

		                    <?php } ?>

												</div>
											 </div>
										  </div>
										</div>
									</div>

									<?php

									endwhile;
									wp_reset_postdata();

						?>

						</div>

					<div class="text-center">
						<a class="btn <?php if( !empty( $bg_image ) ) { echo 'btn-bordered-white'; } else { echo 'btn-bordered-dark'; } ?> cd-see-all iconic animate fadeInUp" data-delay="200" href="javascript:void(0);" data-text="<?php esc_attr_e( 'View All' , 'advisor-core' ); ?>"><i class="icon-img-grid"></i><?php esc_html_e( 'View All' , 'advisor-core' ); ?></a>
					</div>

				</div>
         <?php
			   $args_all = array(

					'post_type' 			=> 'testimonial',
					'orderby'  		 		=> 'date',
					'order'     			=> $order,
					'posts_per_page' 	=> $count,

				);

    			$advisor_testimonials = new WP_Query( $args_all );

			   ?>
          <div class="cd-testimonials-all">
					<div class="cd-testimonials-all-wrapper">
						<ul>
            <?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();

						  $testimonial_star_disabled = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
							$testimonial_stars         = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
							$client_designation        = get_post_meta( get_the_ID(), 'advisor_client_designation', true );
							$client_feedback           = get_post_meta( get_the_ID(), 'advisor_client_feedback', true );
							$client_thumbnail 		     = get_the_post_thumbnail(  get_the_ID() , array(100,100) , array( 'class' => 'img-circle' ));
							$client_name               = get_the_title();


					     ?>
							<li class="cd-testimonials-item">
								<div class="testimonial">

                  <?php if( !empty( $client_feedback ) ){ ?>

									<div class="testimonial-content">

										<p><?php _e( $client_feedback , 'advisor-core'); ?></p>

									</div>

                  <?php } ?>
									<div class="row">
										<div class="col-md-6">
											<div class="testimonials-author">
                      <?php

										 if( !empty( $client_thumbnail ) ){

												echo $client_thumbnail;

                      }
                      if( !empty( $client_name ) ){ ?>

												<p><?php esc_html_e( $client_name , 'advisor-core'); ?><span>(<?php esc_html_e( $client_designation , 'advisor-core'); ?>)</span></p>

                    <?php } ?>

										   </div>

										</div>
										<div class="col-md-6">
											<div class="text-right">
												<?php if( $testimonial_star_disabled == false ){ ?>

                                <ul class="rating">
                                 <?php

                                 if( !empty( $testimonial_stars ) ){

                                    echo advisor_testimonial_rating( $testimonial_stars );

                                 }

                                 ?>

                                </ul>

                       		<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</li>
              <?php endwhile; ?>
               <?php wp_reset_postdata(); ?>
              </ul>
					</div>

					<a href="javascript:void(0);" class="close-btn">Close</a>

					<?php } else { ?>

						<?php if ( $autoplay_style == 'fade_in') {
							$carousel_class = 'single-item-carousel';
						}else {
							$carousel_class = 'testimonial-slider';
						}?>

						<div class=" <?php esc_attr_e( $carousel_class ); ?> owl-carousel owl-theme owl-loaded" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

							<?php $i = 0; ?>

								<?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();

								$i = $i + 1;

								if ( $i <= $advisor_testimonials->post_count ) {



								  $testimonial_star_disabled = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
									$testimonial_stars        = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
									$client_designation       = get_post_meta( get_the_ID(), 'advisor_client_designation', true );
									$client_feedback          = get_post_meta( get_the_ID(), 'advisor_client_feedback', true );
									$client_thumbnail 		    = get_the_post_thumbnail(  get_the_ID() , array(100,100) , array( 'class' => 'img-circle' ));
									$client_name              = get_the_title();

								?>
									<div class="testimonial-2 animate fadeInUp" data-delay="100">
										<div class="testimonials-author">
												<?php if( !empty( $client_thumbnail ) ){

	 												echo $client_thumbnail;

	                       }
												 if( !empty( $client_name ) ){ ?>

													<p><?php esc_html_e( $client_name , 'advisor-core'); ?><span>(<?php esc_html_e( $client_designation , 'advisor-core'); ?>)</span></p>

											 <?php } ?>
										 </div>
										 <div class="testimonial-content">
											 <?php if( $testimonial_star_disabled == false ){ ?>

															 <ul class="rating">
																<?php

																if( !empty( $testimonial_stars ) ){

																	 echo advisor_testimonial_rating( $testimonial_stars );

																}

																?>

															 </ul>

												 <?php } ?>
											 <?php if( !empty( $client_feedback ) ){ ?>

										<p><?php esc_html_e( $client_feedback , 'advisor-core'); ?></p>

										<?php } ?>

									</div>
							</div>


						<?php }

							endwhile; ?>
						 <?php wp_reset_postdata(); ?>
					 </div>
					<?php } ?>

				</div>

			</section>

			<?php } elseif ( $style == 'style2' ) { ?>

				<section class="testimonials p-b-70 p-t-100 <?php esc_attr_e( $class_name ); ?>">
						<div class="container">
								<div class="row p-b-60">
										<div class="col-md-12">
												<div class="heading">
														<div class="heading_border bg_red"></div>
														<?php if ( !empty ( $heading ) ) { ?><p><?php esc_html_e( $heading ); ?></p><?php } ?>
														<?php if ( !empty ( $text ) ) { ?><h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $text ); ?></h2><?php } ?>
												</div>
										</div>
								</div>

								<div class="row">

									<?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();

									  $testimonial_star_disabled = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
										$testimonial_stars        = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
										$client_designation       = get_post_meta( get_the_ID(), 'advisor_client_designation', true );
										$client_feedback          = get_post_meta( get_the_ID(), 'advisor_client_feedback', true );

										$client_thumbnail 		    = get_the_post_thumbnail(  get_the_ID() , array(44, 68) , array( 'class' => 'p-t-10' ));
										$client_name              = get_the_title();
										?>

										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="testimonials_box">

												<?php if ( !empty ( $client_thumbnail ) ) { echo $client_thumbnail;} else { ?>
													<img src="<?php echo get_template_directory_uri(); ?>/images/updated/quotes.jpg"/>
													<?php } ?>

												<fieldset class="rating start-postion">

													<?php if( $testimonial_star_disabled == false ){ ?>
														<ul class="rating">

															<?php if( !empty( $testimonial_stars ) ){
																			echo advisor_testimonial_rating( $testimonial_stars );
																		} ?>
														</ul>
														<?php } ?>
												</fieldset>
												<?php if ( !empty ( $client_feedback ) ) { ?><p><?php esc_html_e( $client_feedback ); ?></p><?php } ?>
												<?php if ( !empty ( $client_name ) ) { ?><h4><?php esc_html_e( $client_name ); ?></h4><?php } ?>
												<?php if ( !empty ( $client_designation ) ) { ?><p><?php esc_html_e( $client_designation ); ?></p><?php } ?>
											</div>
										</div>

									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>

								</div>
						</div>
				</section>
				<!-- Testimonials End -->

			<?php } elseif ( $style == 'style3' ) { ?>

				<!-- Testinomial Start -->
				<section class="testimonials_2" class="p-t-100 p-b-100 <?php esc_attr_e( $class_name ); ?>" >
						<div class="container">
								<div class="row">
										<div class="col-md-12 text-center">
												<div class="heading">
														<div class="heading_border_1 bg_red"></div>
														<?php if ( !empty ( $text ) ) { ?><p><?php esc_html_e( $text ); ?></p><?php } ?>
														<?php if ( !empty ( $heading ) ) { ?><h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading ); ?></h2><?php } ?>
												</div>
										</div>
								</div>
						</div>

						<div class="testimonial-slider_2 owl-carousel text-center" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

							<?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();

								$testimonial_star_disabled = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
								$testimonial_stars        = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
								$client_designation       = get_post_meta( get_the_ID(), 'advisor_client_designation', true );
								$client_feedback          = get_post_meta( get_the_ID(), 'advisor_client_feedback', true );
								$client_thumbnail 		    = get_the_post_thumbnail(  get_the_ID() , array(63, 63), '');
								$client_name              = get_the_title();
								?>

								<div class="item wow fadeInDown text-center">
									<?php if ( !empty ( $client_thumbnail ) ) { echo $client_thumbnail;} else { ?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/updated/wordpress-gravatar.jpg" alt="partner">
										<?php } ?>
										<div class="image_text">
											<fieldset class="rating start-postion p-top">

												<?php if( $testimonial_star_disabled == false ){ ?>
													<ul class="rating">
														<?php if( !empty( $testimonial_stars ) ){ echo advisor_testimonial_rating( $testimonial_stars ); } ?>
													</ul>
													<?php } ?>
											</fieldset>

												<?php if ( !empty ( $client_feedback ) ) { ?><p class="color_white"><?php esc_html_e( $client_feedback ); ?></p><?php } ?>
										</div>

										<div class="testi_heading">
											<?php if ( !empty ( $client_name ) ) { ?><h4><?php esc_html_e( $client_name ); ?></h4><?php } ?>
											<?php if ( !empty ( $client_designation ) ) { ?><p><?php esc_html_e( $client_designation ); ?></p><?php } ?>
										</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						</div>

				</section>
				<!-- Testinomial end -->


			<?php } elseif ( $style == 'style4' ) { ?>

				<!-- Testinomial Start -->
				<section class="testimonials" class="p-t-100 p-b-100 <?php esc_attr_e( $class_name ); ?>">
						<div class="container">
								<div class="row">
										<div class="col-md-12 text-center">
												<div class="heading">
														<div class="heading_border bg_red"></div>
														<?php if ( !empty ( $text ) ) { ?><p><?php esc_html_e( $text ); ?></p><?php } ?>
														<?php if ( !empty ( $heading ) ) { ?><h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading ); ?></h2><?php } ?>
												</div>
										</div>
								</div>
								<div class="row p-t-80">
										<div class="testimonial-slider owl-carousel text-center" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

											<?php while ( $advisor_testimonials->have_posts() ) : $advisor_testimonials->the_post();

												$testimonial_star_disabled = get_post_meta( get_the_ID(), 'advisor_hide_stars', true );
												$testimonial_stars        = get_post_meta( get_the_ID(), 'advisor_stars_rating', true );
												$client_designation       = get_post_meta( get_the_ID(), 'advisor_client_designation', true );
												$client_feedback          = get_post_meta( get_the_ID(), 'advisor_client_feedback', true );
												$client_thumbnail 		    = get_the_post_thumbnail(  get_the_ID() , array(73, 73), '');
												$client_name              = get_the_title();
												?>

													<div class="item wow fadeInDown">
														<?php if ( !empty ( $client_thumbnail ) ) { echo $client_thumbnail;} else { ?>
															<img src="<?php echo get_template_directory_uri(); ?>/images/updated/wordpress-gravatar.jpg" alt="partner">
															<?php } ?>
															<?php if ( !empty ( $client_name ) ) { ?><h3 class="p-t-15"><?php esc_html_e( $client_name ); ?></h3><?php } ?>
															<?php if ( !empty ( $client_designation ) ) { ?><p><?php esc_html_e( $client_designation ); ?></p><?php } ?>
															<div class="testimonial-detail text-center p-t-30">
																<?php if ( !empty ( $client_feedback ) ) { ?><p><?php esc_html_e( $client_feedback ); ?></p><?php } ?>
															</div>
													</div>

												<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>

										</div>
								</div>
						</div>
				</section>
				<!-- Testinomial end -->

			<?php } ?>

			<?php return ob_get_clean();
	}
}

add_shortcode('advisor_testimonials', 'advisor_client_testimonials');

function advisor_testimonial_rating( $rating_counter = '' ){

	if( !empty($rating_counter) ) {

		if($rating_counter == 'one' ){

			$stars = '<li><i class="fa fa-star"></i></li>';

		}
		else if($rating_counter == 'two' ){

			$stars = '<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>';

		}
		else if($rating_counter == 'three' ){

			$stars = '<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>';

		}
		else if($rating_counter == 'four' ){

			$stars = '<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>';

		}
		else if($rating_counter == 'five' ){

			$stars = '<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>
			<li><i class="fa fa-star"></i></li>';

		}
	    else {

			$stars = '';

		}

		return $stars;

	}

}

// Visual Composer Map
function advisor_vc_map_testimonial()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Testimonials', 'advisor-core' ),
		'base'     								=> 'advisor_testimonials',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(

		array(
					 "type" 					=> "dropdown",
					 "heading" 			=> esc_html__("Style", 'advisor-core'),
					 "param_name" 		=> "style",
					 "description" 	=> esc_html__("Select Style of Team view here", 'advisor-core'),
					 "value" => array(

							 esc_html__("Style 1", 'advisor-core') => 'style1',
							 esc_html__("Style 2", 'advisor-core') => 'style2',
							 esc_html__("Style 3", 'advisor-core') => 'style3',
							 esc_html__("Style 4", 'advisor-core') => 'style4'
						 ),
			 ),
		 array(
						"type" 					=> "dropdown",
						"heading" 			=> esc_html__("Autoplay", 'advisor-core'),
						"param_name" 		=> "autoplay",
						"description" 	=> esc_html__("Select Carousel Autoplay On/Off", 'advisor-core'),
						"value" => array(

								esc_html__("On", 'advisor-core') => 'true',
								esc_html__("Off", 'advisor-core') => 'false',

							),
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							'style3',
							'style4',
							),
						 )
				),
			array(
						 "type" 					=> "dropdown",
						 "heading" 			=> esc_html__("Carousel Autoplay Style", 'advisor-core'),
						 "param_name" 		=> "autoplay_style",
						 "description" 	=> esc_html__("Select Carousel Autoplay Style Slide/Fade in", 'advisor-core'),
						 "value" => array(

								 esc_html__("Slide", 'advisor-core') => 'slide',
								 esc_html__("Fade in", 'advisor-core') => 'fade_in',

							 ),
						 "dependency" => array(
						 "element" => "layout",
						 "value" => array(
							 'carousel',
							 ),
							)

				 ),
		array(
						"type" 					=> "textfield",
						"heading" 			=> esc_html__("Autoplay Time Out", 'advisor-core'),
						"param_name"		=> "autoplay_time_out",
						"description" 	=> __("Enter Autoplay Time Out time here. default time is 5000." , 'advisor-core'),
						"dependency" => array(
						"element" => "autoplay",
						"value" => array(
							'true',
							),
						 )
				),
		array(
            "type" 					=> "textfield",
            "heading" 			=> esc_html__("Heading", 'advisor-core'),
            "param_name"		=> "heading",
            "description" 	=> __("Enter Heading here" , 'advisor-core'),
        ),

		array(
            "type" 					=> "textfield",
            "heading" 			=> esc_html__("Text Below Heading", 'advisor-core'),
            "param_name" 		=> "text",
            "description" 	=> esc_html__("Enter some text to show under the main heading.", 'advisor-core'),
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Text Color", 'advisor-core' ),
					 "param_name" => "text_color",
					 "value" => '#000000',
					 "description" => __( "Choose the Color for the heading only.", 'advisor-core' )
				),

		array(

            "type"         => "textfield",
            "heading"      => esc_html__("Count", 'advisor-core'),
            "param_name"   => "count",
            "description"  => esc_html__("Number of testimonials to show.", 'advisor-core'),
						"value" 	   => 10,
        ),
		array(
            "type" 					=> "dropdown",
            "heading" 			=> esc_html__("Order", 'advisor-core'),
            "param_name" 		=> "order",
            "description" 	=> esc_html__("Sort your testimonials here", 'advisor-core'),
						"value" 				=> array(

							__("Descending", 'advisor-core') 	=> 'DESC',
							__("Ascending", 'advisor-core') 		=> 'ASC',
						),
        ),

		array(
            "type" 					=> "attach_image",
            "heading" 			=> esc_html__("Background Image", 'advisor-core'),
            "param_name" 		=> "bg_image",
            "description" 	=> esc_html__("Add image here, please add full size image at least 1600x800 px approx", 'advisor-core'),
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							),
						 )
        ),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Testimonial Layout', 'advisor-core' ),
						'param_name' 		=> 'layout',
						"description" 	=> esc_html__("Select layout, either it will be overlay or carousel.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Select Layout', 'advisor-core' ) 	=> '',
								esc_html__( 'Overlay', 'advisor-core' )  			=> 'overlay',
								esc_html__( 'Carousel', 'advisor-core' )  			=> 'carousel',
						 ),
						 "dependency" => array(
						 "element" => "style",
						 "value" => array(
							 'style1',
							 ),
							)
				),
				array(
						"type" 					=> "textfield",
						"heading" 			=> __("Extra Class Name", 'advisor-core'),
						"param_name"		=> "class_name",
						"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
				),

			)
			  )
      );
}

add_action( 'vc_before_init', 'advisor_vc_map_testimonial' );


?>
