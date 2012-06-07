<?php
/* Aro Test cases generated on: 2011-09-05 16:25:05 : 1315239905*/
App::import('Model', 'clipping.Aro');

class AroTestCase extends CakeTestCase {
	function startTest() {
		$this->Aro =& ClassRegistry::init('Aro');
	}

	function endTest() {
		unset($this->Aro);
		ClassRegistry::flush();
	}

}
?>