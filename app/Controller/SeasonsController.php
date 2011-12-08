<?php
App::uses('AppController', 'Controller');
/**
 * Seasons Controller
 *
 * @property Season $Season
 */
class SeasonsController extends AppController {


/**
 * index method
 *
 * @return void
 */
    public function index() {
	    $this->Season->recursive = 0;
	    $this->set('seasons', $this->paginate());
    }

/**
* view method
*
* @param string $id
* @return void
*/
    public function view($id = null) {
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    $this->set('season', $this->Season->read(null, $id));
    }

/**
* add method
*
* @return void
*/
    public function add() {
	if ($this->request->is('post')) {
	    $this->Season->create();
	    if ($this->Season->save($this->request->data)) {
		foreach($this->request->data['Country'] as $country) {
		    $this->Season->Division->createDivisions(
			$country['id'],
			$this->Season->id,
			$country['level']
		    );
		}
		$this->Session->setFlash(__('The season has been saved'));
		$this->redirect(array('action' => 'index'));
	    } else {
		$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
	    }
	}
	$season = $this->Season->find('first', array(
	    'order' => 'Season.year DESC'
	));
	$this->Season->Division->Country->recursive = -1;
	$countries = $this->Season->Division->Country->find('all');
	foreach($countries as &$country) {
	    $country['level'] = $this->Season->Division->deepestLevel($country['Country']['id'], $season['Season']['id']);
	}
	$this->set(compact('season', 'countries'));
    }    

/**
* edit method
*
* @param string $id
* @return void
*/
    public function edit($id = null) {
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    if ($this->request->is('post') || $this->request->is('put')) {
		    if ($this->Season->save($this->request->data)) {
			    $this->Session->setFlash(__('The season has been saved'));
			    $this->redirect(array('action' => 'index'));
		    } else {
			    $this->Session->setFlash(__('The season could not be saved. Please, try again.'));
		    }
	    } else {
		    $this->request->data = $this->Season->read(null, $id);
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
	    $this->Season->id = $id;
	    if (!$this->Season->exists()) {
		    throw new NotFoundException(__('Invalid season'));
	    }
	    if ($this->Season->delete()) {
		    $this->Session->setFlash(__('Season deleted'));
		    $this->redirect(array('action'=>'index'));
	    }
	    $this->Session->setFlash(__('Season was not deleted'));
	    $this->redirect(array('action' => 'index'));
    }
    
    public function activate($id = null) {
	$this->Season->id = $id;
	if (!$this->Season->exists()) {
	    throw new NotFoundException(__('Invalid season'));
	}
	
	if(!$this->Season->activate($id)) {
	    $this->Session->setFlash(__('Les équipes n\' pas pu être mises à jour. Veuillez ré-essayer.'));
	    $this->redirect(array('action' => 'index'));
	}

	if(!$this->Season->Division->Ranking->createRankings($id)) {
	    $this->Session->setFlash(__('Les équipes ont été mises à jour. Cependant les classements n\'ont pas pu être sauvegardé.'));
	    $this->redirect(array('action' => 'index'));
	}
	
	$this->Session->setFlash(__('Les équipes ont été mises à jour. La nouvelle saison est prête.'));
	$this->redirect(array('action' => 'index'));
    }
    
}
