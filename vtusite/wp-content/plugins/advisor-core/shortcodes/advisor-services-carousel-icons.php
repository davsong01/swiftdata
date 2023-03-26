<?php
      if ( ! function_exists( 'advisor_services_icons_carousel' ) ) {

      	function advisor_services_icons_carousel( $atts , $content = NULL ){

					extract( shortcode_atts( array(

              'class_name'     => '',
							'background'     => 'bg-white',
							'highlight'      => false,
							'overlap_top'    => false,


						), $atts ) );

						if( !empty( $background ) && $overlap_top == true && $highlight == true ){

							$background = $background . ' ' . 'padding-top-5';

						}
						else {

							$background = $background;

						}
            if( $highlight == true ) {

 							$services_class = 'services highlighted margin-0';

						}
						else {

							$services_class = '';

						}
						if( $overlap_top == true && $highlight == false ) {

 							$overlap_services = 'services';

						}
						else {

							$overlap_services = '';

						}
      			ob_start(); ?>

						<section class="<?php echo $background; ?> <?php echo $class_name; ?>">

					    <div class="container">


								<div class="text-center <?php echo $overlap_services . ' ' . $services_class; ?>">
									<div class="three-items-carousel owl-carousel">

                  <?php echo do_shortcode($content); ?>

								</div>

              </div>



							</div>

          </section><!-- / WELCOME -->

					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_icons_carousel', 'advisor_services_icons_carousel');

      if ( ! function_exists( 'advisor_services_icon_item' ) ) {

      	function advisor_services_icon_item( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

							'icon'               => '',
      				'icon_heading'       => '',
      				'icon_text'          => '',
              'icon_text_color'	   => '#fff',
							'icon_animation'     => '',
							'icon_color'				 => 'theme-accent',
							'icon_delay'         => '',
              'icon_button_text'          => '',
              'icon_button_link'          => '',
              'icon_button_bg_color'      => '#f3f5fa',
              'icon_button_hover_bg_color'=> '#000000',


      			), $atts ) );

            if( !empty( $icon ) ) {

      				$icon_class = ( get_advisor_services_icon( $icon ) != '' ? get_advisor_services_icon( $icon ) : '' );

      			} else {

      				$icon_class = '';

      			}

      			if( !empty( $icon_animation ) ){

      				$icon_animation = 'animate' . ' ' . $icon_animation;

      			}
      			else {

      				$icon_animation = '';

      			}

						if( !empty( $icon_delay ) ){

							$icon_delay = $icon_delay;

						}
						else {

							$icon_delay = '';

						}

      		ob_start(); ?>
					<div class="service-box <?php echo $icon_animation; ?>" data-delay="<?php echo $icon_delay; ?>">

						<i class="<?php echo $icon_class . ' ' . $icon_color; ?>"></i>

						<?php if( !empty( $icon_heading ) ){ ?>

						<h4 style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php esc_html_e( $icon_heading , 'advisor-core'); ?></h4>

						<?php } ?>
						<?php if( !empty( $icon_text ) ){ ?>

						<p style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php _e( $icon_text , 'advisor-core'); ?></p>


            <?php if( !empty( $icon_button_text ) ){ ?>

              <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

            <?php } ?>


						<?php } ?>
					</div>

          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('carousel_icon', 'advisor_services_icon_item');

      // Visual Composer Map
      function advisor_vc_map_services_icons()
      {
      vc_map( array(

      		'name'										=> esc_html__( 'Advisor Icons Carousel', 'advisor-core' ),
      		'base' 				      		  => 'advisor_icons_carousel',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'carousel_icon'),
      		'show_settings_on_create' => true,
      		'content_element' 		  	=> true,
          'is_container' 			  		=> false,
					'js_view' 				  			=> 'VcColumnView',

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
								 "type" 				=> "checkbox",
								 "heading" 		  => esc_html__("Highlighted Background", 'advisor-core'),
								 "param_name" 	=> "highlight",
								 "description" 	=> esc_html__("Check if the caurosel items should have colored background, the color will be accent color of theme.", 'advisor-core'),
								 "value"        => array( '' => true ),
							 ),
      				array(
      						 "type" 				=> "checkbox",
      						 "heading" 		  => __("Overlap Top?", 'advisor-core'),
      						 "param_name" 	=> "overlap_top",
      						 "description"  => __("Check if the caurosel should overlap with top element.", 'advisor-core'),
									 "value"        => array( '' => true ),
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

          "name" 										=> __("Advisor Carousel Icon", 'advisor-core'),
          "base" 										=> "carousel_icon",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'advisor_icons_carousel'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params"                  => array(

						array(
								'type'      		=> 'dropdown',
								'heading'   		=> esc_html__( 'Select Icon', 'advisor-core' ),
								'param_name' 		=> 'icon',
								"description" 	=> esc_html__("Select icon, make sure to check icons in docs.", 'advisor-core'),
								'value' => array(

										esc_html__( 'Select Icon', 'advisor-core' ) 	    		=> '',
        						esc_html__( 'icon-money', 'advisor-core' )     			=> 'icon-money',
										esc_html__( 'icon-save-money', 'advisor-core' )  		=> 'icon-save-money',
										esc_html__( 'icon-consulting', 'advisor-core' )			=> 'icon-consulting',
										esc_html__( 'icon-travel', 'advisor-core' )		  		=> 'icon-travel',
										esc_html__( 'icon-consumer', 'advisor-core' )				=> 'icon-consumer',
										esc_html__( 'icon-privacy', 'advisor-core' )   	  	=> 'icon-privacy',
										esc_html__( 'icon-secure', 'advisor-core' )      		=> 'icon-secure',
										esc_html__( 'icon-planning', 'advisor-core' )				=> 'icon-planning',
										esc_html__( 'icon-online-consult', 'advisor-core' )	=> 'icon-online-consult',

								 )
						),
      				array(
      				    "type"					=> "textfield",
      				    "heading" 			=> __("Heading", 'advisor-core'),
      				    "param_name"    => "icon_heading",
      				    "description"   => __("Enter text heading here", 'advisor-core')
      				),
      				array(
      						 "type" 				=> "textarea",
      						 "heading" 		  => __("Text Below Heading", 'advisor-core'),
      						 "param_name" 	=> "icon_text",
      						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
      					 ),
                 array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Text Color", 'advisor-core' ),
                    "param_name" => "icon_text_color",
                    "value" => '#fff',
                    "description" => __( "Choose the Color for the heading and text below heading.", 'advisor-core' )
                 ),
							 array(
									 'type'      		=> 'dropdown',
									 'heading'   		=> esc_html__( 'Icon Color', 'advisor-core' ),
									 'param_name' 		=> 'icon_color',
									 "description" 	=> esc_html__("Select color for the icon, when carousel 'highlight' is checked, select white color(recommended).", 'advisor-core'),
									 'value' => array(

											 esc_html__( 'Select Color', 'advisor-core' ) 	=> '',
											 esc_html__( 'Theme Accent', 'advisor-core' )  => 'theme-accent',
											 esc_html__( 'White', 'advisor-core' )  				=> 'white',
										)
							 ),
      				array(
      						'type'      		=> 'dropdown',
      						'heading'   		=> esc_html__( 'Animation Effect', 'advisor-core' ),
      						'param_name' 		=> 'icon_animation',
      						"description" 	=> esc_html__("Select animation effect, make sure to select this for first two items, it will work when animations are enabled.", 'advisor-core'),
      						'value' => array(

      								esc_html__( 'Select Effect', 'advisor-core' ) 	=> '',
      								esc_html__( 'Fade-In Up', 'advisor-core' )  			  => 'fadeInUp',
      								esc_html__( 'Fade-In Down', 'advisor-core' )  			=> 'fadeInDown',
      					   )
      				),
              array(
                "type" 					=> "textfield",
                "heading" 			=> __("Button Text", 'advisor-core'),
                "param_name" 		=> "icon_button_text",
                "description" 	=> __("Add Button text here", 'advisor-core')
              ),
              array(
                "type" 					=> "textfield",
                "heading" 			=> __("Button Link", 'advisor-core'),
                "param_name" 		=> "icon_button_link",
                "description" 	=> __("Add Button Link here", 'advisor-core')
              ),
              array(
                 "type" => "colorpicker",
                 "class" => "",
                 "heading" => __( "Button Background Color", 'advisor-core' ),
                 "param_name" => "icon_button_bg_color",
                 "value" => '#f3f5fa',
                 "description" => __( "Choose the Color for the button background.", 'advisor-core' )
              ),
              array(
                 "type" => "colorpicker",
                 "class" => "",
                 "heading" => __( "Button Hover Background Color", 'advisor-core' ),
                 "param_name" => "icon_button_hover_bg_color",
                 "value" => '#000000',
                 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
              ),
							array(
									'type'      		=> 'dropdown',
									'heading'   		=> esc_html__( 'Delay Effect', 'advisor-core' ),
									'param_name' 		=> 'icon_delay',
									"description" 	=> esc_html__("Select delay effect in mili seconds, it will work when animations are enabled.", 'advisor-core'),
									'value' => array(

											esc_html__( 'Select Delay Time', 'advisor-core' ) 	=> '',
											esc_html__( '100', 'advisor-core' )  			  => 100,
											esc_html__( '200', 'advisor-core' )  			  => 200,
											esc_html__( '500', 'advisor-core' )  			  => 500,
											esc_html__( '1000', 'advisor-core' )  			  => 1000,

									 )
							),

      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_advisor_icons_carousel extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_carousel_icon extends WPBakeryShortCode {
        }
    }

    }

    add_action( 'vc_before_init', 'advisor_vc_map_services_icons' );
?>
