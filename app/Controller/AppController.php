<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $helper = array('Html' => array('className' => 'MyHtml'), 'Form', 'Cookie', 'Session');
    public $components = array(
        'Cookie',
        'Session',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
                    'fields' => array(
                        'username' => 'username',
                        'password' => 'password'
                    ),
                ),
            ),
            'authorize' => array('Controller'),
            'loginAction' => array(
                'controller' => 'Users',
                'action' => 'login'
            ),
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'You must be logged in to view this page.',
            'loginError' => 'Invalid Username or Password entered, please try again.',
    ));

    //beforeFilter
    //cài đặt ngôn ngữ
    //cho phép trang hiển thị không cần login
    public function beforeFilter() {
        $this->_setLanguage();
        $this->Auth->allow('login', 'register');
    }

    //_setLanguage()
    private function _setLanguage() {
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        } else if (isset($this->params['language']) && ($this->params['language'] != $this->Session->read('Config.language'))) {
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }

    //
    public function isAuthorized($user) {
        // Admin có thể truy cập mọi nơi
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
    }

}
