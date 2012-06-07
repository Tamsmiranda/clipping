<?php
/* NodesTaxonomy Test cases generated on: 2011-09-05 16:25:31 : 1315239931*/
App::import('Model', 'clipping.NodesTaxonomy');

class NodesTaxonomyTestCase extends CakeTestCase {
	var $fixtures = array('app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->NodesTaxonomy =& ClassRegistry::init('NodesTaxonomy');
	}

	function endTest() {
		unset($this->NodesTaxonomy);
		ClassRegistry::flush();
	}

}
?>