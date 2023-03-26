<?php
function advisor_default_slider( $atts ){


	extract( shortcode_atts( array(

			'class_name'        => '',

		), $atts ) );

	global $advisor_options;

	$advisor_image_slide    = array();
	$heading_slide          = array();
	$text_slide             = array();
	$button_text_1_slide    = array();
	$button_text_2_slide    = array();
	$button_link_1_slide    = array();
	$button_link_2_slide    = array();
	$text_align_slide       = array();
	$heading_nav_slide      = array();
	$text_nav_slide         = array();
	$slide_delay = $advisor_options['adivor-slideshow-delay-time'];
	$i = 1;

	if ( isset($advisor_options['adivor-slideshow-navigation-thumbnails']) && $advisor_options['adivor-slideshow-navigation-thumbnails'] == 1 ) { ?>

		<style>

		.cd-slider-nav{
		  max-width: 1170px;
		  max-height: 110px;
		  overflow: visible;
		  position: absolute;
		  padding: 0px;
		  top: 100%;
		  left: 0;
		  right: 0;
		  height: 110px;
		  margin: -160px auto 0;
		  border-bottom:none;
		  box-shadow: none;
		}
		.cd-slider-nav a::before, .cd-slider-nav li:last-child a::after{
		  height: 110px;
		}

		.cd-slider-nav a {
		    padding: 34px 20px;
		}

		</style>


	<?php }

	$total_slides = 0;

	for($x = 1; $x<= 6; $x++){
		if ( !empty( $advisor_options['advisor-image-slide-'.$x]['url'] ) ) {
			++$total_slides;
		}
	}

	$i = 1;
	for ($i = 1; $i<= $total_slides; $i++ ) {

		if( !empty( $advisor_options['advisor-image-slide-'.$i]['url'] ) ) {

			$advisor_image_slide[] = $advisor_options['advisor-image-slide-'.$i]['url'];

		} else {

			$advisor_image_slide[] = '';

		}
		if( !empty( $advisor_options['heading-slide-'.$i] ) ) {

			$heading_slide[]       = $advisor_options['heading-slide-'.$i];

		} else {

			$heading_slide[] = '';

		}
		if( !empty( $advisor_options['text-slide-'.$i] ) ) {

			$text_slide[]          = $advisor_options['text-slide-'.$i];

		} else {

			$text_slide[] = '';
		}
		if( !empty( $advisor_options['button-text-1-slide-'.$i] ) ) {

			$button_text_1_slide[] = $advisor_options['button-text-1-slide-'.$i];

		}
		else {

			$button_text_1_slide[]      = '';

		}
		if( !empty( $advisor_options['button-text-2-slide-'.$i] ) ) {

			$button_text_2_slide[] = $advisor_options['button-text-2-slide-'.$i];

		} else {

			$button_text_2_slide[]      = '';

		}
		if( !empty( $advisor_options['button-link-1-slide-'.$i] ) ) {

			$button_link_1_slide[] = $advisor_options['button-link-1-slide-'.$i];

		} else {

			$button_link_1_slide[] = '';

		}
		if( !empty( $advisor_options['button-link-2-slide-'.$i] ) ) {

			$button_link_2_slide[] = $advisor_options['button-link-2-slide-'.$i];

		} else {

			$button_link_2_slide[] = '';

		}
		if( !empty( $advisor_options['text-align-slide-'.$i] ) ) {

			$text_align_slide[]    = $advisor_options['text-align-slide-'.$i];

		} else {

			$text_align_slide[] = '';

		}
		if( !empty( $advisor_options['heading-nav-slide-'.$i] ) ) {

			$heading_nav_slide[]   = $advisor_options['heading-nav-slide-'.$i];

		} else {

			$heading_nav_slide[] = '';

		}
		if( !empty( $advisor_options['text-nav-slide-'.$i] ) ) {

			$text_nav_slide[]      = $advisor_options['text-nav-slide-'.$i];

		} else {

			$text_nav_slide[]      = '';

		}


    }
		$slide_classes = '';
		$header_style = '';
		if ( ! empty( $advisor_options['advisor-header-layout']) ) {

			 $header_style = $advisor_options['advisor-header-layout'];

		} else {

			$header_style = 'one';

		}
    if( $header_style == 'three' ) {

       $slide_classes = 'margin-0';
		}
	?>

	<?php
	// setting slide item size corresponds to number of slide items

	$slide_number_size = 22;
	$link_text_number_size = 19;
	$text_span_size = 14;

	if ( $total_slides == 1 ) {
		$slide_number_size = 26;
		$link_text_number_size = 25;
		$text_span_size = 20;

		} elseif ( $total_slides == 2 ) {
		$slide_number_size = 25;
		$link_text_number_size = 24;
		$text_span_size = 18;

		} elseif ( $total_slides == 3 ) {
			$slide_number_size = 24;
			$link_text_number_size = 22;
			$text_span_size = 16;

		} elseif ( $total_slides == 4 ) {
			$slide_number_size = 22;
			$link_text_number_size = 19;
			$text_span_size = 14;

		} elseif ( $total_slides == 5 ) {
			$slide_number_size = 18;
			$link_text_number_size = 17;
			$text_span_size = 12;

		} elseif ( $total_slides == 6 ) {
			$slide_number_size = 14;
			$link_text_number_size = 14;
			$text_span_size = 10;

		} ?>

<?php

  $custom_css="<style>

		@media only screen and (min-width: 768px) {
			.cd-slider-nav .cd-marker, .cd-slider-nav li {
	    	width: ".  ( 100 / $total_slides )."% !important;
			}
		}

		.cd-slider-nav li .slide-number{
			font-size: ".  ( $slide_number_size )."px;
		}

		@media only screen and (min-width: 768px) {
			.cd-slider-nav a{
			font-size: ". ( $link_text_number_size )."px;
		}
	}
	@media only screen and (min-width: 768px) {
		.cd-slider-nav a span {
			font-size: ".  ( $text_span_size ) ."px;
		}
	}";

  if(isset($advisor_image_slide[0])){

		$custom_css.=".cd-hero-slider li:first-of-type {
	  background-color: #ccc;
	  background-image: url('".  $advisor_image_slide[0] ."');
	}";

}
if(isset($advisor_image_slide[1])){

	$custom_css.="
	.cd-hero-slider li:nth-of-type(2) {
	  background-color: #ccc;
	  background-image: url(".  $advisor_image_slide[1] .");
	}";
}
if(isset($advisor_image_slide[2])){

	$custom_css.="
	.cd-hero-slider li:nth-of-type(3) {
	  background-color: #ccc;
	  background-image: url(". $advisor_image_slide[2] .");
	}";
}
if(isset($advisor_image_slide[3])){

	$custom_css.="
	.cd-hero-slider li:nth-of-type(4) {
	  background-color: #ccc;
	  background-image: url(".  esc_url( $advisor_image_slide[3] ) .");
	}";
}
if(isset($advisor_image_slide[4])){

	$custom_css.="
	.cd-hero-slider li:nth-of-type(5) {
	  background-color: #ccc;
	  background-image: url(". $advisor_image_slide[4] .");
	}";
}
if(isset($advisor_image_slide[5])){

	$custom_css.="
	.cd-hero-slider li:nth-of-type(6) {
	  background-color: #ccc;
	  background-image: url(".  $advisor_image_slide[5] .");
	}";
}
    $custom_css.="</style>";
		update_option( 'advisor-custom-css', $custom_css );
		echo $custom_css;
		ob_start();
		?>
		<section class="cd-hero <?php echo $slide_classes; ?> <?php esc_attr_e( $class_name ); ?>">
				<ul class="cd-hero-slider autoplay" data-delay="<?php echo $slide_delay; ?>">

					<?php for( $i = 0; $i < $total_slides; $i++ ) {

						if( !empty( $advisor_image_slide[$i] ) ) { ?>

              <li class="selected">
                  <div class="cd-full-width">
                      <div class="container <?php echo $text_align_slide[$i]; ?>">

                      <?php if( !empty( $heading_slide[$i] ) ){ ?>


                          <h2><?php _e( $heading_slide[$i] , 'advisor-core'); ?></h2>

                       <?php } ?>
                        <?php if( !empty( $text_slide[$i] ) ){ ?>

                                  <p><?php _e( $text_slide[$i] , 'advisor-core'); ?></p>

                          <?php } ?>
                          <?php if( !empty( $button_text_1_slide[$i] ) ){ ?>

                                      <a href="<?php echo $button_link_1_slide[$i]; ?>" class="btn btn-primary" data-text="<?php _e( $button_text_1_slide[$i] , 'advisor-core'); ?>"><?php _e( $button_text_1_slide[$i] , 'advisor-core'); ?></a>
                          <?php } ?>

                          <?php if( !empty( $button_text_2_slide[$i] ) ){ ?>

                                      <a href="<?php echo $button_link_2_slide[$i]; ?>" class="btn btn-default" data-text="<?php _e( $button_text_2_slide[$i] , 'advisor-core'); ?>"><?php _e( $button_text_2_slide[$i] , 'advisor-core'); ?></a>
                          <?php } ?>
                      </div>
                  </div>
              </li>
                <?php }

				}

				?>

				</ul>

				<div class="cd-slider-nav">
					<nav class="container">
						<span class="cd-marker item-1"></span>
              <ul>

								<?php for( $i = 0; $i < $total_slides; $i++ ) {

							   	if( !empty( $advisor_image_slide[$i] ) ) { ?>

										<li class="<?php if($i == 0){ echo 'selected'; } ?>"><a href="#0">
                          <div class="slide-number"><?php _e( $i+1 , 'advisor-core'); ?></div> <?php _e( $heading_nav_slide[$i] , 'advisor-core'); ?><span><?php _e( $text_nav_slide[$i] , 'advisor-core'); ?></span></a></li>

								<?php }
							 } ?>
						</ul>
					</nav>
				</div>

			</section> <!-- / MAIN BANNER -->
        <?php

	    return ob_get_clean();
}
add_shortcode('advisor_slider', 'advisor_default_slider');


// Visual Composer Map
function advisor_vc_map_slider()
{
vc_map( array(

		'name' 										=> esc_html__( 'Advisor Default Slider', 'advisor-core' ),
		'base' 										=> 'advisor_slider',
		'icon'                    => get_template_directory_uri().'/images/advisor-icon-vc.png',
		'category' 								=> esc_html__( 'Advisor Theme', 'advisor-core' ),
		'show_settings_on_create' => false,
		'content_element' 				=> true,
    'is_container' 						=> false,

		"params" => array(

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

add_action( 'vc_before_init', 'advisor_vc_map_slider' );

?>
