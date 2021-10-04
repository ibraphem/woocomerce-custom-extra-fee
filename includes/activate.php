<?php

function ibraphem_activate_plugin()
{
    if (version_compare(get_bloginfo('version'), '5.0', '<')) {
        wp_die(__("You must update Wordpress to use this plugin.", "ibraphem"));
    }

    $extra_fee_option = get_option('ibraphem_extra_fee_option');
    $extra_fee_title = get_option('ibraphem_extra_fee_title');
    $flat_fee = get_option('ibraphem_extra_flat_fee');
    $percentage_subtotal = get_option('ibraphem_percentage_of_subtotal');
    $percentage_shipping = get_option(('ibraphem_percentage_of_shipping'));
    $percentage_tax = get_option(('ibraphem_percentage_of_tax'));

    if (!$extra_fee_option) {
        add_option('ibraphem_extra_fee_option', "yes");
    }

    if (!$extra_fee_title) {
        add_option('ibraphem_extra_fee_title', "Extra fee");
    }

    if (!$flat_fee) {
        add_option('ibraphem_extra_flat_fee', 0);
    }

    if (!$percentage_subtotal) {
        add_option('ibraphem_percentage_of_subtotal', 0);
    }

    if (!$percentage_shipping) {
        add_option('ibraphem_percentage_of_shipping', 0);
    }

    if (!$percentage_tax) {
        add_option('ibraphem_percentage_of_tax', 0);
    }
}
