<?php
/* TypesVocabulary Test cases generated on: 2011-09-05 16:25:52 : 1315239952*/
App::import('Model', 'clipping.TypesVocabulary');

class TypesVocabularyTestCase extends CakeTestCase {
	var $fixtures = array('app.type', 'app.vocabulary', 'app.types_vocabulary');

	function startTest() {
		$this->TypesVocabulary =& ClassRegistry::init('TypesVocabulary');
	}

	function endTest() {
		unset($this->TypesVocabulary);
		ClassRegistry::flush();
	}

}
?>