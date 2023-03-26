<?php
if ( ! function_exists( 'advisor_team_members' ) ) {

	function advisor_team_members( $atts ){

			extract( shortcode_atts( array(

				'class_name' => '',
				'style'    => 'style1',
				'autoplay'           => 'true',
				'autoplay_style'     => 'slide',
				'autoplay_time_out'  => '',
				'heading'  => '',
				'text'     => '',
				'text_color'	=> '#000000',
				'order'    => 'DESC',
				'column'   => '',

			), $atts ) );

			$args = array(

					'post_type' 		=> 'team',
					'orderby'  		 	=> 'date',
					'order'     		=> $order,
					'posts_per_page' 	=> -1

			);
			$carousel_classes = '';
			if ( $column == '3' ) {

					$carousel_classes = 'three-items-carousel owl-carousel classic-arrows3 owl-theme owl-loaded';

			} else {

				if ( $autoplay_style == 'fade_in') {
					$carousel_classes = 'single-item-carousel owl-carousel classic-arrows';
				}else {
					$carousel_classes = 'team-slider owl-carousel classic-arrows';
				}


			}
    	$advisor_team = new WP_Query( $args );

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

        <!-- MEET OUR ADVISORS -->
        <section class="meet-our-advisors <?php echo $class_name; ?>">
				<div class="container">
					<div class="heading text-center animate bounceIn">

            	<?php if( !empty( $heading ) ){ ?>

										<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

                <?php } ?>

                 <?php if( !empty( $text ) ){ ?>

									 	<p><?php _e( $text , 'advisor-core'); ?></p>

                 <?php } ?>
					</div>

					<div class="<?php echo $carousel_classes; ?>" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">


						<?php
              $i = 0;
							while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

							$team_member_name               = get_the_title();
							$team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
							$team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
							$team_memeber_facebook_link     = get_post_meta( get_the_ID(), 'advisor_member_facebook', true );
							$team_memeber_twitter_link      = get_post_meta( get_the_ID(), 'advisor_member_twitter', true );
							$team_memeber_youtube_link      = get_post_meta( get_the_ID(), 'advisor_member_youtube', true );
							if ( $column == '3' ) {

								$team_member_image 	= get_the_post_thumbnail(  get_the_ID() , array(370 , 300) , '');

							} else {

									$team_member_image = get_the_post_thumbnail(  get_the_ID() , array(500 , 450) , '');
							}

							if ( empty( $team_member_image ) ) {
 								$team_member_image = "<img src=" . get_template_directory_uri() . "/images/updated/450x400.png" . " alt='team'>";
							}



						if ( $column == '3' ) { ?>

							<div class="team-member animate fadeInUp">
								<?php if( !empty( $team_member_image ) ){

										echo $team_member_image;

								 }
								?>
								<?php if( !empty( $team_member_name ) || !empty( $team_member_designation )){ ?>

										<h4><?php esc_html_e( $team_member_name , 'advisor-core'); ?><span><?php esc_html_e( $team_member_designation , 'advisor-core'); ?></span></h4>

								<?php } ?>

								<?php if( !empty(	$team_member_bio  ) ){ ?>

									<?php $trimmed = wp_trim_words( $team_member_bio , 15 , $more = null ); ?>
									<?php esc_html_e( $trimmed  , 'advisor-core'); ?>

								<?php } ?>

							<ul class="social-text">

								<?php if( !empty( $team_memeber_facebook_link) ){ ?>

									<li><a href="<?php echo esc_url( $team_memeber_facebook_link ); ?>" class="facebook">facebook</a></li>

								<?php } ?>

								<?php if( !empty( $team_memeber_twitter_link) ){ ?>

									<li><a href="<?php echo esc_url( $team_memeber_twitter_link ); ?>" class="twitter">twitter</a></li>

								<?php } ?>

								<?php if( !empty( $team_memeber_youtube_link) ){ ?>

									<li><a href="<?php echo esc_url( $team_memeber_youtube_link );  ?>" class="youtube">youtube</a></li>

								<?php } ?>


							</ul>

						</div>

						<?php } else { ?>

						<div class="row">
								<div class="col-md-5 <?php if( $i == 0 ) { echo 'animate fadeInLeft'; } ?>">

									<?php if( !empty( $team_member_image ) ){

											echo $team_member_image;

								 	 }
									?>
								</div>
								<div class="col-md-7 <?php if( $i == 1 ) { echo 'animate fadeInRight'; } ?>">
									<div class="meet-advisors-content">

											<?php if( !empty( $team_member_name ) || !empty( $team_member_designation )){ ?>

													<h3><?php esc_html_e( $team_member_name , 'advisor-core'); ?><span><?php esc_html_e( $team_member_designation , 'advisor-core'); ?></span></h3>

											<?php } ?>

											<?php if( !empty(	$team_member_bio  ) ){ ?>

												<p>	<?php _e($team_member_bio  , 'advisor-core'); ?></p>

											<?php } ?>

										<ul class="social-text">

											<?php if( !empty( $team_memeber_facebook_link) ){ ?>

												<li><a href="<?php echo $team_memeber_facebook_link; ?>" class="facebook">facebook</a></li>

											<?php } ?>

											<?php if( !empty( $team_memeber_twitter_link) ){ ?>

												<li><a href="<?php echo $team_memeber_twitter_link; ?>" class="twitter">twitter</a></li>

											<?php } ?>

											<?php if( !empty( $team_memeber_youtube_link) ){ ?>

												<li><a href="<?php echo $team_memeber_youtube_link;  ?>" class="youtube">youtube</a></li>

											<?php } ?>


										</ul>
									</div>
								</div>
							</div>
							<?php } ?>
             <?php $i++; ?>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

					</div>
				</div>
			</section><!-- / MEET OUR ADVISORS -->

			<?php } elseif ( $style == 'style2' ) { ?>

				<section id="about_us" class="our_team <?php echo $class_name; ?>">
		      <div class="container">
		        <div class="row p-b-40">
		          <div class="col-md-12">
		            <div class="heading">
		              <div class="heading_border bg_red"></div>
		                <?php if ( !empty( $text ) ) { ?><p><?php esc_html_e ($text, 'advisor-core'); ?></p><?php } ?>
		                <?php if ( !empty( $heading ) ) { ?><h2><span class="color_red" style="color: <?php esc_attr_e( $text_color); ?> !important"><?php esc_html_e ($heading, 'advisor-core'); ?></span></h2><?php } ?>
		            </div>
		          </div>
		        </div>
		        <div class="row">
		          <div class="team_slider_2" class="owl-carousel" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

		            <?php

		            while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

		            $team_member_name               = get_the_title();
		            $team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
		            $team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
		            $team_memeber_facebook_link     = get_post_meta( get_the_ID(), 'advisor_member_facebook', true );
		            $team_memeber_twitter_link      = get_post_meta( get_the_ID(), 'advisor_member_twitter', true );
		            $team_memeber_youtube_link      = get_post_meta( get_the_ID(), 'advisor_member_youtube', true );
		            $team_member_image              = get_the_post_thumbnail(  get_the_ID() , array(490, 442) , '');

								if ( empty( $team_member_image ) ) {
									$team_member_image = "<img src=" . get_template_directory_uri() . "/images/updated/450x400.png" . " alt='team'>";
								}

								?>

		            <div class="item">
		              <div class="col-md-7 col-sm-7 col-xs-12">
		                <div class="about_box">
											<div class="over-scroll">
			                  <?php if ( !empty ( $team_member_name ) ) { ?><h2><?php esc_html_e( $team_member_name, 'advisor-core'); ?></h2><?php } ?>
			                  <?php if ( !empty ( $team_member_designation ) ) { ?><p><?php esc_html_e( $team_member_designation, 'advisor-core'); ?></p><?php } ?>
			                  <?php if ( !empty ( $team_member_bio ) ) { ?><p class="p-b-30 p_17"><?php _e( $team_member_bio ); ?></p><?php } ?>
											</div>
		                  <div class="social-icons_1 p-t-10">
		                    <ul>
													<?php if ( !empty ( $team_memeber_facebook_link ) ) { ?><li class="facebook"><a target="_blank" href="<?php echo esc_url($team_memeber_facebook_link); ?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li><?php } ?>
													<?php if ( !empty ( $team_memeber_twitter_link ) ) { ?><li class="twitter"><a target="_blank" href="<?php echo esc_url($team_memeber_twitter_link); ?>"><i aria-hidden="true" class="fa fa-twitter"></i></a></li><?php } ?>
													<?php if ( !empty ( $team_memeber_youtube_link ) ) { ?><li class="youtube"><a target="_blank" href="<?php echo esc_url($team_memeber_youtube_link); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php } ?>
		                    </ul>
		                  </div>
		                </div>
		              </div>

		              <div class="col-md-5 col-sm-5 col-xs-12">
		                <div class="content-right-md">
		                  <?php if( !empty( $team_member_image ) ){ echo $team_member_image; } ?>
		                </div>
		             </div>
		           </div>

		         <?php endwhile; ?>
		         <?php wp_reset_postdata(); ?>

		       </div>
		     </div>
		  </div>
		</section>

			<?php } elseif ( $style == 'style3' ) { ?>

      <!-- Our Team Start -->
      <section id="our_team" class="p-t-90 <?php echo $class_name; ?>">
          <div class="container">
              <div class="row p-b-90">
                  <div class="col-md-12 text-center">
                      <div class="heading">
                          <div class="heading_border_1 bg_red"></div>
													<?php if ( !empty( $text ) ) { ?><p><?php esc_html_e ($text, 'advisor-core'); ?></p><?php } ?>
													<?php if ( !empty( $heading ) ) { ?><h2><span class="color_red" style="color: <?php esc_attr_e( $text_color); ?> !important"><?php esc_html_e ($heading, 'advisor-core'); ?></span></h2><?php } ?>
                      </div>
                  </div>
              </div>
          </div>

          <div class="our_team_slider owl-carousel" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

						<?php

						while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

						$team_member_name               = get_the_title();
						$team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
						$team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
						$team_memeber_facebook_link     = get_post_meta( get_the_ID(), 'advisor_member_facebook', true );
						$team_memeber_twitter_link      = get_post_meta( get_the_ID(), 'advisor_member_twitter', true );
						$team_memeber_youtube_link      = get_post_meta( get_the_ID(), 'advisor_member_youtube', true );
						$team_member_image_arr	 				= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'advisor-team-carousel-img-style3' );
						$image_alt = get_post_meta( get_post_thumbnail_id( get_the_ID() ), '_wp_attachment_image_alt', true);

						if ( empty( $team_member_image_arr[0] ) ) {
							$team_member_image = get_template_directory_uri() . "/images/updated/300x292.png";

						} else {
							$team_member_image = $team_member_image_arr[0];
						}

						?>

              <div class="item">
                  <div class="single-effect">
                      <figure class="wpf-demo-8">
                          <a href=".team"><?php if ( ! empty ( $team_member_image ) ) { ?><img src="<?php echo esc_url( $team_member_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" /><?php } ?></a>
                          <figcaption class="view-caption">
                              <div class="info">
																<?php if ( !empty ( $team_member_name ) ) { ?><h4><?php esc_html_e( $team_member_name, 'advisor-core'); ?></h4><?php } ?>
							                  <?php if ( !empty ( $team_member_designation ) ) { ?><p><?php esc_html_e( $team_member_designation, 'advisor-core'); ?></p><?php } ?>
                              </div>
                              <ul>
																<?php if ( !empty ( $team_memeber_facebook_link ) ) { ?><li class="facebook"><a href="<?php echo esc_url($team_memeber_facebook_link); ?>"><i aria-hidden="true" class="fa fa-facebook"></i></a></li><?php } ?>
					                      <?php if ( !empty ( $team_memeber_twitter_link ) ) { ?><li class="twitter"><a href="<?php echo esc_url($team_memeber_twitter_link); ?>"><i aria-hidden="true" class="fa fa-twitter"></i></a></li><?php } ?>
					                      <?php if ( !empty ( $team_memeber_youtube_link ) ) { ?><li class="youtube"><a href="<?php echo esc_url($team_memeber_youtube_link); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php } ?>
                              </ul>
                          </figcaption>
                      </figure>
                  </div>
              </div>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

          </div>

      </section>
      <!-- Our Team End -->

			<?php } ?>

      <?php
			return ob_get_clean();
	}
}

add_shortcode('advisor_team', 'advisor_team_members');

// Visual Composer Map
function advisor_vc_map_team_members()
{
vc_map( array(
		'name'     									=> esc_html__( 'Advisor Team Carousel', 'advisor-core' ),
		'base'     									=> 'advisor_team',
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
							 esc_html__("Style 3", 'advisor-core') => 'style3',
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
								 "type" 					=> "dropdown",
								 "heading" 			=> esc_html__("Carousel Autoplay Style", 'advisor-core'),
								 "param_name" 		=> "autoplay_style",
								 "description" 	=> esc_html__("Select Carousel Autoplay Style Slide/Fade in", 'advisor-core'),
								 "value" => array(

										 esc_html__("Slide", 'advisor-core') => 'slide',
										 esc_html__("Fade in", 'advisor-core') => 'fade_in',

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
            "heading" 			=> __("Heading", 'advisor-core'),
            "param_name"		=> "heading",
            "description" 	=> esc_html__("Enter Heading here" , 'advisor-core'),
        ),

		array(
            "type" 					=> "textfield",
            "heading" 			=> esc_html__("Text Below Heading", 'advisor-core'),
            "param_name" 		=> "text",
						"description" 	=> esc_html__("Enter some text. A short description about team. This text will appear under the main heading for Style 1 and above the heading for the Style 2 and Style 3", 'advisor-core'),
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
            "description" 	=> esc_html__("Sort your testimonials here", 'advisor-core'),
						"value" => array(

								esc_html__("Descending", 'advisor-core') => 'DESC',
								esc_html__("Ascending", 'advisor-core') => 'ASC',

							),
        ),
				array(
		            "type" 					=> "dropdown",
		            "heading" 			=> esc_html__("Columns", 'advisor-core'),
		            "param_name" 		=> "column",
		            "description" 	=> esc_html__("Number of columns, for now there are two options.", 'advisor-core'),
								"value" => array(

										esc_html__("One", 'advisor-core') => 1,
										esc_html__("Three", 'advisor-core') => 3,

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

add_action( 'vc_before_init', 'advisor_vc_map_team_members' );
?>
