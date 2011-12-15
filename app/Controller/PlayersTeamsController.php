<?php
App::uses('AppController', 'Controller');
/**
 * PlayersTeams Controller
 *
 * @property PlayersTeam $PlayersTeam
 */
class PlayersTeamsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayersTeam->recursive = 0;
		$team_id = $this->Auth->user('team_id');
		$this->paginate = array(
			'conditions' => array('PlayersTeam.team_id' => $team_id),
			'contain' => array('Player')
		);
		$this->set('playersTeams', $this->paginate());
		$team = $this->PlayersTeam->Team->find('first', array(
			'conditions' => array('Team.id' => $team_id),
			'recursive' => -1
		));
		$this->set(compact('team'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
		$this->set('playersTeam', $this->PlayersTeam->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayersTeam->create();
			if ($this->PlayersTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The players team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The players team could not be saved. Please, try again.'));
			}
		}
		$teams = $this->PlayersTeam->Team->find('list');
		$players = $this->PlayersTeam->Player->find('list');
		$this->set(compact('teams', 'players'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayersTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The players team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The players team could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PlayersTeam->read(null, $id);
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
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
		if ($this->PlayersTeam->delete()) {
			$this->Session->setFlash(__('Players team deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Players team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
