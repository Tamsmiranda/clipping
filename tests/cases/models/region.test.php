<?php
/* Region Test cases generated on: 2011-09-05 16:25:36 : 1315239936*/
App::import('Model', 'clipping.Region');

class RegionTestCase extends CakeTestCase {
	var $fixtures = array('app.region', 'app.block');

	function startTest() {
		$this->Region =& ClassRegistry::init('Region');
	}

	function endTest() {
		unset($this->Region);
		ClassRegistry::flush();
	}

}
?>