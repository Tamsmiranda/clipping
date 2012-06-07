<?php
/* Storages Test cases generated on: 2011-09-06 13:46:06 : 1315316766*/
App::import('Controller', 'Clipping.Storages');

class TestStoragesController extends StoragesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StoragesControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Storages =& new TestStoragesController();
		$this->Storages->constructClasses();
	}

	function endTest() {
		unset($this->Storages);
		ClassRegistry::flush();
	}

}
?>