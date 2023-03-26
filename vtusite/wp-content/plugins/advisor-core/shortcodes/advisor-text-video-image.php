<?php
if ( ! function_exists( 'advisor_welcome_text_video' ) ) {

	function advisor_welcome_text_video( $atts ){

		extract( shortcode_atts( array(

				'class_name'           => '',
				'style'  							 => 'style1',
				'heading'              => '',
				'text1'                => '',
				'text2'                => '',
				'tagline'              => '',
				'text_color'				   => '#000000',
				'button_text'          => '',
				'button_link'          => '',
				'button_bg_color'      => '#f3f5fa',
				'button_hover_bg_color'=> '#000000',
				'background'           => 'bg-blue',
				'show'								 =>  'video',
				'video_link'           => '',
				'custom_thumb'         => '',
				'image_id' 						 => '',
				'image_video_position' => 'right',
				'background_image'     => '',


			), $atts ) );

			if( !empty( $button_link ) ){

				$button_link = $button_link;

			}
			else {

				$button_link = '#';

			}

			if ( $image_video_position == 'right' ) {

				$section_class = $background . '' . $class_name . ' header-five-banner';
				$section_row_class = 'row';

			} elseif ( $image_video_position == 'left' ) {

				$section_class = $background . '' . $class_name . ' header-five-banner funfacts two ad-haslayout parallax';
				$section_row_class = 'funfacts-inner';


				if( !empty( $background_image ) ){

					$background_image = wp_get_attachment_url($background_image , 'full' , false);

				} else {

					$background_image = get_template_directory_uri() . "/images/updated/1900x907.png";

				} ?>

				 <style media="screen">
					 .funfacts.two{
						 background: url('<?php echo $background_image; ?>') no-repeat center top;
					 }
				 </style>

		 <?php }

			ob_start(); ?>

			<?php if ( $style == 'style1' ) { ?>

      <section class="<?php esc_attr_e( $section_class ); ?>">
				<div class="container">
					<div class="<?php esc_attr_e( $section_row_class );?>">

						<!-- if image/video postion is right -->
						<?php if ( $image_video_position == 'right' ) { ?>

						<div class="col-md-6 animate fadeInLeft">
            	<?php if( !empty( $heading ) ){ ?>

								<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

              <?php } ?>

							<div class="height-10"></div>

              <?php if( !empty( $text1 ) ){ ?>

              	<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text1 , 'advisor-core'); ?></p>

	 						<?php } ?>

							<?php if( !empty( $text2 ) ){ ?>

									<div class="height-10"></div>

                  <p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text2 , 'advisor-core'); ?></p>

						 <?php } ?>
						 <div class="height-20"></div>

              <?php if( !empty( $button_text ) ){ ?>

								<a href="<?php echo $button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $button_bg_color ); ?>;"
									onMouseOver="this.style.background='<?php esc_attr_e( $button_hover_bg_color); ?>'"
									onMouseOut="this.style.background='<?php esc_attr_e( $button_bg_color); ?>'"
									data-text="<?php esc_html_e( $button_text , 'advisor-core'); ?>"><?php esc_html_e( $button_text , 'advisor-core'); ?></a>

						  <?php } ?>

							<div class="height-40"></div>
						</div>

            <?php if( !empty( $video_link ) && $show == 'video' ){ ?>

							<div class="col-md-6 animate fadeInRight">

              <?php

								if( !empty( $custom_thumb ) ) {

									$image_thumbnail = wp_get_attachment_url( $custom_thumb , array(540,370) , false );

								} else {

									$image_thumbnail = advisor_get_vimeo_thumb($video_link);

								}
								if( empty( $image_thumbnail ) ) {

										 $image_thumbnail = get_template_directory_uri() . "/images/updated/540x350.png";

								}
								?>
									<div class="video-widget">
										<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="">
										<a href="<?php echo $video_link; ?>" class="fancybox-media"><i class="fa fa-play"></i></a>
									</div>
								</div>

             <?php } ?>

						 <?php if( !empty( $image_id ) && $show == 'image' ){ ?>

								<div class="col-md-6 animate fadeInRight">

               <?php
							 	$image_src = wp_get_attachment_url( $image_id , array(540,370) , false );
								$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
                 if( !empty( $image_src ) ){

                      $image_thumbnail = $image_src;

                 } else {

											$image_thumbnail = get_template_directory_uri() . "/images/updated/540x370.png";

                 }
								 ?>
										<div class="image-widget">
											<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="<?php echo esc_attr( $image_alt ); ?>">
										</div>
									</div>

              <?php } ?>
							<!-- End if image/video postion is right -->


							<!-- if image/video postion is left -->
							<?php } elseif ( $image_video_position == 'left' ) { ?>

	              <?php if( !empty( $video_link ) && $show == 'video' ){ ?>

									<div class="col-md-6 animate fadeInRight ad-verticalalignmiddle">

	                <?php

										if( !empty( $custom_thumb ) ) {

											$image_thumbnail = wp_get_attachment_url( $custom_thumb , array(540,370) , false );
											$image_alt_1 = get_post_meta( $custom_thumb, '_wp_attachment_image_alt', true);

										} else {

											$image_thumbnail = advisor_get_vimeo_thumb($video_link);

										}
										if( empty( $image_thumbnail ) ) {

												 $image_thumbnail = get_template_directory_uri() . "/images/updated/540x350.png";

										}
										?>
											<div class="video-widget">
												<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="<?php echo esc_attr( $image_alt_1 ); ?>">
												<a href="<?php echo $video_link; ?>" class="fancybox-media"><i class="fa fa-play"></i></a>
											</div>
										</div>

	               <?php } ?>

								 <?php if( !empty( $image_id ) && $show == 'image' ){ ?>

										<div class="col-md-6 animate fadeInRight ad-verticalalignmiddle">

	                 <?php
									 	$image_src = wp_get_attachment_url( $image_id , array(540,370) , false );
										$image_alt_2 = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

	                   if( !empty( $image_src ) ){

	                        $image_thumbnail = $image_src;

	                   } else {

													$image_thumbnail = get_template_directory_uri() . "/images/updated/540x370.png";

	                   }
										 ?>
												<div class="image-widget">
													<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="<?php echo esc_attr( $image_alt_2 ); ?>">
												</div>
											</div>

	                <?php } ?>

									<div class="col-md-6 animate fadeInLeft ad-verticalalignmiddle">
												<?php if( !empty( $heading ) ){ ?>

													<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

												<?php } ?>

												<div class="height-10"></div>

												<?php if( !empty( $text1 ) ){ ?>

													<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text1 , 'advisor-core'); ?></p>

												<?php } ?>

												<?php if( !empty( $text2 ) ){ ?>

														<div class="height-10"></div>

														<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text2 , 'advisor-core'); ?></p>

											 <?php } ?>
											 <div class="height-20"></div>

												<?php if( !empty( $button_text ) ){ ?>

													<a href="<?php echo $button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $button_bg_color ); ?>;"
														onMouseOver="this.style.background='<?php esc_attr_e( $button_hover_bg_color); ?>'"
														onMouseOut="this.style.background='<?php esc_attr_e( $button_bg_color); ?>'"
														data-text="<?php esc_html_e( $button_text , 'advisor-core'); ?>"><?php esc_html_e( $button_text , 'advisor-core'); ?></a>

												<?php } ?>

												<div class="height-40"></div>
											</div>

								<?php } ?>
								<!-- End if image/video postion is left -->

						</div>
					</div>
				</section><!-- / WELCOME -->

				<?php } elseif ( $style == 'style2' ) { ?>

		    <!-- About Us -->
		    <section id="about_us" class="p-t-100 p-b-100 about_us_2 <?php esc_attr_e ( $background ); ?> <?php echo $class_name; ?>">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                    <div class="about_box">
		                        <div class="heading">
		                            <div class="heading_border bg_red"></div>
		                            <?php if ( !empty ( $tagline ) ) { ?><p><?php esc_html_e (  $tagline, 'advisor-core'); ?></p><?php } ?>
																<?php if ( !empty ( $heading ) ) { ?><h2 class="color_red" style="color: <?php esc_attr_e( $text_color); ?> !important"><?php esc_html_e (  $heading, 'advisor-core'); ?></h2><?php } ?>
		                        </div>
															<?php if ( !empty ( $text1 ) ) { ?><p class="p-t-30 p-b-40 p_17"><?php esc_html_e (  $text1 , 'advisor-core'); ?></p><?php } ?>
															<?php if ( !empty ( $text2 ) ) { ?><p class="p-b-50 p_17"> <?php esc_html_e (  $text2, 'advisor-core'); ?></p><?php } ?>
															<?php if( !empty( $button_text ) ){ ?>

															<a href="<?php echo esc_url( $button_link ); ?>" class="btn-dark button-black"
																style="background: <?php esc_attr_e( $button_bg_color ); ?>;"
																onMouseOver="this.style.background='<?php esc_attr_e( $button_hover_bg_color); ?>'"
																onMouseOut="this.style.background='<?php esc_attr_e( $button_bg_color); ?>'">
																<?php esc_html_e( $button_text, 'advisor-core'); ?></a></div>

														<?php } ?>
													</div>

		                <div class="col-md-6 col-sm-6 col-xs-12">
		                    <div class="pro-video">

													<!-- if image is selected to show -->
													<?php if( !empty( $image_id ) && $show == 'image' ){

														$image_src = wp_get_attachment_url( $image_id , array(540,370) , false );
														$image_alt_3 = get_post_meta( $image_id, '_wp_attachment_image_alt', true);

														if( !empty( $image_src ) ){
															$image_thumbnail = $image_src;
														} else {
															$image_thumbnail = get_template_directory_uri() . "/images/updated/540x370.png";
														} ?>

														<div class="image-widget">
															<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="<?php echo esc_attr( $image_alt ); ?>">
														</div>

						                <?php } ?>

														<!-- if image is selected to show -->
														<?php

														if( !empty( $video_link ) && $show == 'video' ){

															if( !empty( $custom_thumb ) ) {
																$image_thumbnail = wp_get_attachment_url( $custom_thumb , array(540,370) , false );
															} else {
																$image_thumbnail = advisor_get_vimeo_thumb($video_link);
															}

															if( empty( $image_thumbnail ) ) {
																$image_thumbnail = get_template_directory_uri() . "/images/updated/540x350.png";
															}	?>

															<img src="<?php echo $image_thumbnail; ?>" class="img-shadow" alt="">
															<a href="<?php echo $video_link; ?>" class="fancybox-media"><img src="<?php echo get_template_directory_uri(); ?>/images/updated/player-icon.png" alt="image/"></a>

						               <?php } ?>
		                    </div>
		                </div>
										  </div>
		            </div>
		        </div>
		    </section>
		    <!-- About Us End -->

				<?php } ?>

				<?php return ob_get_clean();
	}
}
add_shortcode('advisor_text_video', 'advisor_welcome_text_video');


// Visual Composer Map
function advisor_vc_map_welcome_text_video()
{
vc_map( array(
		'name' 										=> esc_html__( 'Advisor Welcome Video/Image', 'advisor-core' ),
		'base' 										=> 'advisor_text_video',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
    'is_container' 						=> false,
		'params' 						=> array(

			array(
					"type" 					=> "dropdown",
					"heading" 			=> esc_html__("Style", 'advisor-core'),
					"param_name" 		=> "style",
					"description" 	=> esc_html__("Select Style here", 'advisor-core'),
					"value" => array(

							esc_html__("Style 1", 'advisor-core') => 'style1',
							esc_html__("Style 2", 'advisor-core') => 'style2',
						),
			),
			array(
					"type" 					=> "dropdown",
					"heading" 			=> esc_html__("Image/Video Position", 'advisor-core'),
					"param_name" 		=> "image_video_position",
					"description" 	=> esc_html__("Select Style here", 'advisor-core'),
					"value" => array(

							esc_html__("Right Without Background Image", 'advisor-core') => 'right',
							esc_html__("Left With Background Image", 'advisor-core') => 'left',
						),
					"dependency" => array(
					"element" => "style",
					"value" => array(
						'style1',
						),
					 )
			),
			array(
				"type" 					=> "attach_image",
				"heading" 			=> __("Add Background Image", 'advisor-core'),
				"param_name" 		=> "background_image",
				"dependency" => array(
				"element" => "image_video_position",
				"value" => array(
					'left',
					),
				 )
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Heading", 'advisor-core'),
				"param_name" 		=> "heading",
				"description" 	=> __("Add heading here", 'advisor-core')
			),
			array(
				"type" 					=> "textarea",
				"heading" 			=> __("Tagline", 'advisor-core'),
				"param_name" 		=> "tagline",
				"description" 	=> __("Add Tagline text here, this will show above the heading", 'advisor-core'),
				"dependency" => array(
				"element" => "style",
				"value" => array(
					'style2',
					),
				 )
			),
			array(
				"type" 					=> "textarea",
				"heading" 			=> __("Text 1", 'advisor-core'),
				"param_name"		=> "text1",
				"description" 	=> __("Add text 1 here", 'advisor-core')
			),
			array(
				"type" 					=> "textarea",
				"heading" 			=> __("Text 2", 'advisor-core'),
				"param_name" 		=> "text2",
				"description" 	=> __("Add text 2 here", 'advisor-core')
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
				"type" 					=> "textfield",
				"heading" 			=> __("Button Text", 'advisor-core'),
				"param_name" 		=> "button_text",
				"description" 	=> __("Add Button text here", 'advisor-core')
			),

			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Button Link", 'advisor-core'),
				"param_name" 		=> "button_link",
				"description" 	=> __("Add Button Link here", 'advisor-core')
			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Button Background Color", 'advisor-core' ),
				 "param_name" => "button_bg_color",
				 "value" => '#f3f5fa',
				 "description" => __( "Choose the Color for the button background.", 'advisor-core' ),

			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Button Hover Background Color", 'advisor-core' ),
				 "param_name" => "button_hover_bg_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
			),
			array(
					'type'      		=> 'dropdown',
					'heading'   		=> esc_html__( 'Select Bakcground Class', 'advisor-core' ),
					'param_name' 		=> 'background',
					"description" 	=> esc_html__("Select background, for now it can be white or light blue.", 'advisor-core'),
					'value' => array(

							esc_html__( 'Select Class', 'advisor-core' ) 				=> '',
							esc_html__( 'White', 'advisor-core' )  							=> 'bg-white',
							esc_html__( 'Light Blue/Sky Blue', 'advisor-core' )  => 'bg-blue',

					 )
			),

			array(
			'type'      		=> 'dropdown',
			'heading'   		=> esc_html__( 'Select To Show Image or Video On Right', 'advisor-core' ),
			'param_name' 		=> 'show',
			"description" 	=> esc_html__("Select image or video which will be shown to the right side of the page.", 'advisor-core'),
			'value' => array(

					esc_html__( 'Select Image/Video', 'advisor-core' ) 	=> '',
					esc_html__( 'Image', 'advisor-core' )  		=> 'image',
					esc_html__( 'Video', 'advisor-core' )  		=> 'video',
			 ),
		 ),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Video Link", 'advisor-core'),
				"param_name" 		=> "video_link",
				"description" 	=> __("Add Video Link here", 'advisor-core'),
				'dependency'    => array (

				'element'   => 'show',
				'value'     => array('video'),
				'not_empty' =>  false,

				)
			),
			array(
				"type" 					=> "attach_image",
				"heading" 			=> __("Add Custom Video Thumbnail", 'advisor-core'),
				"param_name" 		=> "custom_thumb",
				"description" 	=> __("If custom thumbnail is provided then the original video Thumbnail will not show up.", 'advisor-core'),
				'dependency'    => array (

				'element'   => 'show',
				'value'     => array('video'),
				'not_empty' =>  false,

				),
			),
			array(
				"type" 					=> "attach_image",
				"heading" 			=> __("Add Image", 'advisor-core'),
				"param_name" 		=> "image_id",
				"description" 	=> __("Add image if you want to show image.", 'advisor-core'),
				'dependency'    => array (

				'element'   => 'show',
				'value'     => array('image'),
				'not_empty' =>  false,

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

add_action( 'vc_before_init', 'advisor_vc_map_welcome_text_video' );


?>
