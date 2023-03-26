<?php
if ( ! function_exists( 'advisor_partners_carousel' ) ) {

	function advisor_partners_carousel( $atts , $content = NULL ){

		extract( shortcode_atts( array(

				'class_name'     => '',
				'autoplay'           => 'true',
				'autoplay_time_out'  => '',
				'heading'        => '',
				'text'           => '',
				'partner_items'  => 2,
				'text_color'		 => '#000000',

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
			 <section class="<?php echo $class_name; ?>">
			 <div class="container">
			 <div class="heading margin-bottom-50 animate bounceIn">

				 <?php if( !empty( $heading ) ){ ?>

			 	 	<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

			   <?php } ?>
				 <?php if( !empty( $text ) ){ ?>

			  <p><?php _e( $text , 'advisor-core'); ?></p>

			 <?php } ?>
			 </div>
			 <div class="partner-items-carousel owl-carousel" data-autoplay="<?php esc_attr_e( $autoplay );?>" data-autoplay-timeout="<?php esc_attr_e( $autoplay_time_out );?>"  partner-items="<?php esc_attr_e( $partner_items );?>">

				 <?php echo do_shortcode( $content ); ?>

			 </div>
			 </div>
			 </section>
			 <!-- / OUR PARTNERS -->

      <?php
			return ob_get_clean();
	}
}
add_shortcode('advisor_partners', 'advisor_partners_carousel');

if ( ! function_exists( 'advisor_partners_item' ) ) {

	function advisor_partners_item( $atts , $content =  NULL ){

		extract( shortcode_atts( array(

				'company'              => '',
				'sub_text'          	 => '',
				'company_content'      => '',
				'company_text_color'	 => '#000000',
				'image'                => '',
				'animate'              => ''

			), $atts ) );

			if( !empty( $image ) ) {

				$image = wp_get_attachment_url( $image , array(223,157) , false );
				$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

			} else {

				$image = '';

			}
			if( !empty( $animate ) ){

				$animate = 'animate' . ' ' . $animate;

			}
			else {

				$animate = '';

			}
			ob_start(); ?>
				<div class="partner <?php echo $animate; ?>">
				<?php	if( !empty( $image ) ) { ?>

								<img src="<?php echo $image; ?>" alt="<?php echo esc_attr( $image_alt ); ?>">

							<?php } ?>
					<div class="partner-content">
						<?php if( !empty( $company ) ){ ?>

						<h4 style="color: <?php esc_attr_e( $company_text_color); ?>"><?php _e( $company , 'advisor-core'); ?>

							<?php if( !empty( $sub_text ) ){ ?>

							<span style="color: <?php esc_attr_e( $company_text_color); ?>"><?php _e( $sub_text , 'advisor-core'); ?></span>


							<?php } ?>
						</h4>

							<?php } ?>
						<?php if( !empty( $company_content ) ){ ?>

						<p style="color: <?php esc_attr_e( $company_text_color); ?>"><?php _e( $company_content , 'advisor-core'); ?></p>

							<?php } ?>

					</div>
			</div>
    <?php
		return ob_get_clean();

	}
}
add_shortcode('partner', 'advisor_partners_item');

// Visual Composer Map
function advisor_vc_map_partners()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor Partners Carousel', 'advisor-core' ),
			'base' 				      		  => 'advisor_partners',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'as_parent' 			  			=> array('only' => 'partner'),
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,
			'js_view' 				  			=> 'VcColumnView',
			'params'                  => array (

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
						"type"         => "textfield",
						"heading"      => esc_html__("Number of Partner items to Show on Desktop", 'advisor-core'),
						"param_name"   => "partner_items",
						"description"  => esc_html__("Default Value is 2 i.e shows 2 items in Carousel.", 'advisor-core'),
					  "value" 	   => 2,
					 ),
				array(
						"type" 					=> "textfield",
						"heading" 			=> esc_html__("Heading", 'advisor-core'),
						"param_name"		=> "heading",
						"description"		=> esc_html__("Enter heading text here.", 'advisor-core')
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
					 "description" => __( "Choose the Color for the heading only.", 'advisor-core' )
				),
				array(
						"type" 					=> "textfield",
						"heading" 			=> __("Extra Class Name", 'advisor-core'),
						"param_name"		=> "class_name",
						"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
				),


			),

			)
	);

	vc_map( array(

	    "name" 										=> __("Advisor Partner", 'advisor-core'),
	    "base" 										=> "partner",
	    "content_element"   			=> true,
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
	    "as_child" 								=> array('only' => 'advisor_partners'),
			"show_settings_on_create" => true,
			'is_container' 						=> true,
	    "params" => array(

					array(
					    "type"					=> "textfield",
					    "heading" 			=> __("Company Name", 'advisor-core'),
					    "param_name"    => "company",
					    "description"   => __("Enter company name,agency or partner name here", 'advisor-core')
					),
					array(
							 "type" 				=> "textfield",
							 "heading" 		  => __("Services Company Provides", 'advisor-core'),
							 "param_name" 	=> "sub_text",
							 "description"  => __("It is the service company provides, what services they provide, it can be slogan for that company also, shown under the company name.", 'advisor-core')
						 ),
				 array(
							 "type" 				=> "textarea",
							 "heading" 		  => __("Small Description", 'advisor-core'),
							 "param_name" 	=> "company_content",
							 "description"  => __("Small description about the partner company or agency.", 'advisor-core')
						 ),
				 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Company Content Text Color", 'advisor-core' ),
						"param_name" => "company_text_color",
						"value" => '#000000',
						"description" => __( "Choose the Color for the company name, services company provides and small description of the company content.", 'advisor-core' )
				 ),
				 array(
			        "type" 					=> "attach_image",
			        "heading" 			=> __("Add Image/Logo", 'advisor-core'),
			        "param_name"		=> "image",
			        "description"		=> __("Add image logo for the company or the partner, image size 225x160px approx.", 'advisor-core')
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
			)

	) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_advisor_partners extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_partner extends WPBakeryShortCode {
    }
}


}

add_action( 'vc_before_init', 'advisor_vc_map_partners' );
?>
