<?php
/**
 * Plugin Name: Disable AI Toolkit
 * Description: Adds an option to the General Settings page to disable AI features in WordPress.
 * Version:     0.0.4
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

/**
 * Adds a "Settings" link on the Plugins page pointing to Settings > General.
 */
add_filter(
	'plugin_action_links_disable-ai-toolkit/disable-ai-toolkit.php',
	static function ( $links ) {
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-general.php#disable_ai_toolkit' ) ),
			esc_html__( 'Settings', 'disable-ai-toolkit' )
		);
		array_unshift( $links, $settings_link );
		return $links;
	}
);

/**
 * Registers the WP-CLI commands for managing AI features.
 *
 * Commands:
 *   wp ai disable   — Disables AI features site-wide.
 *   wp ai enable    — Re-enables AI features site-wide.
 *   wp ai status    — Shows the current AI enabled/disabled state.
 */
if ( defined( 'WP_CLI' ) && WP_CLI ) {

	/**
	 * Manages AI features via WP-CLI.
	 */
	class Disable_AI_Toolkit_CLI extends WP_CLI_Command {

		/**
		 * Disables AI features site-wide.
		 *
		 * ## EXAMPLES
		 *
		 *   wp ai disable
		 *
		 * @subcommand disable
		 */
		public function disable() {
			update_option( 'disable_ai_toolkit', '1' );
			WP_CLI::success( 'AI features have been disabled.' );
		}

		/**
		 * Enables AI features site-wide.
		 *
		 * ## EXAMPLES
		 *
		 *   wp ai enable
		 *
		 * @subcommand enable
		 */
		public function enable() {
			update_option( 'disable_ai_toolkit', '0' );
			WP_CLI::success( 'AI features have been enabled.' );
		}

		/**
		 * Shows the current AI enabled/disabled status.
		 *
		 * ## EXAMPLES
		 *
		 *   wp ai status
		 *
		 * @subcommand status
		 */
		public function status() {
			$disabled = get_option( 'disable_ai_toolkit', '0' ) === '1';
			if ( $disabled ) {
				WP_CLI::log( 'AI features are currently: disabled' );
			} else {
				WP_CLI::log( 'AI features are currently: enabled' );
			}
		}
	}

	WP_CLI::add_command( 'ai', 'Disable_AI_Toolkit_CLI' );
}
