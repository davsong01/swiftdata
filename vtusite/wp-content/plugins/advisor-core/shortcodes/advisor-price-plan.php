<?php
/**
 * Shortcode: Price Plan
 *
 */
 if ( ! function_exists( 'advisor_product_price_plan' ) ) {
	function advisor_product_price_plan( $atts, $content = null ) {
	    extract( shortcode_atts( array(

      'heading'  					            =>  '',
      'text' 			                    =>  '',
			'text_color' 		                =>  '#000',

      //Price Column 1 Options
      'price_col_one_heading'  =>  '',
      'price_col_one_text'     =>  '',
      'price_col_one_content_color'     =>  '#000',
      'price_col_one_currency'  			=>  '',
      'price_col_one_period'  			=>  '',
      'price_col_one_price'  					=>  '',
      'price_col_one_line_1'          =>  '',
      'price_col_one_line_2' 				  =>  '',
      'price_col_one_line_3'      	  =>  '',
			'price_col_one_line_4'      	  =>  '',
			'price_col_one_btn_text'    	  =>  '',
			'price_col_one_btn_link'     	  =>  '#',
      'price_col_one_btn_color'   	  =>  '#ffffff',
			'price_col_one_btn_hover_color'	=>  '#121212',

      //Price Column 2 Options
      'price_col_two_heading'  =>  '',
      'price_col_two_text'     =>  '',
      'price_col_two_content_color'     =>  '#000',
      'price_col_two_currency'  			=>  '',
      'price_col_two_period'  			=>  '',
      'price_col_two_price'  					=>  '',
      'price_col_two_line_1'          =>  '',
      'price_col_two_line_2' 				  =>  '',
      'price_col_two_line_3'      	  =>  '',
      'price_col_two_line_4'      	  =>  '',
      'price_col_two_btn_text'    	  =>  '',
      'price_col_two_btn_link'     	  =>  '#',
      'price_col_two_btn_color'   	  =>  '#ffffff',
      'price_col_two_btn_hover_color'	=>  '#121212',


      //Price Column 3 Options
      'price_col_three_heading'  =>  '',
      'price_col_three_text'     =>  '',
      'price_col_three_content_color'     =>  '#000',
      'price_col_three_currency'  			=>  '',
      'price_col_three_period'  			=>  '',
      'price_col_three_price'  					=>  '',
      'price_col_three_line_1'          =>  '',
      'price_col_three_line_2' 				  =>  '',
      'price_col_three_line_3'      	  =>  '',
			'price_col_three_line_4'      	  =>  '',
			'price_col_three_btn_text'    	  =>  '',
			'price_col_three_btn_link'     	  =>  '#',
      'price_col_three_btn_color'   	  =>  '#ffffff',
			'price_col_three_btn_hover_color'	=>  '#121212',



	    ), $atts ) );



    ob_start(); ?>


    <!--************************************
        Pricing Plan Start
    *************************************-->
    <section class="ad-sectionpadding ad-haslayout">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-xs-12">
            <div class="ad-sectionhead text-center">
              <div class="ad-sectiontitle">

                <?php if( !empty( $heading ) ){ ?>

                   <h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h2>

                <?php } ?>

              </div>
              <div class="ad-description">


                <?php if( !empty( $text ) ){ ?>

                  <p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>

                <?php } ?>

                </div>
            </div>
          </div>
          <div class="ad-pricingplans">

            <div class="col-sm-4">
              <div class="ad-pricingplan text-center">
                <div class="ad-pricingplanhead">

                  <?php if( !empty( $price_col_one_heading ) ){ ?>

                     <h3><?php esc_html_e( $price_col_one_heading , 'advisor-core'); ?></h3>

                  <?php } ?>

                  <?php if( !empty( $price_col_one_text ) ){ ?>

                     <h4 style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>"><?php esc_html_e( $price_col_one_text , 'advisor-core'); ?></h4>

                  <?php } ?>

                </div>
                <div class="ad-price">
                  <span ><sup style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>">
                    <?php if( !empty( $price_col_one_currency ) ) esc_html_e( $price_col_one_currency , 'advisor-core'); ?>
                  </sup>
                  <?php if( !empty( $price_col_one_price ) ) esc_html_e( $price_col_one_price , 'advisor-core'); ?>
                   <sub style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>">/
                     <?php if( !empty( $price_col_one_period ) ) esc_html_e( $price_col_one_period , 'advisor-core'); ?>
                   </sub>
                 </span>
                </div>
                <ul>
                  <?php if( !empty( $price_col_one_line_1 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>"><?php esc_html_e( $price_col_one_line_1 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_one_line_2 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>"><?php esc_html_e( $price_col_one_line_2 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_one_line_3 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>"><?php esc_html_e( $price_col_one_line_3 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_one_line_4 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_one_content_color ); ?>"><?php esc_html_e( $price_col_one_line_4 , 'advisor-core'); ?></li><?php } ?>
                </ul>
                <div class="ad-btnbox">

                  <?php if( !empty( $price_col_one_btn_text ) ){ ?>

                    <a href="<?php echo $price_col_one_btn_link; ?>" class="btn btn-bordered-dark" data-text="<?php esc_html_e( $price_col_one_btn_text , 'advisor-core'); ?>"
                      style="background: <?php esc_attr_e( $price_col_one_btn_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $price_col_one_btn_hover_color); ?>';"
                      onMouseOut="this.style.background='<?php esc_attr_e( $price_col_one_btn_color); ?>';">
                      <?php esc_html_e( $price_col_one_btn_text , 'advisor-core'); ?></a>

                  <?php } ?>

                </div>
              </div>
            </div>



            <div class="col-sm-4">
              <div class="ad-pricingplan text-center">
                <div class="ad-pricingplanhead">

                  <?php if( !empty( $price_col_two_heading ) ){ ?>

                     <h3><?php esc_html_e( $price_col_two_heading , 'advisor-core'); ?></h3>

                  <?php } ?>

                  <?php if( !empty( $price_col_two_text ) ){ ?>

                     <h4 style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>"><?php esc_html_e( $price_col_two_text , 'advisor-core'); ?></h4>

                  <?php } ?>

                </div>
                <div class="ad-price">
                  <span><sup style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>">
                    <?php if( !empty( $price_col_two_currency ) ) esc_html_e( $price_col_two_currency , 'advisor-core'); ?>
                  </sup>
                  <?php if( !empty( $price_col_two_price ) ) esc_html_e( $price_col_two_price , 'advisor-core'); ?>
                   <sub style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>">/
                     <?php if( !empty( $price_col_two_period ) ) esc_html_e( $price_col_two_period , 'advisor-core'); ?>
                   </sub>
                 </span>
                </div>
                <ul>
                  <?php if( !empty( $price_col_two_line_1 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>"><?php esc_html_e( $price_col_two_line_1 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_two_line_2 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>"><?php esc_html_e( $price_col_two_line_2 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_two_line_3 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>"><?php esc_html_e( $price_col_two_line_3 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_two_line_4 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_two_content_color ); ?>"><?php esc_html_e( $price_col_two_line_4 , 'advisor-core'); ?></li><?php } ?>
                </ul>
                <div class="ad-btnbox">

                  <?php if( !empty( $price_col_two_btn_text ) ){ ?>

                    <a href="<?php echo $price_col_two_btn_link; ?>" class="btn btn-bordered-dark" data-text="<?php esc_html_e( $price_col_two_btn_text , 'advisor-core'); ?>"
                      style="background: <?php esc_attr_e( $price_col_two_btn_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $price_col_two_btn_hover_color); ?>';"
                      onMouseOut="this.style.background='<?php esc_attr_e( $price_col_two_btn_color); ?>';">
                      <?php esc_html_e( $price_col_two_btn_text , 'advisor-core'); ?></a>

                  <?php } ?>

                </div>
              </div>
            </div>



            <div class="col-sm-4">
              <div class="ad-pricingplan text-center">
                <div class="ad-pricingplanhead">

                  <?php if( !empty( $price_col_three_heading ) ){ ?>

                     <h3><?php esc_html_e( $price_col_three_heading , 'advisor-core'); ?></h3>

                  <?php } ?>

                  <?php if( !empty( $price_col_three_text ) ){ ?>

                     <h4 style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>"><?php esc_html_e( $price_col_three_text , 'advisor-core'); ?></h4>

                  <?php } ?>

                </div>
                <div class="ad-price">
                  <span><sup style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>">
                    <?php if( !empty( $price_col_three_currency ) ) esc_html_e( $price_col_three_currency , 'advisor-core'); ?>
                  </sup style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>">
                  <?php if( !empty( $price_col_three_price ) ) esc_html_e( $price_col_three_price , 'advisor-core'); ?>
                   <sub style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>">/
                     <?php if( !empty( $price_col_three_period ) ) esc_html_e( $price_col_three_period , 'advisor-core'); ?>
                   </sub>
                 </span>
                </div>
                <ul>
                  <?php if( !empty( $price_col_three_line_1 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>"><?php esc_html_e( $price_col_three_line_1 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_three_line_2 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>"><?php esc_html_e( $price_col_three_line_2 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_three_line_3 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>"><?php esc_html_e( $price_col_three_line_3 , 'advisor-core'); ?></li><?php } ?>
                  <?php if( !empty( $price_col_three_line_4 ) ) { ?><li style="color: <?php esc_attr_e( $price_col_three_content_color ); ?>"><?php esc_html_e( $price_col_three_line_4 , 'advisor-core'); ?></li><?php } ?>
                </ul>
                <div class="ad-btnbox">

                  <?php if( !empty( $price_col_three_btn_text ) ){ ?>

                    <a href="<?php echo $price_col_three_btn_link; ?>" class="btn btn-bordered-dark" data-text="<?php esc_html_e( $price_col_three_btn_text , 'advisor-core'); ?>"
                      style="background: <?php esc_attr_e( $price_col_three_btn_color ); ?>;"
                      onMouseOver="this.style.background='<?php esc_attr_e( $price_col_three_btn_hover_color); ?>';"
                      onMouseOut="this.style.background='<?php esc_attr_e( $price_col_three_btn_color); ?>';">
                      <?php esc_html_e( $price_col_three_btn_text , 'advisor-core'); ?></a>

                  <?php } ?>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </section>
    <!--************************************
        Pricing Plan End
    *************************************-->

    <?php
    return ob_get_clean();
	}
}
add_shortcode('advisor_price_plan', 'advisor_product_price_plan');


    /* ====== Product Price Plan with Visual Composer options ====== */
    if ( ! function_exists( 'advisor_product_price_plan_vc_mapping' ) ) {
      function advisor_product_price_plan_vc_mapping() {
    	$vc_map_product_price_plan = array (
    	'name'       => esc_html__( "Advisor Price Plan", "advisor"),
    	'base'       => "advisor_price_plan",
    	'category'   => esc_html__("Advisor Theme", "advisor"),
      'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
    	'params' => array(

          array(
              "type" 					=> "textfield",
              "heading" 			=> esc_html__("Heading", 'advisor-core'),
              "param_name"		=> "heading",
              "description" 	=> __("Enter Heading here" , 'advisor-core'),
              ),

          array(
              "type" 					=> "textfield",
              "heading" 			=> esc_html__("Text Below Heading", 'advisor-core'),
              "param_name" 		=> "text",
              "description" 	=> esc_html__("Enter some text to show below the heading.", 'advisor-core'),
            ),
            array(
               "type" => "colorpicker",
               "class" => "",
               "heading" => __( "Text Color", 'advisor-core' ),
               "param_name" => "text_color",
               "value" => '#000000',
               "description" => __( "Choose the Color for the heading only.", 'advisor-core' )
            ),


            //Price Column One VC Fields
              array(
        			  "type" => "textfield",
        			  "holder" => "div",
        			  "class" => "",
        			  "heading" => esc_html__( "Price Column one Heading.", "advisor"),
        			  "param_name" => "price_col_one_heading",
                "description"		=> esc_html__("e.g. Basic etc.", "advisor")
        			),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column one Text.", "advisor"),
                "param_name" => "price_col_one_text",
                "description" 	=> esc_html__("Enter some text to show below the heading.", 'advisor-core'),
              ),
              array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Price Column one Text Content Color", "advisor"),
                "param_name" => "price_col_one_content_color",
                "value"      => '#000',
                "description"		=> esc_html__("This Color Will be Applied to all the text of column one except heading.", "advisor")
              ),
        			array(
        				"type" => "textfield",
        				"holder" => "div",
        				"class" => "",
        				"heading" => esc_html__( "Price Column one Currency Symbol", "advisor"),
        				"param_name" => "price_col_one_currency",
                "description"		=> esc_html__("e.g. $ etc.", "advisor")
        			),
        			array(
        				"type" => "textfield",
        				"holder" => "div",
        				"class" => "",
        				"heading" => esc_html__( "Price Column one Price Amount.", "advisor"),
        				"param_name" => "price_col_one_price"
        			),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column one Period.", "advisor"),
                "param_name" => "price_col_one_period",
                "description"		=> esc_html__("e.g. Month, Year etc.", "advisor")
              ),
            array(
      			  "type" => "textfield",
      			  "holder" => "div",
      			  "class" => "",
      			  "heading" => esc_html__( "Price Column one Important Line 1, if any", "advisor"),
      			  "param_name" => "price_col_one_line_1",

      			),
            array(
      			  "type" => "textfield",
      			  "holder" => "div",
      			  "class" => "",
      			  "heading" => esc_html__( "Price Column one Important Line 2, if any", "advisor"),
      			  "param_name" => "price_col_one_line_2",

      			),
      			array(
      				"type" => "textfield",
      				"holder" => "div",
      				"class" => "",
      				"heading" => esc_html__( "Price Column one Important Line 3, if any", "advisor"),
      				"param_name" => "price_col_one_line_3",

      			),
      			array(
      				"type" => "textfield",
      				"holder" => "div",
      				"class" => "",
      				"heading" => esc_html__( "Price Column one Important Line 4, if any", "advisor"),
      				"param_name" => "price_col_one_line_4",

      			),
      			array(
      				"type" => "textfield",
      				"holder" => "div",
      				"class" => "",
      				"heading" => esc_html__( "Price Column one Button Text", "advisor"),
      				"param_name" => "price_col_one_btn_text"
      			),
      			array(
      				"type" => "textfield",
      				"holder" => "div",
      				"class" => "",
      				"heading" => esc_html__( "Price Column one Button URL", "advisor"),
      				"param_name" => "price_col_one_btn_link",
      				"description"		=> esc_html__("This Field is must Required in order to Show this Button.", "advisor")
      			),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column one Button Background Color", "advisor"),
              "value"      => '#ffffff',
              "param_name" => "price_col_one_btn_color",
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column one Button Hover Color", "advisor"),
              "value"      => '#121212',
              "param_name" => "price_col_one_btn_hover_color",
            ),



            //Price Column Two VC Fields
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column two Heading.", "advisor"),
                "param_name" => "price_col_two_heading",
                "description"		=> esc_html__("e.g. Standard etc.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column two Text.", "advisor"),
                "param_name" => "price_col_two_text",
                "description" 	=> esc_html__("Enter some text to show below the heading.", 'advisor-core'),
              ),
              array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Price Column two Text Content Color", "advisor"),
                "param_name" => "price_col_two_content_color",
                "value"      => '#000',
                "description"		=> esc_html__("This Color Will be Applied to all the text of column two except heading.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column two Currency Symbol", "advisor"),
                "param_name" => "price_col_two_currency",
                "description"		=> esc_html__("e.g. $ etc.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column two Price Amount.", "advisor"),
                "param_name" => "price_col_two_price"
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column two Period.", "advisor"),
                "param_name" => "price_col_two_period",
                "description"		=> esc_html__("e.g. Month, Year etc.", "advisor")
              ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Important Line 1, if any", "advisor"),
              "param_name" => "price_col_two_line_1",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Important Line 2, if any", "advisor"),
              "param_name" => "price_col_two_line_2",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Important Line 3, if any", "advisor"),
              "param_name" => "price_col_two_line_3",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Important Line 4, if any", "advisor"),
              "param_name" => "price_col_two_line_4",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Button Text", "advisor"),
              "param_name" => "price_col_two_btn_text"
            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column two Button URL", "advisor"),
              "param_name" => "price_col_two_btn_link",
              "description"		=> esc_html__("This Field is must Required in order to Show this Button.", "advisor")
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column two Button Background Color", "advisor"),
              "value"      => '#ffffff',
              "param_name" => "price_col_two_btn_color",
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column two Button Hover Color", "advisor"),
              "value"      => '#121212',
              "param_name" => "price_col_two_btn_hover_color",
            ),



            //Price Column two VC Fields
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column three Heading.", "advisor"),
                "param_name" => "price_col_three_heading",
                "description"		=> esc_html__("e.g. Enterprise etc.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column three Text.", "advisor"),
                "param_name" => "price_col_three_text",
                "description" 	=> esc_html__("Enter some text to show below the heading.", 'advisor-core'),
              ),
              array(
                "type" => "colorpicker",
                "heading" => esc_html__( "Price Column three Text Content Color", "advisor"),
                "param_name" => "price_col_three_content_color",
                "value"      => '#000',
                "description"		=> esc_html__("This Color Will be Applied to all the text of column three except heading.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column three Currency Symbol", "advisor"),
                "param_name" => "price_col_three_currency",
                "description"		=> esc_html__("e.g. $ etc.", "advisor")
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column three Price Amount.", "advisor"),
                "param_name" => "price_col_three_price"
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__( "Price Column three Period.", "advisor"),
                "param_name" => "price_col_three_period",
                "description"		=> esc_html__("e.g. Month, Year etc.", "advisor")
              ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Important Line 1, if any", "advisor"),
              "param_name" => "price_col_three_line_1",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Important Line 2, if any", "advisor"),
              "param_name" => "price_col_three_line_2",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Important Line 3, if any", "advisor"),
              "param_name" => "price_col_three_line_3",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Important Line 4, if any", "advisor"),
              "param_name" => "price_col_three_line_4",

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Button Text", "advisor"),
              "param_name" => "price_col_three_btn_text"
            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_html__( "Price Column three Button URL", "advisor"),
              "param_name" => "price_col_three_btn_link",
              "description"		=> esc_html__("This Field is must Required in order to Show this Button.", "advisor")
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column three Button Background Color", "advisor"),
              "value"      => '#ffffff',
              "param_name" => "price_col_three_btn_color",
            ),
            array(
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_html__( "Price Column three Button Hover Color", "advisor"),
              "value"      => '#121212',
              "param_name" => "price_col_one_btn_hover_color",
            ),


    		)
    	); // main array end here
    	vc_map( $vc_map_product_price_plan );
      }
    }
    add_action("vc_before_init", "advisor_product_price_plan_vc_mapping");
?>
