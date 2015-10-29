function window_dimensions(){
	$("#container").height( $(document).height() );
	//$("#pages").height( $(window).height() );
	$("#btn_login").width( ($("#div_login").width()-$("#spn_rememberme").width()-$("#chckbx_rememberme").width()-30) );
	var logo_margin = (($(document).height()-$("#pages").height())/6);
	if(logo_margin > 5){
		$("#logo").css({ 'margin-top': logo_margin+'px' });
		$("#logo").css({ 'margin-bottom': logo_margin+'px' });
	}else{
		$("#logo").css({ 'margin-top': '5px' });
		$("#logo").css({ 'margin-bottom': '5px' });
	}
}

/* SEARCH EVENTS */
function searching(){
	var data = $('#src_searching').val();

if( parseInt($.trim( data ).length) >=1 ){
//if( true ){
	var request = $.ajax({
	  url: "search-list.php",
	  method: "POST",
	  data: { 'info' : data }

	});
	 
	request.done(function( msg ) {
	  $("#search_events").html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
} else {
	$("#search_events").html('No results found!');
}
	
}

/* NAVIGATION */
function navigation(page){
	$("#search_events").hide();
	$("#specific_event").hide();
	$("#"+page).show();
}

/* OPEN SPECIFIC EVENT */
function open_event(even_id){
	$("#search_events").hide();

	var request = $.ajax({
	  url: "specific_event.php",
	  method: "POST",
	  data: { 'info' : even_id }

	});
	 
	request.done(function( msg ) {
	  $("#specific_event").html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
	
	$("#specific_event").show();
}

/* JQUERY */
$(document).ready(function() {
	window_dimensions();
	
	$(window).on('resize', function(){
		window_dimensions();
	});
	
	//$("#pages").html( $(window).height() );
	/*$("#container").height( $(window).height() );
	$("#pages").height( $(window).height() );*/
	
	$("#btn_logout").click(function() {
		var d = new Date();
		d.setTime(d.getTime() - (7*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie="RememberMe=Forgotten; expires="+expires;
		$(location).attr('href','index.php?w=loggedout');
	});
	
});