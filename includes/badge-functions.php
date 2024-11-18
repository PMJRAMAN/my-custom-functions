<?php

if (!defined('ABSPATH')) {
    exit; // جلوگیری از دسترسی مستقیم
}

/** افزودن بج سفارشی به محصولات در ووکامرس */
add_action('woocommerce_after_shop_loop_item', 'custom_product_badge', 10);

function custom_product_badge() {
    // بررسی اینکه ووکامرس فعال است یا خیر
    if (!class_exists('WooCommerce')) {
        return;
    }

    global $product;

    // بررسی اینکه محصول وجود داشته باشد و نوع آن درست باشد
    if (!$product || !is_a($product, 'WC_Product')) {
        return;
    }

    // گرفتن موجودی محصول
    $stock_quantity = (int) $product->get_stock_quantity();

    // افزودن بج بر اساس وضعیت موجودی
    if ($product->is_on_backorder()) {
        // نمایش بج برای محصولات پیش‌سفارش
        echo '<span class="custom-badge custom-badge-backorder">' . __('قابل سفارش', 'my-custom-plugin') . '</span>';
    } elseif ($product->is_in_stock() && $stock_quantity === 1) {
        // نمایش بج برای موجودی کم
        echo '<span class="custom-badge custom-badge-low-stock">' . __('آماده ارسال', 'my-custom-plugin') . '</span>';
    } elseif (!$product->is_in_stock()) {
        // نمایش بج برای محصولات ناموجود
        echo '<span class="custom-badge custom-badge-out-of-stock">' . __('توقف تولید', 'my-custom-plugin') . '</span>';
    }
}
