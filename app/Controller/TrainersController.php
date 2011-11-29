<?php
App::uses('AppController', 'Controller');
/**
 * Trainers Controller
 *
 * @property Trainer $Trainer
 */
class TrainersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Trainer->recursive = 0;
		$this->set('trainers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Trainer->id = $id;
		if (!$this->Trainer->exists()) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$this->set('trainer', $this->Trainer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trainer->create();
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'));
			}
		}
		$teams = $this->Trainer->Team->find('list');
		$countries = $this->Trainer->Country->find('list');
		$this->set(compact('teams', 'countries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Trainer->id = $id;
		if (!$this->Trainer->exists()) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Trainer->read(null, $id);
		}
		$teams = $this->Trainer->Team->find('list');
		$countries = $this->Trainer->Country->find('list');
		$this->set(compact('teams', 'countries'));
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
		$this->Trainer->id = $id;
		if (!$this->Trainer->exists()) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		if ($this->Trainer->delete()) {
			$this->Session->setFlash(__('Trainer deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Trainer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
