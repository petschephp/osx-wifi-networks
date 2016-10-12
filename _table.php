Total Networks: <b><?= count($wifiNetworks); ?></b>
<table class="table table-bordered">
	<?php
	foreach ($wifiNetworks as $key => $wifi) {
		?>
		<tr>
			<td>
				<?= $wifi['ssid']; ?>
			</td>
			<td>
				<?= $wifi['bssid']; ?>
			</td>
			<td>
				<?= $wifi['rssi']; ?>
			</td>
			<td>
				<?= $wifi['channel']; ?>
			</td>
			<td>
				<?= $wifi['ht']; ?>
			</td>
			<td>
				<?= $wifi['cc']; ?>
			</td>
			<td>
				<?= $wifi['security']; ?>
			</td>
			<!--			--><?php //foreach ($wifi as $networkKey => $network) { ?>
			<!---->
			<!--				<td>-->
			<!--					--><? //= $network; ?>
			<!---->
			<!--				</td>-->
			<!---->
			<!--			--><? // } ?>
		</tr>

	<? } ?>

</table>