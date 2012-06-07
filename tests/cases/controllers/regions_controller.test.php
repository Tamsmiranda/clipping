<?php
/* Regions Test cases generated on: 2011-09-05 16:26:11 : 1315239971*/
App::import('Controller', 'clipping.Regions');

class TestRegionsController extends RegionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RegionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.region', 'app.block', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Regions =& new TestRegionsController();
		$this->Regions->constructClasses();
	}

	function endTest() {
		unset($this->Regions);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>