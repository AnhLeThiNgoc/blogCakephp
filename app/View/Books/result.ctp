<?php 
	// co tac dung truyen toan bo cac tham so trong mang $this->passedArgs len tren url cua
	// cac link phan trang trong cake
	$this->Paginator->options(array('url' => $this->passedArgs));
?>
<?php 
	echo $this->Form->create('Book', array('action' => 'search'));
?>

<fieldset>
	<legend><?php __('Book Search'); ?></legend>
	<?php 
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->submit('Search');
	?>
</fieldset>
<?php print_r('kjahjkh')?>
<?php echo $this->Form->end(); ?>
<?php 
	if(!empty($posts)) {
		print_r($posts);
		echo "<table>";
			echo "<tr>";
				echo "<th>".$this->Paginator->sort("ID", "id")."</th>"; 
				echo "<th>".$this->Paginator->sort("Title", 'title')."</th>";
				echo "<th>".$this->Paginator->sort("Description", "description")."</th>";
			echo "</tr>";

			foreach($posts as $item) {
				echo "<tr>";
					echo "<td>".$item['Book']['id']."</td>";
					echo "<td>".$item['Book']['title']."</td>";
					echo "<td>".$item['Book']['description']."</td>";
				echo "</tr>";
			}
		echo "</table>";

		// ------ Paging
		echo $this->Paginator->prev('<< Previous ', null, null, array('class' => 'disabled')); // show the next and previous link
		echo '|' .$this->Paginator->numbers()."|"; // shows the page numbers
		echo $this->Paginator->next('Next >>', null, null, array('class' => 'disabled'));
		echo "Page". $this->Paginator->counter();
	}
?>