<?php
if ( ! function_exists( 'advisor_contact_page_multile_maps' ) ) {

	function advisor_contact_page_multile_maps( $atts , $content = NULL ){


		extract( shortcode_atts( array(

				'class_name'        => '',

			), $atts ) );


			ob_start();
			?>
				<section class="<?php esc_attr_e( $class_name ); ?>">
					<div class="container">
						<div class="row">

							<?php echo do_shortcode( $content ); ?>

						</div>
					</div>
				</section>

    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_multiple_contact_maps', 'advisor_contact_page_multile_maps');

//child shortcode

if ( ! function_exists( 'advisor_contact_single_map' ) ) {

	function advisor_contact_single_map( $atts ){

			extract( shortcode_atts( array(


				'lat_lng'           => '',
				'city'          		=> '',
				'text'           		=> '',
				'company'           => '',
				'address'           => '',
				'email'           	=> '',
				'website'           => '',
				'phone'						  => '',
				'fax'						    => '',
				'zoom'						  => '16',
				'map_view_type'		  => 'roadmap',
				'marker'						=> '',

			), $atts ) );

			$map_id = 'map_id_' . rand();

			if( !empty ( $marker ) ) {

				$marker = wp_get_attachment_url( $marker , array(100,100) , true );

				if( empty ( $marker ) ) {

					$marker = get_template_directory_uri() . '/images/marker.png';

				}

			} else {

				$marker = get_template_directory_uri() . '/images/marker.png';

			}

			$lat_lng_arr = array();

			if( !empty( $lat_lng ) ) {

				$lat_lng_arr = explode(',', $lat_lng);

			}


			ob_start();
			?>

				<div class="col-md-6">
					<div class="map-with-address-widget animate fadeInLeft">

						<?php if( !empty( $city ) ){ ?>

						<h3><?php esc_html_e( $city , 'advisor-core'); ?></h3>

						<?php } ?>

						<?php if( !empty( $text ) ){ ?>

						<p><?php _e( $text , 'advisor-core'); ?></p>

						<?php } ?>

						<div class="map" id="<?php echo $map_id; ?>"></div>

						<?php if( !empty( $address ) ) { ?>
						<div class="get-directions">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								 <input type="text" name="saddr" placeholder="Enter Your Address" />
								 <input type="hidden" name="daddr" value="<?php echo $address; ?>" />
								 <input type="submit" value="" />
							</form>
						</div>
						<?php } else { ?>

									<div class="get-directions">
									<div class="contact-info-widget">Please Enter address for your company.</div>
									</div>

						<?php }	 ?>
						<div class="contact-info-widget">
							<?php if( !empty( $phone ) ){ ?>

							<p><strong>Phone: </strong><?php _e( $phone , 'advisor-core'); ?><br>

							<?php }	 ?>
							<?php if( !empty( $email ) ){ ?>

							<strong>Email: </strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>

							<?php }	 ?>
							<?php if( !empty( $website ) ){ ?>

							<strong>Web: </strong> <a href="<?php echo $website; ?>"><?php echo $website; ?></a><br>

							<?php }	 ?>
							<?php if( !empty( $address ) ){ ?>

							<strong>Address: </strong><?php echo $address; ?>

							<?php }	 ?>
							</p>

							<?php advisor_maps_script( $lat_lng_arr , $map_id, $marker , $zoom , $company , $address , $phone , $fax, $map_view_type ); ?>

						</div>
					</div>
				</div>


    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_single_map', 'advisor_contact_single_map');

// Visual Composer Map
function advisor_vc_map_contact_multiple_map()
{

	vc_map( array(

	'name'										=> esc_html__( 'Advisor Multiple Contact Maps', 'advisor-core' ),
	'base' 				      		  => 'advisor_multiple_contact_maps',
	'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
	'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
	'as_parent' 			  			=> array('only' => 'advisor_single_map'),
	'show_settings_on_create' => false,
	'content_element' 		  	=> true,
	'is_container' 			  		=> false,
	'js_view' 				  			=> 'VcColumnView',
	"params"                  => array(

				array(
						"type" 					=> "textfield",
						"heading" 			=> __("Extra Class Name", 'advisor-core'),
						"param_name"		=> "class_name",
						"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
				),
		)

	)
	);

	vc_map( array(
	'name'     								=> esc_html__( 'Advisor Single Map (From Multiple Maps)', 'advisor-core' ),
	'base'     								=> 'advisor_single_map',
	'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
	'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
	"as_child" 								=> array('only' => 'advisor_multiple_contact_maps'),
	'show_settings_on_create' => true,
	'content_element' 				=> true,
	'admin_label' 						=> true,
	'is_container' 						=> true,
	'params' => array(

	array(
		 'type'      		=> 'textfield',
		 'heading'   		=> esc_html__( 'Latitude Longitude', 'advisor-core' ),
		 'param_name' 	=> 'lat_lng',
		 "description" 	=> __('Please add comma separated latitude and longitude for your map address e.g:  you can get latitude and longitude here <a href="http://www.findlatitudeandlongitude.com/batch-geocode/#.V6J7I_l97IU">http://www.findlatitudeandlongitude.com/batch-geocode/#.V6J7I_l97IU</a>. ', 'advisor-core'),

	),

	array(
		"type" 					=> "textfield",
		"heading" 			=> __("City", 'advisor-core'),
		"param_name"		=> "city",
		"description"		=> __("Add city or company name here. It will also show up on top as heading.", 'advisor-core')
	),
	array(
		 'type'      		=> 'textarea',
		 'heading'   		=> esc_html__( 'Text/Description', 'advisor-core' ),
		 'param_name' 	=> 'text',
		 "description" 	=> esc_html__("Add some description or small text, It will show up under city heading. ", 'advisor-core'),

	),
	array(
				"type" 					=> "textfield",
				"heading" 			=> esc_html__("Address", 'advisor-core'),
				"param_name" 		=> "address",
				"description" 	=> esc_html__("Add address here for your office, will show up on map marker.", 'advisor-core')
		),
	array(
		 'type'      		=> 'textfield',
		 'heading'   		=> esc_html__( 'Add Website URL Internal/External', 'advisor-core' ),
		 'param_name' 	=> 'website',
		 "description" 	=> esc_html__("Please add web URL to any page or external website or regional URL for your company.", 'advisor-core'),


	),
	array(
					"type" 					=> "textfield",
					"heading" 			=> esc_html__("Company Name/Office Name", 'advisor-core'),
					"param_name" 		=> "company",
					"description" 	=> esc_html__("Add Company Name/Office Name here, it will show up on map marker.", 'advisor-core')
	),
	array(
		 'type'      		=> 'textfield',
		 'heading'   		=> esc_html__( 'Email', 'advisor-core' ),
		 'param_name' 	=> 'email',
		 'description' 	=> __('Please add contact email for support or other purposes.'. 'advisor-core'),

	),
	array(
		"type" 					=> "textfield",
		"heading" 			=> __("Phone Number", 'advisor-core'),
		"param_name"		=> "phone",
		"description"		=> __("Add phone number here. It will also show up in map marker", 'advisor-core')
	),
	array(
		 'type'      		=> 'textfield',
		 'heading'   		=> esc_html__( 'Fax Number', 'advisor-core' ),
		 'param_name' 	=> 'fax',
		 "description" 	=> esc_html__("Add fax number if there is any, it will also show up in map marker. ", 'advisor-core'),

	),
	array(
		 'type'      		=> 'textfield',
		 'heading'   		=> esc_html__( 'Map Zoom Level', 'advisor-core' ),
		 'param_name' 	=> 'zoom',
		 "description" 	=> esc_html__("Please add zoom level, default: 16. ", 'advisor-core'),
		 'value'        => 16,

	),
	array(
				 "type" 					=> "dropdown",
				 "heading" 			=> esc_html__("Style", 'advisor-core'),
				 "param_name" 		=> "map_view_type",
				 "description" 	=> esc_html__("Select Map View Type", 'advisor-core'),
				 "value" => array(

						 esc_html__("Roadmap", 'advisor-core') => 'roadmap',
						 esc_html__("Satellite", 'advisor-core') => 'satellite',
						 esc_html__("Hybrid", 'advisor-core') => 'hybrid',
						 esc_html__("Terrain", 'advisor-core') => 'terrain'
					 ),
		 ),
	array(
		 'type'      		=> 'attach_image',
		 'heading'   		=> esc_html__( 'Add Custom Marker', 'advisor-core' ),
		 'param_name' 	=> 'marker',
		 "description" 	=> esc_html__("Add custom marker to show up on map, if not provided the default marker will show up. ", 'advisor-core'),

	),


	)

	)
	);
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	    class WPBakeryShortCode_advisor_multiple_contact_maps extends WPBakeryShortCodesContainer {
	    }
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_advisor_single_map extends WPBakeryShortCode {
	    }
	}
}

add_action( 'vc_before_init', 'advisor_vc_map_contact_multiple_map' );
?>
