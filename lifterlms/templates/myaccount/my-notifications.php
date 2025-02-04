<?php
/**
 * Student Dashboard: Notifications Tab
 *
 * @since 3.8.0
 * @version 3.30.3
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="llms-sd-notification-center">

	<?php if ( isset( $notifications ) ) : ?>

		<?php if ( ! $notifications ) : ?>
			<p><?php esc_html_e( 'You have no notifications.', 'lifterlms' ); ?></p>
		<?php else : ?>
			<ol class="llms-notification-list">
			<?php foreach ( $notifications as $noti ) : ?>
				<li class="llms-notification-list-item">
					<?php echo wp_kses_post( $noti->get_html() ); ?>
				</li>
			<?php endforeach; ?>
			</ol>
		<?php endif; ?>

		<footer class="llms-sd-pagination llms-my-notifications-pagination">
			<nav class="llms-pagination">
			<?php
			$pagination = paginate_links(
				array(
					'base'      => str_replace( 999999, '%#%', esc_url( get_pagenum_link( 999999 ) ) ),
					'format'    => '?page=%#%',
					'total'     => $pagination['max'],
					'current'   => $pagination['current'],
					'prev_next' => true,
					'prev_text' => '« ' . __( 'Previous', 'lifterlms' ),
					'next_text' => __( 'Next', 'lifterlms' ) . ' »',
					'type'      => 'list',
				)
			);
			if ( ! empty( $pagination ) ) {
				echo wp_kses_post( $pagination );
			}
			?>
			</nav>
		</footer>

	<?php elseif ( isset( $settings ) ) : ?>

		<?php foreach ( $settings as $type => $triggers ) : ?>

			<h4><?php echo esc_html( apply_filters( 'llms_notification_' . $type . '_title', $type ) ); ?></h4>
			<p><?php echo esc_html( apply_filters( 'llms_notification_' . $type . '_desc', '' ) ); ?></p>
			<?php foreach ( $triggers as $id => $data ) : ?>
				<?php
				llms_form_field(
					array(
						'description' => '',
						'id'          => $id,
						'label'       => $data['name'],
						'last_column' => true,
						'name'        => 'llms_notification_pref[' . $type . '][' . $id . ']',
						'selected'    => ( 'yes' === $data['value'] ),
						'type'        => 'checkbox',
						'value'       => 'yes',
					)
				);
				?>
			<?php endforeach; ?>

		<?php endforeach; ?>

	<?php endif; ?>

</div>
