<?php
App::uses('AppModel', 'Model');
/**
 * FriendlyMatchRequest Model
 *
 * @property Team $TeamFrom
 * @property Team $TeamTo
 */
class FriendlyMatchRequest extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TeamFrom' => array(
			'className' => 'Team',
			'foreignKey' => 'from_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TeamTo' => array(
			'className' => 'Team',
			'foreignKey' => 'to_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
