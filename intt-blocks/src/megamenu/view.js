( function () {
	const trigger = document.querySelector( '.intt-nav__mega-trigger' );
	const panel   = document.getElementById( 'intt-megamenu' );

	if ( ! trigger || ! panel ) return;

	function open() {
		panel.classList.add( 'is-open' );
		trigger.setAttribute( 'aria-expanded', 'true' );
	}

	function close() {
		panel.classList.remove( 'is-open' );
		trigger.setAttribute( 'aria-expanded', 'false' );
	}

	trigger.addEventListener( 'click', function ( e ) {
		e.stopPropagation();
		panel.classList.contains( 'is-open' ) ? close() : open();
	} );

	// Cerrar con Escape (accesibilidad)
	document.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' && panel.classList.contains( 'is-open' ) ) {
			close();
			trigger.focus();
		}
	} );

	// Cerrar al hacer click fuera del panel y del trigger
	document.addEventListener( 'click', function ( e ) {
		if ( ! panel.contains( e.target ) ) {
			close();
		}
	} );
} )();
