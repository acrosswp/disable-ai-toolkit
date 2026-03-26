=== Disable AI Toolkit ===
Contributors:      raftaar1191
Tags:              ai, disable, wp-supports-ai
Requires at least: 7.0
Tested up to:      7.0
Requires PHP:      7.4
Stable tag:        0.0.1
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Disables AI features in WordPress by returning false on the wp_supports_ai filter.

== Description ==

Disable AI Toolkit turns off all AI features in WordPress by hooking into the
wp_supports_ai filter at priority 1000 and returning false.

Features:

* Disables AI features site-wide with a single hook.
* No configuration needed - just activate and go.
* Runs at priority 1000, overriding other plugins that may enable AI.

== Installation ==

1. Upload the disable-ai-toolkit folder to /wp-content/plugins/.
2. Activate the plugin through the Plugins menu in WordPress.
3. AI features are now disabled.

== Frequently Asked Questions ==

= How do I re-enable AI features? =

Simply deactivate or delete this plugin.

= Does this affect the WP_AI_SUPPORT constant? =

No. This plugin hooks into the wp_supports_ai filter at priority 1000,
which runs after the constant is evaluated, and forces the return value to false.

== Changelog ==

= 0.0.1 =
* Initial release.
