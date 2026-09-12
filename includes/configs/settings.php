<?php
/**
 * Settings configuration.
 *
 * @package HivePress\Configs
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

return [
	'ad_social_sharing' => [
		'title'    => esc_html__( 'Social Sharing', 'ad-hp-social-sharing' ),
		'_order'   => 150,

		'sections' => [
			'display' => [
				'title'  => hivepress()->translator->get_string( 'display_noun' ),
				'_order' => 10,

				'fields' => [
					'social_sharing_links_display' => [
						'label'    => esc_html__( 'Social Sharing Links', 'ad-hp-social-sharing' ),
						'type'     => 'select',
						'options'  => 'social_sharing_links',
						'multiple' => true,
						'_order'   => 10,
					],
				],
			],
		],
	],
];
