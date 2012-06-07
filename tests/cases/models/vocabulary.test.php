<?php
/* Vocabulary Test cases generated on: 2011-09-05 16:25:55 : 1315239955*/
App::import('Model', 'clipping.Vocabulary');

class VocabularyTestCase extends CakeTestCase {
	var $fixtures = array('app.vocabulary', 'app.type', 'app.types_vocabulary');

	function startTest() {
		$this->Vocabulary =& ClassRegistry::init('Vocabulary');
	}

	function endTest() {
		unset($this->Vocabulary);
		ClassRegistry::flush();
	}

}
?>