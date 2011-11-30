<?php
App::uses('AppController', 'Controller');
/**
 * FriendlyMatchRequests Controller
 *
 * @property FriendlyMatchRequest $FriendlyMatchRequest
 */
class FriendlyMatchRequestsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FriendlyMatchRequest->recursive = 0;
		$this->set('friendlyMatchRequests', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FriendlyMatchRequest->id = $id;
		if (!$this->FriendlyMatchRequest->exists()) {
			throw new NotFoundException(__('Invalid friendly match request'));
		}
		$this->set('friendlyMatchRequest', $this->FriendlyMatchRequest->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FriendlyMatchRequest->create();
			if ($this->FriendlyMatchRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The friendly match request has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friendly match request could not be saved. Please, try again.'));
			}
		}
		$fromTeams = $this->FriendlyMatchRequest->TeamFrom->find('list');
		$toTeams = $this->FriendlyMatchRequest->TeamTo->find('list');
		$this->set(compact('fromTeams', 'toTeams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->FriendlyMatchRequest->id = $id;
		if (!$this->FriendlyMatchRequest->exists()) {
			throw new NotFoundException(__('Invalid friendly match request'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FriendlyMatchRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The friendly match request has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friendly match request could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->FriendlyMatchRequest->read(null, $id);
		}
		$fromTeams = $this->FriendlyMatchRequest->TeamFrom->find('list');
		$toTeams = $this->FriendlyMatchRequest->TeamTo->find('list');
		$this->set(compact('fromTeams', 'toTeams'));
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
		$this->FriendlyMatchRequest->id = $id;
		if (!$this->FriendlyMatchRequest->exists()) {
			throw new NotFoundException(__('Invalid friendly match request'));
		}
		if ($this->FriendlyMatchRequest->delete()) {
			$this->Session->setFlash(__('Friendly match request deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Friendly match request was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
