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
		'Season' => array(
			'className' => 'Division',
			'foreignKey' => 'season_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public function createPlayerSkills($players, $season_id) {
        $fields = array('skill', 'shoot', '3points', 'dribble', 'assist', 'rebound', 'block', 'steal',
            'defense', 'form', 'experience', 'player_id', 'season_id', 'created');
        $values = array();
        $now = date('Y-m-d');
        foreach($players as $player) {
            $values[] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $player['id'], $season_id, $now);
        }
        $db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $values)) {
			$db->rollback($this);
		}	
    }

/*
 * Delete all history of player skills from previous season, but keep the oldest one. 
 * Copy the last one to the new season.
 */ 
    public function removeSkillHistory($new_season_id, $previous_season_id) {
        $players = $this->Player->find('all', array(
            'recursive' => -1,
            'fields' => 'Player.id'
        ));
        debug($players);
        exit;
        foreach($players as $player) {
            $first_skill = $this->find('first', array(
                'conditions' => array('PlayerSkill.player_id' => $player['Player']['id'],
                                    'PlayerSkill.season_id' => $previous_season_id),
                'order' => 'PlayerSkill.created',
                'recursive' => -1,
                'field' => array('PlayerSkill.id')
            ));
            if(!empty($first_skill)) {
                $this->id = $first_skill['PlayerSkill']['id'];
                $this->saveField('season_id', $new_season_id);
            }
        }
        // To be continued...
        // Check in Set::extract to select the ids to be deleted...
    }
    
}
