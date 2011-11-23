<?php
App::uses('AppController', 'Controller');
/**
 * Matches Controller
 *
 * @property Match $Match
 */
class MatchesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Match->recursive = 0;
		$this->set('matches', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		$this->set('match', $this->Match->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Match->create();
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.'));
			}
		}
		$homeTeams = $this->Match->HomeTeam->find('list');
		$visitorTeams = $this->Match->VisitorTeam->find('list');
		$this->set(compact('homeTeams', 'visitorTeams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Match->read(null, $id);
		}
		$homeTeams = $this->Match->HomeTeam->find('list');
		$visitorTeams = $this->Match->VisitorTeam->find('list');
		$this->set(compact('homeTeams', 'visitorTeams'));
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
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		if ($this->Match->delete()) {
			$this->Session->setFlash(__('Match deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Match was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
/**
 * simulate method
 * 
 * 
 * @return void
 */
    public function simulate() {
        $match = $this->Match->find('first', array(
            'contain' => array(
                'HomeTeam' => array(
                    'Player' => array(
                        'PlayerInMatch' => array(
                            'conditions' => array('PlayerInMatch.match_id' => '1')
                        )
                    )
                ),
                'VisitorTeam' => array(
                    'Player' => array(
                        'PlayerInMatch' => array(
                            'conditions' => array('PlayerInMatch.match_id' => '1')
                        )
                    )
                ),
            ),
            'conditions' => array('Match.id' => '1')
        ));
        $this->set('match', $match);
        $StateMachine = new StateMachine;
        $StateMachine->changeState(new MiseEnJeu);
        $StateMachine->play($match);
        
    }
    
}

class StateMachine {
    private $previousState;
    private $currentState;
    
    public function play(& $match) {
        $this->currentState->play($match);
    }
    
    public function changeState($newState) {
        $this->previousState = $this->currentState;
        $this->currentState = $newState;
    }
}

abstract class State {
    
    public abstract function play(& $match);
    
    protected function chooseRandomPlayer($match) {
        $players = array_merge($match['HomeTeam']['Player'], $match['VisitorTeam']['Player']);
        echo "<pre>";
        print_r($players);
        echo "</pre>";
    }
    
}

class MiseEnJeu extends State {
    public function play(& $match) {
        $randomPlayer = mt_rand(0, 9);
        $HomeTeam = $randomPlayer % 2;
        $playerPosition = $randomPlayer / 2;
        
        
    }
    
}
