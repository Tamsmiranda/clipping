<?php
/* ArosAco Test cases generated on: 2011-09-05 16:25:07 : 1315239907*/
App::import('Model', 'clipping.ArosAco');

class ArosAcoTestCase extends CakeTestCase {
	function startTest() {
		$this->ArosAco =& ClassRegistry::init('ArosAco');
	}

	function endTest() {
		unset($this->ArosAco);
		ClassRegistry::flush();
	}

}
?>