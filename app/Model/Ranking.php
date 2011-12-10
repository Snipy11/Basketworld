<?php
App::uses('AppModel', 'Model');
/**
 * Ranking Model
 *
 * @property Division $Division
 * @property Team $Team
 */
class Ranking extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'points' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'played' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'victories' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'defeats' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'points_scored' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'points_against' => array(
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
		'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function createRankings($season_id) {
		// Make 8 new ranking entries for each teams in each divisions
		$fields = array(
			'division_id',
			'team_id',
			'points',
			'played',
			'victories',
			'defeats',
			'points_scored',
			'points_against'
		);
		// Update with the new teams
		$data = $this->Division->find('all', array(
			'conditions' => array('Division.season_id' => $season_id),
			'fields' => array('Division.season_id', 'Division.id'),
			'contain' => array(
				'Team' => array(
					'fields' => array('Team.id')
				)
			)	
		));

		foreach($data as $new_division) {	
			foreach($new_division['Team'] as $team) {
				$values[] = array(
				$new_division['Division']['id'],
				$team['id'],
				0,
				0,
				0,
				0,
				0,
				0
				);
			}
		}
		$db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $values)) {
			$db->rollback($this);
			return false;
		}
		return true;
	}
	
}
