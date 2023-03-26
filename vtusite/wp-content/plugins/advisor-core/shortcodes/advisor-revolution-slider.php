<?php
if ( ! function_exists( 'advisor_revolution_slider' ) ) {

	function advisor_revolution_slider( $atts ){

			extract( shortcode_atts( array(

				'class_name'  => '',
				'alias'       => '',

			), $atts ) );

			global $advisor_options;

			$slide_classes = '';
			$header_style = '';
			if ( ! empty( $advisor_options['advisor-header-layout']) ) {

				 $header_style = $advisor_options['advisor-header-layout'];

			} else {

				$header_style = 'one';

			}
	    if( $header_style == 'three'|| $header_style == 'seven' ) {

	       $slide_classes = ' margin-0 ';
			}
			if(  $header_style == 'four' ) {

				 $slide_classes .= ' main-banner-four ';
			}

			if( !empty( $alias ) )
			{ ?>
				<section class="main-banner <?php echo $slide_classes; ?> <?php esc_attr_e( $class_name ); ?>">
	        <div class="tp-banner-container">
						<div class="tp-banner" >

                    	<?php
						if ( class_exists( 'RevSlider' ) && function_exists( 'putRevSlider' ) )
							{

								putRevSlider( $alias );

							}

						?>

        	</div>
       	 </div>
    </section>
			<?php
    }


}
}
add_shortcode('advisor_rev_slider', 'advisor_revolution_slider');
// Visual Composer Map
function advisor_vc_map_rev_slider()
{
$rev_sliders = array();
$sliders = array();

if ( class_exists( 'RevSlider' ) ) {

  $rev_slider = new RevSlider();
  $rev_sliders = $rev_slider->get_sliders();

	if( isset ( $rev_sliders [0] ) ) {

		$sliders['Select Alias'] = '';
		foreach( $rev_sliders as $v )
		{
			$sliders[$v->alias] = $v->alias;
		}
	} else {

	    $sliders = array();
	}
}
vc_map( array(
		'name'     								=> esc_html__( 'Advisor Rev Slider', 'advisor-core' ),
		'base'     								=> 'advisor_rev_slider',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
		'admin_label' 						=> true,
    'is_container' 						=> false,
		'params' => array(

					array(

						"type"         => "dropdown",
						"heading"      => esc_html__('Revolution Slider Alias', 'advisor-core'),
						"param_name"   => "alias",
						"description"  => esc_html__('Select revolution slider alias', 'advisor-core'),
						"value" 			 => $sliders,
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
add_action( 'vc_before_init', 'advisor_vc_map_rev_slider' );
?>
