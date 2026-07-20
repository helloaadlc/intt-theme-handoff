<?php
/**
 * Plugin Name:       INTT Blocks
 * Description:       Bloques personalizados para el portal del INTT.
 * Version:           1.0.0
 * Requires at least: 6.8
 * Requires PHP:      7.4
 * Author:            INTT
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       intt-blocks
 *
 * @package InttBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function intt_blocks_init() {
	wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
}
add_action( 'init', 'intt_blocks_init' );
