<?php
      if ( ! function_exists( 'advisor_accordion_tab_images' ) ) {

      	function advisor_accordion_tab_images( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'           => '',
              'images'               => '',
              'heading'              => '',
              'text'                 => '',
              'text_color'				   => '#000000',
              'background'           => 'bg-blue',
              'overlap_top'          => 0,

            ), $atts ) );

            $add_section = '';
            $overlap_class = '';
            $overlap_row = '';
            $image = array();

            if(  $overlap_top == 1  ) {

              $overlap_class = 'padding-top-5';
              $overlap_row = 'overlap-top-row';

            }
            if( !empty($images) ) {

              $image = explode(',' , $images);
              $add_section = '<section class="' . $background . ' '. $overlap_class.' '. $class_name.'"><div class="container">';

            }

      			ob_start();

            ?>

            <?php echo $add_section; ?>

                <?php if( isset( $image[0] ) || isset( $image[1] ) ) {


                  //Change img dimentions, if there is only a single image
                  if ( isset( $image[0] ) && !isset( $image[1] ) ) {
                    $img1 = wp_get_attachment_url( $image[0] , array(458, 516) , false ); ?>

                    <style type="text/css">
                      @media (min-width: 992px) {
                        .image-list-classic li img {
                             max-width: 100%;
                            height: 386px;
                        }
                      }
                    </style>

                  <?php }


                  //get the two images
                  if ( isset( $image[0] ) && !isset( $img1 ) ) {

                    $img1 = wp_get_attachment_url( $image[0] , array(500,450) , false );
                    $image_alt = get_post_meta( $image[0], '_wp_attachment_image_alt', true);

                  }

                  if ( isset( $image[1] ) ) {

                    $img2 = wp_get_attachment_url( $image[1] , array(500,450) , false );
                    $image_alt_2 = get_post_meta( $image[1], '_wp_attachment_image_alt', true);

                  }


                  $image1 = (!empty( $img1 ) ? $img1 : "" );
                  $image2 = (!empty( $img2 ) ? $img2 : "");

                ?>
                  <div class="row <?php esc_attr_e( $overlap_row ); ?>">

                    <div class="col-md-6 animate fadeInLeft">

                      <ul class="image-list-classic">

                        <?php if( !empty( $image1 ) ) { ?><li><img src="<?php echo $image1; ?>" alt="<?php echo $image_alt; ?>"></li><?php } ?>
                        <?php if( !empty( $image2 ) ) { ?><li><img src="<?php echo $image2; ?>" alt="<?php echo $image_alt_2; ?>"></li><?php } ?>
                      </ul>

                    </div>


                    <div class="col-md-6 animate fadeInRight">

                    <?php } ?>

                        <?php if( !empty( $heading ) ){ ?>

                            <h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h3>

                       <?php } if( !empty( $text ) ) { ?>

                        <p><?php _e( $text , 'advisor-core'); ?></p>

                      <?php }  ?>

                        <div id="accordion" role="tablist" aria-multiselectable="true">

                            <?php echo do_shortcode($content); ?>

                        </div>

                      <?php if( !empty( $add_section ) ) {    ?>

                        <!-- Close rows and columens if images are added. -->
                          </div>
                       </div>

                       <?php }  ?>



               <?php if(  !empty( $add_section  )) { ?>


                 </div>
                 </section>

              <?php }

      		    return ob_get_clean();
      	}
      }
      add_shortcode('advisor_accordion', 'advisor_accordion_tab_images');

      if ( ! function_exists( 'advisor_accordion_tab' ) ) {

      	function advisor_accordion_tab( $atts , $content =  NULL ){

      		extract( shortcode_atts( array(

      				'accordion_title'      => '',
      				'accordion_text'       => '',
              'accordion_text_color' => '#000000',
              'collapse'             => 'out',



      			), $atts ) );

            $accordion_text = html_entity_decode( $accordion_text );
            if( !empty( $collapse ) && $collapse == 'in'  ){

              $collapse_class = 'collapse in';
              $in_out_class = '';

            }
            else {

              $collapse_class = 'collapse';
              $in_out_class = 'collapsed';

            }


            $accordion_id = 'accordian-' . rand();


      			ob_start(); ?>

            <div class="toggle" >

              <div class="toggle-heading" role="tab">
                <a role="button" class="<?php echo $in_out_class; ?>" data-toggle="collapse" data-parent="#accordion" href="#<?php  echo $accordion_id; ?>" aria-expanded="<?php if( $collapse == 'in' ) { echo 'true'; } else { echo 'false'; } ?>" aria-controls="<?php  echo $accordion_id; ?>">
                  <i class="fa <?php if($in_out_class =='collapsed' ) { echo 'fa-plus'; } else { echo 'fa-minus'; } ?>"></i>

                  <?php if( !empty( $accordion_title) ){

                      esc_html_e( $accordion_title , 'advisor-core');

                   } ?>

                </a>
              </div>

              <div id="<?php  echo $accordion_id; ?>" class="panel-collapse <?php  echo $collapse_class; ?>" role="tabpanel">
                <div class="toggle-body">

                    <?php if( !empty( $accordion_text ) ){ ?>

                      <p style="color: <?php esc_attr_e( $accordion_text_color); ?>"><?php  echo $accordion_text; ?></p>

                    <?php } ?>

                </div>
              </div>

            </div>

            <?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('accordion_tab', 'advisor_accordion_tab');

      // Visual Composer Map
      function advisor_vc_map_accordion_tabs()
      {
        vc_map( array(

      		'name'										=> esc_html__( 'Advisor Accordion', 'advisor-core' ),
      		'base' 				      		  => 'advisor_accordion',
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      		'as_parent' 			  			=> array('only' => 'accordion_tab'),
      		'show_settings_on_create' => true,
          'content_element' 		  	=> true,
          'is_container' 			  		=> false,
      		'js_view' 				  			=> 'VcColumnView',
          "params" => array(

      				array(
      		        "type" 					=> "attach_images",
      		        "heading" 			=> __("Add Images", 'advisor-core'),
      		        "param_name"		=> "images",
      		        "description"		=> __("Add at minimum and maximum two images, these images will show up on right side of accorion tabs.", 'advisor-core')
      				),
              array(
      		        "type" 					=> "textfield",
      		        "heading" 			=> __("Heading", 'advisor-core'),
      		        "param_name"		=> "heading",
      		        "description"		=> __("Enter heading here.", 'advisor-core')
          		),
              array(
                  "type" 					=> "textfield",
                  "heading" 			=> __("Text", 'advisor-core'),
                  "param_name"		=> "text",
                  "description"		=> __("Enter text here. This will display under heading.", 'advisor-core')
              ),
              array(
                 "type" => "colorpicker",
                 "class" => "",
                 "heading" => __( "Text Color", 'advisor-core' ),
                 "param_name" => "text_color",
                 "value" => '#000000',
                 "description" => __( "Choose the Color for the heading only", 'advisor-core' )
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
      						 "type" 				=> "checkbox",
      						 "heading" 		  => __("Overlap Top?", 'advisor-core'),
      						 "param_name" 	=> "overlap_top",
      						 "description"  => __("Check if the tabs should overlap top or it should not be added as separate section.", 'advisor-core'),
      						 "value"        => array( '' => true ),
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

      vc_map( array(

          "name" 										=> __("Advisor Accordion Tab", 'advisor-core'),
          "base" 										=> "accordion_tab",
          "content_element"   			=> true,
          'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
          "as_child" 								=> array('only' => 'advisor_accordion'),
      		"show_settings_on_create" => true,
      		'is_container' 						=> true,
          "params" => array(

                array(
        				    "type"					=> "textfield",
        				    "heading" 			=> __("Title", 'advisor-core'),
        				    "param_name"    => "accordion_title",
        				    "description"   => __("Enter tab title here.", 'advisor-core')
        				),
        				array(
        						 "type" 				=> "textarea",
        						 "heading" 		  => __("Text", 'advisor-core'),
        						 "param_name" 	=> "accordion_text",
        						 "description"  => __("Enter the text to show in tabs.", 'advisor-core')
        				),
                array(
                   "type" => "colorpicker",
                   "class" => "",
                   "heading" => __( "Text Color", 'advisor-core' ),
                   "param_name" => "accordion_text_color",
                   "value" => '#000000',
                   "description" => __( "Choose the Color for the accordion text.", 'advisor-core' )
                ),
               array(
         						'type'      		=> 'dropdown',
         						'heading'   		=> esc_html__( 'Collapse in/out', 'advisor-core' ),
         						'param_name' 		=> 'collapse',
         						"description" 	=> esc_html__("Select collapse 'in' or 'out' position of the tab. ", 'advisor-core'),
         						'value' => array(

         								esc_html__( 'Collaspe Out', 'advisor-core' )  			=> 'out',
         								esc_html__( 'Collapse In', 'advisor-core' )  			=> 'in',
         					   )
       				 ),

             )

           )

      );

      if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
          class WPBakeryShortCode_advisor_accordion extends WPBakeryShortCodesContainer {
          }
      }
      if ( class_exists( 'WPBakeryShortCode' ) ) {
          class WPBakeryShortCode_accordion_tab extends WPBakeryShortCode {
          }
      }


      }

      add_action( 'vc_before_init', 'advisor_vc_map_accordion_tabs' );
      ?>
