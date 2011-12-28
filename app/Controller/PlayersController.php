<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('top5');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('players', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$this->set('player', $this->Player->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Player->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
		$countries = $this->Player->Country->find('list');
		$this->set(compact('countries'));
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('Player deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function top5($division_id) {
        if(!$this->request->params['requested']) {
            throw new MethodNotAllowedException(__('Cette requête n\'est pas valable.'));
        }
        $this->Player->PlayerInTeam->Team->Division->id = $division_id;
		if (!$this->Player->PlayerInTeam->Team->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
        $this->Player->PlayerInTeam->MatchesPlayer->unbindModel(array('belongsTo' => array('PlayersTeam')));
        $this->Player->PlayerInTeam->MatchesPlayer->bindModel(array('hasOne' => array(
            'PlayersTeam' => array(
                'foreignKey' => false,
                'conditions' => array('MatchesPlayer.players_team_id = PlayersTeam.id')
            ),
            'Player' => array(
                'foreignKey' => false,
                'conditions' => array('Player.id = PlayersTeam.player_id')
            ),
            'Team' => array(
                'foreignKey' => false,
                'conditions' => array('Team.id = PlayersTeam.team_id')
            ),
            'Division' => array(
                'foreignKey' => false,
                'conditions' => array('Division.id = Team.division_id')
            ))
        ));
        $players = $this->Player->PlayerInTeam->MatchesPlayer->find('all', array(
            'conditions' => array('Division.id' => $division_id),
            'contain' => array('PlayersTeam', 'Player', 'Team', 'Division'),
            'fields' => array(
                'Player.id', 'Player.name', 'Player.first_name', 'Team.name', 'Team.id',
                'AVG(MatchesPlayer.evaluation) AS global_eval'
            ),
            'group' => array('MatchesPlayer.players_team_id'),
            'order' => 'global_eval DESC',
            'limit' => 5
        ));
        return compact('players');
    }
    
}
