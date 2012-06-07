<?php
/* PublishersSection Test cases generated on: 2011-09-05 17:07:46 : 1315242466*/
App::import('Model', 'clipping.PublishersSection');

class PublishersSectionTestCase extends CakeTestCase {
	function startTest() {
		$this->PublishersSection =& ClassRegistry::init('PublishersSection');
	}

	function endTest() {
		unset($this->PublishersSection);
		ClassRegistry::flush();
	}

}
?>