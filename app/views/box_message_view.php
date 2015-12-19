<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<title>Test</title>
	</head>
	<body>
		<script>
		function closefancybox(){
			parent.$.fancybox.close();

		}
		</script>
	
<?php
echo "<p><strong>".$this->data['message']."</strong></p>";
echo "<a href= 'javascript:closefancybox();'>点此返回...</a>";
?>

	</body>
</html>
