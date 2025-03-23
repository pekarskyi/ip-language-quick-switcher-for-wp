# IP Language Quick Switcher for WordPress

[![GitHub release (latest by date)](https://img.shields.io/github/v/release/pekarskyi/language-quick-switcher-for-wordpress?style=for-the-badge)](https://github.com/pekarskyi/language-quick-switcher-for-wordpress/releases/)

The plugin allows you to quickly switch between different languages without having to go into the general WP settings and profile settings.

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

1. Download the Plugin
- Go to the GitHub repository of the plugin.
- Click on the **Code button** (green dropdown).
- Select **Download ZIP** and save the file to your computer.

2. Upload the Plugin to WordPress
- Log in to your WordPress admin dashboard.
- Go to Plugins → Add New.
- Click the **Upload Plugin** button at the top.
- Click Choose File, select the ZIP file you downloaded, and click Install Now.

3. Activate the Plugin
- After installation, click **Activate Plugin** to start using it.

Now the plugin should be active and ready to use! 🚀

## How to enable a language?

To enable a language, open the `lang-quick-switcher-for-wp.php` file and uncomment the corresponding line (lines 18-53).
Alternatively, you can add a new language by inserting a new line of code following the WP localization standards.

[Language / locale codes used in WordPress](https://gist.github.com/pekarskyi/d7cb8e87528f4df31d0d38e3f42a5550)

## How to disable a language?
Simply comment out the corresponding line in the code (lines 18-53).

## Changelog

1.0.0 - 20.03.2025:
- Stable release
- ADDED: plugin version check and update function

## Links

[![YouTube Channel Subscribers](https://img.shields.io/youtube/channel/subscribers/UC9ZEeT6WrGupgza9KXpazyA)](https://www.youtube.com/@inwebpress/videos)

[![Stand With Ukraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://justgo.ink/standwithukraine)