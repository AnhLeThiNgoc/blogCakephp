<h1>Add Post</h1>
<?php 

?> 
<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->input('img');
// echo $this->element('upload');
echo $this->Form->end('Save Post');
?>

