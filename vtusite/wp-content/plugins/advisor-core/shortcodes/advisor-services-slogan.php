<?php
if ( ! function_exists( 'advisor_services_slogan' ) ) {

	function advisor_services_slogan( $atts ){

			extract( shortcode_atts( array(

				'heading'              => '',
				'text'                 => '',
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
					}

					</style>
        <?php
				}

			} else {

				$bg_image = '';

			}

			ob_start();

			?>

            	<!-- DIFFERENT SERVICES -->
                <section class="different-services text-center parallax">
                    <div class="container">
                        <div class="heading animate bounceIn">
                            <?php if( !empty( $heading ) ){ ?>

                            <h1 class="color-white"><?php esc_html_e( $heading , 'advisor-core'); ?></h1>

                            <?php } ?>
                            <?php if( !empty( $text ) ){ ?>

                            <p class="color-white"><?php _e( $text , 'advisor-core'); ?></p>

                            <?php } ?>
                        </div>
                    </div>
                </section><!-- / DIFFERENT SERVICES -->

          <?php

		 return ob_get_clean();
	}
}
add_shortcode('services_slogan', 'advisor_services_slogan');

// Visual Composer Map
function advisor_vc_map_service_slogan()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Service Slogan', 'advisor-core' ),
		'base'     								=> 'services_slogan',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(
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
            "type" 				=> "attach_image",
            "heading" 		=> __("Background Image", 'advisor-core'),
            "param_name" 	=> "bg_image",
            "description" => __("Add image here, please add full size image at least 1600x800 px approx", 'advisor-core')
        ),

)

			  )
      );
}

add_action( 'vc_before_init', 'advisor_vc_map_service_slogan' );
?>
