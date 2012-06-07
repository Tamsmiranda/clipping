<?php
/* User Test cases generated on: 2011-09-05 16:25:53 : 1315239953*/
App::import('Model', 'clipping.User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.role');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

	function testParentNode() {

	}

}
?>