<?php
App::uses('AppController', 'Controller');
/**
 * GradesMatches Controller
 *
 * @property GradesMatch $GradesMatch
 */
class GradesMatchesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->GradesMatch->recursive = 0;
		$this->set('gradesMatches', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->GradesMatch->id = $id;
		if (!$this->GradesMatch->exists()) {
			throw new NotFoundException(__('Invalid grades match'));
		}
		$this->set('gradesMatch', $this->GradesMatch->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->GradesMatch->create();
			if ($this->GradesMatch->save($this->request->data)) {
				$this->Session->setFlash(__('The grades match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grades match could not be saved. Please, try again.'));
			}
		}
		$matches = $this->GradesMatch->Match->find('list');
		$users = $this->GradesMatch->User->find('list');
		$this->set(compact('matches', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->GradesMatch->id = $id;
		if (!$this->GradesMatch->exists()) {
			throw new NotFoundException(__('Invalid grades match'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->GradesMatch->save($this->request->data)) {
				$this->Session->setFlash(__('The grades match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grades match could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->GradesMatch->read(null, $id);
		}
		$matches = $this->GradesMatch->Match->find('list');
		$users = $this->GradesMatch->User->find('list');
		$this->set(compact('matches', 'users'));
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
		$this->GradesMatch->id = $id;
		if (!$this->GradesMatch->exists()) {
			throw new NotFoundException(__('Invalid grades match'));
		}
		if ($this->GradesMatch->delete()) {
			$this->Session->setFlash(__('Grades match deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Grades match was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
