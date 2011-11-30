<?php
App::uses('AppModel', 'Model');
/**
 * Friend Model
 *
 * @property User $UserFrom
 * @property User $UserTo
 */
class Friend extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'UserFrom' => array(
			'className' => 'User',
			'foreignKey' => 'from_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserTo' => array(
			'className' => 'User',
			'foreignKey' => 'to_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
