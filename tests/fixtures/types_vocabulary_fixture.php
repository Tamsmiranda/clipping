<?php
/* TypesVocabulary Fixture generated on: 2011-09-05 16:25:52 : 1315239952 */
class TypesVocabularyFixture extends CakeTestFixture {
	var $name = 'TypesVocabulary';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'type_id' => 1,
			'vocabulary_id' => 1,
			'weight' => 1
		),
	);
}
?>