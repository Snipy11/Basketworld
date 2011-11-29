<?php
App::uses('AppController', 'Controller');
/**
 * Languages Controller
 *
 * @property Language $Language
 */
class LanguagesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Language->recursive = 0;
		$this->set('languages', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			throw new NotFoundException(__('Invalid language'));
		}
		$this->set('language', $this->Language->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Language->create();
			if ($this->Language->save($this->request->data)) {
				$this->Session->setFlash(__('The language has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The language could not be saved. Please, try again.'));
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
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			throw new NotFoundException(__('Invalid language'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Language->save($this->request->data)) {
				$this->Session->setFlash(__('The language has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The language could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Language->read(null, $id);
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
		$this->Language->id = $id;
		if (!$this->Language->exists()) {
			throw new NotFoundException(__('Invalid language'));
		}
		if ($this->Language->delete()) {
			$this->Session->setFlash(__('Language deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Language was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
