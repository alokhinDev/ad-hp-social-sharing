<?php
/**
 * Social share form.
 *
 * @package HivePress\Forms
 */

namespace HivePress\Forms;

use HivePress\Helpers as hp;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Social share form class.
 *
 * @class Social_Share
 */
class Social_Share extends Form {

	/**
	 * Class constructor.
	 *
	 * @param array $args Form arguments.
	 */
	public function __construct( $args = [] ) {
		$args = hp\merge_arrays(
			[
				'action'     => '#',
				'method'     => 'GET',
				'button'     => null,

				'fields'     => [
					'_link' => [
						'label'    => esc_html__( 'Link', 'ad-hp-social-sharing' ),
						'statuses' => [ 'copy' => hivepress()->translator->get_string( 'click_to_copy' ) ],
						'type'     => 'text',
						'readonly' => true,
						'_order'   => 100,
					],
				],

				'attributes' => [
					'onsubmit' => 'return false;',
				],
			],
			$args
		);

		parent::__construct( $args );
	}
}
