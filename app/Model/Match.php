<?php
App::uses('AppModel', 'Model');
/**
 * Match Model
 *
 * @property Team $HomeTeam
 * @property Team $VisitorTeam
 * @property Strategy $Strategy
 * @property GradesMatch $Grading
 * @property MatchesPlayer $PlayersInMatch
 * @property ActionsMatch $ActionsInMatch
 */
class Match extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';
    
/*
 * static enum: Model::function()
 * @access static
 */
    public static function types($value = null) {
        $options = array(
            self::CUP => __('Coupe'),
            self::LEAGUE => __('Ligue'),
            self::FRIENDLY => __('Amical'),
        );
        return parent::enum($value, $options);
    }
    
    const CUP = 0;
    const LEAGUE = 1;
    const FRIENDLY = 2;  

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'start_date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'home_points' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'visitor_points' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'normal_spectators' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'vip_spectators' => array(
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
		'HomeTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'home_team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'VisitorTeam' => array(
			'className' => 'Team',
			'foreignKey' => 'visitor_team_id',
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
		'Strategy' => array(
			'className' => 'Strategy',
			'foreignKey' => 'match_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Grading' => array(
			'className' => 'GradesMatch',
			'foreignKey' => 'match_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PlayersInMatch' => array(
			'className' => 'MatchesPlayer',
			'foreignKey' => 'match_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ActionsInMatch' => array(
			'className' => 'ActionsMatch',
			'foreignKey' => 'match_id',
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

	public function createCalendarMatches($season_id) {
		$data = $this->HomeTeam->Division->find('all', array(
			'conditions' => array ('Division.season_id' => $season_id),
			'contain' => array('Team' => array(
				'fields' => 'Team.id'
			))
		));
		$this->HomeTeam->Division->Season->id = $season_id;
		$season_start = $this->HomeTeam->Division->Season->field('start_date');
		$date_stamp = strtotime($season_start);
		$matches = array();
		foreach($data as $division) {
			$division_matches = array();
			shuffle($division['Team']);
			$teamCount = count($division['Team']);
			$match_date_stamp = strtotime("Next wednesday 20:00", $date_stamp);
			$day_switch = 0;
			for ($j = 0; $j < $teamCount-1; $j++) {	
				for ($i = 0; $i < $teamCount/2; $i++) {
					if($j % 2 == 0) {
                        $division_matches[] = array(
                            $division['Team'][$i]['id'],
                            $division['Team'][$teamCount-1 - $i]['id'],
                            date('Y-m-d H:i:s', $match_date_stamp),
                            0,
                            0,
                            0,
                            Match::LEAGUE
                        );
                    } else {
                        $division_matches[] = array(
						$division['Team'][$teamCount-1 - $i]['id'],
                        $division['Team'][$i]['id'],
						date('Y-m-d H:i:s', $match_date_stamp),
						0,
						0,
						0,
						Match::LEAGUE
					);
                }
				}
				$this->array_rotate($division['Team']);
				$day = ($day_switch++ % 2 == 0) ? "saturday" : "wednesday";
				$match_date_stamp = strtotime("Next {$day} 20:00", $match_date_stamp);
			}
			// Return matches : just invert home and visitor
			
			for ($j = 0; $j < $teamCount-1; $j++) {	
				for ($i = 0; $i < $teamCount/2; $i++) {
					$match = $division_matches[$i + ($j * $teamCount/2)];
					$temp = $match[0];
					$match[0] = $match[1];
					$match[1] = $temp;
					$match[2] = date('Y-m-d H:i:s', $match_date_stamp);
					$division_matches[] = $match;
				}
			$day = ($day_switch++ % 2 == 0) ? "saturday" : "wednesday";
			$match_date_stamp = strtotime("Next {$day} 20:00", $match_date_stamp);
			}
			$matches = array_merge($matches, $division_matches);
		}		
		
		$fields = array(
			'home_team_id',
			'visitor_team_id',
			'start_date',
			'normal_spectators',
			'vip_spectators',
			'finished',
			'type'
		);

		$db = $this->getDataSource();
		if(!$db->insertMulti($this->table, $fields, $matches)) {
			$db->rollback($this);
			return false;
		}
		return true;
	}
	
	private function array_rotate(&$array, $size = null) {
		if(is_null($size)) {
			$size = count($array);
		}
		$head = $array[0];
		$tail = $array[1];
		for ($i = 1; $i < $size-1; $i++) {
			$array[$i] = $array[$i+1];
		}
		$array[$size-1] = $tail;
	}

}
