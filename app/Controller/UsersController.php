<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    var $name = 'Users';
    var $helpers = array('Html', 'Form');
    var $components = array('Auth', 'Session');

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $users = $this->User->find('all');
        $this->set('users', $users);
    }

    public function login() {
        //nếu đã đăng nhập, redirect đến posts/index
        if ($this->Session->check('Auth.User')) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

        if ($this->request->is('post')) {
            debug($this->Auth->login());

            //var_dump($this->request->data);
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

    //add
    public function add() {
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
