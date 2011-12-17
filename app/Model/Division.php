<?php
App::uses('AppModel', 'Model');
/**
 * Division Model
 *
 * @property Country $Country
 * @property Season $Season
 * @property Ranking $Ranking
 * @property Rumor $Rumor
 * @property Team $Team
 */
class Division extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'hierarchy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		),
		'Season' => array(
			'className' => 'Season',
			'foreignKey' => 'season_id',
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
        'Ranking' => array(
			'className' => 'Ranking',
			'foreignKey' => 'division_id',
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
		'Rumor' => array(
			'className' => 'Rumor',
			'foreignKey' => 'division_id',
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
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'division_id',
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
	
	/*
	 * Find the lowest division created for a country and a season
	 * 
	 * @param int $country_id
	 * @param int $season_id
	 * @return int $level
	 */
	public function deepestLevel($country_id, $season_id) {
		$last_hierarchy = $this->field('hierarchy', 
			array(
				'Division.country_id' => $country_id,
				'Division.season_id' => $season_id
			),
			'Division.hierarchy DESC'
		);
		if($last_hierarchy !== false) {
			$level = floor(log($last_hierarchy, 2)) + 1;
			return $level;
		}
		return 0;
	}
	
	public function createDivisions($country_id, $season_id, $level) {
		for ($i = 1; $i < pow(2, $level); $i++)  {
			$this->create();
			$division['hierarchy'] = $i;
			$current_level = $this->myLog2($i) + 1;
			$division['name'] = "Division " . ($current_level) . chr(65 + ($i % pow(2, $current_level-1)));
			$division['country_id'] = $country_id;
			$division['season_id'] = $season_id;
			$this->save($division);
		}
	}
    
    private function myLog2($value) {
        $b = array(0x2, 0xC, 0xF0, 0xFF00, 0xFFFF0000);
        $S = array(1, 2, 4, 8, 16);
        $ret = 0;
        
        for ($i = 4; $i >= 0; $i--) {
            if ($value & $b[$i]) {
                $value >>= $S[$i];
                $ret |= $S[$i];
            } 
        }
        return $ret;
    }
    


}
