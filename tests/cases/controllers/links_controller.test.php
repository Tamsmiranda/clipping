<?php
/* Links Test cases generated on: 2011-09-05 16:26:10 : 1315239970*/
App::import('Controller', 'clipping.Links');

class TestLinksController extends LinksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LinksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.link', 'app.menu', 'app.role', 'app.block', 'app.region', 'app.setting', 'app.node', 'app.user', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Links =& new TestLinksController();
		$this->Links->constructClasses();
	}

	function endTest() {
		unset($this->Links);
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