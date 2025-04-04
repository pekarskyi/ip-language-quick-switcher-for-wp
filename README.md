# IP Language Quick Switcher for WordPress

[![GitHub release (latest by date)](https://img.shields.io/github/v/release/pekarskyi/language-quick-switcher-for-wordpress?style=for-the-badge)](https://github.com/pekarskyi/language-quick-switcher-for-wordpress/releases/)

The plugin lets you quickly switch between different languages without digging into WordPress general or profile settings.

This plugin adds a language switcher to the admin panel:
- Language switcher for current Profile
- Language switcher for Public site

This option is available only for site administrators!

## Screenshots
![https://github.com/pekarskyi/assets/raw/master/language-quick-switcher-for-wordpress/language-quick-switcher-for-wordpress.jpg](https://github.com/pekarskyi/assets/raw/master/language-quick-switcher-for-wordpress/language-quick-switcher-for-wordpress.jpg)

## Practical application:

1. Testing the localization of WP plugins/themes
2. Testing the localization of custom functions
3. Testing multilingual content

## Install

### Option 1:
1. Download the `IP Language Quick Switcher for WordPress` (green Code button - Download ZIP).
2. Upload it to your WordPress site. Make sure the plugin folder is named "ip-language-quick-switcher-for-wp" (the name doesn't affect how the plugin works, but it does affect receiving future updates).
3. Activate the plugin.

### Option 2 (recommended):
1. Install and activate this plugin (plugin installer): https://github.com/pekarskyi/ip-installer
2. Using the `IP Installer` plugin, install and activate the `IP Language Quick Switcher for WordPress`.

## How to enable a language?

To enable a language, open the `ip-language-quick-switcher-for-wp.php` file and uncomment the corresponding line (lines 18-53).
Alternatively, you can add a new language by inserting a new line of code following the WP localization standards.

[Language / locale codes used in WordPress](https://gist.github.com/pekarskyi/d7cb8e87528f4df31d0d38e3f42a5550)

## How to disable a language?
Simply comment out the corresponding line in the code (lines 18-53).

## Changelog

1.1.0 - 05-04-2025:
- IMPROVED: Automatic updates from GitHub repository

1.0.0 - 20.03.2025:
- Initial release
- ADDED: plugin version check and update function

[![YouTube Channel Subscribers](https://img.shields.io/youtube/channel/subscribers/UC9ZEeT6WrGupgza9KXpazyA)](https://www.youtube.com/@inwebpress/videos)