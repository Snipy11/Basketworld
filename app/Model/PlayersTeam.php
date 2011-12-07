<?php
App::uses('AppModel', 'Model');
/**
 * PlayersTeam Model
 *
 * @property Team $Team
 * @property Player $Player
 * @property MatchesPlayer $MatchesPlayer
 */
class PlayersTeam extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MatchesPlayer' => array(
			'className' => 'MatchesPlayer',
			'foreignKey' => 'players_team_id',
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
	
/**
 * Create new teams and 10 new players in each team.
 * 
 */    
	public function createPlayers($team_id) {
		// To access the static enums from Player model
		App::uses('Player', 'Model');

		for ($i = 0; $i < 10; $i++) {
			$this->create();
			$data['Player']['country_id'] = 1;
			$data['Player']['first_name'] = 'John';
			$data['Player']['name'] = 'Doe';
			$data['Player']['age'] = 20;
			$data['Player']['height'] = 200;
			$data['Player']['salary'] = 1000;
			$data['Player']['skill'] = $data['Player']['shoot'] = $data['Player']['3points'] = $data['Player']['dribble'] = $data['Player']['assist'] =
			$data['Player']['rebound'] = $data['Player']['block'] = $data['Player']['steal'] = $data['Player']['defense'] = $data['Player']['form'] = 20;
			$data['Player']['experience'] = 0;
			$data['Player']['spirit'] = Player::CALM;
			$data['Player']['injury'] = 0;
			$data['Player']['speciality'] = Player::NASHER;
			$data['Team']['id'] = $team_id;
			$this->saveAssociated($data, array('validate' => false));
		}
		
		
		
	}

}
