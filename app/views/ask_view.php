<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="source/style.css">
<link rel="stylesheet" type="text/css" href="source/search/search.css">
</head>
<body>

<div>
<form name="f" action="<?php echo $this->data['rootUrl']; ?>" method="POST">
			<input type="text" name="subject" placeholder="标题"><br/><br/>
			<textarea name="content" rows="4" cols="60" placeholder="内容"></textarea><br/><br/>
			<input type="submit" value="提交"></input><br/>
		</form>
</div> 

</body>
</html>