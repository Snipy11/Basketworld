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

}
