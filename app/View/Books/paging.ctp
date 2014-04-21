<?php 
echo $this->Paginator->prev('<< Previous ', null,  null, array('class' => 'disabled')); // shows the next and previous links
echo "|".$this->Paginator->numbers()."|"; // show the page numbers
echo $this->Paginator->next('Next >>', null, null, array('class' => 'disabled')); // shows the next and revious links
echo 'Page'.$this->Paginator->counter();
?>

<?php 
if($data==null) {
	echo "<h2>Data Empty</h2>";
} else{
	echo '<table>
		<tr><th>ID</th><th>Title</th></tr>
	';
	foreach ($data as $item) {
		echo "<tr>";
		echo "<td>".$item['Book']['id']."</td>";
		echo "<td>".$item['Book']['title']."</td>";
		echo "</tr>";
	}
	echo('</table>');
}
?>