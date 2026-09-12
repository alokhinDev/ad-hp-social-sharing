<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<a href="#listing_share_modal_<?php echo esc_attr( $listing->get_id() ); ?>" class="hp-listing__action hp-listing__action--share hp-link"><i class="hp-icon fas fa-share"></i><span><?php echo esc_html__( 'Share', 'ad-hp-social-sharing' ); ?></span></a>
