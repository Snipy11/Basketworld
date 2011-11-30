<?php
App::uses('AppController', 'Controller');
/**
 * ActionsMatches Controller
 *
 * @property ActionsMatch $ActionsMatch
 */
class ActionsMatchesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ActionsMatch->recursive = 0;
		$this->set('actionsMatches', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ActionsMatch->id = $id;
		if (!$this->ActionsMatch->exists()) {
			throw new NotFoundException(__('Invalid actions match'));
		}
		$this->set('actionsMatch', $this->ActionsMatch->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ActionsMatch->create();
			if ($this->ActionsMatch->save($this->request->data)) {
				$this->Session->setFlash(__('The actions match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actions match could not be saved. Please, try again.'));
			}
		}
		$matches = $this->ActionsMatch->Match->find('list');
		$actions = $this->ActionsMatch->Action->find('list');
		$player1s = $this->ActionsMatch->Player1->find('list');
		$player2s = $this->ActionsMatch->Player2->find('list');
		$this->set(compact('matches', 'actions', 'player1s', 'player2s'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ActionsMatch->id = $id;
		if (!$this->ActionsMatch->exists()) {
			throw new NotFoundException(__('Invalid actions match'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ActionsMatch->save($this->request->data)) {
				$this->Session->setFlash(__('The actions match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The actions match could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ActionsMatch->read(null, $id);
		}
		$matches = $this->ActionsMatch->Match->find('list');
		$actions = $this->ActionsMatch->Action->find('list');
		$player1s = $this->ActionsMatch->Player1->find('list');
		$player2s = $this->ActionsMatch->Player2->find('list');
		$this->set(compact('matches', 'actions', 'player1s', 'player2s'));
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
		$this->ActionsMatch->id = $id;
		if (!$this->ActionsMatch->exists()) {
			throw new NotFoundException(__('Invalid actions match'));
		}
		if ($this->ActionsMatch->delete()) {
			$this->Session->setFlash(__('Actions match deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Actions match was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
