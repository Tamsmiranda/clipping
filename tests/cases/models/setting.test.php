<?php
/* Setting Test cases generated on: 2011-09-05 16:25:41 : 1315239941*/
App::import('Model', 'clipping.Setting');

class SettingTestCase extends CakeTestCase {
	var $fixtures = array('app.setting');

	function startTest() {
		$this->Setting =& ClassRegistry::init('Setting');
	}

	function endTest() {
		unset($this->Setting);
		ClassRegistry::flush();
	}

	function testWrite() {

	}

	function testDeleteKey() {

	}

	function testWriteConfiguration() {

	}

	function testUpdateYaml() {

	}

}
?>