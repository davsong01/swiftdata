<?php
if ( ! function_exists( 'advisor_pie_chart' ) ) {

	function advisor_pie_chart( $atts ){

		extract( shortcode_atts( array(

				'class_name'        => '',
				'red_percent'  			=> '',
				'red_label'  				=> 'Red',
				'green_percent'   	=> '',
				'green_label'   		=> 'Green',
				'yellow_percent'   	=> '',
				'yellow_label'   		=> 'Yellow',
				'heading'   				=> '',
				'text'   						=> '',
				'text_color'				=> '#000000',

			), $atts ) );

			$id = 'chart_id_' . rand();
			$args = array( 'red_percent' => $red_percent, 'red_label' => $red_label , 'green_percent' => $green_percent , 'green_label' => $green_label , 'yellow_percent' => $yellow_percent, 'yellow_label' => $yellow_label,  'id' => $id  );


			ob_start(); ?>

				<div class="col-md-6 <?php esc_attr_e( $class_name ); ?>">

					<h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php if( !empty( $heading ) ) { esc_html_e( $heading , 'advisor-core');  } ?></h3>

				<div class="chart-widget">

					<div id="<?php echo $id; ?>" style="height: 210px; width: 100%;"></div>

				<?php if( !empty( $text ) ) { ?>

					<p><?php _e( $text , 'advisor-core'); ?></p>

				<?php } ?>

				</div>

				</div>



			<?php
			if ( wp_script_is( 'advisor-canvas', 'enqueued' ) ) {

				do_action( 'advisor_charts_script' , $args );

			}
		 return ob_get_clean();
	}
}
add_shortcode('advisor_chart', 'advisor_pie_chart');

// Visual Composer Map
function advisor_vc_map_pie_chart()
{
	vc_map( array(

			'name'			   		 			 	=> esc_html__( 'Advisor Pie Chart', 'advisor-core' ),
			'base' 					  				=> 'advisor_chart',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,

			"params" => array(

					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Heading", 'advisor-core'),
	 		        "param_name"		=> "heading",
	 		        "description"		=> esc_html__("Enter heading to display above Pie Chart.", 'advisor-core')
	 				),

					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Text", 'advisor-core'),
	 		        "param_name"		=> "text",
	 		        "description"		=> esc_html__("Enter text to display below Pie Chart.", 'advisor-core')
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
	 		        "heading" 			=> esc_html__("Red Bar Percentage", 'advisor-core'),
	 		        "param_name"		=> "red_percent",
	 		        "description"		=> esc_html__("Please enter Number/Decimal Point value without percentage symbol. Leave blank if you don't want to display this bar in chart.", 'advisor-core')
	 				),
					array(
							"type" 					=> "textfield",
							"heading" 			=> esc_html__("Red Bar Label", 'advisor-core'),
							"param_name"		=> "red_label",
							"description"		=> esc_html__("Please enter the label for red bar,if it is empty then 'Red' will show up. ", 'advisor-core')
					),

					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Green Bar Percentage", 'advisor-core'),
	 		        "param_name"		=> "green_percent",
	 		        "description"		=> esc_html__("Please enter Number/Decimal Point value without percentage symbol. Leave blank if you don't want to display this bar in chart. ", 'advisor-core')
	 				),
					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Green Bar Label", 'advisor-core'),
	 		        "param_name"		=> "green_label",
	 		        "description"		=> esc_html__("Please enter the label for greem bar, if it is empty then 'Green' will show up.  ", 'advisor-core')
	 				),

					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Yellow Bar Percentage", 'advisor-core'),
	 		        "param_name"		=> "yellow_percent",
	 		        "description"		=> esc_html__("Please enter Number/Decimal Point value without percentage symbol. Leave blank if you don't want to display this bar in chart. ", 'advisor-core')
	 				),
					array(
	 		        "type" 					=> "textfield",
	 		        "heading" 			=> esc_html__("Yellow Bar Label", 'advisor-core'),
	 		        "param_name"		=> "yellow_label",
	 		        "description"		=> esc_html__("Please enter the label for yellow bar, if it is empty then 'Yellow' will show up. ", 'advisor-core')
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

add_action( 'vc_before_init', 'advisor_vc_map_pie_chart' );
function advisor_chart_script_callback( $args = '' ){

	if( !empty( $args['id'] ) ) {

	?>
  <script>

	/* ------------------------------------------------------------------------
			   PIECHART
			------------------------------------------------------------------------ */

				var chart = new CanvasJS.Chart("<?php echo $args['id']; ?>",
				{
				animationEnabled: true,
				theme: "theme5",
				legend:{
				  fontSize: 14
				 },
				data: [
				{
					type: "doughnut",
					startAngle:0,
					showInLegend:true,
					toolTipContent: "{y} %",

					dataPoints: [

					<?php	if( !empty( $args['red_label'] ) && !empty( $args['red_percent'] ) ) {  ?>	{  y: <?php echo doubleval( $args['red_percent'] ); ?>, legendText: "<?php echo $args['red_label']; ?>" }, <?php } ?>
					<?php if( !empty( $args['green_label'] ) && !empty( $args['green_percent'] ) ) { ?>	{  y: <?php echo doubleval( $args['green_percent']); ?>, legendText: "<?php echo $args['green_label']; ?>"  }, <?php } ?>
					<?php	if( !empty( $args['yellow_label'] ) && !empty( $args['yellow_percent'] ) ) { ?>	{  y: <?php echo doubleval( $args['yellow_percent']); ?>, legendText: "<?php echo $args['yellow_label']; ?>" }, <?php } ?>

					]
				}
				]
			});

			chart.render();




	</script>
    <?php
	}
}
add_action('advisor_charts_script' , 'advisor_chart_script_callback' );
?>
