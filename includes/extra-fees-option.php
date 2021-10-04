<?php
function ibraphem_remove_extra_fees_field()
{
    $extra_fee_option = get_option('ibraphem_extra_fee_option');
    $extra_fee_title = get_option('ibraphem_extra_fee_title');
    $label = 'Remove ' . $extra_fee_title;
    
    if ($extra_fee_option == "yes") {
        echo '<div id="ibraphem_fee-cancel">';
        woocommerce_form_field(
            'ibraphem_remove_extra_fee',
            array(
                'label'  => $label,
                'class'  => array( 'ibraphem_fee-cancel-button' ),
                'type'   => 'checkbox'
            ),
        );
        
        echo '</div>';
    }
}

function ibraphem_remove_fee_ajax()
{
    if (is_checkout()) {
        ?>
<script type="text/javascript">
    jQuery(document).ready(
        function($) {
            $('#ibraphem_remove_extra_fee').click(
                function() {
                    jQuery('body').trigger('update_checkout');
                }
            );
        }
    );
</script>
<?php
    }
}
