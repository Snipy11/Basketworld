<?php
App::uses('AppController', 'Controller');
/**
 * PlayerFirstNames Controller
 *
 * @property PlayerFirstName $PlayerFirstName
 */
class PlayerFirstNamesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayerFirstName->recursive = 0;
		$this->set('playerFirstNames', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PlayerFirstName->id = $id;
		if (!$this->PlayerFirstName->exists()) {
			throw new NotFoundException(__('Invalid player first name'));
		}
		$this->set('playerFirstName', $this->PlayerFirstName->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$lines = file($this->request->data['PlayerFirstName']['first_name']['tmp_name'],
							FILE_IGNORE_NEW_LINES | FILE_TEXT | FILE_SKIP_EMPTY_LINES);
			unlink($this->request->data['PlayerFirstName']['first_name']['tmp_name']);
			$fields = array('first_name', 'country_id');
			foreach($lines as $line) {
                $first_name = $this->PlayerName->find('first', array(
                    'conditions' => array('PlayerName.name' => $line,
                                    'country_id' => $this->request->data['PlayerName']['country_id']),
                    'recursive' => -1
                ));
                if(!empty($first_name)) continue;
				$values[] = array(
					$line,
					$this->request->data['PlayerFirstName']['country_id']
				);
			}
			$db = $this->PlayerFirstName->getDataSource();
			if(!$db->insertMulti($this->PlayerFirstName->table, $fields, $values)) {
				$db->rollback($this);
				$this->Session->setFlash(__('Une erreur s\'est produite lors de l\'enregistrement des prénoms. Veuillez réessayer.'));
			} else {
				$this->Session->setFlash(__('Les prénoms ont été enregistrés avec succès.'));
				$this->redirect(array('action' => 'index'));
			}
		}
		$countries = $this->PlayerFirstName->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PlayerFirstName->id = $id;
		if (!$this->PlayerFirstName->exists()) {
			throw new NotFoundException(__('Invalid player first name'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayerFirstName->save($this->request->data)) {
				$this->Session->setFlash(__('The player first name has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player first name could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PlayerFirstName->read(null, $id);
		}
		$countries = $this->PlayerFirstName->Country->find('list');
		$this->set(compact('countries'));
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
		$this->PlayerFirstName->id = $id;
		if (!$this->PlayerFirstName->exists()) {
			throw new NotFoundException(__('Invalid player first name'));
		}
		if ($this->PlayerFirstName->delete()) {
			$this->Session->setFlash(__('Player first name deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Player first name was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
