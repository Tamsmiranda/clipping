<?php
/* Message Test cases generated on: 2011-09-05 16:25:25 : 1315239925*/
App::import('Model', 'clipping.Message');

class MessageTestCase extends CakeTestCase {
	var $fixtures = array('app.message', 'app.contact');

	function startTest() {
		$this->Message =& ClassRegistry::init('Message');
	}

	function endTest() {
		unset($this->Message);
		ClassRegistry::flush();
	}

}
?>