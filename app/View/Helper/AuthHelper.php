<?php

App::uses('AppHelper', 'View/Helper');
App::uses('Router', 'Routing');
App::uses('CakeRequest', 'Network');

class AuthHelper extends AppHelper {
    public $helpers = array('Session', 'Html');
    
    public function link($title, $url = null, $current_user, $options = array(), $confirmMessage = false) 
    {
        $parsedUrl = Router::parse(Router::normalize(Router::url($url)));
         var_dump($this->requestAction(array(
            'controller' => $parsedUrl['controller'],
            'action' => 'isAuthorized',
            $current_user
        )));
        return;
    }
    
}

?>
