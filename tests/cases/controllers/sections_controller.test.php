<?php
/* Sections Test cases generated on: 2011-09-05 16:39:01 : 1315240741*/
App::import('Controller', 'clipping.Sections');

class TestSectionsController extends SectionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SectionsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Sections =& new TestSectionsController();
		$this->Sections->constructClasses();
	}

	function endTest() {
		unset($this->Sections);
		ClassRegistry::flush();
	}

}
?>