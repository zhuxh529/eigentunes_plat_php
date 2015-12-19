<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" type="text/css" href="source/style.css">
		<link rel="stylesheet" type="text/css" href="source/search/search.css">
		<link rel="stylesheet" type="text/css" href="source/simpleplayer.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="source/jquery.simpleplayer.js"></script>
		<script type="text/javascript" src="source/script.js"></script>
		<title>eigenTunes</title>
	</head>
	<body onload=document.f.content.focus()>

<div id="login">		
		<a href="<?php echo $this->data['rootUrl'].'?r=post/ask'; ?>">提问</a>

</div>

<div class='searchTop'>
	<div class='center'>
		<!-- <img src="source/img/logo.jpg" alt="logo" style="position:relative;width:26%;left:33%;">
 		-->
<!-- <img src="source/img/logo.jpg" alt="logo" style="position:relative;width:20%;left:20%;">
 		-->		
		<a href="<?php echo $this->data['rootUrl'].'?r=index'; ?>"><img src="source/img/logo.png" alt="logo" style="position:relative;width:29%;left:35%;"></a>		
 		<form method="post" action="<?php echo $this->data['rootUrl'].'?r=post/search'; ?>" id="search2">
  		<input name="searchContent" id="fname" type="text" size="30" placeholder="please enter the music"  >
		</form>

	</div>
</div>

<div class='searchBot'>
			
			

	<div class='postList'>
		<?php

foreach($this->data['data'] as $idx=>$dat) {
	$subject = $dat['subject'];

	echo "<hr/><br/>";
	echo $dat['user'].":<a href=".$this->data['rootUrl']."?r=post/showPost&pid=".$dat['id'].">$subject</a><br/><br/>";
	if(!empty($dat['file_audio'])){
		echo "<div class='player-container'><audio class='player' src='source/music/".$dat['file_audio']."'>  Your browser does not support the <code>audio</code> element. </audio></div>";
	}
	echo "&nbsp;&nbsp;&nbsp;&nbsp;".$dat['content']."<br/>";
	echo "<div align=right>".$dat['addtime']."</div>";
	echo "<br/><hr/><br/>";
}

?>
	</div>
</div>


	</body>
</html>
