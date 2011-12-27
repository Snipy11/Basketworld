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
            switch($player['default_position']) {
                case 0:
                    $shoot = mt_rand(10, 20);
                    $threePoints = mt_rand(10, 20);
                    $dribble = mt_rand(15, 30);
                    $assist = mt_rand(15, 30);
                    $rebound = mt_rand(0, 5);
                    $block = mt_rand(0, 5);
                    $steal = mt_rand(5, 30);
                    $defense = mt_rand(0, 30);
                    break;
                case 1:
                    $shoot = mt_rand(10, 25);
                    $threePoints = mt_rand(10, 25);
                    $dribble = mt_rand(10, 30);
                    $assist = mt_rand(15, 30);
                    $rebound = mt_rand(0, 5);
                    $block = mt_rand(0, 5);
                    $steal = mt_rand(5, 30);
                    $defense = mt_rand(0, 30);
                    break;
                case 2:
                    $shoot = mt_rand(15, 30);
                    $threePoints = mt_rand(15, 30);
                    $dribble = mt_rand(5, 20);
                    $assist = mt_rand(5, 20);
                    $rebound = mt_rand(5, 15);
                    $block = mt_rand(5, 15);
                    $steal = mt_rand(5, 25);
                    $defense = mt_rand(0, 30);
                    break;
                case 3:
                    $shoot = mt_rand(15, 30);
                    $threePoints = mt_rand(0, 10);
                    $dribble = mt_rand(5, 20);
                    $assist = mt_rand(5, 15);
                    $rebound = mt_rand(10, 30);
                    $block = mt_rand(5, 25);
                    $steal = mt_rand(5, 20);
                    $defense = mt_rand(0, 30);
                    break;
                case 4:
                    $shoot = mt_rand(15, 30);
                    $threePoints = mt_rand(0, 10);
                    $dribble = mt_rand(5, 25);
                    $assist = mt_rand(5, 10);
                    $rebound = mt_rand(15, 35);
                    $block = mt_rand(15, 30);
                    $steal = mt_rand(5, 20);
                    $defense = mt_rand(0, 30);
                    break;
                
            }
            App::uses('Math', 'Lib');
            $skill = Math::avrg($shoot, $threePoints, $dribble, $assist, $rebound, $block, $steal, $defense);
            $values[] = array($skill, $shoot, $threePoints, $dribble, $assist, $rebound, $block, $steal,
                        $defense, 100, 0, $player['id'], $season_id, $now);
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
            'contain' => array(
                'PlayerSkill',
                'PlayerSkills' => array(
                    'conditions' => array('PlayerSkills.season_id' => $previous_season_id),
                    'fields' => array('PlayerSkills.id', 'PlayerSkills.created')),
            ),
        ));
        
        if(!empty($players)) {
            foreach($players['PlayerSkill'] as $playerSkill) {
                $this->id = $playerSkill['id'];
                $this->saveField('season_id', $new_season_id);
            }        
            // Select all the skills remaining expect the oldest one, for history.
            $players = $this->Player->find('all', array(
                'fields' => 'Player.id',
                'contain' => array(
                    'PlayerSkills' => array(
                        'conditions' => array('PlayerSkill.season_id' => $previous_season_id),
                        'fields' => array('PlayerSkill.id', 'PlayerSkill.created'),
                        'order' => 'PlayerSkill.created ASC',
                        'offset' => 1 // Keep oldest record
                    )
                )
            ));
            $ids = Set::extract('/PlayerSkill/id', $players);
            $this->deleteAll(array('PlayerSkill.id' => $ids));
        }
    }
    
}
