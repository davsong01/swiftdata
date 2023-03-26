<?php
			if ( ! function_exists( 'advisor_text_btn' ) ) {

				function advisor_text_btn( $atts ){

					extract( shortcode_atts( array(

						'class_name'    => '',
						'text'  				=> '',
						'text_color'		=> '#fff',
						'button_text'   => '',
						'button_link'   => '',
						'button_bg_color'      => '#09a223',
						'button_hover_bg_color'=> '#09a223',
						'background'   	=> 'light',

					), $atts ) );

					if( !empty( $button_text) ){

						$button_text = $button_text;

					}
					else {

						$button_text = '';

					}
					if( !empty( $button_link) ){

						$button_link = $button_link;

					}
					else {

						$button_link = '#';

					}
					if( $background == 'dark' ) {

						$button_classes = 'btn-white';

					 } else {

						$button_classes = 'btn-primary';

					} ?>
					<?php
					ob_start();
					?>

				<div class="contact-us-bar <?php echo $background; ?> <?php echo $class_name; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-9">

								<?php if( !empty( $text) ){ ?>

									<h4 class=" animate fadeInLeft" style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $text , 'advisor-core'); ?></h4>

								<?php } ?>


							</div>
							<div class="col-md-3">
								<div class="text-right">
									<a href="<?php echo esc_attr( $button_link ); ?>" class="btn <?php echo $button_classes; ?> get-in-touch animate fadeInRight"
										style="background: <?php esc_attr_e( $button_bg_color ); ?>;"
										onMouseOver="this.style.background='<?php esc_attr_e( $button_hover_bg_color); ?>'"
										onMouseOut="this.style.background='<?php esc_attr_e( $button_bg_color); ?>'"
										data-text="<?php echo esc_html_e($button_text , 'advisor-core'); ?>"><i class="icon-telephone114"></i><?php esc_html_e($button_text , 'advisor-core'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php
			return ob_get_clean();
			}
		}

add_shortcode('advisor_text_button', 'advisor_text_btn');

function advisor_vc_map_text_button()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Text Button', 'advisor-core' ),
		'base'     								=> 'advisor_text_button',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(

		array(

        "type"        => "textfield",
        "heading"     => __("Text On Right", 'advisor-core'),
        "param_name"  => "text",
        "description" => __("Add text here", 'advisor-core')
        ),
		array(
			 "type" => "colorpicker",
			 "class" => "",
			 "heading" => __( "Text Color", 'advisor-core' ),
			 "param_name" => "text_color",
			 "value" => '#fff',
			 "description" => __( "Choose the Color for the text.", 'advisor-core' )
		),
		array(
            "type" 				=> "textfield",
            "heading" 		=> __("Butoon Text/Label", 'advisor-core'),
            "param_name" 	=> "button_text",
            "description" => __("Add text here", 'advisor-core')
        ),
		array(
            "type" 				=> "textfield",
            "heading" 		=> __("Button Link", 'advisor-core'),
            "param_name" 	=> "button_link",
            "description" => __("Add button link here, you can add URL to any page.", 'advisor-core')
        ),
		array(
			 "type" => "colorpicker",
			 "class" => "",
			 "heading" => __( "Button Background Color", 'advisor-core' ),
			 "param_name" => "button_bg_color",
			 "value" => '#09a223',
			 "description" => __( "Choose the Color for the button background.", 'advisor-core' )
		),
		array(
			 "type" => "colorpicker",
			 "class" => "",
			 "heading" => __( "Button Hover Background Color", 'advisor-core' ),
			 "param_name" => "button_hover_bg_color",
			 "value" => '#09a223',
			 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
		),
		array(
				'type'      		=> 'dropdown',
				'heading'   		=> esc_html__( 'Select Bakcground Class', 'advisor-core' ),
				'param_name' 		=> 'background',
				"description" 	=> esc_html__("Select background, for now it can be dark or light.", 'advisor-core'),
				'value' => array(

						esc_html__( 'Select Class', 'advisor-core' ) 		=> '',
						esc_html__( 'Dark', 'advisor-core' )  						=> 'dark',
						esc_html__( 'Light', 'advisor-core' )  					=> 'light',

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

add_action( 'vc_before_init', 'advisor_vc_map_text_button' );

?>
