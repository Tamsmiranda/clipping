<?php
/* PublisherType Test cases generated on: 2011-09-05 16:25:32 : 1315239932*/
App::import('Model', 'clipping.PublisherType');

class PublisherTypeTestCase extends CakeTestCase {
	var $fixtures = array('app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->PublisherType =& ClassRegistry::init('PublisherType');
	}

	function endTest() {
		unset($this->PublisherType);
		ClassRegistry::flush();
	}

}
?>