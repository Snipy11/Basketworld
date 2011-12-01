<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array (
            'RedirectLogin' => array('controller' => 'users', 'action' => 'index'),
            'RedirectLogout' => array('controller' => 'users', 'action' => 'index'),
            'authError' => 'Vous ne pouvez pas accéder à cette page',
            'authorize' => 'controller',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'name')
                )
            )
        )
    );
    
    public function isAuthorized($user) 
    {
        return true;
    }
    
    public function beforeFilter() 
    {
        $this->Auth->allow('index', 'view', 'login', 'logout');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }
    
}
