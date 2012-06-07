<?php
/* Vocabularies Test cases generated on: 2011-09-05 16:26:13 : 1315239973*/
App::import('Controller', 'clipping.Vocabularies');

class TestVocabulariesController extends VocabulariesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class VocabulariesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.nodes_taxonomy');

	function startTest() {
		$this->Vocabularies =& new TestVocabulariesController();
		$this->Vocabularies->constructClasses();
	}

	function endTest() {
		unset($this->Vocabularies);
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