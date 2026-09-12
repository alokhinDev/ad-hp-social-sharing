<?php
/**
 * Social sharing links configuration.
 *
 * @package HivePress\Configs
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

return [
	'email'     => [
		'label' => esc_html__( 'Email', 'ad-hp-social-sharing' ),
		'url'   => 'mailto:?subject=%title%&body=%url%',
	],

	'facebook'  => [
		'label' => esc_html__( 'Facebook', 'ad-hp-social-sharing' ),
		'url'   => 'https://www.facebook.com/sharer/sharer.php?u=%url%',
	],

	'linkedin'  => [
		'label' => esc_html__( 'LinkedIn', 'ad-hp-social-sharing' ),
		'url'   => 'https://www.linkedin.com/sharing/share-offsite/?url=%url%',
	],

	'pinterest' => [
		'label' => esc_html__( 'Pinterest', 'ad-hp-social-sharing' ),
		'url'   => 'https://www.pinterest.com/pin/create/button/?url=%url%&media=%media%&description=%title%',
	],

	'reddit'    => [
		'label' => esc_html__( 'Reddit', 'ad-hp-social-sharing' ),
		'url'   => 'https://www.reddit.com/submit?url=%url%&title=%title%',
	],

	'telegram'  => [
		'label' => esc_html__( 'Telegram', 'ad-hp-social-sharing' ),
		'url'   => 'https://t.me/share/url?url=%url%&text=%title%',
	],

	'x'         => [
		'label' => esc_html__( 'X', 'ad-hp-social-sharing' ),
		'url'   => 'https://x.com/intent/tweet?url=%url%&text=%title%',
	],

	'viber'     => [
		'label' => esc_html__( 'Viber', 'ad-hp-social-sharing' ),
		'url'   => 'viber://forward?text=%title%%20%url%',
	],

	'whatsapp'  => [
		'label' => esc_html__( 'WhatsApp', 'ad-hp-social-sharing' ),
		'url'   => 'https://api.whatsapp.com/send?text=%title%%20%url%',
	],
];
