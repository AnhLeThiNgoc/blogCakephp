<?php 
class BooksController extends AppController {
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('paging', 'result', 'search');
    }
	public $name = 'Books'; // ten cua controller book
	public $helpers = array('Paginator', 'Html');
	public $components =  array('Session');
	public $paginate = array();

	public function paging() {
		$this->paginate = array(
			'field' => array('title', 'info'),
			'limit' => 4, 'order' => array('title' => 'desc')
		);
		$data = $this->paginate('Book');
		$this->set('data', $data);
	}

	public function search() {
		// the page we will redirect to
		$url['action'] = 'result';
		// print_r("cai gi vay");
		// build a url will all the search element in it
		// the resulting URL will be
		//example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
		foreach($this->data as $k=>$v) {
			foreach ($v as $kk=>$vv) {
				$url[$k.'.'.$kk] = $vv;
			}
		}
		// redirect the user to the url
		$this->redirect($url, null, true);
	}

	//  function result(){
	// 	$conditions = array();
	// 	$data = array();
	// 	if(!empty($this->passedArgs)) {
	// 		// Fillter title
	// 		if(isset($this->passedArgs['Book.title'])) {
	// 			$title = $this->passedArgs['Book.title'];
	// 			$conditions[] = array('Book.title LIKE' => '%$title%',);
	// 			$data['Book']['title'] = $title;
	// 		}

	// 		// fillter description
	// 		if(isset($this->passedArgs['Book.description'])) {
	// 			$keywords = $this->passedArgs['Book.description'];
	// 			$conditions[] = array(
	// 				"OR" => array(
	// 					'Book.description LIKE' => "%$keywords%",
	// 					'Book.isbn LIKE' => "%$keywords%"
	// 				)
	// 			);
	// 			$data['Book']['description'] = $keywords;
	// 		}
	// 		//limit and order by
	// 		$this->paginate = array(
	// 			'limit' => 4,
	// 			'order' => array('title' => 'desc')
	// 		);

	// 		$this->data = $data;
	// 		//print_r($this->data);
	// 		$this->set("posts", $this->paginate("Book", $conditions));
	// 	}
	// }

	function result(){
        $conditions = array();
        $data = array();
        if(!empty($this->passedArgs)){
        	print_r($this->passedArgs);
            //Fillter title
            if(isset($this->passedArgs['Book.title'])) {
                $title = $this->passedArgs['Book.title'];
                $conditions[] = array(
                    'Book.title LIKE' => "%$title%",
                );
                $data['Book']['title'] = $title;
            }
            //Filter description
            // die(var_dump($this->passedArgs['Book.description']));
            if(isset($this->passedArgs['Book.description'])) {
                $keywords = $this->passedArgs['Book.description'];
                $conditions[] = array(
                    "OR" => array(
                                'Book.description LIKE' => "%$keywords%",
                                'Book.isbn LIKE' => "%$keywords%" 
                            )
                );
                $data['Book']['description'] = $keywords; 
            }
            //Limit and Order By
            $this->paginate= array(
                'limit' => 4,
                'order' => array('title' => 'desc'),
            );
            
            $this->data = $data;
            $this->set("posts",$this->paginate("Book",$conditions));
        }
    }
}
?>