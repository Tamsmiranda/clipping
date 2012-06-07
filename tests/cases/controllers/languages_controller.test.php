<?php
/* Languages Test cases generated on: 2011-09-05 16:26:09 : 1315239969*/
App::import('Controller', 'clipping.Languages');

class TestLanguagesController extends LanguagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LanguagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.language', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Languages =& new TestLanguagesController();
		$this->Languages->constructClasses();
	}

	function endTest() {
		unset($this->Languages);
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

	function testAdminSelect() {

	}

}
?>