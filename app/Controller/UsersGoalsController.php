<?php
App::uses('AppController', 'Controller');
/**
 * UsersGoals Controller
 *
 * @property UsersGoal $UsersGoal
 */
class UsersGoalsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UsersGoal->recursive = 0;
		$this->set('usersGoals', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UsersGoal->id = $id;
		if (!$this->UsersGoal->exists()) {
			throw new NotFoundException(__('Invalid users goal'));
		}
		$this->set('usersGoal', $this->UsersGoal->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UsersGoal->create();
			if ($this->UsersGoal->save($this->request->data)) {
				$this->Session->setFlash(__('The users goal has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users goal could not be saved. Please, try again.'));
			}
		}
		$goals = $this->UsersGoal->Goal->find('list');
		$users = $this->UsersGoal->User->find('list');
		$gmValidUsers = $this->UsersGoal->GmValidUser->find('list');
		$this->set(compact('goals', 'users', 'gmValidUsers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UsersGoal->id = $id;
		if (!$this->UsersGoal->exists()) {
			throw new NotFoundException(__('Invalid users goal'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UsersGoal->save($this->request->data)) {
				$this->Session->setFlash(__('The users goal has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The users goal could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UsersGoal->read(null, $id);
		}
		$goals = $this->UsersGoal->Goal->find('list');
		$users = $this->UsersGoal->User->find('list');
		$gmValidUsers = $this->UsersGoal->GmValidUser->find('list');
		$this->set(compact('goals', 'users', 'gmValidUsers'));
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
		$this->UsersGoal->id = $id;
		if (!$this->UsersGoal->exists()) {
			throw new NotFoundException(__('Invalid users goal'));
		}
		if ($this->UsersGoal->delete()) {
			$this->Session->setFlash(__('Users goal deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Users goal was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
