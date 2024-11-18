<?php
/**
 * Plugin Name: My Custom Plugin
 * Plugin URI: https://madebyraman.com/
 * Description: پلاگین شخصی برای افزودن کدهای سفارشی.
 * Version: 4.0
 * Author: PMJ
 * Author URI: https://madebyraman.com/
 * Text Domain: my-custom-plugin
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // جلوگیری از دسترسی مستقیم
}

// شامل کردن فایل‌های لازم (بررسی وجود فایل‌ها قبل از include)
$includes_path = plugin_dir_path(__FILE__) . 'includes/';
if (file_exists($includes_path . 'availability-functions.php')) {
    include_once $includes_path . 'availability-functions.php';
}

if (file_exists($includes_path . 'badge-functions.php')) {
    include_once $includes_path . 'badge-functions.php';
}

// بارگذاری استایل‌ها
function my_plugin_enqueue_styles() {
    if (is_product() || is_shop()) {
        $css_path = plugin_dir_path(__FILE__) . 'css/custom-badge-styles.css';
        if (file_exists($css_path)) {
            wp_register_style(
                'custom-badge-styles',
                plugin_dir_url(__FILE__) . 'css/custom-badge-styles.css',
                array(),
                filemtime($css_path), // استفاده از زمان آخرین ویرایش فایل برای نسخه
                'all'
            );
            wp_enqueue_style('custom-badge-styles');
        }
    }
}
add_action('wp_enqueue_scripts', 'my_plugin_enqueue_styles');

// بارگذاری CSS‌های درون‌خطی (بررسی وجود فایل)
if (file_exists($includes_path . 'cart-inline-css.php')) {
    include_once $includes_path . 'cart-inline-css.php';
}

// بارگذاری ترجمه‌ها برای پشتیبانی از چند زبان
function my_plugin_load_textdomain() {
    load_plugin_textdomain('my-custom-plugin', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'my_plugin_load_textdomain');

