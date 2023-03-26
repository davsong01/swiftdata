<?php
if ( ! function_exists( 'advisor_strategy_graph_with_grid_icons' ) ) {

	function advisor_strategy_graph_with_grid_icons( $atts ){

		extract( shortcode_atts( array(

				'class_name'           => '',
				'heading'              => '',
				'text'                 => '',
				'text_color' 					 => '#000000',

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

						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="ad-strategy">
								<div class="ad-sectionhead">
									<div class="ad-sectiontitle">

										<?php if( !empty( $heading ) ){ ?>

										<h2 style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $heading , 'advisor-core'); ?></h2>

										<?php } ?>

									</div>
									<div class="ad-description">

										<?php if( !empty( $text ) ){ ?>

											<p style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></p>

										<?php } ?>

									</div>
								</div>

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

									<!-- don't run script, if are $graph_param1 and $graph_param2 empty -->
									<?php if ( !empty( $graph_param1 ) && !empty( $graph_param2 ) ) { ?>

										<script>
											jQuery(document).ready(function() {
												function areaChart(){
													google.charts.load('current', {'packages':['corechart']});
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
															vAxis: {minValue: 10},
															height: 325,
															colors: ['#395ccb', '#dc5660'],
															legend: {position: 'bottom', maxLines: 2},
															chartArea:{left:20, top:20, width:'90%'},
														};

														var chart_id = '<?php echo $graph_id; ?>';
														var chart = new google.visualization.AreaChart(document.getElementById(chart_id));
														chart.draw(data, options);
													}
												}
												areaChart();
											});
										</script>

									<?php } ?>
							</div>
						</div>

						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="ad-widgettextbox">
								<div class="ad-features ad-featurestwo">

									<?php echo do_shortcode($content); ?>

								</div>
							</div>
						</div>


					</div>
				</div>
			</section>

		<?php return ob_get_clean();
	}
}
add_shortcode('advisor_strategy_graph', 'advisor_strategy_graph_with_grid_icons');


  if ( ! function_exists( 'advisor_strategy_graph_with_grid_icons_item' ) ) {

  	function advisor_strategy_graph_with_grid_icons_item( $atts , $content = NULL ){

  		extract( shortcode_atts( array(

				'icon'               => '',
				'icon_heading'       => '',
				'icon_text'          => '',
				'icon_text_color'	   => '#000000',

			), $atts ) );

			if( !empty( $icon ) ) {

				$icon_class = ( get_advisor_services_icon( $icon ) != '' ? get_advisor_services_icon( $icon ) : '' );

			} else {

				$icon_class = '';

			}

  		ob_start(); ?>

			<div class="ad-feature">
				<div class="ad-featureicon">
					<i class="icon-img-1"></i>
				</div>

				<?php if( !empty( $icon_heading ) ){ ?>

				<h3 style="color: <?php esc_attr_e( $icon_text_color ); ?>"><?php _e( $icon_heading , 'advisor-core'); ?></h3>

				<?php } ?>

				<div class="ad-description">

					<?php if( !empty( $icon_heading ) ){ ?>

					<p style="color: <?php esc_attr_e( $icon_text_color ); ?>"><?php _e( $icon_heading , 'advisor-core'); ?></p>

					<?php } ?>

				</div>
			</div>

      <?php return ob_get_clean();
  	}
  }
  add_shortcode('advisor_strategy_graph_item', 'advisor_strategy_graph_with_grid_icons_item');


	// Visual Composer Map
	function advisor_vc_map_strategy_graph() {

		vc_map( array(

				'name'					=> esc_html__( 'Advisor Strategy Graph', 'advisor-core' ),
				'base' 				    => 'advisor_strategy_graph',
				'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
				'category'				=> esc_html__( 'Advisor Theme', 'advisor-core' ),
				'as_parent' 			=> array('only' => 'advisor_strategy_graph_item'),
				'show_settings_on_create' => true,
				'content_element' 		  => true,
				'is_container' 			  => false,
				'js_view' 				  => 'VcColumnView',
				"params"                  => array(

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

			));

		vc_map( array(

				"name" 										=> __("Advisor Strategy Graph Item", 'advisor-core'),
				"base" 										=> "advisor_strategy_graph_item",
				'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
				"content_element"   			=> true,
				"as_child" 								=> array('only' => 'advisor_strategy_graph'),
				"show_settings_on_create" => true,
				'is_container' 						=> true,
				"params"                  => array(

					array(
							'type'      		=> 'dropdown',
							'heading'   		=> esc_html__( 'Select Icon', 'advisor-core' ),
							'param_name' 		=> 'icon',
							"description" 	=> esc_html__("Select icon, make sure to check icons in docs.", 'advisor-core'),
							'value' => array(

									esc_html__( 'Select Icon', 'advisor-core' ) 	    		=> '',
									esc_html__( 'icon-money', 'advisor-core' )     			=> 'icon-money',
									esc_html__( 'icon-save-money', 'advisor-core' )  		=> 'icon-save-money',
									esc_html__( 'icon-consulting', 'advisor-core' )			=> 'icon-consulting',
									esc_html__( 'icon-travel', 'advisor-core' )		  		=> 'icon-travel',
									esc_html__( 'icon-consumer', 'advisor-core' )				=> 'icon-consumer',
									esc_html__( 'icon-privacy', 'advisor-core' )   	  	=> 'icon-privacy',
									esc_html__( 'icon-secure', 'advisor-core' )      		=> 'icon-secure',
									esc_html__( 'icon-planning', 'advisor-core' )				=> 'icon-planning',
									esc_html__( 'icon-online-consult', 'advisor-core' )	=> 'icon-online-consult',

							 )
					),
						array(
								"type"					=> "textfield",
								"heading" 			=> __("Heading", 'advisor-core'),
								"param_name"    => "icon_heading",
								"description"   => __("Enter text heading here", 'advisor-core')
						),
						array(
								 "type" 				=> "textarea",
								 "heading" 		  => __("Text Below Heading", 'advisor-core'),
								 "param_name" 	=> "icon_text",
								 "description" => __("Enter the text to show below the heading.", 'advisor-core')
							 ),
							 array(
									"type" => "colorpicker",
									"class" => "",
									"heading" => __( "Text Color", 'advisor-core' ),
									"param_name" => "icon_text_color",
									"value" => '#000000',
									"description" => __( "Choose the Color for the heading and text below heading.", 'advisor-core' )
							 ),

						)

				)

			);
			if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
					class WPBakeryShortCode_advisor_strategy_graph extends WPBakeryShortCodesContainer {
					}
			}
			if ( class_exists( 'WPBakeryShortCode' ) ) {
					class WPBakeryShortCode_advisor_strategy_graph_item extends WPBakeryShortCode {
					}
			}


	}

add_action( 'vc_before_init', 'advisor_vc_map_strategy_graph' );


?>
