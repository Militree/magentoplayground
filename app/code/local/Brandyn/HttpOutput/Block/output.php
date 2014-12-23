<?php

class Brandyn_HttpOutput_Block_Output extends Mage_Core_Block_Template {

	public function outputHttp() {
		echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
		$browser = get_browser(null, true);
		print_r($browser);
	}
	
}