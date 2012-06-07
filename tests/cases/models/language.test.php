<?php
/* Language Test cases generated on: 2011-09-05 16:25:20 : 1315239920*/
App::import('Model', 'clipping.Language');

class LanguageTestCase extends CakeTestCase {
	var $fixtures = array('app.language');

	function startTest() {
		$this->Language =& ClassRegistry::init('Language');
	}

	function endTest() {
		unset($this->Language);
		ClassRegistry::flush();
	}

}
?>