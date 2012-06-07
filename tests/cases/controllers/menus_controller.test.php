<?php
/* Menus Test cases generated on: 2011-09-05 16:26:10 : 1315239970*/
App::import('Controller', 'clipping.Menus');

class TestMenusController extends MenusController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MenusControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.menu', 'app.link', 'app.block', 'app.region', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Menus =& new TestMenusController();
		$this->Menus->constructClasses();
	}

	function endTest() {
		unset($this->Menus);
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