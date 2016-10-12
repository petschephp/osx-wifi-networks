# osx-wifi-networks
Gets available wifi networks using the airport command

Example usage:

`$wifiNetworks = (new petschephp\AirPort\Wifi())->getNetworks();`

`print_r($wifiNetworks);`