<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'welcome');
    }
    
    public function login() {
        if($this->request->is('post')) {
            if($this->Auth->login()) {
                $team_id = $this->User->Team->field('id', array('Team.user_id' => $this->Auth->user('id')));
                $this->Session->write('Auth.User.Team.id', $team_id);
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Votre login ou mot de passe est incorrect.'));
            }
        }            
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
        
    public function isAuthorized($user) {
        if(in_array($this->action, array('edit', 'delete'))) {
            if($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
            return true;
        }
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
            $this->request->data['User']['validated'] = 1;
            $this->request->data['User']['lastconnect'] = strtotime('now');
            $this->request->data['User']['ip'] = $this->request->clientIp();
            $this->request->data['User']['avatar'] = '';
            $this->request->data['User']['inactive'] = 0;
            $this->request->data['User']['waiting'] = 0;
            $this->request->data['User']['group'] = User::MEMBER;
			if ($this->User->save($this->request->data)) {
                $available_team = $this->User->Team->find('first', array(
                    'conditions' => array('Team.user_id' => NULL),
                    'fields' => array('Team.id', 'Team.name'),
                    'contain' => array(
                        'Division' => array(
                            'order' => array('Division.hierarchy'),
                            'fields' => array('Division.hierarchy')
                        )
                    )
                ));
                if(!empty($available_team)) {
                    $this->User->Team->id = $available_team['Team']['id'];
                    $this->User->Team->saveField('user_id', $this->User->id);
                    $this->Session->setFlash(__("Vous avez été enregistré, et vous devenez le manager de l'équipe {$available_team['Team']['name']}."));
                    
                } else {
                    $this->Session->setFlash(__('Vous avez été enregistré. Cependant aucune équipe n\'est disponible. Veuillez contacter un administrateur.'));
                }
                $this->Auth->login();
                if(isset($this->User->Team->id)) {
                    $this->Session->write('Auth.User.Team.id', $team_id);
                }
				$this->redirect(array('action' => 'welcome'));
			} else {
				$this->Session->setFlash(__('Une erreur s\'est produite druant votre enregistrement. Veuillez ré-essayer'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function welcome()
    {
        if($this->Auth->loggedIn()) {
            $this->render('member');
        } else {
            $this->render('visitor');
        }
    }
    
}
