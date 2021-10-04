<?php

/**
 * Plugin Name: Woo custom extra fees
 * Plugin URI: https://ibrahimolayioye.netlify.app/
 * Author: Ibrahim Olayioye
 * Author URI: https://ibrahimolayioye.netlify.app/
 * Description: This plugin allows  store managers to add other fees to checkout. This fees may be flat or percentage derivatives of, tax, shipping or cart subtotal. This fee may be made optional as well.
 * Version: 0.1.0
 * License: 0.1.0
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: ibraphem
*/


if (!function_exists('add_action')) {
    echo "I can't be called directly";
    exit;
}

// Setup
define('WOO_EXTRA_FEES_PLUGIN', __FILE__);

//Includes
include('includes/activate.php');
include('includes/add-extra-fees.php');
include('includes/settings-tab.php');
include('includes/extra-fees-option.php');


//Hooks
register_activation_hook(__FILE__, 'ibraphem_activate_plugin');
add_action('woocommerce_cart_calculate_fees', 'ibraphem_add_extra_fees');
add_action('woocommerce_settings_tabs_ibraphem_extra_fees', 'ibraphem_add_extra_fees_settings');
add_action('woocommerce_update_options_ibraphem_extra_fees', 'ibraphem_update_options_extra_fees_settings');
add_action('woocommerce_after_checkout_billing_form', 'ibraphem_remove_extra_fees_field');
add_action('wp_footer', 'ibraphem_remove_fee_ajax');


//Filters
add_filter('woocommerce_settings_tabs_array', 'ibraphem_add_extra_fees_tab', 50);
