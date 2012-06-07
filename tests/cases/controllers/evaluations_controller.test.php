<?php
/* Evaluations Test cases generated on: 2011-09-05 16:26:08 : 1315239968*/
App::import('Controller', 'clipping.Evaluations');

class TestEvaluationsController extends EvaluationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EvaluationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.evaluation', 'app.clipp', 'app.status', 'app.customer', 'app.publisher_type', 'app.publisher', 'app.section', 'app.subject', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Evaluations =& new TestEvaluationsController();
		$this->Evaluations->constructClasses();
	}

	function endTest() {
		unset($this->Evaluations);
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