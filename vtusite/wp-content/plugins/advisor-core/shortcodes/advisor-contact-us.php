<?php
if ( ! function_exists( 'advisor_contact_us_page_form' ) ) {

	function advisor_contact_us_page_form( $atts ){

			extract( shortcode_atts( array(

				'class_name'   	       => '',
				'contact_form_style'   => 'default',
				'third_party_shortcode'=> '',
				'background'           => 'bg-blue',
				'heading'              => '',
				'text'                 => '',
				'text_color'				   => '#000000',
				'recipient'            => '',
				'image'								 => '',
				'social'							 => 'true',

			), $atts ) );
			if( !empty ( $image ) ) {

				$img = wp_get_attachment_url( $image , array(289,259) , false );
				$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

			} else {

				$img = '';

			}

			if ( !empty( $recipient ) ) {

				$recipient = $recipient;

			} else {

				$recipient = get_option( 'admin_email' );

			}

			ob_start();
			?>
			<!-- CONTACT US -->
				<section class="<?php echo $background; ?> <?php esc_attr_e( $class_name ); ?>">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6 animate fadeInLeft">
							<?php if( !empty( $heading ) ){ ?>

							<h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h3>

							<?php } ?>
							<div class="row">

								<?php if( !empty( $img ) ){ ?>

									<div class="col-md-4 col-sm-4">

									<img src="<?php echo $img; ?>" class="quries-img" alt="<?php echo $image_alt; ?>">

									<div class="height-20"></div>

								</div>
								<?php } ?>

								<?php if( !empty( $text ) ){ ?>

								<div class="col-md-8 col-sm-8">


									<p><?php _e( $text , 'advisor-core'); ?></p>


								</div>

								<?php } ?>
							</div>
							<div class="height-20"></div>
							<?php if( $social == 'true'  ){ ?>

							<h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( 'Follow Us' , 'advisor-core' ); ?></h3>

							<?php advisor_social_circles() ?>

							<?php } ?>

							<div class="height-50"></div>
						</div>
						<div class="col-md-6 col-sm-6 animate fadeInRight">

						<?php if ( $contact_form_style == 'third-party-form') {

									if ( !empty( $third_party_shortcode ) ) {

										echo do_shortcode( '[contact-form-7 id="' . $third_party_shortcode . '"]' );

										?>
										<script>
										 jQuery('.wpcf7').each(function() {

											jQuery(this).find('.wpcf7-submit').addClass('btn btn-primary');
											var submit_text = jQuery(this).find('.wpcf7-submit').val();
											jQuery(this).find('.wpcf7-submit').attr('data-text', submit_text);
										});
										</script>
										<?php
									}

							 } else if ( $contact_form_style == 'default') { ?>


							<form id="contact-us-form" class="contact-form">
								<div class="row">
									<div class="col-md-6">
										<input name="contact_name" type="text" id="contact_name"  placeholder="<?php esc_attr_e( 'Your Names *' , 'advisor-core' ); ?>" required>
									</div>
									<div class="col-md-6">
										<input name="contact_email" type="text" id="contact_email" placeholder="<?php esc_attr_e( 'Email Address *' , 'advisor-core' ); ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input name="contact_phone" id="contact_phone" type="text" placeholder="<?php esc_attr_e( 'Phone No. *' , 'advisor-core' ); ?>">
										<input name="contact_recipient" id="contact_recipient" type="hidden" value="<?php esc_attr_e( $recipient, 'advisor-core' ); ?>">
									</div>
								</div>
								<textarea name="contact_message" id="contact_message" placeholder="<?php esc_attr_e( 'Message *' , 'advisor-core' ); ?>" required></textarea>
								<input type="hidden" name="contact_nonce" id="contact_nonce" value="<?php echo wp_create_nonce(); ?>" />
								<button data-text="<?php esc_attr_e( 'Send Message' , 'advisor-core' ); ?>" class="btn btn-primary"><?php esc_html_e( 'Send Message' , 'advisor-core' ); ?></button>
							</form>

							<?php } ?>

							<div class="nl_contact_notify" style="margin-top: 12px; font-size: initial;"></div>

						</div>
					</div>
				</div>
			</section><!-- / COMPANY OVERVIEW -->

    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_contact_us', 'advisor_contact_us_page_form');


// Visual Composer Map
function advisor_vc_map_contact_us_page()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Contact Us', 'advisor-core' ),
		'base'     								=> 'advisor_contact_us',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
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
					 'type'      		=> 'dropdown',
					 'heading'   		=> esc_html__( 'Background', 'advisor-core' ),
					 'param_name' 		=> 'background',
					 "description" 	=> esc_html__("Select background between white or light blue. ", 'advisor-core'),
					 'value' => array(

							 esc_html__( 'Light Blue', 'advisor-core' )  			=> 'bg-blue',
							 esc_html__( 'White', 'advisor-core' )  			    => 'bg-white',
						),

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
	            "description" 	=> esc_html__("Add text here, will show up next to image if provided.", 'advisor-core'),

	        ),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Text Color", 'advisor-core' ),
				 "param_name" => "text_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the heading only and follow us text lable.", 'advisor-core' )
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
					"type" 					=> "attach_image",
					"heading" 			=> __("Add Images", 'advisor-core'),
					"param_name"		=> "image",
					"description"		=> __("Add an image of small size e.g 165x210.", 'advisor-core'),

			),
			array(
					 'type'      		=> 'dropdown',
					 'heading'   		=> esc_html__( 'Social Icons', 'advisor-core' ),
					 'param_name' 		=> 'social',
					 "description" 	=> esc_html__("Select background between white or light blue. ", 'advisor-core'),
					 'value' => array(

							 esc_html__( 'Show', 'advisor-core' )  			=> 'true',
							 esc_html__( 'Hide', 'advisor-core' )  			=> 'false',
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

add_action( 'vc_before_init', 'advisor_vc_map_contact_us_page' );
?>
