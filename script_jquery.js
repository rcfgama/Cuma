$(function(){
	$('#l1').click(function(){
		$('#b1').show();
		$('#p1').show();
		$('#b2').hide();
		$('#p2').hide();
	/*	$('#b3').hide(); */
	});

	$('#l2').click(function(){
		$('#b1').hide();
		$('#p1').hide();
		$('#b2').show();
		$('#p2').show();
	/*	$('#b3').hide(); */
	});
/*
	$('#l3').click(function(){
		$('#b1').hide();
		$('#b2').hide();
		$('#b3').show();
	});
*/
});