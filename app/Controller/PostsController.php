<?php

class PostsController extends AppController {

    var $name = 'Posts';

    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    //index
    public function index() {
        $posts = $this->Post->find('all');
        $this->set('posts', $posts);
    }

    // hiển thị một post
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException('No data');
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException('No data');
        }

        $this->set('post', $post);
    }

    //thêm post
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Data saved successfully');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to add your post.');
        }
    }

    //sửa một post
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }

        if ($this->request->is('put')) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Data updated successfully');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Unable to update data.');
        }
    }

    //xóa một bài post
    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post %s deleted.', h($id)));
        } else {
            $thisSession->setFlash(__('The post %s didn\'t delete.', h($id)));
        }
        return $this->redirect(array('action' => 'index'));
    }
}

?>