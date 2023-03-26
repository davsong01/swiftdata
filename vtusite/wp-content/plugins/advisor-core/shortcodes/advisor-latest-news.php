<?php
if ( ! function_exists( 'advisor_company_latest_news' ) ) {

	function advisor_company_latest_news( $atts ){

			extract( shortcode_atts( array(

				'style'              => '',
				'class_name'  			 => '',
				'heading'            => '',
				'text'               => '',
				'text_color'			   => '#000000',
				'order'    					 => 'DESC',
				'autoplay'           => 'true',
				'autoplay_time_out'  => '',

			), $atts ) );

			$args = array(

					'post_type' 		=> 'post',
					'orderby'  		 	=> 'date',
					'order'     		=> $order,
					'posts_per_page' 	=> -1

			);

    	$latest_news = new WP_Query( $args );

			ob_start();
			?>

			<?php if( $style == '' || $style == 'style1' ) { ?>

			<!-- Latest News & update Start -->
			<section id="latest_news" class="p-b-100 p-t-100 bg_gray <?php esc_attr_e( $class_name ); ?>">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
											<div class="row">
													<!-- <div class="col-md-12"> -->
															<div class="heading">
																	<div class="heading_border bg_red"></div>

																	<?php if( !empty( $text ) ){ ?>

																		<p><?php _e( $text , 'advisor-core'); ?></p>

																	<?php } ?>

																	<?php if( !empty( $heading ) ){ ?>

																		 <h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

																	<?php } ?>

															</div>
													<!-- </div> -->
											</div>
											<div id="latest_news-slider" class="owl-carousel p-t-40" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

												<?php
												if ( $latest_news->have_posts() ) :

							            // Start the loop.
								 				  while ( $latest_news->have_posts() ) : $latest_news->the_post(); ?>

													<div class="item">
															<div class="latest_box">

																	<h3><?php the_title(); ?></h3>
																	<p><?php echo wp_trim_words( get_the_content(), 9, '...' );?></p>
																	<div class="lates_border m-b-25"></div>

																	<?php  $args = array('class' => 'post-author', );?>
																	<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', 'author', $args ); ?>
																	<span><?php _e('by ', 'advisor'); the_author(); ?></span>
																	<i class="icon-icons228"></i> <span><?php echo get_the_date( 'd M, Y' ); ?></span>
															</div>
													</div>

													<?php
													// End the loop.
													endwhile;

													endif;

													wp_reset_postdata(); ?>


											</div>
									</div>
							</div>
					</div>
			</section>
			<!-- Latest News & update end -->

			<?php } elseif ( $style == 'style2' ) { ?>

				<!-- Latest News & update Start -->
				<section id="latest_news" class="p-b-100 p-t-100 bg_gray <?php esc_attr_e( $class_name ); ?>">
						<div class="container">

								<div class="row">
										<div class="col-md-12">
												<div class="heading">
														<div class="heading_border bg_red"></div>
														<?php if( !empty( $text ) ){ ?>

															<p><?php _e( $text , 'advisor-core'); ?></p>

														<?php } ?>

														<?php if( !empty( $heading ) ){ ?>

															 <h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

														<?php } ?>

												</div>
										</div>
								</div>

								<div class="row">
										<div id="latest_news-slider_1" class="owl-carousel p-t-40" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>" >

											<?php
											if ( $latest_news->have_posts() ) :

												// Start the loop.
												while ( $latest_news->have_posts() ) : $latest_news->the_post(); ?>

												<div class="item">
														<div class="latest_box_1">
																<div class="latest_news_item heading_space">
																		<div class="image">

																			<?php
																			$image_id = get_post_thumbnail_id( get_the_ID() );
																			$post_image_arr	 = wp_get_attachment_image_src( $image_id , 'advisor_latest-news-style2-img' );
																			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

																			?>

																			<?php if ( empty( $post_image_arr[0] ) ) {
 																				$img_src = get_template_directory_uri() . "/images/updated/350x200.png";
																			} else {
																				$img_src =  $post_image_arr[0];
																			}?>

																			<a href="<?php the_permalink(); ?>"><img class="img-responsive" alt="<?php echo $image_alt ; ?>" src="<?php echo esc_url( $img_src ); ?>"  /></a>

																		</div>
																		<div class="latest_news_content">
																				<div class="latest_news_meta">

																					<?php  $args = array('class' => '', );?>
																					<span><?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', 'author', $args ); ?>
																					<?php _e('by ', 'advisor'); the_author(); ?></span>
																					<span><i class="icon-icons228"></i><?php echo get_the_date( 'd M, Y' ); ?></span>

																				</div>
																				<div class="latest_news_text">
																						<h3><?php the_title(); ?></h3>

																						<p class="p-font-15 p-b-30 p-t-30"><?php echo wp_trim_words( get_the_content(), 12, '...' );?></p>

																						<a href="<?php the_permalink(); ?>"><?php _e('News Detail', 'advisor'); ?></a>
																				</div>
																		</div>
																</div>
														</div>
												</div>

												<?php
												// End the loop.
												endwhile;

												endif;

												wp_reset_postdata(); ?>

									</div>
								</div>
						</div>
				</section>
				<!-- Latest News & update end -->


			<?php } ?>

      <?php
			return ob_get_clean();
	}
}

add_shortcode('advisor_latest_news', 'advisor_company_latest_news');

// Visual Composer Map
function advisor_vc_map_advisor_latest_news()
{
vc_map( array(
		'name'     									=> esc_html__( 'Advisor Latest News', 'advisor-core' ),
		'base'     									=> 'advisor_latest_news',
		'icon'                    	=> get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 									=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' 	=> true,
		'content_element' 					=> true,
		'admin_label' 							=> true,
    'is_container' 							=> false,
		'params' => array(

			array(
							"type" 					=> "dropdown",
							"heading" 			=> esc_html__("Style", 'advisor-core'),
							"param_name" 		=> "style",
							"description" 	=> esc_html__("Select Layout Style here", 'advisor-core'),
							"value" => array(

									esc_html__("Style 1", 'advisor-core') => 'style1',
									esc_html__("Style 2", 'advisor-core') => 'style2',
								),
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
							"description" 	=> esc_html__("Enter some text to show above the heading.", 'advisor-core'),
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
            "type" 					=> "dropdown",
            "heading" 			=> esc_html__("Order", 'advisor-core'),
            "param_name" 		=> "order",
            "description" 	=> esc_html__("Sort your case studies", 'advisor-core'),
						"value" => array(

								esc_html__("Descending", 'advisor-core') => 'DESC',
								esc_html__("Ascending", 'advisor-core') => 'ASC',

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
						"heading" 			=> __("Extra Class Name", 'advisor-core'),
						"param_name"		=> "class_name",
						"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
				),


			)

		  )
    );
}

add_action( 'vc_before_init', 'advisor_vc_map_advisor_latest_news' );
?>
