=== Turn Off AI Features ===
Contributors:      raftaar1191
Tags:              ai, turn-off, wp-supports-ai, disable-ai
Requires at least: 7.0
Tested up to:      7.0
Requires PHP:      7.4
Stable tag:        0.0.4
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Adds an option to the General Settings page to turn off AI features in WordPress.

== Description ==

Turn Off AI Features lets you control AI functionality in WordPress without touching code. It hooks into the wp_supports_ai filter at priority 1000 and returns false when the option is enabled.

Features:

* Toggle AI on or off from Settings > General — no deactivation needed.
* WP-CLI support: wp ai disable / wp ai enable / wp ai status.
* Settings link on the Plugins page for quick access.
* Runs at priority 1000, overriding other plugins that may enable AI.

== Installation ==

1. Upload the turn-off-ai-features folder to /wp-content/plugins/.
2. Activate the plugin through the Plugins menu in WordPress.
3. Go to Settings > General and check "Turn off AI features on this site".

== Frequently Asked Questions ==

= How do I turn off AI features? =

After activating the plugin, go to Settings > General and check the
"Turn off AI features on this site" checkbox, then click Save Changes.
You can also use the Settings link on the Plugins page to get there directly.

= How do I turn on AI features again? =

Uncheck the "Turn off AI features on this site" checkbox on the Settings > General
page and save. You do not need to deactivate or delete the plugin.

= Can I toggle AI from the command line? =

Yes. The plugin registers three WP-CLI commands:

  wp toaif disable   — Turns off AI features site-wide.
  wp toaif enable    — Turns on AI features site-wide.
  wp toaif status    — Shows the current AI on/off state.

= Does this affect the WP_AI_SUPPORT constant? =

No. This plugin hooks into the wp_supports_ai filter at priority 1000, which runs
after the constant is evaluated, and forces the return value to false regardless
of the constant.

== Changelog ==

= 0.0.4 =
* Updated option key to turn_off_ai_features
* Updated all messaging to use "turn off" terminology
* Updated WP-CLI command descriptions

= 0.0.1 =
* Initial release.
