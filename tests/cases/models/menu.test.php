<?php
/* Menu Test cases generated on: 2011-09-05 16:25:23 : 1315239923*/
App::import('Model', 'clipping.Menu');

class MenuTestCase extends CakeTestCase {
	var $fixtures = array('app.menu', 'app.link');

	function startTest() {
		$this->Menu =& ClassRegistry::init('Menu');
	}

	function endTest() {
		unset($this->Menu);
		ClassRegistry::flush();
	}

}
?>