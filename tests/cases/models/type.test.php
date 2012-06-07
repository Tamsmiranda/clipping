<?php
/* Type Test cases generated on: 2011-09-05 16:25:50 : 1315239950*/
App::import('Model', 'clipping.Type');

class TypeTestCase extends CakeTestCase {
	var $fixtures = array('app.type', 'app.vocabulary', 'app.types_vocabulary');

	function startTest() {
		$this->Type =& ClassRegistry::init('Type');
	}

	function endTest() {
		unset($this->Type);
		ClassRegistry::flush();
	}

}
?>