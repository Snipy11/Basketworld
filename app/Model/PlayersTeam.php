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

    public static function positions($value = null) {
        $options = array(
            self::MENEUR => __('Meneur'),
            self::ARRIERE => __('Arrière'),
            self::AILIER_SHOOTER => __('Ailier shooter'),
            self::AILIER_FORT => __('Ailier fort'),
            self::PIVOT => __('Pivot'),
            self::RESERVE => __('Réserve'),
        );
        return parent::enum($value, $options);
    }
    
    const MENEUR = 0;
    const ARRIERE = 1;
    const AILIER_SHOOTER = 2;
    const AILIER_FORT = 3;
    const PIVOT = 4;
    const RESERVE = 5;

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
 * Create a new link of a player in a team.
 * 
 */    
	public function createPlayerInTeam($players, $team_id) {
		$fields = array('team_id', 'player_id', 'default_position');
        $values = array();
        foreach($players as $player) {
            $values[] = array($team_id, $player['id'], $player['default_position']);
        }
        $db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $values)) {
			$db->rollback($this);
		}	
	}

}
