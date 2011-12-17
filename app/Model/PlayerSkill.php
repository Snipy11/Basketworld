<?php
App::uses('AppModel', 'Model');
/**
 * PlayerSkill Model
 *
 * @property Player $Player
 * @property Season $Season
 */
class PlayerSkill extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'skill';

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
		'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public function createPlayerSkills($players, $division_id) {
        $fields = array('skill', 'shoot', '3points', 'dribble', 'assist', 'rebound', 'block', 'steal',
            'defense', 'form', 'experience', 'player_id', 'division_id', 'created');
        $values = array();
        $now = date('Y-m-d');
        foreach($players as $player) {
            $values[] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $player['id'], $division_id, $now);
        }
        $db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $values)) {
			$db->rollback($this);
		}	
    }
    
}
