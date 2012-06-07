<?php
/* Role Test cases generated on: 2011-09-05 16:25:38 : 1315239938*/
App::import('Model', 'clipping.Role');

class RoleTestCase extends CakeTestCase {
	var $fixtures = array('app.role');

	function startTest() {
		$this->Role =& ClassRegistry::init('Role');
	}

	function endTest() {
		unset($this->Role);
		ClassRegistry::flush();
	}

	function testParentNode() {

	}

}
?>