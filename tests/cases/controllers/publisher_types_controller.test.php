<?php
/* PublisherTypes Test cases generated on: 2011-09-05 16:37:30 : 1315240650*/
App::import('Controller', 'clipping.PublisherTypes');

class TestPublisherTypesController extends PublisherTypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PublisherTypesControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->PublisherTypes =& new TestPublisherTypesController();
		$this->PublisherTypes->constructClasses();
	}

	function endTest() {
		unset($this->PublisherTypes);
		ClassRegistry::flush();
	}

}
?>