<?php
      if ( ! function_exists( 'advisor_services_grid' ) ) {

      	function advisor_services_grid( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'     => '',
              'heading'        => '',
              'text'           => '',
              'text_color'		 => '#000',
              'animate'        => ''

            ), $atts ) );

            if( !empty( $animate ) ){

      				$animate = 'animate' . ' ' . $animate;

      			}
      			else {

      				$animate = '';

      			}

      			ob_start(); ?>

            <section class="<?php echo $class_name; ?>">
    				<div class="container">
    					<div class="heading text-center <?php echo $animate; ?>">

                <?php if( !empty( $heading ) ){ ?>

                    <h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

                <?php } if( !empty( $text ) ){ ?>

 										<p><?php _e( $text , 'advisor-core'); ?></p>

                <?php } ?>

    					</div>

    					<div class="height-50"></div>

    					<div class="row">

                  <?php echo do_shortcode($content); ?>

              </div>
            </div>
          </section><!-- / WELCOME -->


                <?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('services_grid', 'advisor_services_grid');

      if ( ! function_exists( 'advisor_services_grid_item' ) ) {

      	function advisor_services_grid_item( $atts , $content = NULL ){

      		extract( shortcode_atts( array(

              'item_image'         => '',
      				'item_heading'       => '',
      				'item_text'          => '',
              'item_text_color'		 => '#000',
              'url'                => '',
      				'item_animation'     => '',
              'text_align'     => 'center',


      			), $atts ) );

            if( !empty( $item_image ) ) {

      				$item_image = wp_get_attachment_url( $item_image , array(360,267) , false );
              $image_alt = get_post_meta( $item_image, '_wp_attachment_image_alt', true);

      			} else {

      				$item_image = '';

      			}

      			if( !empty( $item_animation ) ){

      				$item_animation = 'animate' . ' ' . $item_animation;

      			}
      			else {

      				$item_animation = '';

      			}

      		ob_start(); ?>

          <div class="col-md-4">
            <div class="text-box <?php if( $text_align == 'center' ) { echo 'text-center'; } ?> <?php echo $item_animation; ?>">
              <div class="bordered-thumb"><img src="<?php echo $item_image; ?>" alt="<?php echo esc_attr( $image_alt ); ?>"></div>
              <?php if( !empty( $item_heading ) ){ ?>

                  <h4 style="color: <?php esc_attr_e( $item_text_color); ?>"><?php esc_html_e( $item_heading , 'advisor-core'); ?></h4>

              <?php } ?>

              <?php if( !empty( $item_text ) ){ ?>

                  <p style="color: <?php esc_attr_e( $item_text_color); ?>"><?php _e( $item_text , 'advisor-core'); ?></p>

              <?php } ?>
              <?php if( !empty( $url ) ){ ?>

                  <a href="<?php echo esc_url( $url ); ?> " class="link-grey"><i class="fa fa-caret-right"></i> <?php esc_html_e( 'Learn More' , 'advisor-core'); ?></a>

              <?php } ?>
            </div>
          </div>

          <?php
      		 return ob_get_clean();
      	}
      }
      add_shortcode('services_item', 'advisor_services_grid_item');

      // Visual Composer Map
      function advisor_vc_map_services_grid()
      {
      vc_map( array(

      		'name'					=> esc_html__( 'Advisor Services Grid', 'advisor-core' ),
      		'base' 				    => 'services_grid',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			=> array('only' => 'services_item'),
      		'show_settings_on_create' => true,
      		'content_element' 		  => true,
          'is_container' 			  => false,
          'js_view' 				  => 'VcColumnView',
          "params"                  => array(

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
      						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
      					 ),
             array(
         			 "type" => "colorpicker",
         			 "class" => "",
         			 "heading" => __( "Text Color", 'advisor-core' ),
         			 "param_name" => "text_color",
         			 "value" => '#000',
         			 "description" => __( "Choose the Color for the heading only.", 'advisor-core' )
         		),
      				array(
      						'type'      		=> 'dropdown',
      						'heading'   		=> esc_html__( 'Animation Effect', 'advisor-core' ),
      						'param_name' 		=> 'animate',
      						"description" 	=> esc_html__("Select animation effect, make sure to select this for first two items with different effects, it will work when animations are enabled in theme options.", 'advisor-core'),
      						'value' => array(

      								esc_html__( 'Select Effect', 'advisor-core' ) 	=> '',
      								esc_html__( 'Fade-In Up', 'advisor-core' )  			=> 'fadeInUp',
      								esc_html__( 'Fade-In Down', 'advisor-core' )  			=> 'fadeInDown',
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

          "name" 										=> __("Services Item", 'advisor-core'),
          "base" 										=> "services_item",
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "content_element"   			=> true,
          "as_child" 								=> array('only' => 'services_grid'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params"                  => array(
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
      						 "param_name" 	=> "item_text",
      						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
      					 ),
               array(
                  "type" => "colorpicker",
                  "class" => "",
                  "heading" => __( "Text Color", 'advisor-core' ),
                  "param_name" => "item_text_color",
                  "value" => '#000',
                  "description" => __( "Choose the Color for the item's heading and description.", 'advisor-core' )
               ),
                 array(
         						 "type" 				=> "textfield",
         						 "heading" 		  => __("Item URL", 'advisor-core'),
         						 "param_name" 	=> "url",
         						 "description" => __("For further explanation, if there is any URL please add that here.", 'advisor-core')
         					 ),
      				array(
      						'type'      		=> 'dropdown',
      						'heading'   		=> esc_html__( 'Transition Effect', 'advisor-core' ),
      						'param_name' 		=> 'item_animation',
      						"description" 	=> esc_html__("Select transition effect, make sure to select this for first two items", 'advisor-core'),
      						'value' => array(

      								esc_html__( 'Select Transition', 'advisor-core' ) 	=> '',
      								esc_html__( 'Fade-In Up', 'advisor-core' )  			=> 'fadeInUp',
      								esc_html__( 'Fade-In Down', 'advisor-core' )  			=> 'fadeInDown',
      					   )
      				),
              array(
      						'type'      		=> 'dropdown',
      						'heading'   		=> esc_html__( 'Text Align', 'advisor-core' ),
      						'param_name' 		=> 'text_align',
      						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
      						'value' => array(

      								esc_html__( 'Select Aligment', 'advisor-core' ) 	=> '',
      								esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
      								esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
      					   )
      				),

      		)

      )

    );
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_services_grid extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_services_item extends WPBakeryShortCode {
        }
    }

      }

      add_action( 'vc_before_init', 'advisor_vc_map_services_grid' );

?>
