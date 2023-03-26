<?php
if ( ! function_exists( 'advisor_intro_with_background_video' ) ) {

	function advisor_intro_with_background_video( $atts , $content = NULL ){

		extract( shortcode_atts( array(

			'class_name'        => '',
      'background_color'  => '#040e39',
      'heading'           => '',
      'text'              => '',
			'text_color' 			  => '#fff',
			'text_align'        => 'center',
      'button1_text'      => '',
      'button2_text'      => '',
      'button1_link'      => '',
      'button2_link'      => '',
			'button1_bg_color'      => '#09a223',
			'button1_hover_bg_color'=> '#09a223',
			'button2_bg_color'      => '#fff',
			'button2_hover_bg_color'=> '#fff',
			'show'						 => 'video',
			'image_id' 				 => '',
      'video_link'       => '',

			), $atts ) );

      if( !empty( $button1_link ) ){

        $button1_link = $button1_link;

      }
      else {

        $button1_link = '#';

      }

      if( !empty( $button2_link ) ){

        $button2_link = $button2_link;

      }
      else {

        $button2_link = '#';

      }


			$banner_class = '';

			if ( !empty( $show ) ) {
				if ( $show == 'video' ) {

					if ( !empty ( $video_link ) ) {

		        $video_src = $video_link;
						$banner_class = 'video-banner';

		      } else {

		        $video_src = '';
						$banner_class = 'video-banner';

		      }

				} elseif ( $show == 'image' ) {

					if ( !empty ( $image_id ) ) {

						$image_src = wp_get_attachment_url( $image_id , array(1732, 968) , false );
						$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
						$banner_class = 'image-banner';

					} else {

						$image_src = '';
						$banner_class = 'image-banner';

					}

				}

			} else {

				$video_src = '';
				$image_src = '';
				$banner_class = '';

			}

			ob_start(); ?>

      <!-- MAIN BANNER -->
      <div class="vd-banner <?php esc_attr_e( $banner_class );?> <?php esc_attr_e( $class_name ); ?>" <?php if ( !empty ( $image_src ) ) { ?>style="background:url(<?php echo esc_url( $image_src ); ?>) 0 0 no-repeat; background-size: 100% auto; background-attachment: fixed;" <?php } ?> >
        <div class="banner-text">
          <div class="container">
            <div class="row">
              <div class="col-md-12" <?php if ( !empty( $text_align ) ) { ?> style="text-align: <?php esc_attr_e( $text_align );?>" <?php } ?> >
                <?php if( !empty( $heading ) ){ ?>

                <h1 style="color: <?php esc_attr_e( $text_color); ?>"><?php esc_html_e( $heading , 'advisor-core'); ?></h1>

                <?php } ?>

                <?php if( !empty( $text ) ){ ?>

                <span style="color: <?php esc_attr_e( $text_color); ?>"><?php _e( $text , 'advisor-core'); ?></span>

                <?php } ?>

                <?php if( !empty( $button1_text ) ){ ?>

                  <a href="<?php echo $button1_link; ?>" class="btn btn-primary" data-text="<?php esc_html_e( $button1_text , 'advisor-core'); ?>"
										style="background: <?php esc_attr_e( $button1_bg_color ); ?>;"
										onMouseOver="this.style.background='<?php esc_attr_e( $button1_hover_bg_color); ?>'"
										onMouseOut="this.style.background='<?php esc_attr_e( $button1_bg_color); ?>'">
										<?php esc_html_e( $button1_text , 'advisor-core'); ?></a>

                <?php } ?>

                <?php if( !empty( $button2_text ) ){ ?>

                  <a href="<?php echo $button2_link; ?>" class="btn btn-primary btn-white" data-text="<?php esc_html_e( $button2_text , 'advisor-core'); ?>"
										style="background: <?php esc_attr_e( $button2_bg_color ); ?>;"
										onMouseOver="this.style.background='<?php esc_attr_e( $button2_hover_bg_color); ?>'"
										onMouseOut="this.style.background='<?php esc_attr_e( $button2_bg_color); ?>'">
										<?php esc_html_e( $button2_text , 'advisor-core'); ?></a>

                <?php } ?>

              </div>
            </div>
          </div>
        </div>

        <?php if( !empty( $show ) && ( $show == 'video' ) ) { ?><div class="video-overlay" style="background:<?php echo esc_attr( $background_color ); ?>"></div><?php } ?>

	        <video id="my-video" class="video" autoplay muted loop>
	          <source src="<?php echo ( $video_src ); ?>" type="video/mp4">
	        </video>

					<?php if( $show == 'video' && preg_match('/(Chrome|CriOS)\//i',$_SERVER['HTTP_USER_AGENT'])
						 && !preg_match('/(Aviator|ChromePlus|coc_|Dragon|Edge|Flock|Iron|Kinza|Maxthon|MxNitro|Nichrome|OPR|Perk|Rockmelt|Seznam|Sleipnir|Spark|UBrowser|Vivaldi|WebExplorer|YaBrowser)/i',$_SERVER['HTTP_USER_AGENT'])) { ?>

							 <script type="text/javascript">

							 function google_chrome_play_bg_video() {
									jQuery("#my-video").replaceWith(jQuery('<video id="my-video" width="100%" autoplay muted loop><source src="<?php echo ( $video_src ); ?>" type="video/webm"></video>'));
		        		}

								window.onload = google_chrome_play_bg_video;

							 </script>

				 <?php } ?>

      </div>
      <!-- / MAIN BANNER -->

      <?php

		 return ob_get_clean();
	}
}
add_shortcode('advisor_intro', 'advisor_intro_with_background_video');

// Visual Composer Map
function advisor_vc_map_intro()
{
	vc_map( array(

			'name'										=> esc_html__( 'Advisor Intro', 'advisor-core' ),
			'base' 				      		  => 'advisor_intro',
			'category'				  			=> esc_html__( 'Advisor Theme', 'advisor-core' ),
			'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
			'show_settings_on_create' => true,
			'content_element' 		  	=> true,
	    'is_container' 			  		=> false,

			"params" => array(

        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Heading", 'advisor-core'),
          "param_name" 		=> "heading",
          "description" 	=> __("Add heading here", 'advisor-core')
        ),
        array(
          "type" 					=> "textarea",
          "heading" 			=> __("Text", 'advisor-core'),
          "param_name"		=> "text",
          "description" 	=> esc_html__("Add text here, it will show up below the heading above", 'advisor-core'),
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Text Color", 'advisor-core' ),
					 "param_name" => "text_color",
					 "value" => '#fff',
					 "description" => __( "Choose the Color for the heading and text that will display under heading.", 'advisor-core' )
				),
				array(
						'type'      		=> 'dropdown',
						'heading'   		=> esc_html__( 'Text Align', 'advisor-core' ),
						'param_name' 		=> 'text_align',
						"description" 	=> esc_html__("Select text alignment.", 'advisor-core'),
						"default" => 'center',
						'value' => array(

								esc_html__( 'Select Aligment', 'advisor-core' ) 	=> '',
								esc_html__( 'Left Align', 'advisor-core' )  			=> 'left',
								esc_html__( 'Centered', 'advisor-core' )  			  => 'center',
						 ),
						 'dependency'    => array (
						 'element'   => 'show',
						 'value'     => array('video', 'image'),
						 'not_empty' =>  false,

						 )
				),
				array(
				'type'      		=> 'dropdown',
				'heading'   		=> esc_html__( 'Select To Show Image or Video in background', 'advisor-core' ),
				'param_name' 		=> 'show',
				"description" 	=> esc_html__("Select Image/Video which will in the background of the Section.", 'advisor-core'),
				'value' => array(

						esc_html__( 'Video', 'advisor-core' )  		=> 'video',
						esc_html__( 'Image', 'advisor-core' )  		=> 'image',
				 ),
				 "default" => 'video',

			 ),
        array(
          "type" 					=> "textfield",
          "heading" 			=> esc_html__("Background Video Source", "advisor-core"),
          "param_name"		=> "video_link",
          "description"		=> esc_html__("Add URL of Self Hosted Video Source for this Section", "advisor-core"),
					'dependency'    => array (
					'element'   => 'show',
					'value'     => array('video'),
					'not_empty' =>  false,

					)
        ),
				array(
					"type" 					=> "attach_image",
					"heading" 			=> __("Add Image", 'advisor-core'),
					"param_name" 		=> "image_id",
					"description" 	=> __("Add image (1732x968) if you want to in background of the Section.", 'advisor-core'),
					'dependency'    => array (
					'element'   => 'show',
					'value'     => array('image'),
					'not_empty' =>  false,

					),
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Background Color", 'advisor-core' ),
					 "param_name" => "background_color",
					 "value" => '#040e39',
					 "description" => __( "Choose the Background Color", 'advisor-core' ),
					 'dependency'    => array (
					 'element'   => 'show',
					 'value'     => array('video'),
					 'not_empty' =>  false,

					 )
				),
        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Button 1 Text", 'advisor-core'),
          "param_name" 		=> "button1_text",
          "description" 	=> __("Add Button 1 text here", 'advisor-core')
        ),
        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Button 1 Link", 'advisor-core'),
          "param_name" 		=> "button1_link",
          "description" 	=> __("Add Button 1 Link here", 'advisor-core')
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Button 1 Background Color", 'advisor-core' ),
					 "param_name" => "button1_bg_color",
					 "value" => '#09a223',
					 "description" => __( "Choose the Color for the button 1 background.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Button 1 Hover Background Color", 'advisor-core' ),
					 "param_name" => "button1_hover_bg_color",
					 "value" => '#09a223',
					 "description" => __( "Choose the Color for the button 1 background on hover.", 'advisor-core' )
				),
        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Button 2 Text", 'advisor-core'),
          "param_name" 		=> "button2_text",
          "description" 	=> __("Add Button 2 text here", 'advisor-core')
        ),

        array(
          "type" 					=> "textfield",
          "heading" 			=> __("Button 2 Link", 'advisor-core'),
          "param_name" 		=> "button2_link",
          "description" 	=> __("Add Button 2 Link here", 'advisor-core')
        ),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Button 2 Background Color", 'advisor-core' ),
					 "param_name" => "button2_bg_color",
					 "value" => '#fff',
					 "description" => __( "Choose the Color for the button 2 background.", 'advisor-core' )
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => __( "Button 2 Hover Background Color", 'advisor-core' ),
					 "param_name" => "button2_hover_bg_color",
					 "value" => '#fff',
					 "description" => __( "Choose the Color for the button 2 background on hover.", 'advisor-core' )
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

add_action( 'vc_before_init', 'advisor_vc_map_intro' );
?>
