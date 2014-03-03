<?php
App::import('Controller', 'Users');
$Users = new UsersController();
$Users->constructClasses();

class PostsController extends AppController {
    public $users = array('Post', 'Comment');    
    public $helpers = array('Html', 'Form');

    public function index() {
         $ab = 'Login';
        // $login = $this->requestAction(array('Controller' => 'users', 'action' => 'login'));
        // $this->set('login', $login);
        $this->set('about', $ab);
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
            $this->redirect(array('action' => 'index'));
        }
        //save comment
        // if(!empty($this->data['Comment'])) {
        //     $this->data['Comment']['class'] = 'Post';
        //     $this->data['Comment']['post_id'] = $id;
        //     $this->Post->Comment->create();
        //     if($this->Post->Comment->save($this->data)) {
        //         $this->Session->setFlash(__('The comment has been saved', true), 'success');
        //         $this->redirect(array('action' => 'view', $id));
        //     }
        //     $this->Session->setFlash(__('The comment could not be saved. Please, try again', true), 'warning');
        // }

        //

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
           // die($this->request->data['Post']['user_id']);
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function edit($id = null) {
    	if (!$id) {
    		throw new NotFoundException(__('Invalid post'));
    	}

    	$post = $this->Post->findById($id);
    	if (!$post) {
    		throw new NotFoundException(__('Invalid post'));
    	}

    	if ($this->request->is(array('post', 'put'))) {
    		$this->Post->id = $id;
    		if ($this->Post->save($this->request->data)) {
    			$this->Session->setFlash(__('Your post has been updated.'));
    			return $this->redirect(array('action' => 'index'));
    		}
    		$this->Session->setFlash(__('Unable to update your post.'));
    	}

    	if (!$this->request->data) {
    		$this->request->data = $post;
    	}
    }

    public function delete($id) {
    	if ($this->request->is('get')) {
    		throw new MethodNotAllowedException();
    	}

    	if ($this->Post->delete($id)) {
    		$this->Session->setFlash(
    			__('The post with id: %s has been deleted.', h($id))
    			);
    		return $this->redirect(array('action' => 'index'));
    	}
    }

    public function isAuthorized($user) {
    // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

    // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}