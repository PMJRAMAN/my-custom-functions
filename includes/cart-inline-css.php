<?php

if (!defined('ABSPATH')) {
    exit; // جلوگیری از دسترسی مستقیم
}

/** افزودن CSS درون‌خطی برای صفحه سبد خرید */
function add_custom_cart_css() {
    // بررسی اینکه آیا صفحه سبد خرید است
    if (is_cart()) {
        $custom_css = '
            @media (max-width: 768px) {
                button[name="clear_cart"] {
                    margin-top: 10px !important;
                    display: block !important;
                    width: 100% !important;
                }
            }
        ';
        wp_add_inline_style('woocommerce-general', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'add_custom_cart_css');
