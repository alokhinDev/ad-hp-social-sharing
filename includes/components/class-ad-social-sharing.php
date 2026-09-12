<?php
/**
 * Social sharing component.
 *
 * @package HivePress\Components
 */

namespace HivePress\Components;

use HivePress\Helpers as hp;
use HivePress\Forms;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Social sharing component class.
 *
 * @class AD_Social_Sharing
 */
final class AD_Social_Sharing extends Component {

	/**
	 * Model names.
	 *
	 * @var array
	 */
	protected $models = [ 'listing', 'vendor', 'request' ];

	/**
	 * Class constructor.
	 *
	 * @param array $args Component arguments.
	 */
	public function __construct( $args = [] ) {

		foreach ( $this->models as $model ) {

			// Alter templates.
			add_filter( 'hivepress/v1/templates/' . $model . '_view_page/blocks', [ $this, 'alter_model_view_page_blocks' ], 10, 2 );
		}

		parent::__construct( $args );
	}

	/**
	 * Alters model view page blocks.
	 *
	 * @param array  $blocks Block arguments.
	 * @param object $template Template object.
	 * @return array
	 */
	public function alter_model_view_page_blocks( $blocks, $template ) {

		// Get model name.
		$model = $template::get_meta( 'model' );

		if ( ! in_array( $model, $this->models, true ) ) {
			return $blocks;
		}

		// Get model object.
		$object = $template->get_context( $model );

		if ( ! $object ) {
			return $blocks;
		}

		// Set header.
		$header = '';

		// Get social sharing links.
		$links = array_intersect_key( hivepress()->get_config( 'social_sharing_links' ), array_flip( (array) get_option( 'hp_social_sharing_links_display' ) ) );

		if ( $links ) {

			// Render links.
			$header = '<div class="hp-social-links">';

			foreach ( $links as $name => $args ) {

				// Get slug.
				$slug = hp\sanitize_slug( $name );

				// Get URL.
				$url = hp\replace_tokens(
					[
						'url'   => rawurlencode( hivepress()->router->get_url( $model . '_view_page', [ $model . '_id' => $object->get_id() ] ) ),
						'title' => rawurlencode( $model === 'vendor' ? $object->get_name() : $object->get_title() ),
						'media' => $object->get_image__url( 'large' ) ? rawurlencode( $object->get_image__url( 'large' ) ) : '',
					],
					hp\get_array_value( $args, 'url', '' )
				);

				// Get icon.
				$icon = hp\get_array_value( $args, 'icon', hivepress()->get_url( 'ad_hp_social_sharing' ) . '/assets/images/icons/' . $slug . '.svg' );

				// Render link.
				$header .= '<a href="' . esc_attr( $url ) . '" class="hp-social-links__item hp-social-links__item--' . esc_attr( $slug ) . ' button button--large button--primary alt" target="_blank" rel="nofollow">';

				$header .= '<img src="' . esc_url( $icon ) . '" alt="' . esc_attr( $args['label'] ) . '" />';
				$header .= '<span>' . esc_html( $args['label'] ) . '</span>';

				$header .= '</a>';
			}

			$header .= '</div>';
		}

		// Create form.
		$form = new Forms\Social_Share(
			[
				'header' => $header,

				'fields' => [
					'_link' => [
						'value' => hivepress()->router->get_url( $model . '_view_page', [ $model . '_id' => $object->get_id() ] ),
					],
				],
			]
		);

		return hivepress()->template->merge_blocks(
			$blocks,
			[
				$model . '_actions_primary' => [
					'blocks' => [
						$model . '_share_modal' => [
							'type'   => 'modal',
							'title'  => esc_html__( 'Share', 'ad-hp-social-sharing' ),
							'model'  => $model,
							'_order' => 5,

							'blocks' => [
								'social_share_form' => [
									'type'    => 'content',
									'content' => $form->render(),
									'_order'  => 10,
								],
							],
						],

						$model . '_share_link'  => [
							'type'   => 'part',
							'path'   => $model . '/view/' . $model . '-share-link',
							'_order' => 200,
						],
					],
				],
			]
		);
	}
}
