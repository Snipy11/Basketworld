<?php
App::uses('AppController', 'Controller');
/**
 * YouthInvestments Controller
 *
 * @property YouthInvestment $YouthInvestment
 */
class YouthInvestmentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->YouthInvestment->recursive = 0;
		$this->set('youthInvestments', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->YouthInvestment->id = $id;
		if (!$this->YouthInvestment->exists()) {
			throw new NotFoundException(__('Invalid youth investment'));
		}
		$this->set('youthInvestment', $this->YouthInvestment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->YouthInvestment->create();
			if ($this->YouthInvestment->save($this->request->data)) {
				$this->Session->setFlash(__('The youth investment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The youth investment could not be saved. Please, try again.'));
			}
		}
		$teams = $this->YouthInvestment->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->YouthInvestment->id = $id;
		if (!$this->YouthInvestment->exists()) {
			throw new NotFoundException(__('Invalid youth investment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->YouthInvestment->save($this->request->data)) {
				$this->Session->setFlash(__('The youth investment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The youth investment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->YouthInvestment->read(null, $id);
		}
		$teams = $this->YouthInvestment->Team->find('list');
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
		$this->YouthInvestment->id = $id;
		if (!$this->YouthInvestment->exists()) {
			throw new NotFoundException(__('Invalid youth investment'));
		}
		if ($this->YouthInvestment->delete()) {
			$this->Session->setFlash(__('Youth investment deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Youth investment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
