<?php
/**
 * Plugin Name:       Quick Block Panel
 * Plugin URI:
 * Description:       Adds a custom left-side panel in Gutenberg editor with shortcuts to insert frequently used blocks.
 * Author:            Tushar Sharma
 * Author URI:        https://profiles.wordpress.org/richeal/
 * Version:           1.0.0
 * Requires at least: 6.4
 * Requires PHP:      7.4
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       quick-block-panel
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
require 'vendor/autoload.php';

define( 'QBP_PLUGIN_FILE', __FILE__ );
define( 'QBP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'QBP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

use QuickBlockPanel\Quick_Block_Panel;

// Initialize plugin.
Quick_Block_Panel::init();
