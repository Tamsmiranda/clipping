<?php
/* Nodes Test cases generated on: 2011-09-05 16:26:11 : 1315239971*/
App::import('Controller', 'clipping.Nodes');

class TestNodesController extends NodesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class NodesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting');

	function startTest() {
		$this->Nodes =& new TestNodesController();
		$this->Nodes->constructClasses();
	}

	function endTest() {
		unset($this->Nodes);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminCreate() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminUpdatePath() {

	}

	function testAdminDelete() {

	}

	function testAdminDeleteMetum() {

	}

	function testAdminAddMetum() {

	}

	function testAdminProcess() {

	}

	function testIndex() {

	}

	function testTerm() {

	}

	function testPromoted() {

	}

	function testSearch() {

	}

	function testView() {

	}

}
?>