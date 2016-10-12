<?php
include_once 'vendor/autoload.php';
use petschephp;

$wifiNetworks = (new Wifi())->getNetworks();
if (isset($_GET['refresh'])) {
	ob_start();
	$wifiNetworks = (new Wifi())->getNetworks();
	require_once '_table.php';
	$table = ob_get_contents();
	ob_end_clean();
	header('Content-Type: application/json');
	echo json_encode(['table' => $table]);

	die;
}
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<div id="wifi-networks">
	<?php require_once '_table.php'; ?>
</div>


<script>
	setInterval(function () {
		$.get('test.php?refresh=1', '', function (data) {
			if (data.table) {
				$('#wifi-networks').html(data.table)
			}
		}, 'json');
	}, 10000)
</script>