<?php
function advisor_after_import_setup( $selected_import ) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    if ( isset( $main_menu->term_id ) ) {
      set_theme_mod( 'nav_menu_locations', array(
          'advisor-main-menu' 	=> $main_menu->term_id,
        )
      );
    }

    // Assign front page and posts page (blog page) and set sliders.

    if( 'Demo One' === $selected_import['import_file_name'] ) {

        $front_page_id = get_page_by_title( 'Home One' );

    } elseif( 'Demo Two' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Two' );

    } elseif( 'Demo Three' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Three' );

    } elseif( 'Demo Four' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Four' );

    } elseif( 'Demo Five' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Five' );

    } elseif( 'Demo Six' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Six' );

    } elseif( 'Demo Seven' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Seven' );

    } elseif( 'Demo Eight' === $selected_import['import_file_name']){

        $front_page_id = get_page_by_title( 'Home Eight' );

    } else {

      $front_page_id = get_page_by_title( 'Home One' );

    }
    $blog_page_id  = get_page_by_title( 'News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    /* Revolution Slider Import. */
    $slider_array = array(
       ADVISOR_CORE .'lib/advisor-demo/sliders/advisor-home.zip' ,
       ADVISOR_CORE .'lib/advisor-demo/sliders/home-three.zip',
       ADVISOR_CORE .'lib/advisor-demo/sliders/advisor-logistic.zip',
    );
    if ( class_exists( 'RevSlider' ) ) {

           $slider = new RevSlider();

           foreach( $slider_array as $filepath ){

             $slider->importSliderFromPost( true , true, $filepath );

           }
    }

}
add_action( 'pt-ocdi/after_import', 'advisor_after_import_setup', 1 , 24);
function advisor_plugin_intro_text( $default_text ) {

    $default_text .= '<div class="ocdi__intro-text"></div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'advisor_plugin_intro_text' );
function advisor_plugin_page_setup( $default_settings ) {

    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Advisor Demos' , 'advisor-core' );
    $default_settings['menu_title']  = esc_html__( 'Advisor Demos' , 'advisor-core' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'advisor-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'advisor_plugin_page_setup' );

function advisor_change_time_of_single_ajax_call() {

	return 20;

}
add_action( 'pt-ocdi/time_for_one_ajax_call', 'advisor_change_time_of_single_ajax_call' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
add_filter( 'pt-ocdi/enable_grid_layout_import_popup_confirmation', '__return_false' );


// Display the plugin title
function advisor_demo_page_title( $plugin_title ){ ?>

  <?php ob_start(); ?>
    <h1 class="ocdi__title  dashicons-before  advisor-demo-logo"><?php esc_html_e( 'Advisor Demos Import', 'advisor-core' ); ?></h1>
  <?php
  $plugin_title = ob_get_clean();
  return $plugin_title;
}
add_filter( 'pt-ocdi/plugin_page_title', 'advisor_demo_page_title' );

function caste_demo_page_intro( $plugin_intro_text ){ ?>

  <?php ob_start(); ?>
  <div class="ocdi__intro-notice  notice  notice-success ">
    <p><?php esc_html_e( 'Find amazing demos below. The demo import process can take few minutes, please wait and do not reload the page.', 'advisor-core' ); ?></p>
  </div>
  <div class="ocdi__intro-notice  notice  notice-warning advisor-wp-warning">
    <p><?php esc_html_e( 'Before you begin, make sure all the required plugins are activated, required plugins are Advisor Core, Revolution Slider and Visual Composer.', 'advisor-core' ); ?></p>
  </div>
  <!--Importing demo data-->
  <?php
  $plugin_intro_text = ob_get_clean();
  return $plugin_intro_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'caste_demo_page_intro' );
