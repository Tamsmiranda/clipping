<?php
/* Term Test cases generated on: 2011-09-05 16:25:48 : 1315239948*/
App::import('Model', 'clipping.Term');

class TermTestCase extends CakeTestCase {
	var $fixtures = array('app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.taxonomy');

	function startTest() {
		$this->Term =& ClassRegistry::init('Term');
	}

	function endTest() {
		unset($this->Term);
		ClassRegistry::flush();
	}

	function testSaveAndGetId() {

	}

}
?>