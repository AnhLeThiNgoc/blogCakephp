<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<?php foreach($post['Comment'] as $comment): ?>
	<div class="comment" style="margin-left: 50px;">
		<p>
			<?php echo $users_username; ?>: 
			<?php echo $comment['created'];?>
			<?php echo h($comment['text']); ?>
		</p>
	</div>
<?php 
	endforeach;
	echo $this->element('newcomment', array("post_id" => $post['Post']['id']));
?>
<?php //echo $html->link('Add Comment', array('controller'=>'Comments','action'=>'add',$postid)); ?>
<!-- 
// add comments
<?php 
//echo $this -> element('addcomment', array('cache' => array('config' => 'long'))); -->