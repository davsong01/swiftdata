<?php
if ( ! function_exists( 'advisor_subscription_newsletters ' ) ) {

	function advisor_subscription_newsletters( $atts ){

			extract( shortcode_atts( array(

				'class_name'  			 => '',
				'heading'            => '',
				'text'               => '',
				'subscription_form_text' => '',
				'text_color'			   => '#000000',
				'order'    		=> 'DESC',
				'autoplay'           => 'true',
				'autoplay_time_out'  => '',

			), $atts ) );


			ob_start();
			?>

			<!-- Latest News & update Start -->
			<section id="latest_news" class="p-b-100 p-t-100 bg_gray <?php esc_attr_e( $class_name ); ?>">
					<div class="container">
							<div class="row">
									<div class="col-md-12">
											<div class="row">
													<div class="col-md-12">
															<div class="heading">
																	<div class="heading_border bg_red"></div>

																	<?php if( !empty( $text ) ){ ?>

																	<p><?php _e( $text , 'advisor-core'); ?></p>

																	<?php } ?>

																	<?php if( !empty( $heading ) ){ ?>

																	<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

																	<?php } ?>

															</div>
													</div>
											</div>
											<div class="row p-t-40">

													<div class="col-md-6 col-xs-12 col-md-offset-3 col-sm-offset-0 col-xs-offset-0">
														<div style="top:0px;" class="over_image"><img src="<?php echo get_template_directory_uri(); ?>/images/update_bg.png" /></div>
															<div class="updates">

																<?php if( !empty( $subscription_form_text ) ){ ?>

																<p class="color_white"><?php _e( $subscription_form_text , 'advisor-core'); ?></p>

																<?php } ?>

																	<form class="p-t-25" id="subscription_form">
																			<div class="col-md-12">
																					<input id="subscriber_username" name="subscriber_username" type="text" placeholder="<?php _e('Name', 'advisor'); ?>" required="true">
																			</div>
																			<div class="col-md-10">
																					<input id="subscriber_email" name="subscriber_email" type="email" class="email" placeholder="<?php _e('Email', 'advisor'); ?>" required="true">
																					<input id="subscriber_nonce" type="hidden" name="nonce" value="<?php echo wp_create_nonce(); ?>" />
																			</div>
																			<div class="col-md-2">
																					<button id="subscription_form_submit" data-text="<?php _e( 'Submit', 'advisor'); ?>" class="submit">
																						<span><i class="icon-mail-envelope-closed3"></i></span>
																					</button>

																			</div>
																	</form>

															</div>
															<div class="nl_notify" style="margin-top: 12px; font-size: initial;"></div>

													</div>

											</div>
									</div>
							</div>
					</div>
			</section>
			<!-- Latest News & update end -->


      <?php
			return ob_get_clean();
	}
}

add_shortcode('advisor_subscription', 'advisor_subscription_newsletters');

// Visual Composer Map
function advisor_vc_map_advisor_subscription()
{
vc_map( array(
		'name'     									=> esc_html__( 'Advisor Subscription', 'advisor-core' ),
		'base'     									=> 'advisor_subscription',
		'icon'                    	=> get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 									=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' 	=> true,
		'content_element' 					=> true,
		'admin_label' 							=> true,
    'is_container' 							=> false,
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
							"description" 	=> esc_html__("Enter some text to show above the heading.", 'advisor-core'),
					),
		array(
						"type" 					=> "textfield",
						"heading" 			=> esc_html__("Subscription Form Text Below Heading", 'advisor-core'),
						"param_name" 		=> "subscription_form_text",
						"description" 	=> esc_html__("Enter subscription form text to show above the form.", 'advisor-core'),
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


			)

		  )
    );
}

add_action( 'vc_before_init', 'advisor_vc_map_advisor_subscription' );
?>
