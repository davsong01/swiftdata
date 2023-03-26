<?php
if ( ! function_exists( 'advisor_gallery_slider' ) ) {

	function advisor_gallery_slider( $atts , $content = NULL ){

		extract( shortcode_atts( array(

			'class_name' => '',
			'images'     => '',

			), $atts ) );

			if( !empty( $animate ) ){

				$animate = 'animate' . ' ' . $animate;

			}
			else {

				$animate = '';

			}

			ob_start(); ?>

				<div class="single-item-carousel classic-arrows2 owl-carousel <?php esc_attr_e( $class_name ); ?>">

					<?php
					if( !empty( $images ) ) {

						$image_ids = explode( ',', $images );
						if( is_array( $image_ids ) && !empty( $image_ids[0] ) ) {

							foreach ($image_ids as $id) {

								$image = wp_get_attachment_url( $id , array(750,392) , false );
								$image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
									echo '<img src="'. $image .'" alt="'.$image_alt.'">';

							}

						} else {

							$image = wp_get_attachment_url( $image , array(750,392) , false );
							$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);
							echo '<img src="'. $image .'" alt="'.$image_alt.'">';

						}

					} else {

						$image = '';

					}

       		?>
				</div>
				<br>
				<br>

          <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_gallery', 'advisor_gallery_slider');

// Visual Composer Map
function advisor_vc_map_gallery_slider()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor Gallery Slider', 'advisor-core' ),
			'base' 				      		  => 'advisor_gallery',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,

			"params" => array(

			 array(
		        "type" 					=> "attach_images",
		        "heading" 			=> esc_html__("Add Gallery Image", 'advisor-core'),
		        "param_name"		=> "images",
		        "description"		=> esc_html__("Please add/select images from media library.", 'advisor-core')
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

add_action( 'vc_before_init', 'advisor_vc_map_gallery_slider' );
?>
