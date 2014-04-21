<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    var $name = 'User';
    var $hasMany = array('Post' => array('className' => 'Post', 'foreignKey' => 'user_id' ),
        'Comment' => array('className' => 'Comment', 'foreignKey' => 'user_id') 
        );
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );

     public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password(
          $this->data['User']['password']
        );
        return true;
    }

    // public function beforeSave($options = array()) {
    // 	if (isset($this->data[$this->alias]['password'])) {
    // 		$passwordHasher = new SimplePasswordHasher();
    // 		$this->data[$this->alias]['password'] = $passwordHasher->hash(
    // 			$this->data[$this->alias]['password']
    // 			);
    // 	}
    // 	return true;
    // }
}