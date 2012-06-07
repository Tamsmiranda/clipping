<?php
/* Node Test cases generated on: 2011-09-05 16:25:29 : 1315239929*/
App::import('Model', 'clipping.Node');

class NodeTestCase extends CakeTestCase {
	var $fixtures = array('app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Node =& ClassRegistry::init('Node');
	}

	function endTest() {
		unset($this->Node);
		ClassRegistry::flush();
	}

}
?>