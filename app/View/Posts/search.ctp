<?php 
// // tao form tim kiem
// echo $this->Form->create('Post', array('controller' => 'posts', 'action' => 'search'));
// echo $this->Form->input('title', array('label' => 'Title'));
// // echo $this->Form->input('price', array('label' => 'Price'));
// echo $this->Form->end('Search');

// // xuat ket qua tim kiem
// if(!empty($posts)) {
// 	foreach($posts as $post) {
// 		echo "<div>";
// 		echo 'Title: ' .$post['Post']['title']. '</br>';
// 		echo 'Username: ' .$post['User']['username']. '</br>';
// 		echo 'Content: ' .$post['Post']['body'];
// 		echo "</div>";
// 		echo "</br>";
// 	}
// }
?>

<?php echo $this->Form->create('Post', array('action' => 'search')); ?>
<fieldset>
	<?php 
		echo $this->Form->input('search');
		echo $this->Form->submit('Search');
	?>
</fieldset>
<?php echo $this->Form->end(); ?>

