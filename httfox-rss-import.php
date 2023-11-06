<?php
/*
 * Plugin Name:       httFox - cbn - Import RSS
 * Plugin URI:        https://httfox.com/products/wordpress/plugins/import-rss-feeds/
 * Description:       Plugin personalizado para a importação do RSS. Caso precise alterar, edite os arquivos dele
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Pedro Figueira
 * Author URI:        https://pedrofigueira.dev/
 */

/*
 * =======================================================
 * BEGIN -> General security
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Impede o acesso direto ao arquivo
}
// END -> General security


/*
 * =======================================================
 * BEGIN -> Define consts
 */

// Define general constants
if( !defined( 'HTTFOX_RSSIMP_VERSION' ) ){
  define( 'HTTFOX_RSSIMP_VERSION', '0.1' );
}

if( !defined( 'HTTFOX_RSSIMP_NAME' ) ){
  define( 'HTTFOX_RSSIMP_NAME', 'httFox - cbn - Create Specifc API routes' );
}

if( !defined( 'HTTFOX_RSSIMP_SLUG' ) ){
  define( 'HTTFOX_RSSIMP_SLUG', 'httfox-cbn-create-specifc-api-routes' );
}

if( !defined( 'HTTFOX_RSSIMP_SLUG_ARCHIVE' ) ){
  define( 'HTTFOX_RSSIMP_SLUG_ARCHIVE', 'httfox-ccsar' );
}

if( !defined( 'HTTFOX_RSSIMP_SLUG_DB' ) ){
  define( 'HTTFOX_RSSIMP_SLUG_DB', 'httfox_cbn_create_specifc_api_routes' );
}

if( !defined( 'HTTFOX_RSSIMP_BASENAME' ) ){
  define( 'HTTFOX_RSSIMP_BASENAME', plugin_basename( __FILE__ ) );
}

if( !defined( 'HTTFOX_RSSIMP_DIR' ) ){
  define( 'HTTFOX_RSSIMP_DIR', plugin_dir_path( __FILE__ ) );
}
// END -> Define consts


// RSS import function
require_once(HTTFOX_RSSIMP_DIR . '/includes/import-rss.php');

// Start shortcodes
require_once(HTTFOX_RSSIMP_DIR . '/includes/shortcode/add-default-shortcode.php');