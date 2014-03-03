
	<!-- <link type="text/css" href="../demoengine/demoengine.css" rel="stylesheet"> -->
	


	<div id="dialog" title="Dialog"></div>
	<ul>
		<li><a href="photo-1.jpg" class="dialogify" data-width="450" data-height="300">Dialogify Photo 1</a></li>
		<li><?php echo $this->Html->link('Login',array('controller' => 'users', 'action' => 'add'), array('class'=>"dialogify", 'data-width'=>"450",'data-height'=>"300"))?></li>
	</ul>
	<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/ui-darkness/jquery-ui.css" rel="stylesheet">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<script type="text/javascript">
		/*
		 * jQuery UI Dialog: Size to Fit Content
		 * http://salman-w.blogspot.com/2013/05/jquery-ui-dialog-examples.html
		 */
		$(function() {
			$("#dialog").dialog({
				autoOpen: false,
				resizable: false,
				width: "auto"
			});
			$(".dialogify").on("click", function(e) {
				e.preventDefault();
				$("#dialog").html("<img src='" + $(this).prop("href") + "' width='" + $(this).attr("data-width") + "' height='" + $(this).attr("data-height") + "'>");
				$("#dialog").dialog("option", "position", {
					my: "center",
					at: "center",
					of: window
				});
				if ($("#dialog").dialog("isOpen") == false) {
					$("#dialog").dialog("open");
				}
			});
		});
	</script>
