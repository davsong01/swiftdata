<?php
if ( ! function_exists( 'advisor_full_width_bannar_with_background_img' ) ) {

	function advisor_full_width_bannar_with_background_img( $atts , $content = NULL ){

		extract( shortcode_atts( array(

			'class_name'        => '',

			'left_side_text_heading'   => '',
			'left_side_text'           => '',
			'left_side_text_color' 		 => '#fff',
			'left_side_text_alignment' => 'left',

			'left_side_button_link'      => '',
      'left_side_button_text'      => '',
			'left_side_button_bg_color'      => '#ffffff',
			'left_side_button_hover_bg_color'=> '#ffffff',

			'right_side_text_heading'   => '',
			'right_side_text'           => '',
			'right_side_text_color' 		 => '#fff',
			'right_side_text_alignment' => 'right',

			'right_side_button_link'      => '',
			'right_side_button_text'      => '',
			'right_side_button_bg_color'      => '#ffffff',
			'right_side_button_hover_bg_color'=> '#ffffff',

			'left_side_overlay_color'  => '#0C8521',
			'right_side_overlay_color' => '#302C5F',
			'overlay_color_opacity' => '0.90',

			'image' 				 => '',

			), $atts ) );

      if( !empty( $left_side_button_link ) ){

        $left_side_button_link = $left_side_button_link;

      }
      else {

        $left_side_button_link = '#';

      }

      if( !empty( $right_side_button_link ) ){

        $right_side_button_link = $right_side_button_link;

      }
      else {

        $right_side_button_link = '#';

      }

			if ( !empty ( $image ) ) {

				$image_src = wp_get_attachment_url( $image, array(1349, 631), false );
				$image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true);

			} else {

				$image_src = get_template_directory_uri() . "/images/1349x631.png";

			}

			$left_side_overlay_color  = advisor_convert_hex2rgba($left_side_overlay_color, $overlay_color_opacity);
			$right_side_overlay_color = advisor_convert_hex2rgba($right_side_overlay_color, $overlay_color_opacity);

			if ( empty( $left_side_overlay_color ) ) {
				$left_side_overlay_color = 'rgba(12, 133, 33, 0.90)';
			}

			if ( empty( $right_side_overlay_color ) ) {
				$right_side_overlay_color = 'rgba(48, 44, 95, 0.90)';
			}

			?>

			<style media="screen">

				.ad-bannerseven figure:before {
						left: 0;
						background: <?php echo $left_side_overlay_color; ?>;
					}

				.ad-bannerseven figure:after {
				    right: 0;
						background: <?php echo $right_side_overlay_color; ?>;
				}

				<?php if ( $left_side_text_alignment == 'center') { ?>

					.ad-bannerseven .ad-bannercontent .btn-left{
						margin: 0 auto;
					}

				<?php } ?>

				<?php if ( $right_side_text_alignment == 'center') { ?>
						.ad-bannerseven .ad-bannercontent .btn-right{
							margin: 0 auto;
						}
				<?php } ?>


			</style>

			<?php ob_start(); ?>

			<!-- MAIN BANNER -->
			<div class="ad-bannerseven <?php esc_attr_e( $class_name ); ?>">
				<figure>
					<img src="<?php esc_attr_e( $image_src ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
					<figcaption>
						<div class="ad-bannercontent">
							<?php if( !empty( $left_side_text_heading ) ) { ?><h1 style="color: <?php esc_attr_e( $left_side_text_color); ?>; text-align: <?php esc_attr_e( $left_side_text_alignment );?>"><?php echo $left_side_text_heading; ?></h1><?php } ?>
							<div class="ad-description">
								<?php if( !empty( $left_side_text ) ) { ?><p style="color: <?php esc_attr_e( $left_side_text_color); ?>; text-align: <?php esc_attr_e( $left_side_text_alignment );?>"><?php echo $left_side_text; ?></p><?php } ?>
							</div>

							<?php if( !empty( $left_side_button_text ) ){ ?>

								<a href="<?php echo $left_side_button_link; ?>" class="btn btn-left" data-text="<?php esc_html_e( $left_side_button_text , 'advisor-core'); ?>"
									style="background: <?php esc_attr_e( $left_side_button_bg_color ); ?>;
									border-color: <?php esc_attr_e( $left_side_button_bg_color ); ?>;"
									onMouseOver="this.style.background='<?php esc_attr_e( $left_side_button_hover_bg_color); ?>';
									this.style.borderColor='<?php esc_attr_e( $left_side_button_hover_bg_color); ?>';"
									onMouseOut="this.style.background='<?php esc_attr_e( $left_side_button_bg_color); ?>';
									this.style.borderColor='<?php esc_attr_e( $left_side_button_bg_color); ?>';">
									<?php esc_html_e( $left_side_button_text , 'advisor-core'); ?></a>

							<?php } ?>

						</div>
						<div class="ad-bannercontent">
							<?php if( !empty( $right_side_text_heading ) ) { ?><h1 style="color: <?php esc_attr_e( $right_side_text_color); ?>; text-align: <?php esc_attr_e( $right_side_text_alignment );?>"><?php echo $right_side_text_heading; ?></h1><?php } ?>
							<div class="ad-description">
								<?php if( !empty( $right_side_text ) ) { ?><p style="color: <?php esc_attr_e( $right_side_text_color); ?>; text-align: <?php esc_attr_e( $right_side_text_alignment );?>"><?php echo $right_side_text; ?></p><?php } ?>
							</div>

							<?php if( !empty( $right_side_button_text ) ){ ?>

								<a href="<?php echo $right_side_button_link; ?>" class="btn btn-right" data-text="<?php esc_html_e( $right_side_button_text , 'advisor-core'); ?>"
									style="background: <?php esc_attr_e( $right_side_button_bg_color ); ?>;
									border-color: <?php esc_attr_e( $right_side_button_bg_color ); ?>;"
									onMouseOver="this.style.background='<?php esc_attr_e( $right_side_button_hover_bg_color); ?>';
									this.style.borderColor='<?php esc_attr_e( $right_side_button_hover_bg_color); ?>';"
									onMouseOut="this.style.background='<?php esc_attr_e( $right_side_button_bg_color); ?>';
									this.style.borderColor='<?php esc_attr_e( $right_side_button_bg_color); ?>';">
									<?php esc_html_e( $right_side_button_text , 'advisor-core'); ?></a>

							<?php } ?>

						</div>
					</figcaption>
				</figure>
			</div>
			<!-- / MAIN BANNER -->

			<?php return ob_get_clean();
	}
}
add_shortcode('advisor_full_width_bannar', 'advisor_full_width_bannar_with_background_img');

// Visual Composer Map
function advisor_vc_map_full_width_bannar()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor advisor Full Width Bannar', 'advisor-core' ),
			'base' 				      		  => 'advisor_full_width_bannar',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,

			"params" => array(

				array(
					"type" 					=> "attach_image",
					"heading" 			=> __("Add Image", 'advisor-core'),
					"param_name" 		=> "image",
					"description" 	=> __("Add image (1349x631) if you want to in background of the Section.", 'advisor-core'),
				),

				array(
          "type" 					=> "textfield",
          "heading" 			=> __("Left Side Text Heading", 'advisor-core'),
          "param_name" 		=> "left_side_text_heading",
          "description" 	=> __("Add heading here", 'advisor-core')
        ),
        array(
          "type" 					=> "textarea",
          "heading" 			=> __("Left Side Text", 'advisor-core'),
          "param_name"		=> "left_side_text",
          "description" 	=> esc_html__("Add text here, it will show up below the heading above", 'advisor-core'),
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Left Side Text Color", 'advisor-core' ),
					 "param_name" => "left_side_text_color",
					 "value" => '#fff',
					 "description" => __( "Choose the Color for the heading and text that will display under heading.", 'advisor-core' )
				),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Left Side Text Alignment', 'advisor-core' ),
						'param_name' 		=> 'left_side_text_alignment',
						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
						"default" => 'center',
						'value' => array(
							esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
							esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
						 ),
				),
        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Left Side Button's Text", 'advisor-core'),
          "param_name" 		=> "left_side_button_text",
          "description" 	=> __("Add Button text here", 'advisor-core')
        ),
        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Left Side Button's Link", 'advisor-core'),
          "param_name" 		=> "left_side_button_link",
          "description" 	=> __("Add Button Link here", 'advisor-core')
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Left Side Button's Background Color", 'advisor-core' ),
					 "param_name" => "left_side_button_bg_color",
					 "value" => '#ffffff',
					 "description" => __( "Choose the Color for the button background.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Left Side Button's Hover Background Color", 'advisor-core' ),
					 "param_name" => "left_side_button_hover_bg_color",
					 "value" => '#ffffff',
					 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
				),
				array(
					"type" 					=> "textfield",
					"heading" 			=> __("Right Side Text Heading", 'advisor-core'),
					"param_name" 		=> "right_side_text_heading",
					"description" 	=> __("Add heading here", 'advisor-core')
				),
				array(
					"type" 					=> "textarea",
					"heading" 			=> __("Right Side Text", 'advisor-core'),
					"param_name"		=> "right_side_text",
					"description" 	=> esc_html__("Add text here, it will show up below the heading above", 'advisor-core'),
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Right Side Text Color", 'advisor-core' ),
					 "param_name" => "right_side_text_color",
					 "value" => '#fff',
					 "description" => __( "Choose the Color for the heading and text that will display under heading.", 'advisor-core' )
				),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Right Side Text Alignment', 'advisor-core' ),
						'param_name' 		=> 'right_side_text_alignment',
						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
						"default" => 'center',
						'value' => array(
							esc_html__( 'Right Align', 'advisor-core' )  			=> 'right',
							esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
						 ),
				),
				array(
					"type" 					=> "textfield",
					"heading" 			=> __("Right Side Button's Text", 'advisor-core'),
					"param_name" 		=> "right_side_button_text",
					"description" 	=> __("Add Button text here", 'advisor-core')
				),
				array(
					"type" 					=> "textfield",
					"heading" 			=> __("Right Side Button's Link", 'advisor-core'),
					"param_name" 		=> "right_side_button_link",
					"description" 	=> __("Add Button Link here", 'advisor-core')
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Right Side Button's Background Color", 'advisor-core' ),
					 "param_name" => "right_side_button_bg_color",
					 "value" => '#ffffff',
					 "description" => __( "Choose the Color for the button background.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Right Side Button's Hover Background Color", 'advisor-core' ),
					 "param_name" => "right_side_button_hover_bg_color",
					 "value" => '#ffffff',
					 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Left Side Overlay Color", 'advisor-core' ),
					 "param_name" => "left_side_overlay_color",
					 "value" => '#0C8521',
					 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Right Side Overlay Color", 'advisor-core' ),
					 "param_name" => "right_side_overlay_color",
					 "value" => '#302C5F',
					 "description" => __( "Choose the Color for the button background on hover.", 'advisor-core' )
				),
				array(
					"type" 					=> "textfield",
					"heading" 			=> __("Overlay Color Opacity", 'advisor-core'),
					"param_name" 		=> "overlay_color_opacity",
					"description" 	=> __("Default Color is 0.90", 'advisor-core'),
					'value'					=> '0.90',
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

add_action( 'vc_before_init', 'advisor_vc_map_full_width_bannar' );
?>
