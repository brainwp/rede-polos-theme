jQuery(document).ready(function($) {
	// fitVids.
	
	$( '#video_port' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
	
	function myFunction(id0, id1, id2) {

		$(id0).hover(
			function() {
			    $( id0 ).css( 'width','49%');
			    $(  id1 ).css( 'width','20%');
			    $( id2 ).css( 'width','20%');
				$(id1+" .titulo-servico").addClass('vertical')
				$(id2+" .titulo-servico").addClass('vertical')

			  }, function() {
				$(id1+" .titulo-servico").removeClass('vertical')
				$(id2+" .titulo-servico").removeClass('vertical')
				
			    $( id0).css( 'width','30%');
			 	$(  id1 ).css( 'width','30%');
			    $( id2 ).css( 'width','30%');
			  }
			);
	}
	myFunction('#capa-0', '#capa-1', '#capa-2');
	myFunction('#capa-2', '#capa-0', '#capa-1');
	myFunction('#capa-1', '#capa-2', '#capa-0');
	
// 	$( "#capa-0" ).hover(
// 	  function() {
// 	    $( "#capa-0" ).css( 'width','60%');
// 	    $( "#capa-1" ).css( 'width','10%');
// 	    $( "#capa-2" ).css( 'width','10%');
// 	
// 	  }, function() {
// 	    $( "#capa-0" ).css( 'width','30%');
// 	 	$( "#capa-1" ).css( 'width','30%');
// 	    $( "#capa-2" ).css( 'width','30%');
// 	  }
// 	);
// 	$( "#capa-1" ).hover(
// 	  function() {
// 	    $( "#capa-1" ).css( 'width','60%');
// 	    $( "#capa-2" ).css( 'width','10%');
// 	    $( "#capa-0" ).css( 'width','10%');
// 	
// 	  }, function() {
// 	    $( "#capa-1" ).css( 'width','30%');
// 	 	$( "#capa-2" ).css( 'width','30%');
// 	    $( "#capa-0" ).css( 'width','30%');
// 	  }
// 	);
// 	$( "#capa-2" ).hover(
// 	  function() {
// 	    $( "#capa-2" ).css( 'width','60%');
// 	    $( "#capa-0" ).css( 'width','10%');
// 	    $( "#capa-1" ).css( 'width','10%');
// 	
// 	  }, function() {
// 	    $( "#capa-2" ).css( 'width','30%');
// 	 	$( "#capa-0" ).css( 'width','30%');
// 	    $( "#capa-1" ).css( 'width','30%');
// 	  }
// 	);

	largura=$('#servicos-rolo').width()
	$('#servicos-imagens article').width(largura/3-2);
	var current=$('#servicos-rolo');
	console.log(current.offsetHeight())
 	
	$('#servicos-imagens article').height(altura);

	console.log(altura);
	
	

	
	
});
