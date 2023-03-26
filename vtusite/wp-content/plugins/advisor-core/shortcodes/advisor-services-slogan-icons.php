<?php
if ( ! function_exists( 'advisor_services_slogan_grid' ) ) {

	function advisor_services_slogan_grid( $atts , $content = NULL ){

		extract( shortcode_atts( array(

			'class_name'           => '',
			'text_color'			     => '#fff',
			'heading'              => '',
			'text'                 => '',
			'text_align'           => 'center',
			'bg_image'             => ''

		), $atts ) );

		if( !empty( $bg_image ) ){

			$bg_image = $bg_image = wp_get_attachment_url($bg_image , 'full', false);

			 if(!empty( $bg_image ) ) {
			?>

				<style>

				.different-services{
					background: url(<?php echo $bg_image; ?>) no-repeat center 0;
					background-attachment: fixed;
					background-size:cover;
			    height: auto;
				}

				</style>
			<?php
			}

		} else {

			$bg_image = '';

		}

			ob_start(); ?>

			<!-- DIFFERENT SERVICES -->
				<section class="different-services text-center parallax <?php echo $class_name; ?>">
						<div class="container">
								<div class="heading animate bounceIn " <?php if ( !empty( $text_align ) ) { ?> style="text-align: <?php esc_attr_e( $text_align );?>" <?php } ?>>
										<?php if( !empty( $heading ) ){ ?>

										<h1 class="color-white" style="color: <?php esc_attr_e( $text_color); ?> !important;"><?php esc_html_e( $heading , 'advisor-core'); ?></h1>

										<?php } ?>
										<?php if( !empty( $text ) ){ ?>

										<p class="color-white" style="color: <?php esc_attr_e( $text_color); ?> !important;"><?php _e( $text , 'advisor-core'); ?></p>

										<?php } ?>

										<?php echo do_shortcode( $content ); ?>

								</div>
						</div>
				</section><!-- / DIFFERENT SERVICES -->

      <?php return ob_get_clean();
	}
}
add_shortcode('services_slogan_parent', 'advisor_services_slogan_grid');

if ( ! function_exists( 'services_slogan_grid_item' ) ) {

	function services_slogan_grid_item( $atts , $content =  NULL ){

		extract( shortcode_atts( array(

			'item_class'         => '',
			'item_heading'       => '',
			'item_text'          => '',
			'item_text_color'		 => '#fff',
			'text_align'         => 'center',

			), $atts ) );

			ob_start(); ?>

			<div class="col-md-4 col-sm-4 col-xs-12 bg_text_box p-t-80" <?php if ( !empty( $text_align ) ) { ?> style="text-align: <?php esc_attr_e( $text_align );?>" <?php } ?>>
				<?php if( !empty( $item_class) ) { ?><i class="<?php esc_attr_e( $item_class ); ?>"></i><?php } ?>
				<br><br>

				<?php if( !empty( $item_heading ) ){ ?>

				<h3 class="color-white" style="color: <?php esc_attr_e( $item_text_color); ?> !important;"><?php esc_html_e( $item_heading , 'advisor-core'); ?></h3>

				<?php } ?>

				<?php if( !empty( $item_text ) ){ ?>

				<p class="color-white" style="color: <?php esc_attr_e( $item_text_color); ?> !important;"><?php _e( $item_text , 'advisor-core'); ?></p>

				<?php } ?>

			</div>

    <?php return ob_get_clean();

	}
}
add_shortcode('services_slogan_child', 'services_slogan_grid_item');

// Visual Composer Map
function advisor_vc_map_services_slogan_grid()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor Service Slogan Icons', 'advisor-core' ),
			'base' 				      		  => 'services_slogan_parent',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'as_parent' 			  			=> array('only' => 'services_slogan_child'),
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,
			'js_view' 				  			=> 'VcColumnView',
			'params'                  => array (

				array(

								"type"        => "textfield",
								"heading"     => __("Heading", 'advisor-core'),
								"param_name"  => "heading",
								"description" => __("Add heading here", 'advisor-core')
						),
				array(
								"type" 				=> "textarea",
								"heading" 		=> __("Text", 'advisor-core'),
								"param_name" 	=> "text",
								"description" => __("Add text here", 'advisor-core')
						),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Text Color", 'advisor-core' ),
					 "param_name" => "text_color",
					 "value" => '#ffffff',
					 "description" => __( "Choose the Color for the heading and text.", 'advisor-core' )
				),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Text Align', 'advisor-core' ),
						'param_name' 		=> 'text_align',
						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
						"default" => 'center',
						'value' => array(

								esc_html__( 'Select Aligment', 'advisor-core' ) 	=> '',
								esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
								esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
						 ),
				),
				array(
								"type" 				=> "attach_image",
								"heading" 		=> __("Background Image", 'advisor-core'),
								"param_name" 	=> "bg_image",
								"description" => __("Add image here, please add full size image at least 1600x800 px approx", 'advisor-core')
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

	    "name" 										=> __("Advisor Service Slogan Item", 'advisor-core'),
	    "base" 										=> "services_slogan_child",
	    "content_element"   			=> true,
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
	    "as_child" 								=> array('only' => 'services_slogan_parent'),
			"show_settings_on_create" => true,
			'is_container' 						=> true,
	    "params" => array(

				array(
						"type" 					=> "textfield",
						"heading" 			=> __("Add flaticon icon class here", 'advisor-core'),
						"param_name"		=> "item_class",
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
						"value" => '#fff',
						"description" => __( "Choose the Color for the item's heading and description.", 'advisor-core' )
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

	) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_services_slogan_parent extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_services_slogan_child extends WPBakeryShortCode {
    }
}


}

add_action( 'vc_before_init', 'advisor_vc_map_services_slogan_grid' );
?>
