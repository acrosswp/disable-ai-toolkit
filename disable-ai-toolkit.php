<?php
/**
 * Plugin Name: Disable AI Toolkit
 * Description: Adds an option to the General Settings page to disable AI features in WordPress.
 * Version:     0.0.2
 * Author:      WordPress
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package DisableAI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hooks into wp_supports_ai to disable AI when the option is enabled.
 */
add_filter(
	'wp_supports_ai',
	static function ( $supported ) {
		if ( get_option( 'disable_ai_toolkit', '0' ) === '1' ) {
			return false;
		}
		return $supported;
	},
	1000
);

/**
 * Registers the setting and adds it to the General Settings page.
 */
add_action(
	'admin_init',
	static function () {
		register_setting(
			'general',
			'disable_ai_toolkit',
			array(
				'type'              => 'string',
				'sanitize_callback' => static function ( $value ) {
					return '1' === $value ? '1' : '0';
				},
				'default'           => '0',
			)
		);

		add_settings_field(
			'disable_ai_toolkit',
			__( 'AI Features', 'disable-ai-toolkit' ),
			'disable_ai_toolkit_field_cb',
			'general'
		);
	}
);

/**
 * Renders the AI Features checkbox field.
 */
function disable_ai_toolkit_field_cb() {
	$value = get_option( 'disable_ai_toolkit', '0' );
	?>
	<label for="disable_ai_toolkit">
		<input
			type="checkbox"
			name="disable_ai_toolkit"
			id="disable_ai_toolkit"
			value="1"
			<?php checked( '1', $value ); ?>
		/>
		<?php esc_html_e( 'Disable AI features on this site', 'disable-ai-toolkit' ); ?>
	</label>
	<?php
}
