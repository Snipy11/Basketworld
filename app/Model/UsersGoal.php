<?php
App::uses('AppModel', 'Model');
/**
 * UsersGoal Model
 *
 * @property Goal $Goal
 * @property User $User
 * @property User $GmValidUser
 */
class UsersGoal extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Goal' => array(
			'className' => 'Goal',
			'foreignKey' => 'goal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GmValidUser' => array(
			'className' => 'User',
			'foreignKey' => 'gm_valid_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
