<?php
if ( ! function_exists( 'advisor_fun_facts' ) ) {

	function advisor_fun_facts( $atts ){

			extract( shortcode_atts( array(

				'class_name'           => '',
				'heading'              => '',
				'text'                 => '',
				'text_color'				   => '#000000',
				'bg_image'             => '',
				'counter_text'	       => 'Employees,Location,% Satisfaction,Happy Customers',
				'counter_text_color'   => '#000000',
				'end_points'           => '30,2,100,114',
				'end_points_color'		 => '#000000',
				'style'                => 'style1',
				'text_align'           => 'center',
				'overlap_top'          => false,

			), $atts ) );

			if( !empty( $bg_image ) ){

				$bg_image = wp_get_attachment_url($bg_image , 'full' , false);

				?>
				<?php if( $style != 'style2' ) { ?>
        <style>
				.funfacts.bg-white{
					background: url('<?php echo $bg_image; ?>') no-repeat center 0;
				}
				</style>
				<?php } else { ?>
					<style>
					.funfacts.two{
						background: url('<?php echo $bg_image; ?>');
					}
					</style>
				<?php	}  ?>
        <?php

			} else {

				$bg_image = '';

			}

			if( !empty( $end_points ) ) {

				$orignal_end_points = $end_points;
				$end_points = explode(',' , $end_points);

				do_action('advisor_counter_script' , $end_points);

			} else {

				$end_points = '';

			}
			$counter_details = array();
			if( !empty( $counter_text ) ){

				$counter_details = explode(',' , $counter_text);

			} else {

				$counter_text = '';

			}
			ob_start(); ?>

			<?php if( $style == 'style3' ) { ?>
				<div class="container" >
				<div class="row funfacts3 <?php esc_attr_e( $class_name ); ?>" id="funfacts">
						<div class="col-md-4 col-sm-4 col-xs-12">
							<?php if ( !empty ( $heading ) ) { ?><h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core');; ?></h2><?php } ?>

						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="row text-center" id="counters">

									<?php
									$i = 1;
									foreach ($counter_details as $counter ) {

									?>
										<div class="col-md-3 col-xs-6">
			                <div class="counter">
											   <span class="quantity-counter<?php echo $i; ?> highlight" style="color: <?php esc_attr_e( $end_points_color ); ?>">0</span>
											   <h6 class="counter-details" style="color: <?php esc_attr_e( $counter_text_color ); ?>"><?php esc_html_e( $counter , 'advisor-core'); ?></h6>
											 </div>
										</div>

			            <?php
									 $i++;
									 }
									 ?>

							</div>
						</div>
					</div>
				</div>

			<?php } else { ?>

			<?php if( $style == 'style2' ) { ?>

				<div class="funfacts two parallax <?php if( $text_align == 'center' ) { echo 'text-center'; } ?> <?php esc_attr_e( $class_name ); ?>">

			<?php } ?>
      <div class="container">

				<?php if( $style != 'style2' ) { ?>

				<div class="funfacts bg-white <?php if( $overlap_top == true ){ echo "overlap-top"; } ?> <?php if( $text_align == 'center' ) { echo 'text-center'; } ?> <?php esc_attr_e( $class_name ); ?>">
				<div class="advisor-overlay"></div>

				<?php } ?>


					<div class="funfacts-inner">
            <?php if( !empty( $heading ) ){ ?>

						<h2 style="color: <?php esc_attr_e( $text_color ); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

            <?php } ?>
            <?php if( !empty( $text ) ){ ?>

						 	<p style="color: <?php esc_attr_e( $text_color ); ?>"><?php _e( $text , 'advisor-core'); ?></p>

            <?php } ?>
						<div class="row <?php if( $text_align == 'center' ) { echo 'text-center'; } ?>" id="counters">
            <?php
						$i = 1;
						foreach ($counter_details as $counter ) {

						?>
							<div class="col-md-3 col-xs-6">
                <div class="counter">
								   <span class="quantity-counter<?php echo $i; ?> highlight" style="color: <?php esc_attr_e( $end_points_color ); ?>">0</span>
								   <h6 class="counter-details" style="color: <?php esc_attr_e( $counter_text_color ); ?>"><?php esc_html_e( $counter , 'advisor-core'); ?></h6>
								 </div>
							</div>

            <?php
						 $i++;
						 }

						 ?>

						</div>
					</div>
				</div><!-- / CONTAINER -->
			</div><!-- / FUNFACTS -->

			<?php } ?>

    <?php return ob_get_clean();
	}
}
add_shortcode('fun_facts_counter', 'advisor_fun_facts');


// Visual Composer Map
function advisor_vc_map_counter()
{
vc_map( array(
		'name'     								=> esc_html__( 'Advisor FunFacts Counter', 'advisor-core' ),
		'base'     								=> 'fun_facts_counter',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
    'is_container' 						=> false,
		'params' => array(

			array(
					'type'      		=> 'dropdown',
					'heading'   		=> esc_html__( 'Fun Facts Layout', 'advisor-core' ),
					'param_name' 		=> 'style',
					"description" 	=> esc_html__("Select style, it can be simple image background or full background image with overlay.", 'advisor-core'),
					'value' => array(

							esc_html__( 'Style 1', 'advisor-core' )  			 => 'style1',
							esc_html__( 'Style 2', 'advisor-core' )        => 'style2',
							esc_html__( 'Style 3', 'advisor-core' )        => 'style3',

					 )
			),
			array(

            "type"          => "textfield",
            "heading"       => esc_html__("Heading", 'advisor-core'),
            "param_name"    => "heading",
            "description"   => esc_html__("Add heading here", 'advisor-core'),
						"dependency" => array(
	          "element" => "style",
	          "value" => array(
							'style1',
							'style2',
	            'style3',
	            ),
	           )
        ),
				array(
            "type" 					=> "textarea",
            "heading" 			=> esc_html__("Text", 'advisor-core'),
            "param_name" 		=> "text",
            "description" 	=> esc_html__("Add text here, it will show up below the heading above", 'advisor-core'),
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							'style2',
							),
						 )
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Text Color", 'advisor-core' ),
					 "param_name" => "text_color",
					 "value" => '#000000',
					 "description" => __( "Choose the Color for the heading and text.", 'advisor-core' ),
					 "dependency" => array(
					 "element" => "style",
					 "value" => array(
						 'style1',
						 'style2',
						 'style3',
						 ),
						)
				),
				array(
            "type" 					=> "textarea",
            "heading" 			=> esc_html__("Counter Details", 'advisor-core'),
            "param_name"		=> "counter_text",
            "description" 	=> esc_html__("Please enter 'comma' separated text for each counter detail." , 'advisor-core'),
						"value" 				=> 'Employees,Location,% Satisfaction,Happy Customers',
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							'style2',
							'style3',
							),
						 )
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Counter Details Text Color", 'advisor-core' ),
					 "param_name" => "counter_text_color",
					 "value" => '#000000',
					 "description" => __( "Choose the Color for the Counter Details text.", 'advisor-core' ),
					 "dependency" => array(
					 "element" => "style",
					 "value" => array(
						 'style1',
						 'style2',
						 'style3',
						 ),
						)
				),
				array(
            "type" 					=> "textfield",
            "heading" 			=> esc_html__("End Counter", 'advisor-core'),
            "param_name" 		=> "end_points",
            "description" 	=> esc_html__("Please enter 'comma' separated text for each counter value.", 'advisor-core'),
						"value" 				=> '30,2,100,114',
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							'style2',
							'style3',
							),
						 )
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "End Counter Text Color", 'advisor-core' ),
					 "param_name" => "end_points_color",
					 "value" => '#000000',
					 "description" => __( "Choose the Color for the End Counter text.", 'advisor-core' ),
					 "dependency" => array(
					 "element" => "style",
					 "value" => array(
						 'style1',
						 'style2',
						 'style3',
						 ),
						)
				),
				array(
            "type" 					=> "attach_image",
            "heading" 			=> esc_html__("Background Image", 'advisor-core'),
            "param_name" 		=> "bg_image",
            "description" 	=> esc_html__("Add image here, please add full size image at least 1600x800 px approx", 'advisor-core'),
						"dependency" => array(
						"element" => "style",
						"value" => array(
							'style1',
							'style2',
							),
						 )
        ),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Text Align', 'advisor-core' ),
						'param_name' 		=> 'text_align',
						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
						'value' => array(

								esc_html__( 'Select Aligment', 'advisor-core' ) 	=> '',
								esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
								esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
						 ),
						 "dependency" => array(
						 "element" => "style",
						 "value" => array(
							 'style1',
							 'style2',
							 ),
							)
				),

				array(
						 "type" 				=> "checkbox",
						 "heading" 		  => __("Overlap Top?", 'advisor-core'),
						 "param_name" 	=> "overlap_top",
						 "description"  => __("Check if the counter should overlap with top element.", 'advisor-core'),
						 "value"        => array( '' => true ),
						 "dependency" => array(
						 "element" => "style",
						 "value" => array(
							 'style1',
							 'style2',
							 ),
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

add_action( 'vc_before_init', 'advisor_vc_map_counter' );
function advisor_counter_script_callback( $args = '' ){

	if( isset($args[0])) {

	?>
    <script>

		<?php if ( empty( $args[0] ) ) {
			$args[0]  = 0;
		}
		if ( empty( $args[1] ) ) {
			$args[1]  = 0;
		}
		if ( empty( $args[2] ) ) {
			$args[2]  = 0;
		}
		if ( empty( $args[3] ) ) {
			$args[3]  = 0;
		} ?>

	  jQuery(function(t){t("#counters").waypoint(function(){t(".quantity-counter1").countTo({from:0,to:<?php echo $args[0]; ?>,speed:2e3,refreshInterval:50,onComplete:function(){console.debug(this)}}),t(".quantity-counter2").countTo({from:0,to:<?php echo $args[1]; ?>,speed:2e3,refreshInterval:50,onComplete:function(){console.debug(this)}}),t(".quantity-counter3").countTo({from:0,to:<?php echo $args[2]; ?>,speed:2e3,refreshInterval:50,onComplete:function(){console.debug(this)}}),t(".quantity-counter4").countTo({from:0,to:<?php echo $args[3]; ?>,speed:2e3,refreshInterval:50,onComplete:function(){console.debug(this)}})},{offset:"100%",triggerOnce:!0})})



	</script>
    <?php
	}
}
add_action('advisor_counter_script' , 'advisor_counter_script_callback' );
?>
