/**
 * Created by BattosaiHimura on 02/07/16.
 */

$(function() {
	
	$('#badge').on('click', function(){
		$badge = "<img class='img-responsive' id='badgeModal' src='"+$(this).attr('src')+"' alt='Badge'/>" +
			"<h4 id='badgeMessage'>" +
			"Congratulazioni!" +
			"<br/>" +
			"Ecco il tuo Badge partecipativo." +
			"<br/><br/>" +
			"Continua ad usare la piattaforma e salirai ancora di livello!" +
			"</h4>";
		
		$('#msgModalMessage').html($badge);
		$('#msgModal').modal("show");
	});
	
});