<?php
/* Publisher Test cases generated on: 2011-09-05 16:25:34 : 1315239934*/
App::import('Model', 'clipping.Publisher');

class PublisherTestCase extends CakeTestCase {
	var $fixtures = array('app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Publisher =& ClassRegistry::init('Publisher');
	}

	function endTest() {
		unset($this->Publisher);
		ClassRegistry::flush();
	}

}
?>