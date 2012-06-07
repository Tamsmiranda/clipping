<?php
/* Block Test cases generated on: 2011-09-05 16:25:09 : 1315239909*/
App::import('Model', 'clipping.Block');

class BlockTestCase extends CakeTestCase {
	var $fixtures = array('app.block', 'app.region');

	function startTest() {
		$this->Block =& ClassRegistry::init('Block');
	}

	function endTest() {
		unset($this->Block);
		ClassRegistry::flush();
	}

}
?>