<?php
App::uses('AppController', 'Controller');
/**
 * Teams Controller
 *
 * @property Team $Team
 */
class TeamsController extends AppController {

    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Team->recursive = 0;
		$this->set('teams', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Team->id = $id;
		if (!$this->Team->exists()) {
			throw new NotFoundException(__('Invalid team'));
		}
        $this->Team->unbindModel(array('belongsTo' => array('Division', 'User')));
        $this->Team->bindModel(array('hasOne' => array(
            'Division' => array(
                'foreignKey' => false,
                'conditions' => array('Division.id = Team.division_id')
            ),
            'Season' => array(
                'foreignKey' => false,
                'conditions' => array('Season.id = Division.season_id')
            ),
            'Country' => array(
                'foreignKey' => false,
                'conditions' => array('Country.id = Division.country_id')
            ),
            'User' => array(
                'foreignKey' => false,
                'conditions' => array('Team.user_id = User.id')
            )
        )));
        $team = $this->Team->find('first', array(
            'conditions' => array('Team.id' => $id),
            'contain' => array('Division', 'Country', 'Season', 'User')
        ));
        $victories = $this->Team->MatchHome->find('count', array(
            'conditions' => array(
                'OR' => array(
                    array('MatchHome.home_team_id' => $id, 'MatchHome.home_points > MatchHome.visitor_points'),
                    array('MatchHome.visitor_team_id' => $id, 'MatchHome.visitor_points > MatchHome.home_points')
            ))
        ));
        $defeats = $this->Team->MatchHome->find('count', array(
            'conditions' => array(
                'OR' => array(
                    array('MatchHome.home_team_id' => $id, 'MatchHome.home_points < MatchHome.visitor_points'),
                    array('MatchHome.visitor_team_id' => $id, 'MatchHome.visitor_points < MatchHome.home_points')
            ))
        ));
		$this->set(compact('team', 'victories', 'defeats'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Team->create();
            $this->Team->user_id = $this->Auth->user('id');
			if ($this->Team->save($this->request->data)) {
				$this->Session->setFlash(__('The team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team could not be saved. Please, try again.'));
			}
		}
		$users = $this->Team->User->find('list');
		$divisions = $this->Team->Division->find('list');
		$this->set(compact('users', 'divisions'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Team->id = $id;
		if (!$this->Team->exists()) {
			throw new NotFoundException(__('Invalid team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Team->save($this->request->data)) {
				$this->Session->setFlash(__('The team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Team->read(null, $id);
		}
		$users = $this->Team->User->find('list');
		$divisions = $this->Team->Division->find('list');
		$this->set(compact('users', 'divisions'));
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
		$this->Team->id = $id;
		if (!$this->Team->exists()) {
			throw new NotFoundException(__('Invalid team'));
		}
		if ($this->Team->delete()) {
			$this->Session->setFlash(__('Team deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
