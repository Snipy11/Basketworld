<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array (
            'loginRedirect' => array('controller' => 'users', 'action' => 'welcome'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'welcome'),
            'authError' => 'Vous ne pouvez pas accéder à cette page',
            'authorize' => 'controller',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'name')
                )
            )
        )
    );
    
    public $helpers = array('Form', 'Html', 'Session', 'Auth');
    
    public function isAuthorized($user) 
    {
        return true;
    }
    
    public function beforeFilter() 
    {
        $this->Auth->allow('index', 'view', 'login', 'logout');
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        if($this->Auth->loggedIn()) {
            $this->layout = 'member';
        }
    }
    
}
