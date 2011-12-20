<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 * @property Country $Country
 * @property Transfert $Transfert
 * @property ActionsMatch $PlayerActionee
 * @property ActionsMatch $PlayerInvolvedInAction
 * @property PlayersTeam $PlayerInTeam
 */
class Player extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/*
 * static enum: Model::function()
 * @access static
 */
    public static function spirits($value = null) {
        $options = array(
            self::AGGRESSIVE => __('Agressif'),
            self::CALM => __('Calme'),
            self::VICIOUS => __('Vicieux'),
            self::TIMID => __('Timide'),
        );
        return parent::enum($value, $options);
    }
    
    const AGGRESSIVE = 0;
    const CALM = 1;
    const VICIOUS = 2;
    const TIMID = 3;
    
    public static function specialities($value = null) {
        $options = array(
        /* TODO : traduire ces termes */
            self::DUNKER => __('Dunker'),
            self::NASHER => __('Nasher'),
            self::BLOCKER => __('Blocker'),
            self::SHOOTER => __('Shooter'),
        );
        return parent::enum($value, $options);
    }
    
    const DUNKER = 0;
    const NASHER = 1;
    const BLOCKER = 2;
    const SHOOTER = 3;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'age' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'height' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'salary' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'spirit' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'injury' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'speciality' => array(
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
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
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
		'PlayerSkill' => array(
            'className' => 'PlayerSkill',
			'foreignKey' => 'player_id',
			'dependent' => false,
            'order' => 'PlayerSkill.created DESC',
            'limit' => 1
        ),
        'Transfert' => array(
			'className' => 'Transfert',
			'foreignKey' => 'player_id',
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
		'PlayerActionee' => array(
			'className' => 'ActionsMatch',
			'foreignKey' => 'player1_id',
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
		'PlayerInvolvedInAction' => array(
			'className' => 'ActionsMatch',
			'foreignKey' => 'player2_id',
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
		'PlayerInTeam' => array(
			'className' => 'PlayersTeam',
			'foreignKey' => 'player_id',
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
	public function createPlayers($team_id, $season_id) {
		$this->create();
        $players = array();
        for ($i = 0; $i < 10; $i++) {
            $default_position = $i % 5;
			$this->id = false;
			$country_id = $this->Country->getRandomCountry();
			$data['country_id'] = $country_id;
			$data['first_name'] = $this->Country->PlayerFirstName->getRandomFirstName($country_id);
			$data['name'] = $this->Country->PlayerName->getRandomName($country_id);;
			$data['age'] = 20;
			switch($default_position) {
                case 0:
                    $data['height'] = mt_rand(160, 190);
                    break;
                case 1:
                    $data['height'] = mt_rand(160, 195);
                    break;
                case 2:
                    $data['height'] = mt_rand(180, 205);
                    break;
                case 3:
                    $data['height'] = mt_rand(185, 210);
                    break;
                case 4:
                    $data['height'] = mt_rand(185, 210);
                    break;
            }
			$data['salary'] = 1000;
			$data['spirit'] = mt_rand(0, 3);
			$data['injury'] = 0;
			$data['speciality'] = mt_rand(0, 3);
			$this->save($data, false);
			$players[] = array('id' => $this->id, 'default_position' => $i % 5);
		}
        $this->PlayerSkill->createPlayerSkills($players, $season_id);
        $this->PlayerInTeam->createPlayerInTeam($players, $team_id);
	}
    
    
}
