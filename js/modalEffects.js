var overlay = document.querySelector( '.md-overlay' );
var modal = document.querySelector( '#modal-13'),
				close = modal.querySelector( '.md-close' );	

function openF(title,mes){
  document.getElementById("modalTitle").innerHTML = title;			
  document.getElementById("messageTitle").innerHTML = mes;			
				
				classie.add( modal, 'md-show' );
				overlay.removeEventListener( 'click', removeModalHandler );
				overlay.addEventListener( 'click', removeModalHandler );

				if( classie.has( modal, 'md-setperspective' ) ) {
					setTimeout( function() {
						classie.add( document.documentElement, 'md-perspective' );
					}, 25 );
				}
				close.addEventListener( 'click', function( ev ) {
				ev.stopPropagation();
				removeModalHandler();
			});
				
}

function removeModal( hasPerspective ) {
  classie.remove( modal, 'md-show' );

  if( hasPerspective ) {
    classie.remove( document.documentElement, 'md-perspective' );
  }
}

function removeModalHandler() {
  removeModal( classie.has( modal, 'md-setperspective' ) ); 
}