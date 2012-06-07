<?php
/* Publishers Test cases generated on: 2011-09-05 16:37:45 : 1315240665*/
App::import('Controller', 'clipping.Publishers');

class TestPublishersController extends PublishersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PublishersControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Publishers =& new TestPublishersController();
		$this->Publishers->constructClasses();
	}

	function endTest() {
		unset($this->Publishers);
		ClassRegistry::flush();
	}

}
?>