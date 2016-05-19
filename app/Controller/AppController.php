<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
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

    public function beforeFilter() {
        $this->_setLanguage();
        $this->Auth->allow('login','add');    //cho phép những trang không cần đăng nhập
    }

    private function _setLanguage() {
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
            $this->Session->write('Config.language', $this->Cookie->read('lang'));
        } else if (isset($this->params['language']) && ($this->params['language'] != $this->Session->read('Config.language'))) {
            $this->Session->write('Config.language', $this->params['language']);
            $this->Cookie->write('lang', $this->params['language'], false, '20 days');
        }
    }

    public function isAuthorized($user) {
        // Here is where we should verify the role and give access based on role
        return true;
    }

}
