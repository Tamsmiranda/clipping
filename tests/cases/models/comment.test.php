<?php
/* Comment Test cases generated on: 2011-09-05 16:25:12 : 1315239912*/
App::import('Model', 'clipping.Comment');

class CommentTestCase extends CakeTestCase {
	var $fixtures = array('app.comment', 'app.node', 'app.user', 'app.role', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy');

	function startTest() {
		$this->Comment =& ClassRegistry::init('Comment');
	}

	function endTest() {
		unset($this->Comment);
		ClassRegistry::flush();
	}

}
?>