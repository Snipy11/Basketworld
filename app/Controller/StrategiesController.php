<?php
App::uses('AppController', 'Controller');
/**
 * Strategies Controller
 *
 * @property Strategy $Strategy
 */
class StrategiesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Strategy->recursive = 0;
		$this->set('strategies', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Strategy->id = $id;
		if (!$this->Strategy->exists()) {
			throw new NotFoundException(__('Invalid strategy'));
		}
		$this->set('strategy', $this->Strategy->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Strategy->create();
			if ($this->Strategy->save($this->request->data)) {
				$this->Session->setFlash(__('The strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The strategy could not be saved. Please, try again.'));
			}
		}
		$teams = $this->Strategy->Team->find('list');
		$matches = $this->Strategy->Match->find('list');
		$this->set(compact('teams', 'matches'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Strategy->id = $id;
		if (!$this->Strategy->exists()) {
			throw new NotFoundException(__('Invalid strategy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Strategy->save($this->request->data)) {
				$this->Session->setFlash(__('The strategy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The strategy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Strategy->read(null, $id);
		}
		$teams = $this->Strategy->Team->find('list');
		$matches = $this->Strategy->Match->find('list');
		$this->set(compact('teams', 'matches'));
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
		$this->Strategy->id = $id;
		if (!$this->Strategy->exists()) {
			throw new NotFoundException(__('Invalid strategy'));
		}
		if ($this->Strategy->delete()) {
			$this->Session->setFlash(__('Strategy deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Strategy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
