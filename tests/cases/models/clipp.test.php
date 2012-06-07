<?php
/* Clipp Test cases generated on: 2011-09-05 16:30:12 : 1315240212*/
App::import('Model', 'clipping.Clipp');

class ClippTestCase extends CakeTestCase {
	var $fixtures = array('app.clipp', 'app.evaluation', 'app.status', 'app.customer', 'app.publisher_type', 'app.publisher', 'app.section', 'app.subject');

	function startTest() {
		$this->Clipp =& ClassRegistry::init('Clipp');
	}

	function endTest() {
		unset($this->Clipp);
		ClassRegistry::flush();
	}

}
?>