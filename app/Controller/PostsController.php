<?php

App::uses('SluggableBehavior', 'Utils/Model/Behavior');

class PostsController extends AppController {

    var $name = 'Posts';
    public $actsAs = array(
        'Utils.Sluggable' => array(
            'label' => 'name',
            'method' => 'multibyteSlug',
            'separator' => '-'
        )
    );

    //beforeFilter()
    public function beforeFilter() {
        parent::beforeFilter();
    }

    //index()
    //hiển thị danh sách các bài viết
    public function index() {
        $posts = $this->Post->find('all');
        $this->set('posts', $posts);
    }

    // hiển thị một post theo id
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('No data'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('No data'));
        }

        $this->set('post', $post);
    }

    //thêm post
    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Data saved successfully'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
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
                $this->Session->setFlash(__('Data updated successfully'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update data.'));
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

    public function isAuthorized($user) {
        //Tất cả người dùng đã đăng ký đều có thể viết post
        if ($this->action == 'add') {
            return true;
        }

        //Tác giả của bài viết có thể chỉnh sửa và xóa nó
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}

?>