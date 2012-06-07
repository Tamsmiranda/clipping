<?php
/* Metum Test cases generated on: 2011-09-05 16:25:27 : 1315239927*/
App::import('Model', 'clipping.Metum');

class MetumTestCase extends CakeTestCase {
	var $fixtures = array('app.message', 'app.contact');

	function startTest() {
		$this->Metum =& ClassRegistry::init('Metum');
	}

	function endTest() {
		unset($this->Metum);
		ClassRegistry::flush();
	}

}
?>