<?php
App::uses('AppController', 'Controller');
/**
 * Seasons Controller
 *
 * @property Season $Season
 */
class SeasonsController extends AppController {


/**
 * index method
 *
 * @return void
 */
    public function index() {
	    $this->Season->recursive = 0;
	    $this->set('seasons', $this->paginate());
    }

/**
* view method
*
* @param string $id
* @return void
*/
    public function view($id = null) {
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    $this->set('season', $this->Season->read(null, $id));
    }

/**
* add method
*
* @return void
*/
    public function add() {
	if ($this->request->is('post')) {
	    $this->Season->create();
	    if ($this->Season->save($this->request->data)) {
		foreach($this->request->data['Country'] as $country) {
		    $this->Season->Division->createDivisions(
			$country['id'],
			$this->Season->id,
			$country['level']
		    );
		}
		$this->Session->setFlash(__('The season has been saved'));
		$this->redirect(array('action' => 'index'));
	    } else {
		$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
	    }
	}
	$season = $this->Season->find('first', array(
	    'order' => 'Season.year DESC'
	));
	$this->Season->Division->Country->recursive = -1;
	$countries = $this->Season->Division->Country->find('all');
	foreach($countries as &$country) {
	    $country['level'] = $this->Season->Division->deepestLevel($country['Country']['id'], $season['Season']['id']);
	}
	$this->set(compact('season', 'countries'));
    }    

/**
* edit method
*
* @param string $id
* @return void
*/
    public function edit($id = null) {
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    if ($this->request->is('post') || $this->request->is('put')) {
		    if ($this->Season->save($this->request->data)) {
			    $this->Session->setFlash(__('The season has been saved'));
			    $this->redirect(array('action' => 'index'));
		    } else {
			    $this->Session->setFlash(__('The season could not be saved. Please, try again.'));
		    }
	    } else {
		    $this->request->data = $this->Season->read(null, $id);
	    }
    }

/**
* delete method
*
* @param string $id
* @return void
*/
    public function delete($id = null) {
	    if (!$this->request->is('post')) {
		    throw new MethodNotAllowedException();
	    }
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    if ($this->Season->delete()) {
		    $this->Session->setFlash(__('Season deleted'));
		    $this->redirect(array('action'=>'index'));
	    }
	    $this->Session->setFlash(__('Season was not deleted'));
	    $this->redirect(array('action' => 'index'));
    }
    
    public function activate($id = null) {
	$this->Season->id = $id;
	if (!$this->Season->exists()) {
	    throw new NotFoundException(__('Invalid season'));
	}
	/* Update the Teams' division_id to reflect their new position.
	 * Take all divisions from current season and new season
	 */
	 $data['season'] = $this->Season->find('first', array(
	    'conditions' => array('Season.id' => $id),
	    'contain' => array('Division' => array(
		'order' => array('Division.country_id', 'Division.hierarchy'),
		'Ranking' => array('order' => 'Ranking.points DESC',
		    'Team'
		)
	    ))
	 ));
	 $data['previous_season'] = $this->Season->find('first', array(
	    'conditions' => array('Season.year' => $data['season']['Season']['year'] - 1),
	    'contain' => array('Division' => array(
		'order' => array('Division.country_id', 'Division.hierarchy'),
		'Ranking' => array('order' => 'Ranking.points DESC',
		    'Team'
		)
	    ))
	 ));
	 
	 /*
	 echo "<pre>";
	 print_r($data);
	 echo "</pre>";
	 */
	
	// For each division ordered by hierarchy DESC
	foreach($data['season']['Division'] as $new_division) {
	    $previous_season_key = $this->divisionPreviousSeasonKey($data, $new_division);
	    
	    // If division from previous year has teams, move them in their new division
	    if($previous_season_key !== false &&
	      !empty($data['previous_season']['Division'][$previous_season_key]['Ranking'])) {
		// Get lower divisions keys if they exist
		$lowerDivisionIds = $this->getLowerDivisionIds($data, $new_division);
		$rankLength = count($data['previous_season']['Division'][$previous_season_key]['Ranking']);
		// For each ranked team
		foreach($data['previous_season']['Division'][$previous_season_key]['Ranking'] as $rankKey => $ranking) {
		    
		    //First team in the division from previous season can join the higher division (if not already in the 1st division)
		    if($rankKey == 0 && $new_division['hierarchy'] > 1) {
			$upper_division_id = $this->getUpperDivisionId($data, $new_division);
			$this->Season->Division->Team->updateTeamDivision($ranking['Team']['id'], $upper_division_id);
			
		    // Last 2 teams in the division from previous season join the lowest left and right divisions if it exists.
		    } elseif($lowerDivisionIds !== false && $rankKey >= $rankLength-2) {
			if($rankKey == $rankLength-2) {
			    $this->Season->Division->Team->updateTeamDivision($ranking['Team']['id'], $lowerDivisionIds['left']);
			} else {
			    $this->Season->Division->Team->updateTeamDivision($ranking['Team']['id'], $lowerDivisionIds['right']);
			}
		    // All other teams stay in the same division
		    } else {
			$this->Season->Division->Team->updateTeamDivision($ranking['Team']['id'], $new_division['id']);
		    }
		}
	    } else {
		 /* Create 8 new teams and 10 new players for each team in this division
		  * if this division will be below an existing division, make only 7 teams 
		  * and create one new team there in the division above. 
		  */ 
		 if($new_division['hierarchy'] == 1) {
		    $this->Season->Division->Team->createDivisionTeams($new_division['id'], 8);
		} else {
		    $this->Season->Division->Team->createDivisionTeams($new_division['id'], 7);
		    $upper_division_id = $this->getUpperDivisionId($data, $new_division);
		    $this->Season->Division->Team->createDivisionTeams($upper_division_id, 1);
		}
	    }
	}
	
	// Make 8 new ranking entries for each teams in each divisions
	foreach($data['season']['Division'] as $new_division) {
	    $updatedTeams = $this->Season->Division->Team->find('all', array(
		'conditions' => array('Team.division_id' => $new_division['id']),
		'recursive' => -1,
		'fields' => array('Team.id', 'Team.division_id')
	    ));
	    
	    foreach($updatedTeams as $team) {
		$this->Season->Division->Ranking->create();
		$newRanking['division_id'] = $new_division['id'];
		$newRanking['team_id'] = $team['Team']['id'];
		$newRanking['points'] = $newRanking['played'] = $newRanking['victories'] = $newRanking['defeats'] = 
		$newRanking['points_scored'] = $newRanking['points_against'] = 0;
		$this->Season->Division->Ranking->save($newRanking);
	    }
	}
	$this->Session->setFlash(__('Les équipes ont été mises à jour. La nouvelle saison est prête.'));
	$this->redirect(array('action' => 'index'));
    }
    
    private function getUpperDivisionId(&$data, &$new_division) {
	foreach($data['season']['Division'] as $key => $division) {
	    if($division['country_id'] == $new_division['country_id'] &&
		$division['hierarchy'] == floor($new_division['hierarchy'] / 2) ) {
		    return $division['id'];
	    }
	}
	return false;
    }
    
    private function getLowerDivisionIds(&$data, &$new_division) {
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

    private function divisionPreviousSeasonKey(&$data, &$new_division) {
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
