# Disable AI Toolkit

**Contributors:** raftaar1191  
**Tags:** ai, disable, wp-supports-ai  
**Requires at least:** WordPress 7.0  
**Tested up to:** WordPress 7.0  
**Requires PHP:** 7.4  
**Stable tag:** 0.0.4  
**License:** GPL-2.0-or-later  
**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

Adds an option to the General Settings page to disable AI features in WordPress.

---

## Description

Disable AI Toolkit lets you turn off AI features in WordPress without touching code. It hooks into the `wp_supports_ai` filter at priority 1000 and returns `false` when the option is enabled.

**Features:**

- Toggle AI on or off from **Settings > General** — no deactivation needed.
- WP-CLI support: `wp ai disable` / `wp ai enable` / `wp ai status`.
- Settings link on the Plugins page for quick access.
- Runs at priority 1000, overriding other plugins that may enable AI.

---

## Installation

1. Upload the `disable-ai-toolkit` folder to `/wp-content/plugins/`.
2. Activate the plugin through the **Plugins** menu in WordPress.
3. Go to **Settings > General** and check **"Disable AI features on this site"**.

---

## Frequently Asked Questions

### How do I disable AI features?

After activating the plugin, go to **Settings > General** and check the **"Disable AI features on this site"** checkbox, then click **Save Changes**. You can also use the **Settings** link on the Plugins page to get there directly.

### How do I re-enable AI features?

Uncheck the **"Disable AI features on this site"** checkbox on the **Settings > General** page and save. You do not need to deactivate or delete the plugin.

### Can I toggle AI from the command line?

Yes. The plugin registers three WP-CLI commands:

```bash
wp ai disable   # Disables AI features site-wide
wp ai enable    # Re-enables AI features site-wide
wp ai status    # Shows whether AI is currently enabled or disabled
```

### Does this affect the `WP_AI_SUPPORT` constant?

No. This plugin hooks into the `wp_supports_ai` filter at priority 1000, which runs after the constant is evaluated, and forces the return value to `false` only when the option is turned on.

### What happens if I deactivate the plugin?

Deactivating the plugin removes the filter entirely, so AI features will return to whatever state they were in before — regardless of the saved option.

---

## Changelog

### 0.0.4
- Added Settings link on the Plugins page for quick access to Settings > General.

### 0.0.3
- Added WP-CLI commands: `wp ai disable`, `wp ai enable`, `wp ai status`.

### 0.0.2
- Added AI Features toggle to Settings > General page.

### 0.0.1
- Initial release.
