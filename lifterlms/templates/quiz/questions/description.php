<?php
/**
 * Single Question description template
 *
 * @package LifterLMS/Templates
 *
 * @since    3.16.0
 * @version  3.16.6
 *
 * @arg  $attempt  (obj)  LLMS_Quiz_Attempt instance
 * @arg  $question (obj)  LLMS_Question instance
 */

defined( 'ABSPATH' ) || exit;

if ( ! $question->has_description() ) {
	return;
}
?>

<div class="llms-question-description"><?php echo wp_kses( $question->get_description(), LLMS_ALLOWED_HTML_FORM_FIELDS ); ?></div>
