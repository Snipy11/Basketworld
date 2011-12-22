<?php
App::uses('AppModel', 'Model');
/**
 * MatchesPlayer Model
 *
 * @property Match $Match
 * @property PlayersTeam $PlayersTeam
 */
class MatchesPlayer extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/*
 * static enum: Model::function()
 * @access static
 */
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
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PlayersTeam' => array(
			'className' => 'PlayersTeam',
			'foreignKey' => 'players_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public function createDefault($match_id, $team_id) {
        $fields = array('match_id', 'players_team_id', 'position');
        $values = array();
        for($position = 0; $position < 5; $position++) {
            $playerTeam = $this->PlayersTeam->find('first', array(
                'conditions' => array(
                    'PlayersTeam.team_id' => $team_id,
                    'PlayersTeam.default_position' => $position
                ),
                'recursive' => -1
            ));
            $values[] = array($match_id, $playerTeam['PlayersTeam']['id'], $position);
        }
        $db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $values)) {
			$db->rollback($this);
		}
    }
    
}
