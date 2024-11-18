<?php

if (!defined('ABSPATH')) {
    exit; // جلوگیری از دسترسی مستقیم
}

/** تغییر متن وضعیت موجودی محصول در ووکامرس */
add_filter('woocommerce_get_availability', 'custom_availability', 10, 2);

function custom_availability($availability, $product) {
    // بررسی اینکه ووکامرس فعال است یا خیر
    if (!class_exists('WooCommerce') || !is_a($product, 'WC_Product')) {
        return $availability;
    }

    // بررسی اینکه صفحه محصول است یا خیر
    if (!is_product()) {
        return $availability;
    }

    // وضعیت موجودی محصول
    if ($product->is_on_backorder()) {
        // ارسال از ۱۰ روز آینده برای محصولات در حال پیش‌سفارش
        $availability['availability'] = __('ارسال از ۱۰ روز آینده', 'my-custom-plugin');
        $availability['class'] = 'availability-on-backorder';
    } elseif ($product->is_in_stock()) {
        // اگر موجودی کم باشد
        if ((int) $product->get_stock_quantity() === 1) {
            $availability['availability'] = __('آماده ارسال', 'my-custom-plugin');
            $availability['class'] = 'availability-low-stock';
        } else {
            // موجودی کافی
            $availability['availability'] = __('آماده ارسال',', 'my-custom-plugin');
            $availability['class'] = 'availability-in-stock';
        }
    } else {
        // اگر موجودی نداشته باشد
        $availability['availability'] = __('متاسفیم، این محصول در حال حاضر تولید نمی‌شود ', 'my-custom-plugin');
        $availability['class'] = 'availability-out-of-stock';
    }

    return $availability;
}
