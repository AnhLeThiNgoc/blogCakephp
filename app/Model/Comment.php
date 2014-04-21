<?php
class Comment extends AppModel {
	var $name = 'Comment';
	var $belongsTo = array('Post' => array('className' => 'Post', 'foreignKey' => 'post_id'),
	  'User' => array('className' => 'User', 'foreignKey' => 'user_id')
	 );
}