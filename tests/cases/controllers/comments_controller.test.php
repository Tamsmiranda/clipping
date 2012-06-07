<?php
/* Comments Test cases generated on: 2011-09-05 16:26:07 : 1315239967*/
App::import('Controller', 'clipping.Comments');

class TestCommentsController extends CommentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CommentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.comment', 'app.node', 'app.user', 'app.role', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting');

	function startTest() {
		$this->Comments =& new TestCommentsController();
		$this->Comments->constructClasses();
	}

	function endTest() {
		unset($this->Comments);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

	function testAdminProcess() {

	}

	function testIndex() {

	}

	function testAdd() {

	}

	function testDelete() {

	}

}
?>