<?php
/* Statuses Test cases generated on: 2011-09-05 16:39:17 : 1315240757*/
App::import('Controller', 'clipping.Statuses');

class TestStatusesController extends StatusesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StatusesControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Statuses =& new TestStatusesController();
		$this->Statuses->constructClasses();
	}

	function endTest() {
		unset($this->Statuses);
		ClassRegistry::flush();
	}

}
?>