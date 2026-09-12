<?php
/**
 * Styles configuration.
 *
 * @package HivePress\Configs
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

return [
	'ad_hp_social_sharing_frontend' => [
		'handle'  => 'ad-hp-social-sharing-frontend',
		'src'     => hivepress()->get_url( 'ad_hp_social_sharing' ) . '/assets/css/frontend.min.css',
		'version' => hivepress()->get_version( 'ad_hp_social_sharing' ),
		'scope'   => [ 'frontend', 'editor' ],
	],
];
