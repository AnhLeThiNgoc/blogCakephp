<?php
App::import('Controller', 'Users');
$Users = new UsersController();
$Users->constructClasses();

class PostsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('search', 'result');
    }
    //upload file
   // var $components = array('Uploader.Uploader');

    public $uses = array('Post', 'Comment');    
    public $helpers = array('Html', 'Form');

    public function index() {
        // $ab = 'Login';
        // $login = $this->requestAction(array('Controller' => 'users', 'action' => 'login'));
        // $this->set('login', $login);
       // $this->set('about', $ab);
        //$this->set('posts', $this->Post->find('all'));
        $this->Post->recursive = 0;
        $this->set('posts', $this->paginate());
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
            $this->redirect(array('action' => 'index'));
        }
        // $this->Post->recursive = 2;
        $post = $this->Post->findById($id);
        $a = array();
        $comments = $post['Comment'];
        foreach($comments as $comment){
            $a[] = $this->Comment->findById($comment['id']);
        }

        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        // $this->loadModel->('Comment');
        $user_comment = $this->Comment->findById();
        $this->set('post', $post);
        $this->set('comments', $a);
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

    public function search() {
        $url['action'] = 'result';
        $this->redirect($url, null, true);
    }

    function result() {
        $conditions = array();
        $data = array();
        if(!empty($this->passedArgs)) {
            if(isset($this->passedArgs['Post.search'])){
                $keywords = $this->passedArgs['Post.search'];
                $conditions[] =  array(
                    "OR" => array(
                        'Post.title LIKE' => '%$keywords%',
                        'Post.body LIKE' => '%$keywords%'
                    )
                );
                $data['Post']['search'] = $keywords;
            }
            $this->paginate = array(
                'limit' => 4,
                'order' => array('title' => 'desc')
            );
        }
        $this->data = $data;
        $this->set('posts', $this->paginate('Post', $conditions));
    }
}