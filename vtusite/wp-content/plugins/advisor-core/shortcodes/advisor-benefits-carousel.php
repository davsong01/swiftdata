<?php
if ( ! function_exists( 'advisor_benefits_carousel' ) ) {

	function advisor_benefits_carousel( $atts , $content = NULL ){

		extract( shortcode_atts( array(

				'class_name'         => '',
				'autoplay'           => 'true',
				'autoplay_time_out'  => '',

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

        <section class="text-center <?php esc_attr_e( $class_name ); ?>">
				<div class="container">
					<div class="two-items-carousel owl-carousel" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>">
            <?php echo do_shortcode($content); ?>
          </div>
        </div>
       </section>

    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_benefits', 'advisor_benefits_carousel');

if ( ! function_exists( 'advisor_benefits_item' ) ) {

	function advisor_benefits_item( $atts , $content =  NULL ){

		extract( shortcode_atts( array(

				'image'                => '',
				'image_link'           => '',
				'image_position'	     => 'top',
				'heading'              => '',
				'text'                 => '',
				'text_color'				 => '#000000',
				'animate'              => ''

			), $atts ) );

			if( !empty( $image ) ) {

				$image = wp_get_attachment_url( $image , array(500,450) , false );
				$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

			} else {

				$image = "";

			}
			if( !empty( $image_link ) ){

				$image_link = $image_link;

			}
			else {

				$image_link = '#';

			}
			if( !empty( $animate ) ){

				$animate = 'animate' . ' ' . $animate;

			}
			else {

				$animate = '';

			}

			if( isset($image_position) && !empty( $image_position )){

				$image_position = $image_position;

			}
			else {

				$image_position = 'bottom';

			}

			ob_start(); ?>

            <div class="image-and-text-box <?php echo $animate; ?>">

                <?php if( !empty( $image ) && $image_position == 'top'  ){ ?>

										<div class="bordered-thumb"><a href="<?php echo $image_link; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a></div>

                <?php } ?>
                <?php if( !empty( $heading ) ){ ?>

										<h3><a href="<?php echo $image_link; ?>" style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></a></h3>

               <?php } ?>
              <?php if( !empty( $text ) ){ ?>

										<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>

              <?php } ?>

              <?php if( !empty( $image ) && $image_position == 'bottom'  ){ ?>

							<div class="bordered-thumb"><a href="<?php echo $image_link; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></a></div>

              <?php } ?>

						</div>
          <?php

		 return ob_get_clean();
	}
}
add_shortcode('benefits_item', 'advisor_benefits_item');

// Visual Composer Map
function advisor_vc_map_benefits()
{
vc_map( array(

		'name'										=> esc_html__( 'Advisor Benefits', 'advisor-core' ),
		'base' 				      		  => 'advisor_benefits',
		'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'as_parent' 			  			=> array('only' => 'benefits_item'),
		'show_settings_on_create' => false,
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
									 "heading" 			=> __("Extra Class Name", 'advisor-core'),
									 "param_name"		=> "class_name",
									 "description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
							 ),
			)

  	)
   );

vc_map( array(

    "name" 										=> __("Benefits Item", 'advisor-core'),
    "base" 										=> "benefits_item",
    "content_element"   			=> true,
		"icon"                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
    "as_child" 								=> array('only' => 'advisor_benefits'),
		"show_settings_on_create" => true,
		"is_container" 						=> true,
    "params" => array(
				array(
		        "type" 					=> "attach_image",
		        "heading" 			=> __("Add Image", 'advisor-core'),
		        "param_name"		=> "image",
		        "description"		=> __("Add image to on top or below. The image size should be 450x350 approx.", 'advisor-core')
				    ),
				array(

		        "type"					=> "textfield",
		        "heading" 			=> __("Link To Page", 'advisor-core'),
		        "param_name"		=> "image_link",
		        "description"   => __("Add extertnal link for image here, it will be redirected on click", 'advisor-core')

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
						 "description" => __("Enter the text to show below the heading.", 'advisor-core')
					 ),
			 array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Text Color", 'advisor-core' ),
					"param_name" => "text_color",
					"value" => '#000000',
					"description" => __( "Choose the Color for the heading and text.", 'advisor-core' )
			 ),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Animation Effect', 'advisor-core' ),
						'param_name' 		=> 'animate',
						"description" 	=> esc_html__("Select effect, make sure to select this for first two items with different effects, it will work when animations are enabled in theme options.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Select Animation', 'advisor-core' ) 	=> '',
								esc_html__( 'Fade-In Left', 'advisor-core' )  			=> 'fadeInLeft',
								esc_html__( 'Fade-In Right', 'advisor-core' )  		=> 'fadeInRight',
					   )
				),
				array(
						'type' 					=> 'dropdown',
						'heading' 			=> esc_html__( 'Image Position', 'advisor-core' ),
						'param_name' 		=> 'image_position',
						'value' => array(

							esc_html__( 'Top', 'advisor-core' ) 		  => 'top',
							esc_html__( 'Bottom', 'advisor-core' )  	=> 'bottom',

						)
				),

		)

) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_advisor_benefits extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_benefits_item extends WPBakeryShortCode {
    }
}


}

add_action( 'vc_before_init', 'advisor_vc_map_benefits' );
?>
