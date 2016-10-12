<?php
namespace petschephp\Wifi;
/**
 * Class Wifi
 * @author Kevin Petsche
 * @email petschephp@gmail.com
 */
class Wifi
{
	public $command = "/System/Library/PrivateFrameworks/Apple80211.framework/Versions/Current/Resources/airport -s";

	public $rows = [
		0 => 'ssid',
		1 => 'bssid',
		2 => 'rssi',
		3 => 'channel',
		4 => 'ht',
		5 => 'cc',
		6 => 'security'
	];

	/**
	 * @return array
	 */
	public function getNetworks()
	{
		exec($this->command, $wifiNetworks, $a);
		return $this->_cleanData($wifiNetworks);
	}

	/**
	 * @param $wifiNetworks
	 * @return array
	 */
	private function _cleanData($wifiNetworks)
	{
		$cleanData = [];
		foreach ($wifiNetworks as $key => $wifi) {

			$networks = explode(" ", preg_replace('/\s+/', ' ', $wifi));
			array_shift($networks);
			foreach ($networks as $networkKey => $network) {
				if ($networkKey == 7) {
					continue;
				}
				if (array_key_exists(7, $networks) && $networkKey == 6) {
					$cleanData[$key][$this->rows[$networkKey]] = $networks[6] . ' ' . $networks[7];
				} else
					$cleanData[$key][$this->rows[$networkKey]] = $network;
			}
		}
		return $cleanData;
	}
}
