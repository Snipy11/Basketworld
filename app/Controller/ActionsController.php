<?php
App::uses('AppController', 'Controller');
/**
 * Actions Controller
 *
 * @property Action $Action
 */
class ActionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Action->recursive = 0;
		$this->set('actions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Action->id = $id;
		if (!$this->Action->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		$this->set('action', $this->Action->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Action->create();
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The action has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Action->id = $id;
		if (!$this->Action->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The action has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Action->read(null, $id);
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
		$this->Action->id = $id;
		if (!$this->Action->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		if ($this->Action->delete()) {
			$this->Session->setFlash(__('Action deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Action was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
