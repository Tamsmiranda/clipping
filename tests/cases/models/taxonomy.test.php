<?php
/* Taxonomy Test cases generated on: 2011-09-05 16:25:47 : 1315239947*/
App::import('Model', 'clipping.Taxonomy');

class TaxonomyTestCase extends CakeTestCase {
	var $fixtures = array('app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary');

	function startTest() {
		$this->Taxonomy =& ClassRegistry::init('Taxonomy');
	}

	function endTest() {
		unset($this->Taxonomy);
		ClassRegistry::flush();
	}

	function testGetTree() {

	}

	function testTermInVocabulary() {

	}

}
?>