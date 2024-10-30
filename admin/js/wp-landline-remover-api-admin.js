(function( $ ) {
	'use strict';
	  $(function() {
	        $(document).on('click','.notice-dismiss', function(){
	            $(this).parent().remove();
	        });
	  });
})( jQuery );
