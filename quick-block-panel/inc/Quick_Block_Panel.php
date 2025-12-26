<?php
/**
 * Main plugin class for Quick Block Panel.
 *
 * @package QuickBlockPanel
 */
namespace QuickBlockPanel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles the Quick Block Panel functionality.
 */
class Quick_Block_Panel {

	/**
	 * Initialize hooks.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue JavaScript and CSS for the block editor.
	 *
	 * @return void
	 */
	public static function enqueue_assets() {
		wp_enqueue_script(
			'quick-block-panel',
			QBP_PLUGIN_URL . 'assets/js/quick-block-panel.js',
			array( 'wp-plugins', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-blocks' ),
			filemtime( QBP_PLUGIN_DIR . 'assets/js/quick-block-panel.js' ),
			true
		);

		wp_enqueue_style(
			'quick-block-panel-style',
			QBP_PLUGIN_URL . 'assets/css/quick-block-panel.css',
			array(),
			filemtime( QBP_PLUGIN_DIR . 'assets/css/quick-block-panel.css' )
		);
	}
}
