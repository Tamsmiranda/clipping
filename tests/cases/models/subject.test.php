<?php
/* Subject Test cases generated on: 2011-09-05 16:25:45 : 1315239945*/
App::import('Model', 'clipping.Subject');

class SubjectTestCase extends CakeTestCase {
	var $fixtures = array('app.subject', 'app.clipp', 'app.evaluation', 'app.status', 'app.customer', 'app.publisher_type', 'app.publisher', 'app.section');

	function startTest() {
		$this->Subject =& ClassRegistry::init('Subject');
	}

	function endTest() {
		unset($this->Subject);
		ClassRegistry::flush();
	}

}
?>