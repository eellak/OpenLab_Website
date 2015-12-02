jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */
	if( !jQuery( ".openlab-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section openlab-upsells">');
	}

	if( jQuery( ".openlab-upsells" ).length ) {

	}
	
	if ( !jQuery( ".openlab-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}

	jQuery( '.ui-state-default' ).on( 'mousedown', function() {
		jQuery( '#customize-header-actions #save' ).trigger( 'click' );

	});

	/* Move our focus widgets in the our focus panel */
	wp.customize.section( 'sidebar-widgets-sidebar-ourfocus' ).panel( 'panel_ourfocus' );
	wp.customize.section( 'sidebar-widgets-sidebar-ourfocus' ).priority( '2' );

	/* Move our team widgets in the our team panel */
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).panel( 'panel_ourteam' );
	wp.customize.section( 'sidebar-widgets-sidebar-ourteam' ).priority( '2' );

	/* Move testimonial widgets in the testimonials panel */
	//wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).panel( 'panel_testimonials' );
	//wp.customize.section( 'sidebar-widgets-sidebar-testimonials' ).priority( '2' );

	/* Move about us widgets in the about us panel */
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).panel( 'panel_about' );
	wp.customize.section( 'sidebar-widgets-sidebar-aboutus' ).priority( '7' );
});
