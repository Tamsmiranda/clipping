<?php
/* Terms Test cases generated on: 2011-09-05 16:26:12 : 1315239972*/
App::import('Controller', 'clipping.Terms');

class TestTermsController extends TermsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TermsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.taxonomy', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.nodes_taxonomy');

	function startTest() {
		$this->Terms =& new TestTermsController();
		$this->Terms->constructClasses();
	}

	function endTest() {
		unset($this->Terms);
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

}
?>