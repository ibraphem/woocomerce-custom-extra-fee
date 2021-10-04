<?php

function ibraphem_add_extra_fees()
{
    $extra_fee_title = get_option('ibraphem_extra_fee_title');
    $flat_fee = get_option('ibraphem_extra_flat_fee');
    $percentage_subtotal = get_option('ibraphem_percentage_of_subtotal');
    $percentage_shipping = get_option(('ibraphem_percentage_of_shipping'));
    $percentage_tax = get_option(('ibraphem_percentage_of_tax'));

    global $woocommerce;
    $wcc = $woocommerce->cart;
    $flat_fee = is_numeric($flat_fee) ? $flat_fee : 0;
    $percentage_subtotal = is_numeric($percentage_subtotal) ? $percentage_subtotal : 0;
    $percentage_shipping = is_numeric($percentage_shipping) ? $percentage_shipping : 0;
    $percentage_tax = is_numeric($percentage_tax) ? $percentage_tax : 0;

    if (! $_POST || (is_admin() && ! is_ajax())) {
        return;
    }
  
    if (isset($_POST['post_data'])) {
        parse_str($_POST['post_data'], $post_data);
    } else {
        $post_data = $_POST;
    }
  
    if (isset($post_data['ibraphem_remove_extra_fee'])) {
        return;
    }

    $extra_fees = $flat_fee + ($wcc->cart_contents_total * $percentage_subtotal/100)
                                          + ($wcc->shipping_total * $percentage_shipping/100)
                                            + ($wcc->tax_total * $percentage_tax/100);

    $woocommerce->cart->add_fee(__($extra_fee_title, 'ibraphem'), $extra_fees);
}
