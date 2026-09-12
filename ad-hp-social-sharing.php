<?php
/**
 * Plugin Name: Social Sharing for HivePress
 * Description: Allow users to share HivePress content across social networks.
 * Version: 1.0.0
 * Author: alokhinDev
 * Author URI: https://alokhin.dev/
 * Text Domain: ad-hp-social-sharing
 * Domain Path: /languages/
 *
 * @package HivePress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Register extension directory.
add_filter(
	'hivepress/v1/extensions',
	function( $extensions ) {
		$extensions[] = __DIR__;

		return $extensions;
	}
);
