<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<a href="#vendor_share_modal_<?php echo esc_attr( $vendor->get_id() ); ?>" class="hp-vendor__action hp-vendor__action--share hp-link"><i class="hp-icon fas fa-share"></i><span><?php echo esc_html__( 'Share', 'ad-hp-social-sharing' ); ?></span></a>
