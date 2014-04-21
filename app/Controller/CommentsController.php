<?php
class CommentsController extends AppController {
	
	// public function add($id=null) {
	// 	die('Comment');
 //        if ($this->request->is('post')) {
 //            $this->Comment->create();
 //            $this->request->data['Comment']['post_id'] = $id;
 //            if ($this->Comment->save($this->request->data)) {
 //                $this->Session->setFlash(__('Your post has been saved.'));
 //                return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
 //            }
 //            $this->Session->setFlash(__('Unable to add your post.'));
 //        }
 //        $this->set('postid', $id);
 //    }
    //

    public function beforeFilter() {
        parent::beforeFilter();
        if ($this->Auth->user()) {
            $this->Auth->allow('add');
        }
    }

    public function add($post_id = 0) {
        if($this->request->is('post')) {
            $this->Comment->set(array('post_id' => $post_id));
            if($this->Comment->save($this->request->data)) {
                $this->Session->setFlash(__('Your comment has been added'));
                $this->redirect(array('controller' => 'posts', 'action' => 'view', $post_id));
            } else {
                $this->Session->setFlash('Unable to add your comment');
            }
        }
    }
}