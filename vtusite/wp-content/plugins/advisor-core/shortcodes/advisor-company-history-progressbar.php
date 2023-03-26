<?php
      if ( ! function_exists( 'advisor_yearly_company_history_progressbar' ) ) {

      	function advisor_yearly_company_history_progressbar( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'           => '',
              'heading'              => '',
              'text'                 => '',
              'description'          => '',
              'text_color'				   => '#000000',
              'image'                => '',

            ), $atts ) );

            if( !empty( $image ) ) {

              $image = wp_get_attachment_url( $image , array(555, 346) , false );
              $image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

            } else {

              $image = '';

            }

    			  ob_start(); ?>

            <!-- Company Start -->
            <section id="copmany_p <?php esc_attr_e( $class_name ); ?>">
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
                    <div class="row m-t-35">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copmany_image">
                                <?php if ( !empty ( $image ) ) { ?><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" class="img-responsive" /><?php } ?>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="company_box">
                                <ul class='skills'>

                                  <?php echo do_shortcode($content); ?>

                                </ul>

                                <?php if( !empty( $description ) ){ ?>

                                <p><?php esc_html_e( $description , 'advisor-core'); ?></p>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Company End -->

					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_company_history_progressbar', 'advisor_yearly_company_history_progressbar');

      if ( ! function_exists( 'advisor_company_year_progressbar' ) ) {

      	function advisor_company_year_progressbar( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

						'year'              => '',
            'company_progress'  => '',
            'company_target'    => '',

      			), $atts ) );

            if( !empty( $company_progress ) ) {

              $company_progress = $company_progress ;

            } else {

              $company_progress = 0;

            }

            if( !empty( $company_target ) ) {

              $company_target = $company_target;

            } else {

              $company_target = 0;

            }

            if( !empty( $image ) ) {

              $image = wp_get_attachment_url( $image , array(555, 346) , false );

            } else {

              $image = '';

            }


      		ob_start(); ?>

          <?php  $progressbar_class = 'bar-id-'.rand(); ?>
          <li class="<?php esc_attr_e( $progressbar_class ); ?>" data-width='<?php esc_attr_e( $company_progress ); ?>' data-target='<?php esc_attr_e( $company_target ); ?>'><?php esc_html_e( $year ); ?></li>

          <?php advisor_progressbar_script( $progressbar_class ); ?>

          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('company_year_progressbar', 'advisor_company_year_progressbar');

      // Visual Composer Map
      function advisor_vc_map_company_history_progressbar()
      {
      vc_map( array(

      		'name'										=> esc_html__( 'Advisor Company History With Progressbar', 'advisor-core' ),
      		'base' 				      		  => 'advisor_company_history_progressbar',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'company_year_progressbar'),
      		'show_settings_on_create' => true,
      		'content_element' 		  	=> true,
          'is_container' 			  		=> false,
					'js_view' 				  			=> 'VcColumnView',
          "params"                  => array(

          array(
              "type" 					=> "attach_image",
              "heading" 			=> __("Add Image", 'advisor-core'),
              "param_name"		=> "image",
              "description"		=> __("Add image to on top or below. The image size should be 555x346 approx.", 'advisor-core'),

              ),
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
    						 "description" => __("Enter the text to show above the heading for Style 2.", 'advisor-core')
    					 ),
           array(
                "type" 				=> "textarea",
                "heading" 		  => __("Description Below Progressbar", 'advisor-core'),
                "param_name" 	=> "description",
                "description" => __("Enter the text to show below companies year progressbars.", 'advisor-core')
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
          "base" 										=> "company_year_progressbar",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'advisor_company_history_progressbar'),
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
                "heading" 			=> __("Company Year Progress Percentage Targeted", 'advisor-core'),
                "param_name"    => "company_target",
                "description"   => __("Enter the year progress percentage targeted like '90' etc.", 'advisor-core')
            ),
            array(
                "type"					=> "textfield",
                "heading" 			=> __("Company Year Progress Percentage Achieved", 'advisor-core'),
                "param_name"    => "company_progress",
                "description"   => __("Enter the year progress percentage achieved like '70' etc.", 'advisor-core')
            ),



      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_advisor_company_history_progressbar extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_company_year_progressbar extends WPBakeryShortCode {
        }
    }

    }

      add_action( 'vc_before_init', 'advisor_vc_map_company_history_progressbar' );
      ?>
