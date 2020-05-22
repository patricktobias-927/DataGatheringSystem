function nxtStud() {
	var noError = true;
	if ($.trim($('input[name ="first-name"]').val()).length > 0) {
  		$('input[name ="first-name"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="first-name"]').attr('title', "Valid");
	}
	else{
		$('input[name ="first-name"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="first-name"]').attr('title', "This Field Is Required");
		$('input[name ="first-name"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError = false;
	}

	if ($.trim($('input[name ="middle-name"]').val()).length > 1  ) {
  		$('input[name ="middle-name"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="middle-name"]').attr('title', "Valid");
	}
	else if($.trim($('input[name ="middle-name"]').val()).length == 0){}
	else{
		$('input[name ="middle-name"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="middle-name"]').attr('title', "Complete Middle Name Required");
  		$('input[name ="middle-name"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError = false;
	}

	if ($.trim($('input[name ="last-name"]').val()).length > 0) {
  		$('input[name ="last-name"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="last-name"]').attr('title', "Valid");
	}
	else{
		$('input[name ="last-name"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="last-name"]').attr('title', "This Field Is Required");
  		$('input[name ="last-name"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError = false;
	}
	var d = new Date();
	var n = d.getFullYear();
	var x = $('input[name ="birthdate"]').val();
	 	x = x.substring(6, 10);
	 if (x == "" || x == " "){}
	else if (x < n) {
  		$('input[name ="birthdate"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="birthdate"]').attr('title', "Valid");
	}
	else{
		$('input[name ="birthdate"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="birthdate"]').attr('title', "Invalid Input");
  		$('input[name ="birthdate"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError = false;
	}
	//last-school-attended-grade
	var d = 100.01;
	var n = $('input[name ="last-school-attended-grade"]').val();
	if (n.trim() == "" || n.trim() == " "){}

	else if (n < d) {
  		$('input[name ="last-school-attended-grade"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="last-school-attended-grade"]').attr('title', "Valid");
	}
	else{
		$('input[name ="last-school-attended-grade"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="last-school-attended-grade"]').attr('title', "This Field Is Required");
  		$('input[name ="last-school-attended-grade"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError = false;
	}


	if (noError) {
		$("#next-stud-card").slideUp(650).fadeOut(1250);
		$('#next-cont-card').delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
	}
}


function nxtCont() {
	var noError2 = true;

	if ($.trim($('input[name ="contact-person-name"]').val()).length > 0) {
  		$('input[name ="contact-person-name"]').addClass("is-valid").removeClass("is-invalid");
        $('input[name ="contact-person-name"]').attr('title', "Valid");
	}
	else{
		$('input[name ="contact-person-name"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="contact-person-name"]').attr('title', "This Field Is Required");
		$('input[name ="contact-person-name"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError2 = false;
	}

	var x = $.trim($('input[name ="contact-person-mobile"]').val());
	x = x.replace(/_/g, "")
	if ( x.length > 12) {
  		$('input[name ="contact-person-mobile"]').addClass("is-valid").removeClass("is-invalid");
        $('input[name ="contact-person-mobile"]').attr('title', "Valid");
	}
	else if (x.length < 11 && x.length > 0) {
		$('input[name ="contact-person-mobile"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="contact-person-mobile"]').attr('title', "Mobile Number Incomplete");
		$('input[name ="contact-person-mobile"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError2 = false;
	}
	else{
		$('input[name ="contact-person-mobile"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="contact-person-mobile"]').attr('title', "This Field Is Required");
		$('input[name ="contact-person-mobile"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError2 = false;
	}

	var x = $.trim($('input[name ="contact-person-phone"]').val());

	var email = $('input[name ="contact-person-email"]').val();
	var emailUser= email.substr(0, email.indexOf('@')); 
	x = x.replace(/_/g, "");
	if ( x.length > 12) {
  		$('input[name ="contact-person-phone"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="contact-person-phone"]').attr('title', "Valid");
	}
	else if (x.length < 11 && x.length > 0) {
		$('input[name ="contact-person-phone"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="contact-person-phone"]').attr('title', "Phone Number Incomplete");
		$('input[name ="contact-person-phone"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError2 = false;
	}

	if ($.trim($('input[name ="contact-person-email"]').val()).length = 0) {
		$('input[name ="contact-person-email"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="contact-person-email"]').attr('title', "This Field Is Required");
  		$('input[name ="contact-person-email"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError2 = false;
	}
	else if (emailUser.length < 6){
		$('input[name ="contact-person-email"]').addClass("is-invalid").removeClass("is-valid");
  		$('input[name ="contact-person-email"]').attr('title', "Your Email Username is too short");
  		$('input[name ="contact-person-email"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
  		noError2 = false;
	}

	else if (validateEmail($('input[name ="contact-person-email"]').val())) {
  		$('input[name ="contact-person-email"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="contact-person-email"]').attr('title', "Valid");
	}
	else{
		$('input[name ="contact-person-email"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="contact-person-email"]').attr('title', "Please Input a Valid Email");
		$('input[name ="contact-person-email"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError2 = false;

	}

	if (noError2) {
		$("#next-cont-card").slideUp(650).fadeOut(1250);
  		$('#next-fami-card').delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
  	}
}
function backCont() {
		$("#next-cont-card").slideUp(625).fadeOut(1250);
  		$("#next-stud-card").delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}
function backFami() {
		$("#next-fami-card").slideUp(625).fadeOut(1250);
  		$("#next-cont-card").delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}

function lastValidation(argument) {
	var noError3 = true;

	var x = $.trim($('input[name ="contact-person-mobile"]').val());
	x = x.replace(/_/g, "")
	if ( x.length > 12) {
  		$('input[name ="guardian-mobile"]').addClass("is-valid").removeClass("is-invalid");
        $('input[name ="guardian-mobile"]').attr('title', "Valid");
	}
	else if (x.length < 11 && x.length > 0) {
		$('input[name ="guardian-mobile"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="guardian-mobile"]').attr('title', "Mobile Number Incomplete");
		$('input[name ="guardian-mobile"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError3 = false;
	}

	var x = $.trim($('input[name ="guardian-phone"]').val());
	x = x.replace(/_/g, "");
	if ( x.length > 12) {
  		$('input[name ="guardian-phone"]').addClass("is-valid").removeClass("is-invalid");
		$('input[name ="guardian-phone"]').attr('title', "Valid");
	}
	else if (x.length < 11 && x.length > 0) {
		$('input[name ="guardian-phone"]').addClass("is-invalid").removeClass("is-valid");
		$('input[name ="guardian-phone"]').attr('title', "Phone Number Incomplete");
		$('input[name ="guardian-phone"]').fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
		noError3 = false;
	}

	if (noError3) {
		return confirm('Are you sure?')
	}
	else{
	 event.preventDefault();
	}
}


function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

$('.noEnterOnSubmit').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});



$(document).ready(function() {
    //set initial state.
   $('input[name ="isEldest"]').change(function() {
        if($(this).is(":checked")) {
            $('#siblings-order').attr("disabled", "disabled"); 
        	$('#siblings-order').val('1');        
        }
        else{
        	$('#siblings-order').removeAttr("disabled");
        	$('#siblings-order').val('');
        }
    });
});

