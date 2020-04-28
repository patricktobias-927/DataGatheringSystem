function nxtStud() {
  		$("#next-stud-card").slideUp(650).fadeOut(1250);
  		$('#next-cont-card').delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}
function nxtCont() {
		$("#next-cont-card").slideUp(650).fadeOut(1250);
  		$('#next-fami-card').delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}
function backCont() {
		$("#next-cont-card").slideUp(625).fadeOut(1250);
  		$("#next-stud-card").delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}
function backFami() {
		$("#next-fami-card").slideUp(625).fadeOut(1250);
  		$("#next-cont-card").delay( 250 ).slideDown( 1250 ).fadeIn( 625 );
}


