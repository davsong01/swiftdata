<?php
if ( ! function_exists( 'advisor_google_chart_graph' ) ) {

	function advisor_google_chart_graph( $atts ){

		extract( shortcode_atts( array(

				'class_name'           => '',
				'heading'              => '',
				'text'                 => '',
				'text_color' 					 => '#000000',

				'button_text'          => '',
				'button_link'          => '',
				'button_bg_color'      => '#000000',
				'button_hover_bg_color'=> '#000000',

				'graph_param1'				 => '',
				'graph_param2'         => '',

				'january_values'       => '',
				'february_values' 		 => '',
				'march_values'         => '',
				'april_values' 			   => '',
				'may_values'           => '',
				'june_values' 			   => '',
				'july_values'          => '',
				'august_values' 			 => '',
				'september_values'     => '',
				'october_values' 			 => '',
				'november_values'      => '',
				'december_values' 		 => '',

			), $atts ) );

			if ( !empty ( $graph_param1 ) ) {

				$graph_param1 = $graph_param1;

			} else {

				$graph_param1 = '';

			}

			if ( !empty ( $graph_param2 ) ) {

				$graph_param2 = $graph_param2;

			} else {

				$graph_param2 = '';

			}


			//if months values are not empty, Checking that comma separated month Values are only 2
			$january_values   = advisor_check_months_value_count( $january_values );
			$february_values  = advisor_check_months_value_count( $february_values );
			$march_values     = advisor_check_months_value_count( $march_values );
			$april_values     = advisor_check_months_value_count( $april_values );
			$may_values 		  = advisor_check_months_value_count( $may_values );
			$june_values 		  = advisor_check_months_value_count( $june_values );
			$july_values 		  = advisor_check_months_value_count( $july_values );
			$august_values    = advisor_check_months_value_count( $august_values );
			$september_values = advisor_check_months_value_count( $september_values );
			$october_values   = advisor_check_months_value_count( $october_values );
			$november_values  = advisor_check_months_value_count( $november_values );
			$december_values  = advisor_check_months_value_count( $december_values );


			$graph_id =  'ad-graphchart-'.rand();
			ob_start(); ?>

			<section class="ad-haslayout <?php esc_attr_e( $class_name ); ?>">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-6 col-xs-12">
						<div class="ad-textbox">
							<?php if( !empty( $heading ) ){ ?>

							<h2 class="doing-the-right-text" style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

							<?php } ?>
							<?php if( !empty( $text ) ){ ?>

							<p><?php _e( $text , 'advisor-core'); ?></p>

							<?php } ?>
							<?php if( !empty( $button_text ) && !empty( $button_link ) ){ ?>

							<a href="<?php echo esc_url( $button_link ); ?>" data-text="<?php echo esc_attr( $button_text ); ?>" class="btn btn-primary"
								style="background: <?php esc_attr_e( $button_bg_color ); ?>;"
								onMouseOver="this.style.background='<?php esc_attr_e( $button_hover_bg_color); ?>'"
								onMouseOut="this.style.background='<?php esc_attr_e( $button_bg_color); ?>'">
								<?php echo esc_html( $button_text ); ?></a>

							<?php } ?>
						</div>
					</div>
					<div class="col-md-5 col-sm-6 col-xs-12">
						<?php if ( !empty( $graph_param1 ) && !empty( $graph_param2 ) ) { ?>
							<?php if (
							!empty( $january_values ) ||
							!empty( $february_values ) ||
							!empty( $march_values ) ||
							!empty( $april_values ) ||
							!empty( $may_values ) ||
							!empty( $june_values ) ||
							!empty( $july_values ) ||
							!empty( $august_values ) ||
							!empty( $september_values ) ||
							!empty( $november_values ) ||
							!empty( $october_values ) ||
							!empty( $december_values )
						) { ?>

							<div id="<?php echo $graph_id; ?>" class="ad-graphchart"></div>
							<?php } }?>
					</div>
				</div>
			</div>
		</section>

	<!-- don't run script, if are $graph_param1 and $graph_param2 empty -->
	<?php if ( !empty( $graph_param1 ) && !empty( $graph_param2 ) ) { ?>

		<script>
			jQuery(document).ready(function() {

				function barChart(){
					google.charts.load('current', {'packages':['bar']});
					google.charts.setOnLoadCallback(drawChart);
					function drawChart() {

						var data = google.visualization.arrayToDataTable([
							['', '<?php esc_html_e( $graph_param1 ); ?>', '<?php esc_html_e( $graph_param2 ); ?>'],
							<?php if ( !empty ( $january_values ) ) { ?>['JAN', <?php echo $january_values; ?>],<?php } ?>
							<?php if ( !empty ( $february_values ) ) { ?>['FEB', <?php echo $february_values; ?>],<?php } ?>
							<?php if ( !empty ( $march_values ) ) { ?>['MAR', <?php echo $march_values; ?>],<?php } ?>
							<?php if ( !empty ( $april_values ) ) { ?>['APR', <?php echo $april_values; ?>],<?php } ?>
							<?php if ( !empty ( $may_values ) ) { ?>['MAY', <?php echo $may_values; ?>],<?php } ?>
							<?php if ( !empty ( $june_values ) ) { ?>['JUN', <?php echo $june_values; ?>],<?php } ?>
							<?php if ( !empty ( $july_values ) ) { ?>['JUL', <?php echo $july_values; ?>],<?php } ?>
							<?php if ( !empty ( $august_values ) ) { ?>['AUG', <?php echo $august_values; ?>],<?php } ?>
							<?php if ( !empty ( $september_values ) ) { ?>['SEP', <?php echo $september_values; ?>],<?php } ?>
							<?php if ( !empty ( $october_values ) ) { ?>['OCT', <?php echo $october_values; ?>],<?php } ?>
							<?php if ( !empty ( $november_values ) ) { ?>['NOV', <?php echo $november_values; ?>],<?php } ?>
							<?php if ( !empty ( $december_values ) ) { ?>['DEC', <?php echo $december_values; ?>],<?php } ?>
						]);
						var options = {
							bars: 'vertical',
							hAxis: {format: 'decimal'},
							height: 325,
							colors: ['#5aa1e3', '#ebebeb']
						};
						var chart_id = '<?php echo $graph_id; ?>';
						var chart = new google.charts.Bar(document.getElementById(chart_id));
						chart.draw(data, google.charts.Bar.convertOptions(options));

					}
				}
				barChart();
			});
		</script>
		<?php } ?>

		<div class="clearfix"></div>
		<?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_progress_graph', 'advisor_google_chart_graph');


// Visual Composer Map
function advisor_vc_map_progress_graph()
{
vc_map( array(
		'name' 										=> esc_html__( 'Advisor Google Chart', 'advisor-core' ),
		'base' 										=> 'advisor_progress_graph',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => true,
		'content_element' 				=> true,
    'is_container' 						=> false,
		'params' 						=> array(

			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Heading", 'advisor-core'),
				"param_name" 		=> "heading",
				"description" 	=> __("Add heading here", 'advisor-core')
			),
			array(
				"type" 					=> "textarea",
				"heading" 			=> __("Text Below Heading", 'advisor-core'),
				"param_name"		=> "text",
				"description" 	=> __("Add text 1 here", 'advisor-core')
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
				"heading" 			=> __("Button Text", 'advisor-core'),
				"param_name" 		=> "button_text",
				"description" 	=> __("Add Button text here", 'advisor-core')
			),

			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Button Link", 'advisor-core'),
				"param_name" 		=> "button_link",
				"description" 	=> __("Add Button Link here", 'advisor-core')
			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Button Background Color", 'advisor-core' ),
				 "param_name" => "button_bg_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the button background.", 'advisor-core' )
			),
			array(
				 "type" => "colorpicker",
				 "class" => "",
				 "heading" => __( "Button Hover Background Color", 'advisor-core' ),
				 "param_name" => "button_hover_bg_color",
				 "value" => '#000000',
				 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
			),

			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Graph Parameter One", 'advisor-core'),
				"param_name" 		=> "graph_param1",
				"description" 	=> __("Please add first parameter to compare.", 'advisor-core'),

			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Graph Parameter Two", 'advisor-core'),
				"param_name" 		=> "graph_param2",
				"description" 	=> __("Please add second parameter to compare.", 'advisor-core'),

			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter January Values", 'advisor-core'),
				"param_name" 		=> "january_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter February Values", 'advisor-core'),
				"param_name" 		=> "february_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter March Values", 'advisor-core'),
				"param_name" 		=> "march_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter April Values", 'advisor-core'),
				"param_name" 		=> "april_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter May Values", 'advisor-core'),
				"param_name" 		=> "may_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter June Values", 'advisor-core'),
				"param_name" 		=> "june_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter July Values", 'advisor-core'),
				"param_name" 		=> "july_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter August Values", 'advisor-core'),
				"param_name" 		=> "august_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter September Values", 'advisor-core'),
				"param_name" 		=> "september_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter October Values", 'advisor-core'),
				"param_name" 		=> "october_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter November Values", 'advisor-core'),
				"param_name" 		=> "november_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
			),
			array(
				"type" 					=> "textfield",
				"heading" 			=> __("Parameter December Values", 'advisor-core'),
				"param_name" 		=> "december_values",
				"description" 	=> __("Please add only two comma separated number values to compare with two parameters.", 'advisor-core'),
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

add_action( 'vc_before_init', 'advisor_vc_map_progress_graph' );


?>
