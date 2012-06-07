<?php
/* Contact Test cases generated on: 2011-09-05 16:25:14 : 1315239914*/
App::import('Model', 'clipping.Contact');

class ContactTestCase extends CakeTestCase {
	var $fixtures = array('app.contact', 'app.message');

	function startTest() {
		$this->Contact =& ClassRegistry::init('Contact');
	}

	function endTest() {
		unset($this->Contact);
		ClassRegistry::flush();
	}

}
?>