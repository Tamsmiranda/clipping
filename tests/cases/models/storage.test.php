<?php
/* Storage Test cases generated on: 2011-09-06 13:45:41 : 1315316741*/
App::import('Model', 'Clipping.Storage');

class StorageTestCase extends CakeTestCase {
	function startTest() {
		$this->Storage =& ClassRegistry::init('Storage');
	}

	function endTest() {
		unset($this->Storage);
		ClassRegistry::flush();
	}

}
?>