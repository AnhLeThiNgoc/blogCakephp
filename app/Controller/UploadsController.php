<?php
class UploadsController extends AppController {
	function add() {
		 if ($this->request->is('post')) {
            $this->Upload->create();
            if ($this->Upload->save($this->request->data)) {
                $this->Session->setFlash(__('Your file has been saved.'));
                // return $this->redirect(array('action' => 'index'));
            }
            // $this->Session->setFlash(__('Unable to add your post.'));
        }

	// 	if(!empty($this->data)){s
	// 		if($this->FileUpload->success){
	// 			$this->Session->setFlash(__('Upload successfully', true));
	// 		}else{
	// 			$this->Session->setFlash($this->FileUpload->showErrors());
	// 		}
	// 	}
	// }
}