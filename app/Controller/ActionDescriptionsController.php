<?php
App::uses('AppController', 'Controller');
/**
 * ActionDescriptions Controller
 *
 * @property ActionDescription $ActionDescription
 */
class ActionDescriptionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ActionDescription->recursive = 0;
		$this->set('actionDescriptions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ActionDescription->id = $id;
		if (!$this->ActionDescription->exists()) {
			throw new NotFoundException(__('Invalid action description'));
		}
		$this->set('actionDescription', $this->ActionDescription->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ActionDescription->create();
			if ($this->ActionDescription->save($this->request->data)) {
				$this->Session->setFlash(__('The action description has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action description could not be saved. Please, try again.'));
			}
		}
		$actions = $this->ActionDescription->Action->find('list');
		$languages = $this->ActionDescription->Language->find('list');
		print_r($languages);
		$this->set(compact('actions', 'languages'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ActionDescription->id = $id;
		if (!$this->ActionDescription->exists()) {
			throw new NotFoundException(__('Invalid action description'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ActionDescription->save($this->request->data)) {
				$this->Session->setFlash(__('The action description has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action description could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ActionDescription->read(null, $id);
		}
		$actions = $this->ActionDescription->Action->find('list');
		$languages = $this->ActionDescription->Language->find('list');
		$this->set(compact('actions', 'languages'));
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
		$this->ActionDescription->id = $id;
		if (!$this->ActionDescription->exists()) {
			throw new NotFoundException(__('Invalid action description'));
		}
		if ($this->ActionDescription->delete()) {
			$this->Session->setFlash(__('Action description deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Action description was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
