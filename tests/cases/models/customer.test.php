<?php
/* Customer Test cases generated on: 2011-09-05 16:25:16 : 1315239916*/
App::import('Model', 'clipping.Customer');

class CustomerTestCase extends CakeTestCase {
	var $fixtures = array('app.customer', 'app.clipp', 'app.evaluation', 'app.status', 'app.publisher_type', 'app.publisher', 'app.section', 'app.subject');

	function startTest() {
		$this->Customer =& ClassRegistry::init('Customer');
	}

	function endTest() {
		unset($this->Customer);
		ClassRegistry::flush();
	}

}
?>