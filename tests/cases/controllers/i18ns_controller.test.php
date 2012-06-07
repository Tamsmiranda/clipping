<?php
/* I18ns Test cases generated on: 2011-09-05 16:26:09 : 1315239969*/
App::import('Controller', 'clipping.I18ns');

class TestI18nsController extends I18nsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class I18nsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.evaluation', 'app.clipp', 'app.status', 'app.customer', 'app.publisher_type', 'app.publisher', 'app.section', 'app.subject', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->I18ns =& new TestI18nsController();
		$this->I18ns->constructClasses();
	}

	function endTest() {
		unset($this->I18ns);
		ClassRegistry::flush();
	}

}
?>