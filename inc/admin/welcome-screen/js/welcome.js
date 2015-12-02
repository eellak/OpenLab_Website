jQuery(document).ready(function() {
	
	/* If there are required actions, add an icon with the number of required actions in the About Openlab page -> Actions required tab */
    var openlab_nr_actions_required = openlabLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof openlab_nr_actions_required !== 'undefined') && (openlab_nr_actions_required != '0') ) {
        jQuery('li.openlab-lite-w-red-tab a').append('<span class="openlab-lite-actions-count">' + openlab_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".openlab-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'openlab_lite_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : openlabLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.openlab-lite-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + openlabLiteWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var openlab_lite_actions_count = jQuery('.openlab-lite-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof openlab_lite_actions_count !== 'undefined' ) {
                    if( openlab_lite_actions_count == '1' ) {
                        jQuery('.openlab-lite-actions-count').remove();
                        jQuery('.openlab-lite-tab-pane#actions_required').append('<p>' + openlabLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.openlab-lite-actions-count').text(parseInt(openlab_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
	
	/* Tabs in welcome page */
	function openlab_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".openlab-lite-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}
	
	var openlab_actions_anchor = location.hash;
	
	if( (typeof openlab_actions_anchor !== 'undefined') && (openlab_actions_anchor != '') ) {
		openlab_welcome_page_tabs('a[href="'+ openlab_actions_anchor +'"]');
	}
	
    jQuery(".openlab-lite-nav-tabs a").click(function(event) {
        event.preventDefault();
		openlab_welcome_page_tabs(this);
    });

});