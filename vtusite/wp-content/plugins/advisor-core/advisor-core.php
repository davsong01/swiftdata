<?php
/*
Plugin Name: Advisor Core
Plugin URI: http://advisor.brighthemes.biz/
Description: Core plugin for advisor theme
Version: 1.4.2
Author: BrighThemes
Author URI: http://advisor.brighthemes.biz/
Copyright: BrighThemes
Text Domain: advisor-core
*/


 if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 //Advisor Core Path

define( 'ADVISOR_CORE' , plugin_dir_path(__FILE__) );

add_action( 'plugins_loaded', 'advisor_core_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function advisor_core_load_textdomain() {

	load_plugin_textdomain( 'advisor-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

}

/* ======== INCLUDING POST TYPES ========= */

require_once ADVISOR_CORE . 'post-types-taxonomies/advisor-custom-post-types.php';

/* ======== INCLUDING Shortcodes========= */

require_once ADVISOR_CORE . 'shortcode.php';

/* Core functions */

require_once ADVISOR_CORE . 'functions-core.php';

/* ======== INCLUDING Redux========= */

if ( ! class_exists( 'Redux' ) ) {

require_once ADVISOR_CORE . 'lib/redux-framework/redux/ReduxCore/framework.php';

}
if ( class_exists( 'Redux' ) ) {

require_once ADVISOR_CORE . 'lib/redux-framework/loader.php';

}

/* ======== INCLUDING Redux========= */

if ( !class_exists( 'RWMB_Loader' ) ) {

require_once ADVISOR_CORE . 'lib/meta-box/meta-box.php';

}
/* Advisor Demos */
require_once ADVISOR_CORE . 'lib/advisor-demo/one-click-demo-import/one-click-demo-import.php';
require_once ADVISOR_CORE . 'lib/advisor-demo/demo-data.php';
require_once ADVISOR_CORE . 'lib/advisor-demo/functions-demo.php';
?>
