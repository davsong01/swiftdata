<?php
if ( ! function_exists( 'advisor_heading_right_text_left' ) ) {

	function advisor_heading_right_text_left( $atts ){

		extract( shortcode_atts( array(

				'class_name'           => '',
				'heading'              => '',
				'heading_color'        => '#000000',
				'text'                 => '',
				'text_color'   				 => '#000000',

			), $atts ) );

			ob_start(); ?>

			<section class="padding-bottom-0 <?php echo $class_name; ?>">
				<div class="container">
					<div class="row">

						<?php if( !empty( $heading ) ){ ?>

						<div class="col-md-4">
							<h2 class="doing-the-right-text" style="color: <?php esc_attr_e( $heading_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>
						</div>

						<?php } ?>
						<?php if( !empty( $text ) ){ ?>

						<div class="col-md-8">
							<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>
						</div>

							<?php } ?>
					</div>
				</div>
			</section>
      <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_heading_text', 'advisor_heading_right_text_left');


// Visual Composer Map
function advisor_vc_heading_text_rl()
{
vc_map( array(
		'name' 										=> esc_html__( 'Advisor Heading+Text', 'advisor-core' ),
		'base' 										=> 'advisor_heading_text',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
    'is_container' 						=> false,
		'params' 						=> array(

			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Heading Right", 'advisor-core'),
				"param_name" 		=> "heading",
				"description" 	=> __("Add heading here", 'advisor-core')
			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Heading Right Text Color", 'advisor-core' ),
				 "param_name" => "heading_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the heading.", 'advisor-core' )
			),
			array(
				"type" 					=> "textarea",
				"heading" 			=> __("Text Left", 'advisor-core'),
				"param_name"		=> "text",
				"description" 	=> __("Add text here", 'advisor-core')
			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Text Left Text Color", 'advisor-core' ),
				 "param_name" => "text_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the text.", 'advisor-core' )
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
}

add_action( 'vc_before_init', 'advisor_vc_heading_text_rl' );


?>
