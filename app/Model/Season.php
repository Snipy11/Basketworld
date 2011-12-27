<?php
App::uses('AppModel', 'Model');
/**
 * Season Model
 *
 * @property Division $Division
 */
class Season extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'year';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'year' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
        'PlayerSkill' => array(
            'className' => 'PlayerSkill',
			'foreignKey' => 'season_id',
			'dependent' => false,
        ),
        'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'season_id',
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
	   
    public function activate($id) {
			
		/* Update the Teams' division_id to reflect their new position.
		 * Take all divisions from current season and new season
		 */
		 $data['season'] = $this->find('first', array(
			'conditions' => array('Season.id' => $id),
			'contain' => array('Division' => array(
			'order' => array('Division.country_id', 'Division.hierarchy'),
			'Ranking' => array('order' => 'Ranking.points DESC',
				'Team'
			)
			))
		 ));
		 $data['previous_season'] = $this->find('first', array(
			'conditions' => array('Season.year' => $data['season']['Season']['year'] - 1),
			'contain' => array('Division' => array(
			'order' => array('Division.country_id', 'Division.hierarchy'),
			'Ranking' => array('order' => 'Ranking.points DESC',
				'Team'
			)
			))
		 ));
        $previous_season_division_depth = $this->Division->field('MAX(Division.hierarchy)', array(
            'Division.season_id' => $data['previous_season']['Season']['id']
        ));
        if(is_null($previous_season_division_depth)) {
            $previous_season_division_depth = 0;
        }
		// Begin transaction.
		$db = $this->getDataSource();
		$transactionBegun = $db->begin($this);
		
        // Delete all history of player skills from previous season, but keep the first one. 
        // Copy the last one if any to the new season.
        $this->PlayerSkill->removeSkillHistory($data['season']['Season']['id'], $data['previous_season']['Season']['id']);
		// For each division ordered by hierarchy DESC
		foreach($data['season']['Division'] as $new_division) {
            // If division existed in previous season, move its teams in the new divisions
			if($new_division['hierarchy'] < pow(2, $previous_season_division_depth)) {
                $previous_season_key = $this->divisionPreviousSeasonKey($data, $new_division);
                // Get lower divisions keys if they exist
                $lowerDivisionIds = $this->getLowerDivisionIds($data, $new_division);
                $rankLength = count($data['previous_season']['Division'][$previous_season_key]['Ranking']);
                // For each ranked team
                foreach($data['previous_season']['Division'][$previous_season_key]['Ranking'] as $rankKey => $ranking) {
                    
                    //First team in the division from previous season can join the higher division (if not already in the 1st division)
                    if($rankKey == 0 && $new_division['hierarchy'] > 1) {
                    $upper_division_id = $this->getUpperDivisionId($data, $new_division);
                    $this->Division->Team->updateTeamDivision($ranking['Team']['id'], $upper_division_id);
                    
                    // Last 2 teams in the division from previous season join the lowest left and right divisions if it exists.
                    } elseif($lowerDivisionIds !== false && $rankKey >= $rankLength-2) {
                    if($rankKey == $rankLength-2) {
                        $this->Division->Team->updateTeamDivision($ranking['Team']['id'], $lowerDivisionIds['left']);
                    } else {
                        $this->Division->Team->updateTeamDivision($ranking['Team']['id'], $lowerDivisionIds['right']);
                    }
                    // All other teams stay in the same division
                    } else {
                    $this->Division->Team->updateTeamDivision($ranking['Team']['id'], $new_division['id']);
                    }
                }
			} else {
                 /* Create 8 new teams and 10 new players for each team in this division.
                  * If this division will be below an existing division, make only 7 teams 
                  * and create one new team in the division above. 
                  */
                if($new_division['hierarchy'] >= pow($previous_season_division_depth + 1, 2)) {
                    $this->Division->Team->createDivisionTeams($data['season']['Season']['id'], $new_division['id'], 8);
                } else {
                    $this->Division->Team->createDivisionTeams($data['season']['Season']['id'], $new_division['id'], 7);
                    $upper_division_id = $this->getUpperDivisionId($data, $new_division);
                    $this->Division->Team->createDivisionTeams($data['season']['Season']['id'], $upper_division_id, 1);
                }
			}
		}
        
		// Commit the saves into the db
		if(!$db->commit($this)) {
			$db->rollback($this);
			return false;
		} 
		return true;
	}
	
	
	private function getUpperDivisionId($data, $new_division) {
		foreach($data['season']['Division'] as $key => $division) {
			if($division['country_id'] == $new_division['country_id'] &&
			$division['hierarchy'] == floor($new_division['hierarchy'] / 2) ) {
				return $division['id'];
			}
		}
		return false;
    }
    
    private function getLowerDivisionIds($data, $new_division) {
		foreach($data['season']['Division'] as $key => $division) {
			if($division['country_id'] == $new_division['country_id'] &&
			$division['hierarchy'] == $new_division['hierarchy'] * 2 ) {
				$lowerDivisionIds['left'] = $division['id'];
				$lowerDivisionIds['right'] = $data['season']['Division'][$key+1]['id'];
				return $lowerDivisionIds;
			}
		}
		return false;
    }

    private function divisionPreviousSeasonKey($data, $new_division) {
		if(!empty($data['previous_season'])) {
			foreach($data['previous_season']['Division'] as $key => $division) {
                if($division['country_id'] == $new_division['country_id'] &&
                    $division['hierarchy'] == $new_division['hierarchy']) {
                    return $key;
                }
			}
		}
		return false;
    }
}
