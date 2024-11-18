
# Plugin Name: Custom WooCommerce Features

## Description

This plugin extends the functionality of WooCommerce by introducing custom badges for products, dynamic CSS styling, and additional cart-related features. It is designed to enhance the user experience with features like custom badges based on stock status, custom CSS for product pages, and styling for various WooCommerce elements.

## Features

- **Custom Badges**: Displays badges such as `Backorder`, `Low Stock`, and `Out of Stock` on product images.
- **Custom CSS**: Allows for easy customization of product and badge styles.
- **Mobile Responsiveness**: Ensures that styles are properly adjusted for mobile devices.
- **Flexible Integration**: Easily extendable to add new badges and styles for different product conditions.

## Requirements

- WordPress 5.0 or later
- WooCommerce 3.0 or later

## Installation

1. Upload the plugin files to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Customize your settings in the WooCommerce settings panel or directly through the plugin files.

## Plugin Folder Structure

The plugin has the following folder and file structure:

```
custom-woocommerce-features/
├── badge-functions.php     # Functions for displaying custom badges
│
├── css/
│   └── custom-badge-styles.css  # Custom styles for badges and product pages
│
├── includes/
│   ├── availability-functions.php  # Functions related to product availability
│   ├── cart-inline-css.php      # Inline CSS for the cart page styling
│   └── my-custom-functions.php   # Additional custom functions
│
└── README.md                   # Documentation file for plugin usage and development
```

### Folder Breakdown

1. **css/**  
   This folder contains all the CSS files for styling the badges and other elements of the plugin.  
   - `custom-badge-styles.css`: The primary CSS file responsible for badge styling and responsiveness.

2. **includes/**  
   This folder contains all the PHP files that handle the core functionality of the plugin.  
   - `badge-functions.php`: Functions related to adding, displaying, and customizing product badges (e.g., Backorder, Low Stock).
   - `availability-functions.php`: Logic for checking product availability and stock status.
   - `cart-inline-css.php`: Handles inline styling specifically for the cart page.
   - `my-custom-functions.php`: Additional custom functions to enhance WooCommerce features.

3. **README.md**  
   The documentation file that provides details on plugin installation, usage, and customization.

## How to Use

### Custom Badges
- The plugin adds badges to product images based on the stock status.
- Badges include:
  - **Backorder**: For products available on backorder.
  - **Low Stock**: For products with limited stock.
  - **Out of Stock**: For products that are unavailable.

### CSS Customization
The plugin includes a `custom-badge-styles.css` file that can be modified to change the appearance of badges and other elements on the product page. You can:
- Modify the colors, font sizes, and positions of badges.
- Adjust styles for mobile responsiveness.

### Mobile Optimization
The styles are optimized for mobile devices, ensuring that text and elements are readable on smaller screens. The plugin includes media queries to adjust font sizes and padding for mobile devices (max-width: 768px).

## Extending the Plugin

If you wish to extend the functionality of this plugin, you can:
1. **Add New Badges**: Modify the `badge-functions.php` file to create new badge types for different conditions (e.g., pre-order, seasonal discounts).
2. **Modify CSS**: The `custom-badge-styles.css` file can be expanded to include more complex styles or animations.
3. **Extend Availability Logic**: Add custom logic to `availability-functions.php` to handle special stock conditions or dynamic availability settings.
4. **Inline Cart Customization**: Use `cart-inline-css.php` to target specific elements of the WooCommerce cart for styling.

## Example of Custom Badge CSS

Here’s a quick example of how to modify the badge appearance:

```css
.custom-badge {
    background-color: #ff6347; /* Change background color */
    color: #fff; /* Keep text color white */
    padding: 8px 12px; /* Adjust padding */
    font-size: 14px; /* Change font size */
}

.custom-badge.custom-badge-backorder {
    background-color: #b22222; /* Dark red for backorder items */
}

.custom-badge.custom-badge-low-stock {
    background-color: #ff8c00; /* Orange for low stock items */
}

.custom-badge.custom-badge-out-of-stock {
    background-color: #808080; /* Gray for out-of-stock items */
}
```

### Custom Badge Function Example

To add a custom badge, you can modify the `badge-functions.php` file:

```php
function add_custom_badge($product_id) {
    // Check product conditions and display corresponding badge
    if (is_product_on_backorder($product_id)) {
        echo '<span class="custom-badge custom-badge-backorder">Pre-order</span>';
    } elseif (is_product_low_stock($product_id)) {
        echo '<span class="custom-badge custom-badge-low-stock">Low Stock</span>';
    } elseif (is_product_out_of_stock($product_id)) {
        echo '<span class="custom-badge custom-badge-out-of-stock">Out of Stock</span>';
    }
}
```

## Troubleshooting

If you experience any issues with badge visibility or styles not appearing as expected:
- Ensure that the plugin is activated and that all required files are present.
- Clear your browser cache to make sure that updated CSS is being applied.
- Check for any JavaScript conflicts that might be affecting the display of badges.

## Contributing

Contributions are welcome! Feel free to fork the repository, make improvements, and submit pull requests. If you encounter any issues or have suggestions for new features, please open an issue on the GitHub repository.

## License

This plugin is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

این نسخه‌ی به‌روز شده از `README.md` شامل ساختار فولدرهای پروژه و توضیحات مربوط به هر فولدر است تا هر توسعه‌دهنده‌ای بتواند به راحتی از ساختار پروژه استفاده کند و به توسعه یا تغییرات آینده بپردازد.