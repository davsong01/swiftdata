<?php
if ( ! function_exists( 'advisor_contact_us_map' ) ) {

	function advisor_contact_us_map( $atts ){

			extract( shortcode_atts( array(

				'class_name'        => '',
				'lat_lng'           => '',
				'address'           => '',
				'company'           => '',
				'phone'						  => '',
				'fax'						    => '',
				'zoom'						  => '16',
				'marker'						=> '',
				'map_view_type'		  => 'roadmap',

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
			<div class="map <?php esc_attr_e( $class_name ); ?>" id="<?php echo $map_id; ?>"></div>

			<?php advisor_maps_script( $lat_lng_arr , $map_id, $marker , $zoom , $company , $address , $phone , $fax, $map_view_type ); ?>

    <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_contact_map', 'advisor_contact_us_map');


// Visual Composer Map
function advisor_vc_map_contact_us_map()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Contact Map', 'advisor-core' ),
		'base'     								=> 'advisor_contact_map',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(

			array(
					 'type'      		=> 'textfield',
					 'heading'   		=> esc_html__( 'Latitude Longitude', 'advisor-core' ),
					 'param_name' 	=> 'lat_lng',
					 "description" 	=> __('Please add comma separated latitude and longitude for your map address e.g:  you can get latitude and longitude here <a href="http://www.findlatitudeandlongitude.com/batch-geocode/#.V6J7I_l97IU">http://www.findlatitudeandlongitude.com/batch-geocode/#.V6J7I_l97IU</a>. ', 'advisor-core'),

			),
			array(
							"type" 					=> "textfield",
							"heading" 			=> esc_html__("Company Name/Office Name", 'advisor-core'),
							"param_name" 		=> "company",
							"description" 	=> esc_html__("Add Company Name/Office Name here, it will show up on map marker.", 'advisor-core')
					),
			array(
	            "type" 					=> "textfield",
	            "heading" 			=> esc_html__("Address", 'advisor-core'),
	            "param_name" 		=> "address",
	            "description" 	=> esc_html__("Add address here for your office, will show up on map marker.", 'advisor-core')
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
					 'param_name' 		=> 'fax',
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
					 'param_name' 		=> 'marker',
					 "description" 	=> esc_html__("Add custom marker to show up on map, if not provided the default marker will show up. ", 'advisor-core'),

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

add_action( 'vc_before_init', 'advisor_vc_map_contact_us_map' );
?>
