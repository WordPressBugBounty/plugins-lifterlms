<?php
/**
 * Lesson Audio embed
 *
 * @package LifterLMS/Templates
 *
 * @since 1.0.0
 * @version 3.1.1
 */

defined( 'ABSPATH' ) || exit;

global $post;

$lesson = new LLMS_Lesson( $post );

if ( ! $lesson->get( 'audio_embed' ) ) {
	return; }
?>

<div class="llms-audio-wrapper">
	<div class="center-audio">
		<?php
			// Calls wp_oembed_get(); can't be escaped.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $lesson->get_audio();
		?>
	</div>
</div>
