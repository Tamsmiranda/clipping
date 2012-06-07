<?php
/* Blocks Test cases generated on: 2011-09-05 16:26:07 : 1315239967*/
App::import('Controller', 'clipping.Blocks');

class TestBlocksController extends BlocksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BlocksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.block', 'app.region', 'app.role', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Blocks =& new TestBlocksController();
		$this->Blocks->constructClasses();
	}

	function endTest() {
		unset($this->Blocks);
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

	function testAdminMoveup() {

	}

	function testAdminMovedown() {

	}

	function testAdminProcess() {

	}

}
?>