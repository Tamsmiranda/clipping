<?php
/* Files Test cases generated on: 2011-09-06 13:37:08 : 1315316228*/
App::import('Controller', 'Clipping.Files');

class TestFilesController extends FilesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FilesControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Files =& new TestFilesController();
		$this->Files->constructClasses();
	}

	function endTest() {
		unset($this->Files);
		ClassRegistry::flush();
	}

}
?>