<?php
App::uses('AppController', 'Controller');
/**
 * Instructions Controller
 *
 * @property Instruction $Instruction
 */
class InstructionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instruction->recursive = 0;
		$this->set('instructions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		$this->set('instruction', $this->Instruction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Instruction->create();
			if ($this->Instruction->save($this->request->data)) {
				$this->Session->setFlash(__('The instruction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
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
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instruction->save($this->request->data)) {
				$this->Session->setFlash(__('The instruction has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Instruction->read(null, $id);
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
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		if ($this->Instruction->delete()) {
			$this->Session->setFlash(__('Instruction deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Instruction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
