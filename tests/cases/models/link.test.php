<?php
/* Link Test cases generated on: 2011-09-05 16:25:21 : 1315239921*/
App::import('Model', 'clipping.Link');

class LinkTestCase extends CakeTestCase {
	var $fixtures = array('app.link', 'app.menu');

	function startTest() {
		$this->Link =& ClassRegistry::init('Link');
	}

	function endTest() {
		unset($this->Link);
		ClassRegistry::flush();
	}

}
?>