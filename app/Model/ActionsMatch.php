<?php
App::uses('AppModel', 'Model');
/**
 * ActionsMatch Model
 *
 * @property Match $Match
 * @property Action $Action
 * @property Player $Player1
 * @property Player $Player2
 */
class ActionsMatch extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Action' => array(
			'className' => 'Action',
			'foreignKey' => 'action_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player1' => array(
			'className' => 'Player',
			'foreignKey' => 'player1_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player2' => array(
			'className' => 'Player',
			'foreignKey' => 'player2_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
