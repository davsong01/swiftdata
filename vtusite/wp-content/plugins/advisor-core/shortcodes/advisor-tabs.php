<?php
if ( ! function_exists( 'advisor_simple_tabs' ) ) {

	function advisor_simple_tabs( $atts , $content = NULL ){

		extract( shortcode_atts( array(

				'class_name' => '',
				'heading'  	 => '',
				'text'   	 	 => '',
				'text_color' => '#000000',
				'tabs'   	 	 => '',

			), $atts ) );

			ob_start(); ?>

			<div class="<?php esc_attr_e( $class_name ); ?>">
				<?php if( !empty( $heading ) ){ ?>

					<h3 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core' ); ?></h3>

				<?php } ?>
				<?php if( !empty( $text ) ){ ?>

					<p style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $text , 'advisor-core' ); ?></p>

				<?php } ?>
				<div class="height-20"></div>
				<?php
				if( !empty( $tabs ) ) {

					if( function_exists( 'vc_param_group_parse_atts' ) ) {

						$tabs = vc_param_group_parse_atts( $tabs );
						$i = 0;

						?>
								<ul class="nav nav-tabs" role="tablist">

								<?php foreach( $tabs as $single_tab ) { ?>

									<?php $single_tab_title = $single_tab['tab_title']; ?>
									<li role="presentation" class="<?php	if( $i == 0 ) { echo 'active'; } ?>"><a href="#<?php echo 'tab-' . $i; ?>" aria-controls="<?php echo 'tab-' . $i; ?>" role="tab" data-toggle="tab"><?php esc_html_e( $single_tab_title , 'advisor-core' ); ?></a></li>

									<?php $i++; ?>

								<?php } ?>

							 	</ul>

						  	<div class="tab-content">

								<?php
								$i = 0;

								foreach( $tabs as $single_tab ) { ?>

								<div role="tabpanel" class="tab-pane <?php	if( $i == 0 ) { echo 'active'; } ?>" id="<?php echo 'tab-' . $i; ?>">


									<p><?php _e( $single_tab['tab_text'] , 'advisor-core' ); ?></p>


								</div>

								<?php $i++; ?>


							 <?php } ?>

							</div>

						<?php } ?>

						<?php } ?>

					</div>

          <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_tabs', 'advisor_simple_tabs');

// Visual Composer Map
function advisor_vc_map_simple_tabs()
{

		vc_map(
    array(
			'name'										=> esc_html__( 'Advisor Simple Tabs', 'advisor-core' ),
			'base' 				      		  => 'advisor_tabs',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
			'is_container' 			  		=> false,
        'params' => array(

					array(
							"type" 					=> "textfield",
							"heading" 			=> esc_html__("Heading", 'advisor-core'),
							"param_name"		=> "heading",
							"description"		=> esc_html__("Enter heading here.", 'advisor-core')
					),
					array(
							"type" 					=> "textfield",
							"heading" 			=> esc_html__("Text", 'advisor-core'),
							"param_name"		=> "text",
							"description"		=> esc_html__("Enter text here. This will display under heading.", 'advisor-core')
					),
					array(
						 "type" => "colorpicker",
						 "class" => "",
						 "heading" => __( "Text Color", 'advisor-core' ),
						 "param_name" => "text_color",
						 "value" => '#000000',
						 "description" => __( "Choose the Color for the heading and text.", 'advisor-core' )
					),
					array(
							"type" 					=> "textfield",
							"heading" 			=> __("Extra Class Name", 'advisor-core'),
							"param_name"		=> "class_name",
							"description"		=> __("Enter a class name for the shortcode here.", 'advisor-core')
					),

            // params group
            array(

                'type' => 'param_group',
								"heading" 			=> __("Add Tabs", 'advisor-core'),
								"param_name"		=> "text",
								"description"		=> __("Add tab heading and the text inside the tab.", 'advisor-core'),
                'param_name' 		=> 'tabs',
                'params' => array(
                    array(
                        'type' 				=> 'textfield',
                        'value' 			=> '',
                        'heading' 		=> esc_html__("Tab Title", 'advisor-core'),
                        'param_name' 	=> 'tab_title',
                    ),
										array(
                        'type' 				=> 'textarea',
                        'value' 			=> '',
                        'heading' 		=> esc_html__("Tab Text", 'advisor-core'),
                        'param_name' 	=> 'tab_text',
                    ),

                )
            )
        )
    )
);
}

add_action( 'vc_before_init', 'advisor_vc_map_simple_tabs' );
////https//wpbakery.atlassian.net/wiki/display/VC/Use+Param+Group+in+Elements
?>
