<?php
App::uses('AppModel', 'Model');
/**
 * Transfert Model
 *
 * @property Player $Player
 * @property Team $AcquireTeam
 * @property Team $SellTeam
 * @property User $GmWatch
 */
class Transfert extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'current_price' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AcquireTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'acquire_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SellTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'sell_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GmWatch' => array(
			'className' => 'User',
			'foreignKey' => 'gm_watch',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
