jQuery(document).ready(function() {
    var openlab_aboutpage = openlabLiteWelcomeScreenCustomizerObject.aboutpage;
    var openlab_nr_actions_required = openlabLiteWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof openlab_aboutpage !== 'undefined') && (typeof openlab_nr_actions_required !== 'undefined') && (openlab_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + openlab_aboutpage + '"><span class="openlab-txtd-actions-count">' + openlab_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".openlab-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section openlab-upsells">');
    }
    if (typeof openlab_aboutpage !== 'undefined') {
        jQuery('.openlab-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + openlab_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', openlabLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".openlab-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});