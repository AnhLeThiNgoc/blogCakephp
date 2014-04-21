<?php echo $this->html->css('view');?>
<div class='view'>
<h1>
	<?php echo h($post['Post']['title']); ?>
	<span>An Article by <?php echo $post['User']['username']; ?></span>
</h1>
<div class="meta"><span>Created: </span><?php echo $post['Post']['created']; ?></div>
<div class = "content_view">
<p><?php echo h($post['Post']['body']); ?></p>
</div>
<h2>Comments</h2>
<div class="comment">
<?php foreach($comments as $comment): ?>
	<div class="comment" style="margin-left: 50px;">
		<p>
			<div class='post_username'>
				<?php echo $comment['User']['username'] ;?>
				<span><?php echo ' Created: '.$comment['Comment']['created'];?></span>
			</div>
			<div class='post_comment'><?php echo h($comment['Comment']['text']); ?></div>
		</p>
	</div>
<?php 
	endforeach;
	echo $this->element('newcomment', array("post_id" => $post['Post']['id']));
?>
</div>
</div>
