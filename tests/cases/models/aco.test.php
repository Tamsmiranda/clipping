<?php
/* Aco Test cases generated on: 2011-09-05 16:25:03 : 1315239903*/
App::import('Model', 'clipping.Aco');

class AcoTestCase extends CakeTestCase {
	function startTest() {
		$this->Aco =& ClassRegistry::init('Aco');
	}

	function endTest() {
		unset($this->Aco);
		ClassRegistry::flush();
	}

}
?>