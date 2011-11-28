<?php
App::uses('AppController', 'Controller');
/**
 * PressReleases Controller
 *
 * @property PressRelease $PressRelease
 */
class PressReleasesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PressRelease->recursive = 0;
		$this->set('pressReleases', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PressRelease->id = $id;
		if (!$this->PressRelease->exists()) {
			throw new NotFoundException(__('Invalid press release'));
		}
		$this->set('pressRelease', $this->PressRelease->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PressRelease->create();
			if ($this->PressRelease->save($this->request->data)) {
				$this->Session->setFlash(__('The press release has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The press release could not be saved. Please, try again.'));
			}
		}
		$teams = $this->PressRelease->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PressRelease->id = $id;
		if (!$this->PressRelease->exists()) {
			throw new NotFoundException(__('Invalid press release'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PressRelease->save($this->request->data)) {
				$this->Session->setFlash(__('The press release has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The press release could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PressRelease->read(null, $id);
		}
		$teams = $this->PressRelease->Team->find('list');
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
		$this->PressRelease->id = $id;
		if (!$this->PressRelease->exists()) {
			throw new NotFoundException(__('Invalid press release'));
		}
		if ($this->PressRelease->delete()) {
			$this->Session->setFlash(__('Press release deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Press release was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
