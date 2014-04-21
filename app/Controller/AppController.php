<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
			'logoutRedirect' => array(
				'controller' => 'pages',
				'action' => 'display',
				'home'
				),
        'authorize' => array('Controller') // Added this line
        ),
		);

    public $paginate = array(
        'Post' => array(
            'limit' => '3',
            'order' => array(
                'Post.published' => 'asc',
                'Post.created' => 'desc'
            )
        ),
        'Comment' => array(
            'limit' => '10',
            'order' => array('Comment.created' => 'desc')
        )
    );

	public function isAuthorized($user) {
    // Admin can access every action
		if (isset($user['role']) && $user['role'] === 1) {
			return true;
		}

    // Default deny
		return false;
	}
    function loggedIn() {
        $loggedIn = false;
        if($this->Auth->user()) {
            $loggedIn = true;
        }
        return $loggedIn;
    }

    //lay gia tri cua user hien tai
    function userUsername() {
        $user = null;
        if($this->Auth->user()) {
            $user = $this->Auth->user('username');
        }
        return $user;
    }
    function userAdmin() {
        $admin = null;
        if($this->Auth->user()) {
            $admin = $this->Auth->user('role');
        }
        return $admin;
    }
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
        $this->set('logged_in', $this->loggedIn());
        $this->set('users_username', $this->userUsername());
        $this->set('admin', $this->userAdmin());
        App::import('Vendor', 'facebook-php-sdk-master/src/facebook');
        Configure::load('facebook');
        $this->Facebook = new Facebook(array(
            'appId'     =>  Configure::read("Facebook.appId"),
            'secret'    =>  Configure::read("Facebook.secret")
        ));
    }

    public function beforeRender() {
        $this->set('fb_login_url', $this->Facebook->getLoginUrl(array('scope' => 'email, publish_stream', 'redirect_uri' => Router::url(array('controller' => 'users', 'action' => 'login'), true))));
        $this->set('userAuth', null);
        $this->LoadModel('User');
        if ($this->Auth->user()) {
          //  $this->set('userAuth', $this->User->findById($this->Auth->user()['id']));
            $xxx = $this->Auth->user();
            $xxxx = $this->User->findById($xxx['id']);
            $this->set('userAuth', $xxxx['User']);
        }
    }

    
}
