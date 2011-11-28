<?php
App::uses('AppController', 'Controller');
/**
 * Trainings Controller
 *
 * @property Training $Training
 */
class TrainingsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Training->recursive = 0;
		$this->set('trainings', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		$this->set('training', $this->Training->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Training->create();
			if ($this->Training->save($this->request->data)) {
				$this->Session->setFlash(__('The training has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training could not be saved. Please, try again.'));
			}
		}
		$teams = $this->Training->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Training->save($this->request->data)) {
				$this->Session->setFlash(__('The training has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Training->read(null, $id);
		}
		$teams = $this->Training->Team->find('list');
		$this->set(compact('teams'));
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
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		if ($this->Training->delete()) {
			$this->Session->setFlash(__('Training deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Training was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
