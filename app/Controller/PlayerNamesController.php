<?php
App::uses('AppController', 'Controller');
/**
 * PlayerNames Controller
 *
 * @property PlayerName $PlayerName
 */
class PlayerNamesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayerName->recursive = 0;
		$this->set('playerNames', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PlayerName->id = $id;
		if (!$this->PlayerName->exists()) {
			throw new NotFoundException(__('Invalid player name'));
		}
		$this->set('playerName', $this->PlayerName->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayerName->create();
			if ($this->PlayerName->save($this->request->data)) {
				$this->Session->setFlash(__('The player name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player name could not be saved. Please, try again.'));
			}
		}
		$countries = $this->PlayerName->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PlayerName->id = $id;
		if (!$this->PlayerName->exists()) {
			throw new NotFoundException(__('Invalid player name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerName->save($this->request->data)) {
				$this->Session->setFlash(__('The player name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player name could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PlayerName->read(null, $id);
		}
		$countries = $this->PlayerName->Country->find('list');
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
		$this->PlayerName->id = $id;
		if (!$this->PlayerName->exists()) {
			throw new NotFoundException(__('Invalid player name'));
		}
		if ($this->PlayerName->delete()) {
			$this->Session->setFlash(__('Player name deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Player name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
