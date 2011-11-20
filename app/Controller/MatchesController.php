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
}
