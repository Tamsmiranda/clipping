<?php
/* Users Test cases generated on: 2011-09-05 16:26:13 : 1315239973*/
App::import('Controller', 'clipping.Users');

class TestUsersController extends UsersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UsersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.role', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Users =& new TestUsersController();
		$this->Users->constructClasses();
	}

	function endTest() {
		unset($this->Users);
		ClassRegistry::flush();
	}

	function testAdminIndex() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminResetPassword() {

	}

	function testAdminDelete() {

	}

	function testAdminLogin() {

	}

	function testAdminLogout() {

	}

	function testIndex() {

	}

	function testAdd() {

	}

	function testActivate() {

	}

	function testEdit() {

	}

	function testForgot() {

	}

	function testReset() {

	}

	function testLogin() {

	}

	function testLogout() {

	}

	function testView() {

	}

}
?>