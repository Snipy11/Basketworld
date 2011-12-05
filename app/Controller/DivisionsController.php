<?php
App::uses('AppController', 'Controller');
/**
 * Divisions Controller
 *
 * @property Division $Division
 */
class DivisionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Division->recursive = 0;
		$this->set('divisions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		$this->set('division', $this->Division->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Division->create();
			if ($this->Division->save($this->request->data)) {
                $this->createDivisionTeams($this->Division->id);
				$this->Session->setFlash(__('The division has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Division->Country->find('list');
		$seasons = $this->Division->Season->find('list');
		$this->set(compact('countries', 'seasons'));
        
	}

/**
 * Create a new division with 8 new teams and 10 new players in each team
 * 
 */    
    private function createDivisionTeams($division_id) {
        for($i=0; $i<8; $i++) {
            $this->Division->Team->create();
            $team['division_id'] = $division_id;
            $team['name'] = "Team " . $i; //TODO Need team names.
            $team['gymnasium_name'] = "Gymnasium Team " . $i; //TODO Need gymnasium names.
            $team['places_assises'] = 500;
            $team['places_vip'] = 0;
            $team['adjoints'] = $team['attaches'] = $team['eplucheurs'] = $team['medecins'] = $team['kines'] =
            $team['chasseurs'] = $team['stats'] = 0;
            $team['confiance'] = 50;
            $team['cash'] = 50000;
            $team['matos'] = $team['tenues'] = $team['muscu'] = 0;
            $team['supporters'] = 200;
            $team['com_politique_gestion'] = Team::NOTHING;
            $team['com_ambition'] = Team::TRADING;
            $this->Division->Team->save($team);
            $this->Division->Ranking->create();
            $ranking['division_id'] = $division_id;
            $ranking['team_id'] = $this->Division->Team->id;
            $ranking['points'] = $ranking['played'] = $ranking['victories'] = $ranking['defeats'] = 
            $ranking['points_scored'] = $ranking['points_against'] = 0;
            $this->Division->Ranking->save($ranking);
            $this->createPlayersInTeam($this->Division->Team->id);
        }
    }

/*
 * Create 10 new players for each team
 * 
 */    
    private function createPlayersInTeam($team_id) {
        for ($i = 0; $i < 10; $i++) {
            $this->Division->Team->PlayersInTeam->Player->create();
            $player['country_id'] = 1;
            $player['first_name'] = 'John';
            $player['name'] = 'Doe';
            $player['age'] = 20;
            $player['height'] = 200;
            $player['salary'] = 1000;
            $player['skill'] = $player['shoot'] = $player['3points'] = $player['dribble'] = $player['assist'] =
            $player['rebound'] = $player['block'] = $player['steal'] = $player['defense'] = $player['form'] = 20;
            $player['experience'] = 0;
            $player['spirit'] = Player::CALM;
            $player['injury'] = 0;
            $player['speciality'] = Player::NASHER;
            $this->Division->Team->PlayersInTeam->Player->save($player);
            $this->Division->Team->PlayersInTeam->create();
            $playersInTeam['team_id'] = $team_id;
            $playersInTeam['player_id'] = $this->Division->Team->PlayersInTeam->Player->id;
            $this->Division->Team->PlayersInTeam->save($playersInTeam);
        }
        
    }
    

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Division->save($this->request->data)) {
				$this->Session->setFlash(__('The division has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Division->read(null, $id);
		}
		$countries = $this->Division->Country->find('list');
		$seasons = $this->Division->Season->find('list');
		$this->set(compact('countries', 'seasons'));
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
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		if ($this->Division->delete()) {
			$this->Session->setFlash(__('Division deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Division was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
