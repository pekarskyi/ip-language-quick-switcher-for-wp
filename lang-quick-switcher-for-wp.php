<?php
/**
* Plugin Name: IP Language Quick Switcher for WP
* Description: Adds a language switcher to the admin panel
* Version: 1.0
* Plugin URI: https://github.com/pekarskyi/language-quick-switcher-for-wordpress
* Author: Mykola Pekarskyi
* Author URI: https://inwebpress.com
* URL
* License: GPL3
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

// Function to get the list of available languages
// Uncomment the languages you want to use
function ip_list_site_languages() {
    return [
		'en_US'  => __('English'), 
        'uk'     => __('Ukrainian'), 
        'ru_RU'  => __('Russian'), 
        //'de_DE'  => __('German'), 
        //'fr_FR'  => __('French'), 
        //'es_ES'  => __('Spanish'), 
        //'it_IT'  => __('Italian'), 
        //'nl_NL'  => __('Dutch'), 
        //'pl_PL'  => __('Polish'), 
        //'sv_SE'  => __('Swedish'), 
        //'da_DK'  => __('Danish'), 
        //'fi'     => __('Finnish'), 
        //'ja'     => __('Japanese'), 
        //'zh_CN'  => __('Chinese (Simplified)'), 
        //'zh_TW'  => __('Chinese (Traditional)'), 
        //'ko_KR'  => __('Korean'), 
        //'ar'     => __('Arabic'), 
        //'tr_TR'  => __('Turkish'), 
        //'fa_IR'  => __('Persian'), 
        //'he_IL'  => __('Hebrew'), 
        //'el'     => __('Greek'), 
        //'hi_IN'  => __('Hindi'), 
        //'th'     => __('Thai'), 
        //'vi'     => __('Vietnamese'), 
        //'id_ID'  => __('Indonesian'), 
        //'cs_CZ'  => __('Czech'), 
        //'sk_SK'  => __('Slovak'), 
        //'hu_HU'  => __('Hungarian'), 
        //'ro_RO'  => __('Romanian'), 
        //'bg_BG'  => __('Bulgarian'), 
        //'hr'     => __('Croatian'), 
        //'sr_RS'  => __('Serbian'), 
        //'lt_LT'  => __('Lithuanian'), 
        //'lv'     => __('Latvian'), 
        //'et'     => __('Estonian'), 
        //'sl_SI'  => __('Slovenian')
    ];
}
//============== !!! Danger Zone: DO NOT TOUCH !!! ========================//

// Function to get the list of available language codes
function ip_list_site_language_codes() {
    return array_keys(ip_list_site_languages());
}

// Switcher for the admin panel language
add_action('admin_bar_menu', function($wp_admin_bar) {
    if (!is_admin() || !is_user_logged_in()) return;

    $user_id = get_current_user_id();
    $current_locale = get_user_meta($user_id, 'locale', true) ?: get_locale();
    $languages = ip_list_site_languages();

    // Add the switcher to the top bar
    $wp_admin_bar->add_menu(array(
        'id'     => 'language-switcher',
        'parent' => 'top-secondary',
        'title'  => __('Profile') . ': ' . ($languages[$current_locale] ?? strtoupper($current_locale))
    ));

    foreach ($languages as $lang_code => $lang_name) {
        $wp_admin_bar->add_node([
            'id'     => 'lang-' . $lang_code,
            'title'  => $lang_name,
            'parent' => 'language-switcher',
            'href'   => wp_nonce_url(
                add_query_arg('set_admin_lang', $lang_code),
                'switch_admin_language'
            )
        ]);
    }
});

// Handler for changing the admin panel language
add_action('admin_init', function() {
    if (!isset($_GET['set_admin_lang']) || !wp_verify_nonce($_GET['_wpnonce'], 'switch_admin_language')) return;

    $new_locale = sanitize_text_field($_GET['set_admin_lang']);
    
    if (!in_array($new_locale, ip_list_site_language_codes())) return;

    update_user_meta(get_current_user_id(), 'locale', $new_locale);
    wp_redirect(remove_query_arg(['set_admin_lang', '_wpnonce']));
    exit;
});

// Switcher for the site language
add_action('admin_bar_menu', function($wp_admin_bar) {
    if (!is_admin() || !is_user_logged_in()) return;

    // Get the current language
    $current_locale = isset($_COOKIE['site_lang']) ? $_COOKIE['site_lang'] : get_locale();
    $languages = ip_list_site_languages();

    // Add the switcher to the top bar
    $wp_admin_bar->add_menu(array(
        'id'     => 'site-language-switcher',
        'parent' => 'top-secondary',
        'title'  => __('Blog') . ': ' . ($languages[$current_locale] ?? strtoupper($current_locale))
    ));

    foreach ($languages as $lang_code => $lang_name) {
        $wp_admin_bar->add_node([
            'id'     => 'site-lang-' . $lang_code,
            'title'  => $lang_name,
            'parent' => 'site-language-switcher',
            'href'   => wp_nonce_url(
                add_query_arg('set_site_lang', $lang_code),
                'switch_site_language'
            )
        ]);
    }
});

// Handler for changing the site language
add_action('init', function() {
    if (!isset($_GET['set_site_lang']) || !wp_verify_nonce($_GET['_wpnonce'], 'switch_site_language')) return;

    $new_locale = sanitize_text_field($_GET['set_site_lang']);
    
    if (!in_array($new_locale, ip_list_site_language_codes())) return;

    // Set the language cookie
    setcookie('site_lang', $new_locale, time() + 30 * DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);

    wp_redirect(remove_query_arg(['set_site_lang', '_wpnonce']));
    exit;
});

// Filter to set the site language
add_filter('locale', function($locale) {
    return isset($_COOKIE['site_lang']) ? $_COOKIE['site_lang'] : $locale;
});