<?php
class ClippLink extends ClippingAppModel {
	var $name = 'ClippLink';
	var $displayField = 'url';
	var $validate = array(
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Clipp' => array(
			'className' => 'Clipp',
			'foreignKey' => 'clipp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>