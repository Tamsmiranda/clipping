<?php
/* PublishersSection Fixture generated on: 2011-09-05 17:07:43 : 1315242463 */
class PublishersSectionFixture extends CakeTestFixture {
	var $name = 'PublishersSection';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'publisher_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'section_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => '4e6501df-3de4-4ed2-8a44-12b0737253ea',
			'publisher_id' => 'Lorem ipsum dolor sit amet',
			'section_id' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>