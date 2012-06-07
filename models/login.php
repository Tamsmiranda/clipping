<?php
class Login extends ClippingAppModel {
	var $name = 'Login';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Clipp' => array(
			'className' => 'Clipp',
			'foreignKey' => 'status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>