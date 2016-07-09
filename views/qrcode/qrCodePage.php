<?php
	if (isset($_GET["poll"]) && is_numeric($_GET["poll"])) {
		$poll = strip_tags($_GET["poll"]);
	} else {
		//header("Location: ".URL."index.php");
		exit;
	}

	$pollInfo = PollsQuery::create()->findById($poll)->getData();
?>

<script>
	$(function() {
		$url = "<?php echo URL.'dashboard?poll='.$poll;?>";
		$('#qr').qrcode($url);
	});
</script>

<div id="QRPollTitle">
	<h1><?php echo $pollInfo[0]->getTitle()?></h1>
	<h2>Data: <?php echo $pollInfo[0]->getDateFrom()->format("d/m/Y")?></h2>
</div>
<div class="container">
	<div id="qr"></div>
</div>