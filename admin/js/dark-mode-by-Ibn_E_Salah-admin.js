jQuery(document).ready(function($){

	// Dark Mode Body CSS
	$('#darkmodecssbodycolorpicker').on('input', function() {
		$('#darkbodyhexcolor').val(this.value);
	});
	$('#darkbodyhexcolor').on('input', function() {
	  $('#darkmodecssbodycolorpicker').val(this.value);
	});



	// Orienation Of Switch
	$('#darkmodefrontright').on('input', function() {
		$('#darkmodefrontrightnumber').val(this.value);
	});
	$('#darkmodefrontrightnumber').on('input', function() {
	  $('#darkmodefrontright').val(this.value);
	});

	$('#darkmodefronttop').on('input', function() {
		$('#darkmodefronttopnumber').val(this.value);
	});
	$('#darkmodefronttopnumber').on('input', function() {
	  $('#darkmodefronttop').val(this.value);
	});
	
	$('#darkmodefrontbottom').on('input', function() {
		$('#darkmodefrontbottomnumber').val(this.value);
	});
	$('#darkmodefrontbottomnumber').on('input', function() {
	  $('#darkmodefrontbottom').val(this.value);
	});

	$('#darkmodefrontleft').on('input', function() {
		$('#darkmodefrontleftnumber').val(this.value);
	});
	$('#darkmodefrontleftnumber').on('input', function() {
	  $('#darkmodefrontleft').val(this.value);
	});

	
	
	// Clear Body Color
	if($('#darkmodebodycolor').val()!="" && $('#darkmodebodycolor').val()!= 'none'){
		$('#clearbodycolor').show();
	}
	$('#darkmodebodycolor').on('input', function() {
		$('#clearbodycolor').show();
	});
	$("#clearbodycolor").click(function(){
		$('#darkmodebodycolor').val('none');
		$("#clearbodycolor").hide();
	});


	// Clear A and A hover Color
	if($('#darkmodeacolor').val()!="" && $('#darkmodeacolor').val()!= 'none'){
		$('#clearacolor').show();
	}
	$('#darkmodeacolor').on('input', function() {
		$('#clearacolor').show();
	});
	$("#clearacolor").click(function(){
		$('#darkmodeacolor').val('none');
		$("#clearacolor").hide();
	});

	if($('#darkmodeahovercolor').val()!="" && $('#darkmodeahovercolor').val()!= 'none'){
		$('#clearahovercolor').show();
	}
	$('#darkmodeahovercolor').on('input', function() {
		$('#clearahovercolor').show();
	});
	$("#clearahovercolor").click(function(){
		$('#darkmodeahovercolor').val('none');
		$("#clearahovercolor").hide();
	});

	// Clear Heading Color
	
	// H1
	if($('#darkmodeh1color').val()!="" && $('#darkmodeh1color').val()!= 'none'){
		$('#clearh1color').show();
	}
	$('#darkmodeh1color').on('input', function() {
		$('#clearh1color').show();
	});
	$("#clearh1color").click(function(){
		$('#darkmodeh1color').val('none');
		$("#clearh1color").hide();
	});
	// H2
	if($('#darkmodeh2color').val()!="" && $('#darkmodeh2color').val()!= 'none'){
		$('#clearh2color').show();
	}
	$('#darkmodeh2color').on('input', function() {
		$('#clearh2color').show();
	});
	$("#clearh2color").click(function(){
		$('#darkmodeh2color').val('none');
		$("#clearh2color").hide();
	});
	// H3
	if($('#darkmodeh3color').val()!="" && $('#darkmodeh3color').val()!= 'none'){
		$('#clearh3color').show();
	}
	$('#darkmodeh3color').on('input', function() {
		$('#clearh3color').show();
	});
	$("#clearh3color").click(function(){
		$('#darkmodeh3color').val('none');
		$("#clearh3color").hide();
	});
	// H4
	if($('#darkmodeh4color').val()!="" && $('#darkmodeh4color').val()!= 'none'){
		$('#clearh4color').show();
	}
	$('#darkmodeh4color').on('input', function() {
		$('#clearh4color').show();
	});
	$("#clearh4color").click(function(){
		$('#darkmodeh4color').val('none');
		$("#clearh4color").hide();
	});
	// H5
	if($('#darkmodeh5color').val()!="" && $('#darkmodeh5color').val()!= 'none'){
		$('#clearh5color').show();
	}
	$('#darkmodeh5color').on('input', function() {
		$('#clearh5color').show();
	});
	$("#clearh5color").click(function(){
		$('#darkmodeh5color').val('none');
		$("#clearh5color").hide();
	});
	// H6
	if($('#darkmodeh6color').val()!="" && $('#darkmodeh6color').val()!= 'none'){
		$('#clearh6color').show();
	}
	$('#darkmodeh6color').on('input', function() {
		$('#clearh6color').show();
	});
	$("#clearh6color").click(function(){
		$('#darkmodeh6color').val('none');
		$("#clearh6color").hide();
	});


// Upload Site Logo

$('#upload_Ibn_E_Salah_site_logo').click(function(e) {
var mediaUploader;

  e.preventDefault();
	if (mediaUploader) {
	mediaUploader.open();
	return;
  }
  mediaUploader = wp.media.frames.file_frame = wp.media({
	title: 'Choose Image',
	button: {
	text: 'Choose Image'
  }, multiple: false });
  mediaUploader.on('select', function() {
	var attachment = mediaUploader.state().get('selection').first().toJSON();
	$('#Ibn_E_Salahsitelogo').val(attachment.url);
	$("#Ibn_E_Salahsitelogoimage").attr("src",attachment.url);
  });
  mediaUploader.open();
});



$('#upload_Ibn_E_Salah_darkmode_site_logo').click(function(e) {
	var mediaUploader;

	e.preventDefault();
	  if (mediaUploader) {
	  mediaUploader.open();
	  return;
	}
	mediaUploader = wp.media.frames.file_frame = wp.media({
	  title: 'Choose Image',
	  button: {
	  text: 'Choose Image'
	}, multiple: false });
	mediaUploader.on('select', function() {
	  var attachment = mediaUploader.state().get('selection').first().toJSON();
	  $('#Ibn_E_Salahdarkmodesitelogo').val(attachment.url);
	  $("#Ibn_E_Salahdarkmodesitelogoimage").attr("src",attachment.url);
	});
	mediaUploader.open();
  });

  

});