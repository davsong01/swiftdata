<?php
if ( ! function_exists( 'advisor_contact_us' ) ) {

	function advisor_contact_us( $atts ){

			extract( shortcode_atts( array(

				'class_name'   	       => '',
				'contact_form_style'   => 'default',
				'third_party_shortcode'=> '',
				'heading'              => '',
				'text'                 => '',
				'text_color'				   => '#000000',
				'recipient'            => '',
				'callback_text' 			 => '',
				'callback_options'     => '',
				'dropdown_options'     => '',
				'style'                => '',
				'bg_image'             => '',

			), $atts ) );
			$callback_purpose = array();

			if( $callback_options == 'custom' && !empty( $dropdown_options )  ) {

				$callback_purpose = explode( ',', $dropdown_options );

			}
			else if ( $callback_options == 'default' ){

				$callback_purpose = array( 'Finance Trading', 'Stock Trading', 'Retirement', 'other');

			} else {

				$callback_purpose = '';

			}
			$bg_classes = '';
			if( !empty( $bg_image ) ){

				$bg_image = wp_get_attachment_url($bg_image , 'full' , false);
				$bg_classes = 'callback-bg parallax';
				?>
				<style>
				.callback-bg{

					background: url(<?php echo $bg_image; ?>);
				}
				.parallax {
				background-attachment: fixed;
				background-size: cover;
				}
				</style>
			<?php

			} else {

				$bg_image = '';

			}

			if ( !empty( $callback_text ) ) {
				$callback_text = $callback_text;
			} else {
				$callback_text = __( 'I would like to discuss:', 'advisor-core' );
			}


			if ( !empty( $recipient ) ) {

				$recipient = $recipient;

			} else {

				$recipient = get_option( 'admin_email' );

			}

			ob_start();

			?>

			<!-- REQUEST A CALLBACK -->
	    <section class="<?php echo $bg_classes; ?> <?php esc_attr_e( $class_name ); ?>">
				<div class="container">
					<div class="request-a-callback clearfix animate fadeInUp">
						<div class="request-a-callback-content">
	            <?php if( !empty( $heading ) ){ ?>

							<h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h3>

	            <?php } ?>
	            <?php if( !empty( $text ) ){ ?>

							<p><?php _e( $text , 'advisor-core'); ?></p>

	            <?php } ?>
						</div>
						<div class="request-a-callback-form" id="request-a-callback-form">

							<?php if ( $contact_form_style == 'third-party-form') {

										if ( !empty( $third_party_shortcode ) ) {

											echo do_shortcode( '[contact-form-7 id="' . $third_party_shortcode . '"]' );

										}

							 } else if ( $contact_form_style == 'default') { ?>

							<form class="contact_form_shortcode" id="contact_form_shortcode">
								<input name="bta_name" type="text" id="bta_name" placeholder="<?php esc_attr_e( 'Your Name' , 'advisor-core' ); ?>" required>
								<input name="bta_email" type="text" id="bta_email" placeholder="<?php esc_attr_e( 'Email Address' , 'advisor-core' ); ?>" required>
								<input name="bta_phone" type="text" id="bta_phone" placeholder="<?php esc_attr_e( 'Phone Number' , 'advisor-core' ); ?>">
								<input name="bta_recipient" id="bta_recipient" type="hidden" value="<?php esc_attr_e( $recipient, 'advisor-core' ); ?>">

								<?php if( !empty( $callback_purpose ) && is_array( $callback_purpose ) )  { ?>

								<div class="styled-select">
									<select name="bta_purpose" id="bta_purpose">
										<option value=""><?php if( !empty( $callback_text ) ){  esc_html_e( $callback_text , 'advisor-core'); }?></option>

										<?php foreach( $callback_purpose as $purpose ) { ?>

											<option value="<?php esc_html_e( $purpose  , 'advisor-core'); ?>"><?php esc_html_e( $purpose  , 'advisor-core'); ?></option>

										<?php } ?>
									</select>
								</div>

								<?php } else { ?>

										<input type="hidden" name="bta_purpose" id="bta_purpose" value="none" />

							<?php	}	?>
	              <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce(); ?>" />
								<button id="bta_s_contact_us" data-text="submit" class="btn btn-primary"><?php esc_html_e( 'Submit', 'advisor-core' ); ?></button>
							</form>
							<?php } ?>
							<div class="nl_callback_notify" style="margin-top: 12px; font-size: initial;"></div>
						</div>
					</div>
				</div>
			</section>
			<!-- / REQUEST A CALLBACK -->

    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_contact_form', 'advisor_contact_us');


// Visual Composer Map
function advisor_vc_map_contact_us()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Contact/Callback Form', 'advisor-core' ),
		'base'     								=> 'advisor_contact_form',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(


		array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Contact Form Style', 'advisor-core' ),
						'param_name' 		=> 'contact_form_style',
						"description" 	=> esc_html__("Select advisor's default contact form or add third party contact form.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Advisor Default Form', 'advisor-core' )    	=> 'default',
								esc_html__( 'Third Party Contact Form', 'advisor-core' )  => 'third-party-form'

						 )
		),
		array(
						"type"          => "textfield",
						"heading"       => esc_html__("Third Party Form Shortcode: Contact Form 7", 'advisor-core'),
						"param_name"    => "third_party_shortcode",
						"description"   => esc_html__("Add Contact form 7 ID e.g [contact-form-7 id='637' title='Contact form 1'] add '637' from this shortcode in the above textfield.", 'advisor-core'),
						"dependency" => array(
						"element" => "contact_form_style",
						"value" => array(
							'third-party-form',
							),
						 )
				),
		array(

            "type"          => "textfield",
            "heading"       => esc_html__("Heading", 'advisor-core'),
            "param_name"    => "heading",
            "description"   => esc_html__("Add heading here", 'advisor-core'),

        ),
		array(
            "type" 					=> "textarea",
            "heading" 			=> esc_html__("Text Content", 'advisor-core'),
            "param_name" 		=> "text",
            "description" 	=> esc_html__("Add text here", 'advisor-core'),

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
								"type" 					=> "textfield",
								"heading" 			=> esc_html__("Recipient Email", 'advisor-core'),
								"param_name" 		=> "recipient",
								"description" 	=> esc_html__("Add recipient email here.", 'advisor-core'),
								"dependency" => array(
								"element" => "contact_form_style",
								"value" => array(
									'default',
									),
								 )
						),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Callback Data Options', 'advisor-core' ),
						'param_name' 		=> 'callback_options',
						"description" 	=> esc_html__("By default some options are added for callback purposes, if you want to add your own please select 'custom' option.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Select Callback Option', 'advisor-core' ) 				=> '',
								esc_html__( 'Default', 'advisor-core' )  											=> 'default',
								esc_html__( 'Custom', 'advisor-core' ) 												=> 'custom',

						 ),
						 "dependency" => array(
						 "element" => "contact_form_style",
						 "value" => array(
							 'default',
							 ),
							)
				),
				array(
								"type" 					=> "textfield",
								"heading" 			=> __("Enter Callback Text", 'advisor-core'),
								"param_name"		=> "callback_text",
								"description"		=> __("Enter a callback text for the shortcode here.", 'advisor-core'),
								"dependency" => array(
								"element" => "contact_form_style",
								"value" => array(
									'default',
									),
								 )
				),
				array(
		            "type" 					=> "textarea",
		            "heading" 			=> esc_html__("Text Content", 'advisor-core'),
		            "param_name" 		=> "dropdown_options",
		            "description" 	=> esc_html__("Add comma seprated text headings for callback dropdown options e.g 'Perosnal Finance','Stock Trading' etc.", 'advisor-core'),
								'dependency'    => array (

								'element'   => 'callback_options',
								'value'     => array('custom'),
								'not_empty' =>  false,

								)
		        ),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Select Style', 'advisor-core' ),
						'param_name' 		=> 'style',
						"description" 	=> esc_html__("Select style for the callback form, it can be simple or background image style.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Select A Style', 'advisor-core' ) 				=> '',
								esc_html__( 'Default Style', 'advisor-core' )  				=> 'style1',
								esc_html__( 'Background Image Style', 'advisor-core' ) => 'style2',

						 ),

				),
				array(
		            "type" 					=> "attach_image",
		            "heading" 			=> esc_html__("Background Image", 'advisor-core'),
		            "param_name" 		=> "bg_image",
		            "description" 	=> esc_html__("Add image here, please add full size image at least 1600x800 px approx", 'advisor-core'),
								'dependency'    => array (

								'element'   => 'style',
								'value'     => array('style2'),
								'not_empty' =>  false,

		      			),

				),
				array(
								"type" 					=> "textfield",
								"heading" 			=> __("Extra Class Name", 'advisor-core'),
								"param_name"		=> "class_name",
								"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core'),
				),

			)
		)
  );
}

add_action( 'vc_before_init', 'advisor_vc_map_contact_us' );
?>
