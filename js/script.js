$(function(){
	$('#sort-asc').hide();
	$('#sort-desc').click(function(){
		$(this).hide();
		$('#sort-asc').show();
	});
	$('#sort-asc').click(function(){
		$(this).hide();
		$('#sort-desc').show();
	});

	//faq

	$('#faq').hide();
	$('#add').click(function(){
		$('#faq').slideToggle("slow");
	});

	//hide print button
	$('#print').click(function(){
		$('#orderActions').hide();
		window.print();
		$('#orderActions').show();
	});
	
});

