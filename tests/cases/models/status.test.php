<?php
/* Status Test cases generated on: 2011-09-05 16:25:43 : 1315239943*/
App::import('Model', 'clipping.Status');

class StatusTestCase extends CakeTestCase {
	var $fixtures = array('app.setting');

	function startTest() {
		$this->Status =& ClassRegistry::init('Status');
	}

	function endTest() {
		unset($this->Status);
		ClassRegistry::flush();
	}

}
?>