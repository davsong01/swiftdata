<?php
      if ( ! function_exists( 'advisor_services_icons_grid' ) ) {

      	function advisor_services_icons_grid( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'         => '',
              'heading'            => '',
              'text'               => '',
              'text_color'		     => '#000',
              'style'              => '',
              'background'         => 'bg-blue',


      			), $atts ) );

            $section_classes = '';
            if( $style == 'style2' ) {

              $section_classes = 'bg-blue why-people-chose-us';

            }
      			ob_start(); ?>

            <section class=" <?php echo $background; ?> <?php echo $section_classes; ?> <?php echo $class_name; ?>">
            <div class="container">
              <div class="heading text-center animate bounceIn">

                <?php if( !empty( $heading ) ){ ?>

    						<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

                <?php } ?>

                <?php if( !empty( $text ) ){ ?>

					 				<p><?php _e( $text , 'advisor-core'); ?></p>

                <?php } ?>
    					</div>
              <?php if( $style == 'style2' ) { ?>

                <div class="text-center">
      						<div class="row">

                    <?php echo do_shortcode($content); ?>

                </div>
              </div>

              <?php } else { ?>

              <ul class="highlighted-sec clearfix services-grid">

                <?php echo do_shortcode($content); ?>

              </ul>
            <?php } ?>
  						</div>
          </section>
				<?php

    		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_icons_grid', 'advisor_services_icons_grid');

      if ( ! function_exists( 'advisor_services_icon_grid_item' ) ) {

      	function advisor_services_icon_grid_item( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

							'icon'               => '',
              'style3_icon'        => '',
      				'icon_heading'       => '',
      				'icon_text'          => '',
              'icon_text_color'	   => '#fff',
							'icon_color'				 => 'theme-accent',
							'icon_delay'         => '',
              'style'              => 'style1',
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
						if( !empty( $icon_delay ) ){

							$icon_delay = $icon_delay;

						}
						else {

							$icon_delay = '';

						}

      		ob_start(); ?>
          <?php if( $style == 'style2' ) { ?>

            <div class="col-md-4">
								<div class="service-box three">
                  <i class="<?php echo $icon_class; ?>"></i>
                  <?php if( !empty( $icon_heading ) ){ ?>

      						<h4><?php esc_html_e( $icon_heading , 'advisor-core'); ?></h4>

      						<?php } ?>
      						<?php if( !empty( $icon_text ) ){ ?>

      						<p><?php _e( $icon_text , 'advisor-core'); ?></p>

                  <?php if( !empty( $icon_button_text ) ){ ?>

                    <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                      onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                      data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

                  <?php } ?>


      						<?php } ?>
								</div>
							</div>

          <?php } elseif( $style == 'style1' ) { ?>

              <li>
                <div class="text-box animate bounceIn" data-delay="<?php echo $icon_delay; ?>">

                  <i class="<?php echo $icon_class; ?> white"></i>
                  <?php if( !empty( $icon_heading ) ){ ?>

      						<h4 style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php esc_html_e( $icon_heading , 'advisor-core'); ?></h4>

      						<?php } ?>
      						<?php if( !empty( $icon_text ) ){ ?>

      						<p style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php _e( $icon_text , 'advisor-core'); ?></p>

      						<?php } ?>

                  <?php if( !empty( $icon_button_text ) ){ ?>

                    <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                      onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                      data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

                  <?php } ?>


                </div>
              </li>

          <?php } elseif ( $style == 'style3' ) { ?>

            <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="feature_box">

                  <?php if ( !empty( $style3_icon ) ) { ?><i class="<?php echo $style3_icon; ?>"></i><?php } ?>

                    <?php if( !empty( $icon_heading ) ){ ?>

        						<h3 style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php esc_html_e( $icon_heading , 'advisor-core'); ?></h3>

        						<?php } ?>

                    <?php if( !empty( $icon_text ) ){ ?>

        						<p style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php _e( $icon_text , 'advisor-core'); ?></p>

        						<?php } ?>

                    <?php if( !empty( $icon_button_text ) ){ ?>

                      <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                        onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                        onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                        data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

                    <?php } ?>


                </div>
            </div>

            <?php } elseif ( $style == 'style4' ) { ?>

              <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                <div class="feature_3">
                  <div class="feature_box">

                    <?php if ( !empty( $style3_icon ) ) { ?><i class="<?php echo $style3_icon; ?>"></i><?php } ?>

                      <?php if( !empty( $icon_heading ) ){ ?>

                      <h3 style="color: <?php esc_attr_e( $icon_text_color); ?>"><?php esc_html_e( $icon_heading , 'advisor-core'); ?></h3>

                      <?php } ?>

                      <?php if( !empty( $icon_text ) ){ ?>

                      <p><?php _e( $icon_text , 'advisor-core'); ?></p>

                      <?php } ?>

                      <?php if( !empty( $icon_button_text ) ){ ?>

                        <a href="<?php echo $icon_button_link; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $icon_button_bg_color ); ?>;"
                          onMouseOver="this.style.background='<?php esc_attr_e( $icon_button_hover_bg_color); ?>'"
                          onMouseOut="this.style.background='<?php esc_attr_e( $icon_button_bg_color); ?>'"
                          data-text="<?php esc_html_e( $icon_button_text , 'advisor-core'); ?>"><?php esc_html_e( $icon_button_text , 'advisor-core'); ?></a>

                      <?php } ?>

                  </div>
                </div>
              </div>

            <?php }

      		 return ob_get_clean();
      	}
      }
      add_shortcode('grid_icon', 'advisor_services_icon_grid_item');

      // Visual Composer Map
      function advisor_vc_map_services_grid_icons()
      {
      vc_map( array(

      		'name'										=> esc_html__( 'Advisor Icons Grid', 'advisor-core' ),
      		'base' 				      		  => 'advisor_icons_grid',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'grid_icon'),
      		'show_settings_on_create' => true,
      		'content_element' 		  	=> true,
          'is_container' 			  		=> false,
					'js_view' 				  			=> 'VcColumnView',
          'params'                  => array(

            array(

                    "type"          => "textfield",
                    "heading"       => esc_html__("Heading", 'advisor-core'),
                    "param_name"    => "heading",
                    "description"   => esc_html__("Add heading here", 'advisor-core')
                ),
            array(
                    "type" 					=> "textarea",
                    "heading" 			=> esc_html__("Text", 'advisor-core'),
                    "param_name" 		=> "text",
                    "description" 	=> esc_html__("Add text here, it will show up below the heading above.", 'advisor-core')
            ),
            array(
                 'type'      		=> 'dropdown',
                 'heading'   		=> esc_html__( 'Background', 'advisor-core' ),
                 'param_name' 		=> 'background',
                 "description" 	=> esc_html__("Select background between white or light blue. ", 'advisor-core'),
                 'value' => array(

                     esc_html__( 'Light Blue', 'advisor-core' )  			=> 'bg-blue',
                     esc_html__( 'White', 'advisor-core' )  			    => 'bg-white',
                  ),

            ),
            array(
        			 "type" => "colorpicker",
        			 "class" => "",
        			 "heading" => __( "Text Color", 'advisor-core' ),
        			 "param_name" => "text_color",
        			 "value" => '#000',
        			 "description" => __( "Choose the Color for the heading and text that will show up below the heading above.", 'advisor-core' )
        		),
            array(
            'type'      		=> 'dropdown',
            'heading'   		=> esc_html__( 'Grid Layout', 'advisor-core' ),
            'param_name' 		=> 'style',
            "description" 	=> esc_html__("Select style, grid style can be highlighted with theme accent color or hover bottom border with accent color.", 'advisor-core'),
            'value' => array(

                esc_html__( 'Select Layout', 'advisor-core' ) 	=> '',
                esc_html__( 'Style 1', 'advisor-core' )  			=> 'style1',
                esc_html__( 'Style 2', 'advisor-core' )        => 'style2',

             )
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

          "name" 										=> __("Advisor Icons Grid", 'advisor-core'),
          "base" 										=> "grid_icon",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'advisor_icons_grid'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params"                  => array(


            array(
                'type'      		=> 'dropdown',
                'heading'   		=> esc_html__( 'Grid Layout', 'advisor-core' ),
                'param_name' 		=> 'style',
                "description" 	=> esc_html__("Select style, please select the same style as selected in parent shortcode 'Advisor Icons Grid'.", 'advisor-core'),
                'value' => array(

                    esc_html__( 'Style 1', 'advisor-core' )  			=> 'style1',
                    esc_html__( 'Style 2', 'advisor-core' )       => 'style2',
                    esc_html__( 'Style 3', 'advisor-core' )       => 'style3',
                    esc_html__( 'Style 4', 'advisor-core' )        => 'style4',

                 ),
                 'default' => 'style1',
            ),

            array(
                'type'      		=> 'dropdown',
                'heading'   		=> esc_html__( 'Select Icon', 'advisor-core' ),
                'param_name' 		=> 'style3_icon',
                "description" 	=> esc_html__("Select icon, make sure to check icons in docs.", 'advisor-core'),
                'value' => array(

                    esc_html__( 'Select Icon', 'advisor-core' ) 	    		=> '',
                    esc_html__( ' icon-airplane', 'advisor-core' )     			=> ' icon-airplane',
                    esc_html__( 'icon-ship', 'advisor-core' )  		=> 'icon-ship',
                    esc_html__( 'icon-delivery-truck', 'advisor-core' )			=> 'icon-delivery-truck',
                    esc_html__( 'icon-box2', 'advisor-core' )		  		=> 'icon-box2',
                    esc_html__( 'icon-worldwide-pin', 'advisor-core' )				=> 'icon-worldwide-pin',
                    esc_html__( 'icon-hours', 'advisor-core' )   	  	=> 'icon-hours',

                 ),
                 "dependency" => array(
                 "element" => "style",
                 "value" => array(
                   'style3',
                   'style4',
                   ),
                  )
            ),
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

								 ),
                 "dependency" => array(
                 "element" => "style",
                 "value" => array(
                   'style1',
                   'style2',
                   ),
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
                    "description" => __( "Choose the Color for the heading and text(except style 4) below heading.", 'advisor-core' )
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
											esc_html__( '300', 'advisor-core' )  			  => 300,
											esc_html__( '400', 'advisor-core' )  			  => 400,
                      esc_html__( '500', 'advisor-core' )  			  => 500,
											esc_html__( '1000', 'advisor-core' )  			  => 1000,

									 ),
                   "dependency" => array(
                   "element" => "style",
                   "value" => array(
                     'style1',
                     'style2',
                     ),
                    )
							),


      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_advisor_icons_grid extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_grid_icon extends WPBakeryShortCode {
        }
    }

    }

      add_action( 'vc_before_init', 'advisor_vc_map_services_grid_icons' );
?>
