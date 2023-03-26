<?php
      if ( ! function_exists( 'advisor_company_planning' ) ) {

      	function advisor_company_planning( $atts , $content = NULL ){

          extract( shortcode_atts( array(

              'class_name'           => '',
              'heading'              => '',
              'text'                 => '',
              'text_color'				   => '#000000',
              'plan'                 => ''

            ), $atts ) );

    			  ob_start(); ?>


            <!--************************************
          			Investing Plan Start
          	*************************************-->
          	<section class="ad-sectionpadding ad-haslayout <?php esc_attr_e( $class_name );?>">
          		<div class="container">
          			<div class="row">
          				<div class="col-sm-12 col-xs-12">
          					<div class="ad-sectionhead text-center">
          						<div class="ad-sectiontitle">

                        <?php if( !empty( $heading ) ){ ?>

                          <h1 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h1>

                        <?php } ?>

          						</div>
          						<div class="ad-description">

                        <?php if( !empty( $text ) ){ ?>

                          <p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>

                        <?php } ?>

          						</div>
          					</div>
          				</div>
          				<div class="cd-horizontal-timeline">
          					<div class="events-content">
          						<ol>

                        <?php
                        $plan = vc_param_group_parse_atts( $plan );
                        $i = 0;

                        foreach( $plan as $single_plan ) {

                          if( !empty( $single_plan['image'] ) ){

                            $image = wp_get_attachment_url( $single_plan['image'] , array(555, 362), false);
                            $image_alt = get_post_meta( $single_plan['image'], '_wp_attachment_image_alt', true);

                          } else {

                            $image = get_template_directory_uri() . "/images/updated/555x362.png";

                          } ?>

                          <li <?php if ( !empty( $single_plan['plan_date'] ) ) { ?>data-date="<?php esc_attr_e( $single_plan['plan_date'] ); ?>" <?php } ?> class="<?php if( $i == 0 ) { echo 'selected'; } ?>">

                            <?php  $i = 1; ?>
                            <div class="ad-welcome">
                              <div class="col-md-6 col-sm-12 col-xs-12 ad-verticalalignmiddle">
                                <figure class="ad-widgetimgbox">

                                  <?php if( !empty( $image ) ){ ?>

                                    <img src="<?php echo $image; ?>" class="img" alt="<?php echo esc_attr( $image_alt ); ?>">

                                  <?php } ?>

                                </figure>
                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 ad-verticalalignmiddle">
                                <div class="ad-widgettextbox">

                                  <?php if( !empty(  $single_plan['plan_heading'] ) ){ ?>

                                    <h3 style="color: <?php esc_attr_e(  $single_plan['text_color'] ); ?>"><?php esc_html_e(  $single_plan['plan_heading'], 'advisor-core'); ?></h3>

                                  <?php } ?>

                                  <div class="ad-description">

                                    <?php if( !empty( $single_plan['plan_text1'] ) ){ ?>

                                      <p style="color: <?php esc_attr_e( $single_plan['text_color'] ); ?>"><?php _e( $single_plan['plan_text1'] , 'advisor-core'); ?></p>

                                    <?php } ?>

                                    <?php if( !empty( $single_plan['plan_text2']  ) ){ ?>

                                      <p style="color: <?php esc_attr_e( $single_plan['text_color'] ); ?>"><?php _e( $single_plan['plan_text2'] , 'advisor-core'); ?></p>

                                    <?php } ?>

                                  </div>
                                  <div class="ad-btnbox">

                                    <?php if( !empty( $single_plan['button_text'] ) ){ ?>

                                      <a href="<?php echo $single_plan['button_link']; ?>" class="btn btn-bordered-dark" style="background: <?php esc_attr_e( $single_plan['button_bg_color'] ); ?>;"
                                        onMouseOver="this.style.background='<?php esc_attr_e( $single_plan['button_hover_bg_color'] ); ?>'"
                                        onMouseOut="this.style.background='<?php esc_attr_e( $single_plan['button_bg_color'] ); ?>'"
                                        data-text="<?php esc_html_e( $single_plan['button_text'] , 'advisor-core'); ?>"><?php esc_html_e( $single_plan['button_text'] , 'advisor-core'); ?></a>

                                    <?php } ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>

                        <?php } ?>

          						</ol>
          					</div>

          					<div class="timeline">
          						<div class="events-wrapper">
          							<div class="events">
          								<ol>

                            <?php $i = 0; ?>

                            <?php foreach( $plan as $single_plan ) { ?>

                              <li><a href="#0" class="<?php if( $i == 0 ) { echo 'selected'; } ?>" data-date="<?php esc_attr_e( $single_plan['plan_date'] ); ?>"><?php echo $single_plan['plan_heading']; ?></a></li>

                              <?php $i = 1; ?>

                            <?php } ?>

          								</ol>
          								<span class="filling-line" aria-hidden="true"></span>
          							</div>
          						</div>

          						<ul class="cd-timeline-navigation">
          							<li><a href="#0" class="prev inactive"><?php esc_html_e('Prev', 'advisor'); ?></a></li>
          							<li><a href="#0" class="next"><?php esc_html_e('Next', 'advisor'); ?></a></li>
          						</ul>
          					</div>

          				</div>
          			</div>
          		</div>
          	</section>
          	<!--************************************
          			Investing Plan End
          	*************************************-->

					<?php

      		 return ob_get_clean();
      	}
      }
      add_shortcode('advisor_investment_planning', 'advisor_company_planning');

      // Visual Composer Map
      function advisor_vc_map_planning()
      {

      		vc_map(
          array(
      			'name'										=> esc_html__( 'Advisor Investment Plan', 'advisor-core' ),
      			'base' 				      		  => 'advisor_investment_planning',
      			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
      			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
      			'show_settings_on_create' => true,
      			'content_element' 		  	=> true,
      			'is_container' 			  		=> false,
              'params' => array(

      					array(
      							"type" 					=> "textfield",
      							"heading" 			=> esc_html__("Heading", 'advisor-core'),
      							"param_name"		=> "heading",
      							"description"		=> esc_html__("Enter heading here.", 'advisor-core')
      					),
      					array(
      							"type" 					=> "textfield",
      							"heading" 			=> esc_html__("Text", 'advisor-core'),
      							"param_name"		=> "text",
      							"description"		=> esc_html__("Enter text here. This will display under heading.", 'advisor-core')
      					),
      					array(
      						 "type" => "colorpicker",
      						 "class" => "",
      						 "heading" => __( "Text Color", 'advisor-core' ),
      						 "param_name" => "text_color",
      						 "value" => '#000000',
      						 "description" => __( "Choose the Color for the heading and text.", 'advisor-core' )
      					),


                  // params group
                  array(

                      'type' => 'param_group',
      								"heading" 			=> __("Add a Investment Plan", 'advisor-core'),
      								"description"		=> __("Add a plan item here.", 'advisor-core'),
                      'param_name' 		=> 'plan',
                      'params' => array(

                          array(
                            "type" 					=> "attach_image",
                            "heading" 			=> __("Add Image", 'advisor-core'),
                            "param_name" 		=> "image",
                            "description" => __("Add item's image here", 'advisor-core')
                          ),
                          array(
                              'type' 				=> 'textfield',
                              'value' 			=> '',
                              'heading' 		=> esc_html__("Heading", 'advisor-core'),
                              'param_name' 	=> 'plan_heading',
                          ),
                          array(
                              'type' 				=> 'textfield',
                              'value' 			=> '',
                              'heading' 		=> esc_html__("Date", 'advisor-core'),
                              'param_name' 	=> 'plan_date',
                              "description"		=> __("Use this format Day/Month/Year e.g. 16/01/2014.", 'advisor-core'),
                          ),
                          array(
                              'type' 				=> 'textfield',
                              'value' 			=> '',
                              'heading' 		=> esc_html__("Text 1", 'advisor-core'),
                              'param_name' 	=> 'plan_text1',
                          ),
                          array(
                              'type' 				=> 'textfield',
                              'value' 			=> '',
                              'heading' 		=> esc_html__("Text 2", 'advisor-core'),
                              'param_name' 	=> 'plan_text2',
                          ),
                          array(
                    				 "type" => "colorpicker",
                    				 "class" => "",
                    				 "heading" => __( "Text Color", 'advisor-core' ),
                    				 "param_name" => "text_color",
                    				 "value" => '#000000',
                    				 "description" => __( "Choose the Color for the heading an the text.", 'advisor-core' )
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
                    				 "value" => '#fff',
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


                      )
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

      add_action( 'vc_before_init', 'advisor_vc_map_planning' );
      ////https//wpbakery.at

      ?>
