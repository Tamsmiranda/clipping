<?php
/* Section Test cases generated on: 2011-09-05 16:25:40 : 1315239940*/
App::import('Model', 'clipping.Section');

class SectionTestCase extends CakeTestCase {
	var $fixtures = array('app.role');

	function startTest() {
		$this->Section =& ClassRegistry::init('Section');
	}

	function endTest() {
		unset($this->Section);
		ClassRegistry::flush();
	}

}
?>