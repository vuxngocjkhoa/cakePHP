<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    var $name = 'Users';
    var $helpers = array('Html', 'Form');
    var $components = array('Auth', 'Session');

    //beforeFilter()
    public function beforeFilter() {
        parent::beforeFilter();
    }

    //index()
    //hiển thị danh sách user
    public function index() {
        $users = $this->User->find('all');
        $this->set('users', $users);
    }

    //login
    public function login() {
        //nếu người dùng đã đăng nhập thì chuyển đến users/index
        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        //xử lý đăng nhập
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome ' . $this->request->data['User']['username']));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }

    //logout
    public function logout() {
        $this->Session->setFlash('Good bye');
        return $this->redirect($this->Auth->logout());
    }

    //đăng ký người dùng
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }


}

?>
