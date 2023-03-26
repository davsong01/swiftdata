<?php
if ( ! function_exists( 'advisor_partners_grid' ) ) {

	function advisor_partners_grid( $atts , $content = NULL ){

		extract( shortcode_atts( array(

				'class_name'     => '',
				'heading'        => '',
				'text'           => '',
				'description'    => '',
				'text_color'		 => '#000000',

			), $atts ) );


			ob_start(); ?>

		 <section id="testimonials" class="p-t-100 p-b-100 pag_pad <?php esc_attr_e( $class_name ); ?>">
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
										 <div class="row m-t-25">
												 <div class="col-md-12 m-b-25">
													 <?php if( !empty( $description ) ){ ?>

													  <p><?php _e( $description , 'advisor-core'); ?></p>

													 <?php } ?>

												 </div>

											 	<div class="partner-grid">
												 	<?php echo do_shortcode( $content ); ?>
												 </div>

										 </div>
								 </div>
						 </div>
				 </div>
		 </section>


      <?php
			return ob_get_clean();
	}
}
add_shortcode('advisor_partners_grid', 'advisor_partners_grid');

if ( ! function_exists( 'advisor_partners_item' ) ) {

	function advisor_partners_item( $atts , $content =  NULL ){

		extract( shortcode_atts( array(

				'image'                => '',

			), $atts ) );

			if( !empty( $image ) ) {

				$image = wp_get_attachment_url( $image , array(223,157) , false ); //165 × 85
				$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

			} else {

				$image = '';

			}

			ob_start(); ?>

				<?php	if( !empty( $image ) ) { ?><div class="col-md-4 partner_image"><img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>"></div><?php } ?>

    <?php
		return ob_get_clean();

	}
}
add_shortcode('partner_grid', 'advisor_partners_item');

// Visual Composer Map
function advisor_vc_map_partners_grid()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor Partners Grid', 'advisor-core' ),
			'base' 				      		  => 'advisor_partners_grid',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'as_parent' 			  			=> array('only' => 'partner_grid'),
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,
			'js_view' 				  			=> 'VcColumnView',
			'params'                  => array (

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
						"description"		=> esc_html__("Enter text here. This will display above heading.", 'advisor-core')
				),
				array(
						"type" 					=> "textfield",
						"heading" 			=> esc_html__("Description", 'advisor-core'),
						"param_name"		=> "description",
						"description"		=> esc_html__("Enter description here. This will display below heading.", 'advisor-core')
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
	    "base" 										=> "partner_grid",
	    "content_element"   			=> true,
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
	    "as_child" 								=> array('only' => 'advisor_partners_grid'),
			"show_settings_on_create" => true,
			'is_container' 						=> true,
	    "params" => array(


				 array(
			        "type" 					=> "attach_image",
			        "heading" 			=> __("Add Image/Logo", 'advisor-core'),
			        "param_name"		=> "image",
			        "description"		=> __("Add image logo for the company or the partner, image size 225x160px approx.", 'advisor-core')
					    ),

			)

	) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_advisor_partners_grid extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_partner_grid extends WPBakeryShortCode {
    }
}


}

add_action( 'vc_before_init', 'advisor_vc_map_partners_grid' );
?>
