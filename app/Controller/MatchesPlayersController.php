<?php
App::uses('AppController', 'Controller');
/**
 * MatchesPlayers Controller
 *
 * @property MatchesPlayer $MatchesPlayer
 */
class MatchesPlayersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MatchesPlayer->recursive = 0;
		$this->set('matchesPlayers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MatchesPlayer->id = $id;
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Invalid matches player'));
		}
		$this->set('matchesPlayer', $this->MatchesPlayer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MatchesPlayer->create();
			if ($this->MatchesPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matches player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matches player could not be saved. Please, try again.'));
			}
		}
		$matches = $this->MatchesPlayer->Match->find('list');
		$playersTeams = $this->MatchesPlayer->PlayersTeam->find('list', array(
			'fields' => array('PlayersTeam.id', 'Player.name', 'Team.name'),
			'recursive' => 0
		));
		$this->set(compact('matches', 'playersTeams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MatchesPlayer->id = $id;
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Invalid matches player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MatchesPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matches player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The matches player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MatchesPlayer->read(null, $id);
		}
		$matches = $this->MatchesPlayer->Match->find('list');
				$playersTeams = $this->MatchesPlayer->PlayersTeam->find('list', array(
			'fields' => array('PlayersTeam.id', 'Player.name', 'Team.name'),
			'recursive' => 0
		));
		$this->set(compact('matches', 'playersTeams'));
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
		$this->MatchesPlayer->id = $id;
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Invalid matches player'));
		}
		if ($this->MatchesPlayer->delete()) {
			$this->Session->setFlash(__('Matches player deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Matches player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
