<?php
      if ( ! function_exists( 'advisor_services_carousel' ) ) {

      	function advisor_services_carousel( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'     => '',
              'heading'        => '',
              'text'           => '',
              'text_color'		 => '',
							'autoplay'           => 'true',
							'autoplay_time_out'  => '',
              'text_alignment' => 'left',
              'background'           => 'bg-blue',

            ), $atts ) );

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

      			ob_start(); ?>

						<!-- Services Start -->
						<section id="s_services" class="p-t-100 p-b-40 <?php esc_attr_e( $class_name ); ?> <?php esc_attr_e( $background ); ?>">
								<div class="container">
										<div class="row">
												<div class="col-md-12">
														<div class="heading">
																<div class="heading_border bg_red"></div>

																<?php if( !empty( $text ) ){ ?>

																	<p style="color: <?php esc_attr_e( $text_color ); ?>; text-align: <?php esc_attr_e( $text_alignment );?>"><?php _e( $text , 'advisor-core'); ?></p>

																<?php } ?>

																<?php if( !empty( $heading ) ){ ?>

																<h2 style="color: <?php esc_attr_e( $text_color ); ?>; text-align: <?php esc_attr_e( $text_alignment );?>"><?php _e( $heading , 'advisor-core'); ?></h2>

																<?php } ?>

														</div>
												</div>
										</div>

										<div class="row p-t-35">
												<div class="col-md-12">
														<div id="services_slider" class="owl-carousel ad-advisorslider-slider" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

															<?php echo do_shortcode($content); ?>

														</div>
												</div>
										</div>
								</div>
						</section>
						<!-- Services End -->

					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('services_carousel', 'advisor_services_carousel');

      if ( ! function_exists( 'advisor_services_carousel_item' ) ) {

      	function advisor_services_carousel_item( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

              'style'              => 'style1',
              'item_image'         => '',
      				'item_heading'       => '',
      				'item_description'   => '',
              'item_text_color'		 => '',
              'url'                => '',


      			), $atts ) );

            if( !empty( $item_image ) ) {

      				$item_image = wp_get_attachment_url( $item_image , array(350, 292) , false );
              $image_alt = get_post_meta( $item_image, '_wp_attachment_image_alt', true);

      			} else {

      				$item_image = '';

      			}

						if( !empty( $url ) ) {

							$url = $url;

						} else {

							$url = '#';

						}
            if( !empty( $item_text_color ) ) {

							$item_text_color = $item_text_color;

						} else {

							$item_text_color = '';

						}
      		  ob_start(); ?>

          <?php if( $style == 'style1' ) { ?>

  				  <div class="item">
  				      <div class="services_section">
  				          <div class="image_s">
  				              <a href="<?php echo esc_url( $url );?>">
  				                <?php if ( !empty( $item_image ) ) { ?><img src="<?php echo esc_url( $item_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"></a><?php } ?>
  				          </div>

  									<?php if( !empty( $item_heading ) ){ ?>

  											<h3 class="text-uppercase" style="color: <?php esc_attr_e( $item_text_color ); ?>"><?php esc_html_e( $item_heading , 'advisor-core'); ?></h3>

  									<?php }

                    if( !empty( $item_description ) ){ ?>

  											<p style="color: <?php esc_attr_e( $item_text_color); ?>"><?php _e( $item_description , 'advisor-core'); ?></p>

  									<?php } ?>

  				          <a href="<?php echo esc_url( $url );?>"><?php _e('Read More', 'advisor'); ?></a>
  				      </div>
  				  </div>

          <?php } elseif ( $style == 'style2' ) { ?>

            <div class="item ad-advisorslider-item">
              <div class="ad-service">
                <figure>

                  <?php if ( !empty( $item_image ) ) { ?><img src="<?php echo esc_url( $item_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"></a><?php } ?>

                  <figcaption>
                    <div class="ad-servicetitel">

                      <?php if( !empty( $item_heading ) ){ ?>

                      <h3><a href="<?php echo esc_url( $url );?>"><?php esc_html_e( $item_heading , 'advisor-core'); ?></a></h3>

                      <?php } ?>

                    </div>
                    <div class="ad-description">

                      <?php if( !empty( $item_description ) ){ ?>

                          <p style="color: <?php esc_attr_e( $item_text_color); ?>"><?php _e( $item_description , 'advisor-core'); ?></p>

                      <?php } ?>

                    </div>
                    <a class="ad-readmore" href="<?php echo esc_url( $url );?>"><i class="fa fa-caret-right"></i><?php _e('Learn More', 'advisor'); ?></a>
                  </figcaption>
                </figure>
              </div>
            </div>

          <?php } ?>

          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('services_item_carousel', 'advisor_services_carousel_item');

      // Visual Composer Map
      function advisor_vc_map_services_carousel()
      {
      vc_map( array(

      		'name'					=> esc_html__( 'Advisor Services Carousel', 'advisor-core' ),
      		'base' 				    => 'services_carousel',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			=> array('only' => 'services_item_carousel'),
      		'show_settings_on_create' => true,
      		'content_element' 		  => true,
          'is_container' 			  => false,
          'js_view' 				  => 'VcColumnView',
          "params"                  => array(


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
      				    "type"					=> "textfield",
      				    "heading" 			=> __("Heading", 'advisor-core'),
      				    "param_name"    => "heading",
      				    "description"   => __("Enter text heading here", 'advisor-core')
      				),
      				array(
      						 "type" 				=> "textarea",
      						 "heading" 		  => __("Description", 'advisor-core'),
      						 "param_name" 	=> "text",
      						 "description" => __("Enter the text to show above the heading.", 'advisor-core')
      					 ),
             array(
         			 "type" => "colorpicker",
         			 "class" => "",
         			 "heading" => __( "Text Color", 'advisor-core' ),
         			 "param_name" => "text_color",
         			 "value" => '#000',
         			 "description" => __( "Choose the Color for the heading and text.", 'advisor-core' )
         		),
            array(
                'type'      		=> 'dropdown',
                'heading'   		=> esc_html__( 'Text Alignment', 'advisor-core' ),
                'param_name' 		=> 'text_alignment',
                "description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
                "default" => 'center',
                'value' => array(
                  esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
                  esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
                 ),
            ),
              array(
                  "type" 					=> "textfield",
                  "heading" 			=> __("Extra Class Name", 'advisor-core'),
                  "param_name"		=> "class_name",
                  "description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
              ),

      			  )
      	));

      vc_map( array(

          "name" 										=> __("Services Item", 'advisor-core'),
          "base" 										=> "services_item_carousel",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'services_carousel'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params"                  => array(

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
      		        "type" 					=> "attach_image",
      		        "heading" 			=> __("Add Image", 'advisor-core'),
      		        "param_name"		=> "item_image",
      		        "description"		=> __("Add image to on top or below. The image size should be 450x350 approx.", 'advisor-core')
      				    ),
      				array(
      				    "type"					=> "textfield",
      				    "heading" 			=> __("Heading", 'advisor-core'),
      				    "param_name"    => "item_heading",
      				    "description"   => __("Enter text heading here", 'advisor-core')
      				),
      				array(
      						 "type" 				=> "textarea",
      						 "heading" 		  => __("Description", 'advisor-core'),
      						 "param_name" 	=> "item_description",
      						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
      					 ),
               array(
                  "type" => "colorpicker",
                  "class" => "",
                  "heading" => __( "Text Color", 'advisor-core' ),
                  "param_name" => "item_text_color",
                  "value" => '#000',
                  "description" => __( "Choose the Color for the item's description text only.", 'advisor-core' )
               ),
                 array(
         						 "type" 				=> "textfield",
         						 "heading" 		  => __("Item URL", 'advisor-core'),
         						 "param_name" 	=> "url",
         						 "description" => __("For further explanation, if there is any URL please add that here.", 'advisor-core')
         					 ),

      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_services_carousel extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_services_item_carousel extends WPBakeryShortCode {
        }
    }

      }

      add_action( 'vc_before_init', 'advisor_vc_map_services_carousel' );

?>
