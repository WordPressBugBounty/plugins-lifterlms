<?php
/**
 * Single Access Plan Pricing
 *
 * @property  obj  $plan  Instance of the LLMS_Access_Plan
 * @author    LifterLMS
 * @package   LifterLMS/Templates
 * @since     3.23.0
 * @version   3.29.0
 */

defined( 'ABSPATH' ) || exit;

$schedule = $plan->get_schedule_details();
$expires  = $plan->get_expiration_details();
?>
<div class="llms-access-plan-pricing regular">

	<div class="llms-access-plan-price">

		<?php if ( $plan->is_on_sale() ) : ?>
			<em class="stamp"><?php esc_html_e( 'SALE', 'lifterlms' ); ?></em>
		<?php endif; ?>

		<span class="price-regular"><?php echo wp_kses( $plan->get_price( 'price' ), LLMS_ALLOWED_HTML_PRICES ); ?></span>

		<?php if ( $plan->is_on_sale() ) : ?>
			<span class="price-sale"><?php echo wp_kses( $plan->get_price( 'sale_price' ), LLMS_ALLOWED_HTML_PRICES ); ?></span>
		<?php endif; ?>

	</div>

	<?php if ( $schedule ) : ?>
		<div class="llms-access-plan-schedule"><?php echo esc_html( $schedule ); ?></div>
	<?php endif; ?>

	<?php if ( $expires ) : ?>
		<div class="llms-access-plan-expiration"><?php echo esc_html( $expires ); ?></div>
	<?php endif; ?>

	<?php if ( $plan->is_on_sale() && $plan->get( 'sale_end' ) ) : ?>
		<div class="llms-access-plan-sale-end"><?php echo esc_html( sprintf( __( 'sale ends %s', 'lifterlms' ), $plan->get_date( 'sale_end', get_option( 'date_format' ) ) ) ); ?></div>
	<?php endif; ?>

</div>
