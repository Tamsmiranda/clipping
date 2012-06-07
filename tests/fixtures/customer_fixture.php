<?php
/* Customer Fixture generated on: 2011-09-05 16:25:16 : 1315239916 */
class CustomerFixture extends CakeTestFixture {
	var $name = 'Customer';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => '4e64f7ec-4834-4d3a-93e3-1508737253ea'
		),
	);
}
?>