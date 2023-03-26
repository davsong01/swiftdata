<?php
if ( ! function_exists( 'advisor_team_members_grid' ) ) {

	function advisor_team_members_grid( $atts ){

			extract( shortcode_atts( array(

				'class_name' => '',
				'style'    => 'style1',
				'heading'  => '',
				'text'     => '',
				'text_color' => '#000000',
				'order'    => 'DESC'

			), $atts ) );

			$args = array(

					'post_type' 		=> 'team',
					'orderby'  		 	=> 'date',
					'order'     		=> $order,
					'posts_per_page' 	=> -1

			);

    	$advisor_team = new WP_Query( $args );
			ob_start();
			?>

			<?php if ( $style == 'style1' ) { ?>

	    <!-- MEET OUR ADVISORS -->
			<section class="bg-blue <?php echo $class_name; ?>">
			<div class="container">
				<div class="heading margin-bottom-50 animate bounceIn" data-delay="200">

					<?php if( !empty( $heading ) ){ ?>

					<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

					<?php } ?>

					<?php if( !empty( $text ) ){ ?>

					<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>

					<?php } ?>

				</div>
				<div class="row">
					<?php
		        $i = 0;
						while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

						$team_member_name               = get_the_title();
						$team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
						$team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
						$team_memeber_facebook_link     = get_post_meta( get_the_ID(), 'advisor_member_facebook', true );
						$team_memeber_twitter_link      = get_post_meta( get_the_ID(), 'advisor_member_twitter', true );
						$team_memeber_youtube_link      = get_post_meta( get_the_ID(), 'advisor_member_youtube', true );
						$team_member_image 	       	    = get_the_post_thumbnail(  get_the_ID() , array(370 , 300) , '');


					?>
					<div class="col-md-4">
						<div class="team-member animate fadeInUp">
							<?php if( !empty( $team_member_image ) ){

									echo $team_member_image;

							 }
							 ?>
							 <?php if( !empty( $team_member_name ) || !empty( $team_member_designation )){ ?>

							<h4><?php esc_html_e( $team_member_name , 'advisor-core'); ?><span><?php esc_html_e( $team_member_designation , 'advisor-core'); ?></span></h4>

							<?php } ?>
							<?php if( !empty(	$team_member_bio  ) ){ ?>

								<p>	<?php _e( wp_trim_words( $team_member_bio , $num_words = 16, $more = null ) , 'advisor-core'); ?></p>

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
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

						</div>
					</div>
				</section><!-- / MEET OUR ADVISORS -->

				<?php } elseif ( $style == 'style2' ) { ?>

					<!-- Our Team Start -->
					<section id="our_team_3" class="p-t-100 our_team <?php echo $class_name; ?>">
						<div class="container">
							<div class="row p-b-60">
								<div class="col-md-12">
									<div class="heading">
										<div class="heading_border bg_red"></div>
										<?php if ( !empty( $text ) ) { ?><p style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e ($text, 'advisor-core'); ?></p><?php } ?>
										<?php if ( !empty( $heading ) ) { ?><h2><span class="color_red"><?php esc_html_e ($heading, 'advisor-core'); ?></span></h2><?php } ?>
									</div>
								</div>
							</div>

							<div class="row">

								<?php

								while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

								$team_member_name               = get_the_title();
								$team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
								$team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
								$team_member_image 	       	    = get_the_post_thumbnail(  get_the_ID() , 'advisor-team-grid-img-style2', '');
								// $team_member_image_arr	 				= wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'advisor-team-grid-img-style2' ); ?>

								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="item">
										<div class="single-effect">
											<figure class="wpf-demo-gallery">
												<a href="" class="team-member-details" data-post-id="<?php esc_attr_e( get_the_ID() );?>"><?php if ( ! empty ( $team_member_image ) ) { echo $team_member_image; } ?></a>
													<figcaption class="view-caption">
														<a href="" class="team-member-details" data-post-id="<?php esc_attr_e( get_the_ID() );?>"><i class="icon-focus"></i></a>
													</figcaption>
											</figure>
										</div>
										<div class="team_text">
											<?php if ( !empty ( $team_member_name ) ) { ?><h3 class="p-t-30"><?php esc_html_e( $team_member_name , 'advisor-core');; ?></h3><?php } ?>
											<?php if ( !empty ( $team_member_designation ) ) { ?><p><?php esc_html_e( $team_member_designation , 'advisor-core');; ?></p><?php } ?>
											<?php if ( !empty ( $team_member_bio) ) { ?><p><?php _e( wp_trim_words( $team_member_bio , $num_words = 16, $more = null ) , 'advisor-core'); ?></p><?php } ?>
												<a href="" class="team-member-details" data-post-id="<?php esc_attr_e( get_the_ID() );?>"><?php esc_html_e('Read More', 'advisor-core'); ?></a>
										</div>

									</div>
								</div>

								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>

								</div>
						</div>
				</section>
				<!-- Our Team end -->

				<!-- Team Pop Up Start -->
				<?php

				$advisor_team = new WP_Query( $args );
				while ( $advisor_team->have_posts() ) : $advisor_team->the_post();

				$team_member_name               = get_the_title();
				$team_member_bio          			= get_post_meta( get_the_ID(), 'advisor_member_bio', true );
				$team_member_designation 				= get_post_meta( get_the_ID(), 'advisor_member_designation', true );
				$team_memeber_facebook_link     = get_post_meta( get_the_ID(), 'advisor_member_facebook', true );
				$team_memeber_twitter_link      = get_post_meta( get_the_ID(), 'advisor_member_twitter', true );
				$team_memeber_youtube_link      = get_post_meta( get_the_ID(), 'advisor_member_youtube', true );
				$team_member_image 	       	    = get_the_post_thumbnail(  get_the_ID() , 'advisor-team-grid-style2-pop-up-img', ''); ?>

				<div class="container">
					<div class="advisor-team-member-popup" id="team-<?php esc_attr_e ( get_the_ID() ); ?>" style="display:none">
						<div class="row">
							<div class="col-md-2 hidden-xs"></div>
							<div class="col-md-8">
								<div class="team_popup">
									<button type="button" class="close copious-close"><?php esc_html_e('x', 'advisor-core'); ?></button>
									<div class="row">
										<div class="col-md-5">
											<div class="popup_image">
												<?php if ( ! empty ( $team_member_image ) ) { echo $team_member_image; } ?>
											</div>
										</div>
										<div class="col-md-7">
											<div class="pop_text over-scroll">
												<?php if ( !empty ( $team_member_name ) ) { ?><h3><?php esc_html_e( $team_member_name, 'advisor-core'); ?></h3><?php } ?>
												<?php if ( !empty ( $team_member_designation ) ) { ?><p><?php esc_html_e( $team_member_designation, 'advisor-core'); ?></p><?php } ?>
												<?php if ( !empty ( $team_member_bio ) ) { ?><p class="m-t-30 m-b-30"><?php _e( $team_member_bio, 'advisor-core'); ?></p><?php } ?>
											</div>

											<div class="social-icons">
												<ul>
													<?php if ( !empty ( $team_memeber_facebook_link ) ) { ?><li class="facebook"><a href="<?php echo esc_url($team_memeber_facebook_link); ?>" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a></li><?php } ?>
													<?php if ( !empty ( $team_memeber_twitter_link ) ) { ?><li class="twitter"><a href="<?php echo esc_url($team_memeber_twitter_link); ?>" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a></li><?php } ?>
													<?php if ( !empty ( $team_memeber_youtube_link ) ) { ?><li class="youtube"><a href="<?php echo esc_url($team_memeber_youtube_link); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li><?php } ?>
												</ul>
											</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-md-2 hidden-xs"></div>
					</div>
				</div>
			</div>
		<!-- Team Pop Up End -->

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<?php } ?>

    <?php
		return ob_get_clean();
	}
}

add_shortcode('advisor_team_grid', 'advisor_team_members_grid');

// Visual Composer Map
function advisor_vc_map_team_members_grid()
{
	vc_map( array(
			'name'     									=> esc_html__( 'Advisor Team Grid', 'advisor-core' ),
			'base'     									=> 'advisor_team_grid',
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
            "heading" 			=> __("Heading", 'advisor-core'),
            "param_name"		=> "heading",
            "description" 	=> esc_html__("Heading text here" , 'advisor-core'),
        ),

		array(
            "type" 					=> "textfield",
            "heading" 			=> esc_html__("Text Below Heading.", 'advisor-core'),
            "param_name" 		=> "text",
						"description" 	=> esc_html__("Enter some text. A short description about team. This text will appear under the main heading for Style 1 and above the heading for the Style 2", 'advisor-core'),
        ),
		array(
			 "type" => "colorpicker",
			 "class" => "",
			 "heading" => __( "Text Color", 'advisor-core' ),
			 "param_name" => "text_color",
			 "value" => '#000000',
			 "description" => __( "Choose the Color for the heading, text for Style 1 and only text that will appear above heading for Style 2.", 'advisor-core' )
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
				"type" 					=> "textfield",
				"heading" 			=> __("Extra Class Name", 'advisor-core'),
				"param_name"		=> "class_name",
				"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
		),


				)

			  )
      );
}

add_action( 'vc_before_init', 'advisor_vc_map_team_members_grid' );
?>
