<?php
      if ( ! function_exists( 'advisor_yearly_company_history' ) ) {

      	function advisor_yearly_company_history( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'           => '',
              'heading'              => '',
              'text'                 => '',
              'text_color'				   => '#000000',

            ), $atts ) );
    			  ob_start(); ?>

            <!-- COMPANY HISTORY -->
            <section class="bg-blue <?php esc_attr_e( $class_name ); ?>">
              <div class="container">
                <div class="heading margin-bottom-50 animate bounceIn">
                  <?php if( !empty( $heading ) ){ ?>

          				<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

          				<?php } ?>

          				<?php if( !empty( $text ) ){ ?>

          				<p><?php _e( $text , 'advisor-core'); ?></p>

          				<?php } ?>
                </div>
                <ul class="company-history">

                  <?php echo do_shortcode($content); ?>

                </ul>
              </div>
          </section><!-- / COMPANY HISTORY -->
					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_company_history', 'advisor_yearly_company_history');

      if ( ! function_exists( 'advisor_company_year' ) ) {

      	function advisor_company_year( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

							'year'               => '',
      				'year_heading'       => '',
      				'year_text'          => '',
              'year_text_color'	   => '#000000',
							'delay'              => '',


      			), $atts ) );

						if( !empty( $delay ) ){

							$delay = $delay;

						}
						else {

							$delay = '';

						}

      		ob_start(); ?>
          <li class="clearfix animate fadeInLeft" data-delay="<?php echo $delay; ?>">

            <?php if( !empty( $year ) ){ ?>

            <span class="year"><?php esc_html_e( $year , 'advisor-core'); ?></span>

            <?php } ?>

            <div class="history-content">

              <?php if( !empty( $year_heading ) ){ ?>

              <h4 style="color: <?php esc_attr_e( $year_text_color); ?>"><?php esc_html_e( $year_heading , 'advisor-core'); ?></h4>

              <?php } ?>
              <?php if( !empty( $year_text ) ){ ?>

              <p style="color: <?php esc_attr_e( $year_text_color); ?>"><?php _e( $year_text , 'advisor-core'); ?></p>

              <?php } ?>

            </div>
          </li>
          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('company_year', 'advisor_company_year');

      // Visual Composer Map
      function advisor_vc_map_company_history()
      {
      vc_map( array(

      		'name'										=> esc_html__( 'Advisor Company History', 'advisor-core' ),
      		'base' 				      		  => 'advisor_company_history',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'company_year'),
      		'show_settings_on_create' => true,
      		'content_element' 		  	=> true,
          'is_container' 			  		=> false,
					'js_view' 				  			=> 'VcColumnView',
          "params"                  => array(

    				array(
    				    "type"					=> "textfield",
    				    "heading" 			=> __("Heading", 'advisor-core'),
    				    "param_name"    => "heading",
    				    "description"   => __("Enter text heading here", 'advisor-core')
    				),
    				array(
    						 "type" 				=> "textarea",
    						 "heading" 		  => __("Text Below Heading", 'advisor-core'),
    						 "param_name" 	=> "text",
    						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
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
              "heading" 			=> __("Extra Class Name", 'advisor-core'),
              "param_name"		=> "class_name",
              "description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
          ),
        )

      	));

      vc_map( array(

          "name" 										=> __("Advisor Company Year", 'advisor-core'),
          "base" 										=> "company_year",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'advisor_company_history'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params"                  => array(

            array(
                "type"					=> "textfield",
                "heading" 			=> __("Company Year", 'advisor-core'),
                "param_name"    => "year",
                "description"   => __("Enter the year like '1998' etc to tell the history for this year.", 'advisor-core')
            ),
      				array(
      				    "type"					=> "textfield",
      				    "heading" 			=> __("Heading", 'advisor-core'),
      				    "param_name"    => "year_heading",
      				    "description"   => __("Enter text heading here, it can be the text which describes yearly efforts of this company.", 'advisor-core')
      				),
      				array(
      						 "type" 				=> "textarea",
      						 "heading" 		  => __("Text Below Heading", 'advisor-core'),
      						 "param_name" 	=> "year_text",
      						 "description" => __("Please add the text for company goals achieved in this year or anything which can be shared.", 'advisor-core')
      					 ),
             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Text Color", 'advisor-core' ),
                "param_name" => "year_text_color",
                "value" => '#000000',
                "description" => __( "Choose the Color for the year heading and text.", 'advisor-core' )
             ),
							array(
									'type'      		=> 'dropdown',
									'heading'   		=> esc_html__( 'Delay Effect', 'advisor-core' ),
									'param_name' 		=> 'delay',
									"description" 	=> esc_html__("Select delay effect in mili seconds, it will work when animations are enabled.", 'advisor-core'),
									'value' => array(

											esc_html__( 'Select Delay Time', 'advisor-core' ) 	=> '',
											esc_html__( '100', 'advisor-core' )  			  => 100,
											esc_html__( '200', 'advisor-core' )  			  => 200,
											esc_html__( '300', 'advisor-core' )  			  => 300,
											esc_html__( '400', 'advisor-core' )  			  => 400,
                      esc_html__( '500', 'advisor-core' )  			  => 500,
											esc_html__( '1000', 'advisor-core' )  			  => 1000,

									 )
							),

      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_advisor_company_history extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_company_year extends WPBakeryShortCode {
        }
    }

    }

      add_action( 'vc_before_init', 'advisor_vc_map_company_history' );
?>
