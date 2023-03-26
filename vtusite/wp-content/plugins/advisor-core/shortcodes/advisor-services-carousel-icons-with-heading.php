<?php
      if ( ! function_exists( 'advisor_services_icons_carousel_with_heading' ) ) {

      	function advisor_services_icons_carousel_with_heading( $atts , $content = NULL ){

					extract( shortcode_atts( array(

              'class_name'     => '',
              'text'           => '',
              'text_color'		 => '#000000',
              'autoplay'           => 'true',
              'autoplay_time_out'  => '',

						), $atts ) );


      			ob_start(); ?>

            <!-- Feature Start -->
            <section id="feature" class="bg_gray p-b-100 <?php echo $class_name; ?> ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="recent_project-slider owl-carousel" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">

                              <?php echo do_shortcode($content); ?>

                            </div>
                            <div class="col-md-10">

                              <?php if( !empty( $text ) ){ ?>

                                <p class="p_setting" style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $text , 'advisor-core'); ?></p>

                              <?php } ?>

                            </div>
                            <div class="col-md-2 hidden-xs"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Feature End -->

					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_icons_carousel_with_heading', 'advisor_services_icons_carousel_with_heading');

      if ( ! function_exists( 'advisor_services_icons_carousel_with_heading_item' ) ) {

      	function advisor_services_icons_carousel_with_heading_item( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

							'icon'               => '',
              'icon_color'				 => 'theme-accent',
      				'icon_heading'       => '',
      				'icon_text'          => '',
              'icon_text_color'	   => '#000000',
							'icon_button_text'          => '',
              'icon_button_link'          => '#',
              'icon_button_bg_color'      => '#f3f5fa',
              'icon_button_hover_bg_color'=> '#000000',


      			), $atts ) );

      		ob_start(); ?>

          <div class="item">
              <div class="feature_box">
                <i class="<?php echo $icon . ' ' . $icon_color; ?>"></i>

                  <?php if ( !empty ( $icon_heading ) ) { ?><h3 style="color: <?php esc_attr_e( $icon_text_color ); ?>"><?php esc_html_e( $icon_heading , 'advisor-core');; ?></h3><?php } ?>

                  <?php if ( !empty ( $icon_heading ) ) { ?><p style="color: <?php esc_attr_e( $icon_text_color ); ?>"><?php esc_html_e( $icon_text , 'advisor-core');; ?></p><?php } ?>

                  <?php if( !empty( $icon_button_text ) ){ ?>

                    <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                      onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                      data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

                  <?php } ?>

              </div>
          </div>


          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('carousel_item_icon', 'advisor_services_icons_carousel_with_heading_item');

      // Visual Composer Map
      function advisor_vc_map_services_icons_with_heading()
      {
      vc_map( array(

      		'name'										=> esc_html__( 'Advisor Icons Carousel With Heading', 'advisor-core' ),
      		'base' 				      		  => 'advisor_icons_carousel_with_heading',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'carousel_item_icon'),
      		'show_settings_on_create' => true,
      		'content_element' 		  	=> true,
          'is_container' 			  		=> false,
					'js_view' 				  			=> 'VcColumnView',

          "params"                  => array(


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
                "heading" 			=> esc_html__("Text", 'advisor-core'),
                "param_name"		=> "text",
                "description"		=> esc_html__("Enter text here. This will display under the carousel icons items.", 'advisor-core')
            ),
            array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => __( "Text Color", 'advisor-core' ),
               "param_name" => "text_color",
               "value" => '#000000',
               "description" => __( "Choose the Color for the text only.", 'advisor-core' )
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
          "base" 										=> "carousel_item_icon",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'advisor_icons_carousel_with_heading'),
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
                    esc_html__( ' icon-airplane', 'advisor-core' )     			=> ' icon-airplane',
                    esc_html__( 'icon-ship', 'advisor-core' )  		=> 'icon-ship',
                    esc_html__( 'icon-delivery-truck', 'advisor-core' )			=> 'icon-delivery-truck',
                    esc_html__( 'icon-carriage', 'advisor-core' )		  		=> 'icon-carriage',
                    esc_html__( 'icon-worldwide-pin', 'advisor-core' )				=> 'icon-worldwide-pin',
                    esc_html__( 'icon-hours', 'advisor-core' )   	  	=> 'icon-hours',

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
                    "value" => '#000000',
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


      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_advisor_icons_carousel_with_heading extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_carousel_item_icon extends WPBakeryShortCode {
        }
    }

    }

      add_action( 'vc_before_init', 'advisor_vc_map_services_icons_with_heading' );

?>
