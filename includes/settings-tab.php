<?php
//Add new Tab to woocommerce settings tab
function ibraphem_add_extra_fees_tab($settings_tab)
{
    $settings_tab['ibraphem_extra_fees'] = __('Extra fees', 'ibraphem');
    
    return $settings_tab;
}

// Populate the new tab with field and properties
function ibraphem_add_extra_fees_settings()
{
    woocommerce_admin_fields(get_ibraphem_extra_fees_settings());
}

function get_ibraphem_extra_fees_settings()
{
    $settings = array(
        
        'section_title' => array(
            'id'   => 'ibraphem_extra_fees_settings_title',
            'desc' => 'Section for handling additional fees to checkout payment',
            'type' => 'title',
            'name' => 'Extra fee info',
        ),

        'extra_fee_title' => array(
            'id'   => 'ibraphem_extra_fee_title',
            'desc' => 'Title will show on checkout and cart total table',
            'type' => 'text',
            'name' => 'Extra fee title',
        ),
        
        'extra_flat_fee' => array(
            'id'   => 'ibraphem_extra_flat_fee',
            'desc' => 'Flat fee digit',
            'type' => 'number',
            'name' => 'Flat Fee',
        ),
        
        'percentage_subtotal_dynamic_fee' => array(
            'id'   => 'ibraphem_percentage_of_subtotal',
            'desc' => 'Percentage of subtotal (%)',
            'type' => 'number',
            'name' => 'Percentage  subtotal',
        ),

        'percentage_shipping_dynamic_fee' => array(
            'id'   => 'ibraphem_percentage_of_shipping',
            'desc' => 'Percentage of shipping fee (%)',
            'type' => 'number',
            'name' => 'Percentage  shipping fee',
        ),

        'percentage_tax_dynamic_fee' => array(
            'id'   => 'ibraphem_percentage_of_tax',
            'desc' => 'Percentage of tax (%)',
            'type' => 'number',
            'name' => 'Percentage  tax',
        ),

        'extra fee optional' => array(
            'id'   => 'ibraphem_extra_fee_option',
            'desc' => 'Make extra fee optional for customers during checkout',
            'type' => 'checkbox',
            'name' => 'Extra fee option',
        ),
        
        'section_end' => array(
            'id'   => 'ibraphem_extra_fees_sectionend',
            'type' => 'sectionend',
        ),
    );
    
    return apply_filters('filter_ibraphem_extra_fees_settings', $settings);
}

// Save and update tab fields
function ibraphem_update_options_extra_fees_settings()
{
    woocommerce_update_options(get_ibraphem_extra_fees_settings());
}
