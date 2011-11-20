<?php
App::uses('AppController', 'Controller');
/**
 * Transferts Controller
 *
 * @property Transfert $Transfert
 */
class TransfertsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transfert->recursive = 0;
		$this->set('transferts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transfert->id = $id;
		if (!$this->Transfert->exists()) {
			throw new NotFoundException(__('Invalid transfert'));
		}
		$this->set('transfert', $this->Transfert->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transfert->create();
			if ($this->Transfert->save($this->request->data)) {
				$this->Session->setFlash(__('The transfert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfert could not be saved. Please, try again.'));
			}
		}
		$players = $this->Transfert->Player->find('list');
		$acquireTeams = $this->Transfert->AcquireTeam->find('list');
		$sellTeams = $this->Transfert->SellTeam->find('list');
		$gmWatches = $this->Transfert->GmWatch->find('list');
		$this->set(compact('players', 'acquireTeams', 'sellTeams', 'gmWatches'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Transfert->id = $id;
		if (!$this->Transfert->exists()) {
			throw new NotFoundException(__('Invalid transfert'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transfert->save($this->request->data)) {
				$this->Session->setFlash(__('The transfert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transfert could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transfert->read(null, $id);
		}
		$players = $this->Transfert->Player->find('list');
		$acquireTeams = $this->Transfert->AcquireTeam->find('list');
		$sellTeams = $this->Transfert->SellTeam->find('list');
		$gmWatches = $this->Transfert->GmWatch->find('list');
		$this->set(compact('players', 'acquireTeams', 'sellTeams', 'gmWatches'));
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
		$this->Transfert->id = $id;
		if (!$this->Transfert->exists()) {
			throw new NotFoundException(__('Invalid transfert'));
		}
		if ($this->Transfert->delete()) {
			$this->Session->setFlash(__('Transfert deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Transfert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
