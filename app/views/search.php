<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="source/style.css">
<link rel="stylesheet" type="text/css" href="source/search/search.css">
</head>
<body>
<div class='indexTop'>
	<div class='center'>
		<!-- <img src="source/img/logo.jpg" alt="logo" style="position:relative;width:26%;left:33%;">
 		-->
		<p class='logo'>eigenTunes</p>
		<p align="center" style="font-size:13px;">满足您的音乐个性化需求</p>
		<form method="post" action="prediction.php" id="search">
  		<input name="q" id="fname" type="text" size="30" placeholder="please enter the music"  >
		</form>
	</div>
</div>

<div class='indexBot'>
	<div class='postList'>
		<?php

foreach($this->data['data'] as $idx=>$dat) {
	if (0 == $idx) {
		$subject = '&nbsp;<b>'.$dat['subject'].'</b>';
	}
	else {
		$subject = '';
	}
	echo "<hr/><br/>";
	echo $dat['user'].":$subject<br/><br/>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;".$dat['content']."<br/>";
	echo "<div align=right>".$dat['addtime']."</div>";
	echo "<br/><hr/><br/>";
}

?>
	</div>
</div>

<!-- <div id='searchResult'>
<?php

foreach($this->data['data'] as $idx=>$dat) {
	if (0 == $idx) {
		$subject = '&nbsp;<b>'.$dat['subject'].'</b>';
	}
	else {
		$subject = '';
	}
	echo "<hr/><br/>";
	echo $dat['user'].":$subject<br/><br/>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;".$dat['content']."<br/>";
	echo "<div align=right>".$dat['addtime']."</div>";
	echo "<br/><hr/><br/>";
}

?>
<form name="f" action="<?php echo $this->data['rootUrl']; ?>" method="POST">
			<input type="text" name="subject" placeholder="标题"><br/><br/>
			<textarea name="content" rows="4" cols="60" placeholder="内容"></textarea><br/><br/>
			<input type="submit" value="提交"></input><br/>
		</form>
</div> -->

</body>
</html>