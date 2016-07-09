$(function() {
	var moveLeft = 20;
	var moveDown = 10;
	var flag = true;
	if(flag){
		$('tr#trigger').hover(function() {
			$('div#pop-up').show();
			//Linee seguenti non necessarie ma utili per comprendere
			//il comportamento della funzione
			//.css('top', e.pageY + moveDown)
			//.css('left', e.pageX + moveLeft)
			//.appendTo('body');
		}, function() {
			$('div#pop-up').hide();
		});
		$('tr#trigger').mousemove(function(e) {
			$("div#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
		});
	}else{
		$('tr#trigger').click(function() {
			window.location.href = "http://stackoverflow.com";
		});
	}


});