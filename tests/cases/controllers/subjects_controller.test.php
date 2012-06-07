<?php
/* Subjects Test cases generated on: 2011-09-05 16:26:12 : 1315239972*/
App::import('Controller', 'clipping.Subjects');

class TestSubjectsController extends SubjectsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SubjectsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.subject', 'app.clipp', 'app.evaluation', 'app.status', 'app.customer', 'app.publisher_type', 'app.publisher', 'app.section', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Subjects =& new TestSubjectsController();
		$this->Subjects->constructClasses();
	}

	function endTest() {
		unset($this->Subjects);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>