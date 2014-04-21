<?php 
class Post extends AppModel {
    //upload file
    //var $actsAs = array('Uploader.FileValidation');

    var $name = 'Post';
    var $hasMany = array('Comment' => array('className' => 'Comment', 'foreignKey' => 'post_id'));
    var $belongsTo = array('User' => array('className' => 'User', 'foreignKey' => 'user_id'));
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

	public function isOwnedBy($post, $user) {
		return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
	}

    public $findMethods = array('available' => 'true');

    public function search() {
        // $post = $this->Post->find('all', array('conditions' => array('title LIKE' => '%'.$this->data['Post']['title'].'%', 'price' => $this->data['Post']['price'])));
        // return $post;
        // die(var_dump($this->passedArgs));
        $conditions = array();
        $data = array();
        if(!empty($this->passedArgs)) {
            if(isset($this->passedArgs['Post.search'])){
                die(var_dump($this->passedArgs));
                $keywords = $this->passedArgs['Post.search'];
                $conditions[] = array(
                    "OR" => array(
                        'Post.title LIKE' => '%$keywords%',
                        'Post.body LIKE' => '%$keywords',
                        'Post.price' => '$keywords'
                    )
                );
                $data['Post']['search'] = $keywords;
            }
        }
        return $data;

    }

    protected function _findCount($state, $query, $results = array()) {
        if($state === 'before') {
            if(isset($query['type']) && isset($this->findMethods[$query['type']])) {
                $query = $this->{
                    '_find' . ucfirst($query['type'])
                }('before', $query);
                if(!empty($query['fields']) && is_array($query['fields'])) {
                    if(!preg_match('/^count/i', current($query['fields']))) {
                        unset($query['fields']);
                    }
                }
            }
        }
        return parent::_findCount($state, $query, $results);        
    }

    protected function _findAvailable($state, $query, $results = array()) {
        if($state === 'before') {
            $query['conditions']['Post.published'] = true;
            if(!empty($query['operation']) && $query['operation'] === 'count') {
                return $query;
            }
            $query['joins'] = array(
                // array of required joins
            );
            return $query;
        }
        return $results;
    }
}