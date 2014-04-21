<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }
    public function index() {
    	return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
    }
    public function login() {
    	if ($this->request->is('post')) {
    		if ($this->Auth->login()) {
    			return $this->redirect($this->Auth->redirect());
    		}
            else {
                if(!empty($this->request->data)) {
                    $this->Session->setFlash(__('Email or password is incorrect'), 'default', array('class' => 'notice'));
                }
            }
    		//$this->Session->setFlash(__('Invalid username or password, try again'));
    	}
         // When facebook login is used, facebook always returns $_GET['code'].
        elseif($this->request->query('code')){

            // User login successful
            $fb_user = $this->Facebook->getUser();          # Returns facebook user_id
            if ($fb_user){
                $fb_user = $this->Facebook->api('/me');     # Returns user information

                // We will varify if a local user exists first
                $local_user = $this->User->find('first', array(
                    'conditions' => array('email' => $fb_user['email'])
                ));

                if ($local_user){
                    $this->Auth->login($local_user['User']);            # Manual Login
                    $this->redirect('/');
                } 
                // Otherwise we ll add a new user (Registration)
                else {
                    $data['User'] = array(
                        'username' => $fb_user['name'],
                        'email'      => $fb_user['email'],                               # Normally Unique
                        'password'      => AuthComponent::password(uniqid(md5(mt_rand()))), # Set random password
                        'role'          => '0',
                        'img' => 'http://graph.facebook.com/'.$fb_user['id'].'/picture'
                    );

                    // You should change this part to include data validation
                    $this->User->save($data, array('validate' => false));

                    // After registration we will redirect them back here so they will be logged in
                    $this->redirect(Router::url('/users/login?code=true', true));
                }
            }

            else{
                // User login failed..
                $this->Session->setFlash(__('Email or password is incorrect'), 'default', array('class' => 'notice'));
            }
        }

    }

    public function logout() {
    	$this->Auth->logout();
        return $this->redirect('/');
    }

    // public function index() {
    //     $this->User->recursive = 0;
    //     $this->set('users', $this->paginate());
    // }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}