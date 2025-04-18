/**
 * Quiz Schema.
 *
 * @since 3.17.6
 * @since 7.4.0 Added upsell for Question Bank and condition in `random_questions` schema.
 * @since 7.6.2 Added `disable_retake` schema.
 * @since 7.8.0 Added `can_be_resumed` option.
 * @version 7.8.0

 */
define( [], function() {

	return window.llms.hooks.applyFilters( 'llms_define_quiz_schema', {

		default: {
			title: LLMS.l10n.translate( 'General Settings' ),
			toggleable: true,
			fields: [
				[
					{
						attribute: 'permalink',
						id: 'permalink',
						type: 'permalink',
			},
				], [
					{
						attribute: 'content',
						id: 'description',
						label: LLMS.l10n.translate( 'Description' ),
						type: 'editor',
			},
				], [
					{
						attribute: 'passing_percent',
						id: 'passing-percent',
						label: LLMS.l10n.translate( 'Passing Percentage' ),
						min: 0,
						max: 100,
						tip: LLMS.l10n.translate( 'Minimum percentage of total points required to pass the quiz' ),
						type: 'number',
			},
					{
						attribute: 'allowed_attempts',
						id: 'allowed-attempts',
						label: LLMS.l10n.translate( 'Limit Attempts' ),
						switch_attribute: 'limit_attempts',
						tip: LLMS.l10n.translate( 'Limit the maximum number of times a student can take this quiz' ),
						type: 'switch-number',
			},
					{
						attribute: 'time_limit',
						id: 'time-limit',
						label: LLMS.l10n.translate( 'Time Limit' ),
						min: 1,
						max: 360,
						switch_attribute: 'limit_time',
						tip: LLMS.l10n.translate( 'Enforce a maximum number of minutes a student can spend on each attempt' ),
						type: 'switch-number',
			},
				], [

					{
						attribute: 'can_be_resumed',
						id: 'resume',
						label: LLMS.l10n.translate( 'Can be resumed' ),
						tip: LLMS.l10n.translate( 'Allow a new attempt on this quiz to be resumed' ),
						type: 'switch',
						condition: function() {
							return 'yes' === this.get( 'limit_time' ) ? false : true;
						}
			},
					{
						attribute: 'show_correct_answer',
						id: 'show-correct-answer',
						label: LLMS.l10n.translate( 'Show Correct Answers' ),
						tip: LLMS.l10n.translate( 'When enabled, students will be shown the correct answer to any question they answered incorrectly.' ),
						type: 'switch',
			},
					{
						attribute: 'random_questions',
						id: 'random-questions',
						label: LLMS.l10n.translate( 'Randomize Question Order' ),
						tip: LLMS.l10n.translate( 'Display questions in a random order for each attempt. Content questions are locked into their defined positions.' ),
						type: 'switch',
						condition: function() {
							return 'yes' === this.get( 'question_bank' ) ? false : true;
						}
			},
					{
						attribute: 'disable_retake',
						id: 'disable-retake',
						label: LLMS.l10n.translate( 'Disable Retake' ),
						tip: LLMS.l10n.translate( 'Prevent quiz retake after student passed the quiz.' ),
						type: 'switch',
			},
				], [
					{
						id: 'question-bank',
						label: LLMS.l10n.translate( 'Question Bank' ),
						tip: LLMS.l10n.translate( 'A question bank helps prevent cheating and reinforces learning by allowing instructors to create assessments with randomized questions pulled from a bank of questions. (Available in Advanced Quizzes addon)' ),
						type: 'upsell',
						text: LLMS.l10n.translate( 'Get LifterLMS Advanced Quizzes' ),
						url: 'https://lifterlms.com/product/advanced-quizzes/?utm_source=LifterLMS%20Plugin&utm_medium=Quiz%20Builder%20Button&utm_campaign=Advanced%20Question%20Upsell&utm_content=3.16.0&utm_term=Questions%20Bank'
					}
				]

			],
		},

	} );

} );
