<style type="text/css">
h1 {
	font-size: 2.5em;
  	font-family: Georgia;
  	letter-spacing: 0.1em;
  	color: rgb(0,142,97);
  	text-shadow: 1px 1px 1px rgba(255,255,255,0.6);
  	padding-bottom: 15px;
}
.noidungcomment {
	 border-radius: 10px;
  border: 3px solid #BADA55;
	height: 150px;
	width: 550px;
}

</style>
<h1>Add Comment</h1>
<?php 
    echo $this->Form->create('Comment', array('action' => 'add', 'url' => array($post_id)));
    echo $this->Form->input('text', array('rows' => '3', 'class' => 'noidungcomment')); 
    echo '<br>';
	echo $this->Form->end('Add Comment');
?>

