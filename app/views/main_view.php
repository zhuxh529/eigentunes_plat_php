<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">


		<link rel="stylesheet" type="text/css" href="source/style.css">
		<link rel="stylesheet" type="text/css" href="source/search/search.css">
		<link rel="stylesheet" type="text/css" href="source/simpleplayer.css">
		<link rel="stylesheet" type="text/css" href="source/button.css">
		<script type="text/javascript" src="source/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="source/jquery.simpleplayer.js"></script>

		<script type="text/javascript" src="source/fancybox/jquery.fancybox.js?v=2.0.6"></script>
		<link rel="stylesheet" type="text/css" href="source/fancybox/jquery.fancybox.css?v=2.0.6" media="screen" />
		<link rel="stylesheet" type="text/css" href="source/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.2" />
		<script type="text/javascript" src="source/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.2"></script>
		<script type="text/javascript" src="source/script.js"></script>


		<title>eigenTunes</title>
	</head>
	<body onload=document.f.content.focus()>

<div id="login">		

<?php
if(isset($this->data['user'])) {
?>
		<p><strong>欢迎，<?php echo $this->data['user']; ?>！</strong></p>
		<a href="<?php echo $this->data['rootUrl'].'?r=user/logout'; ?>">登出</a>

<?php
} else {
?>
		<a class='arial login_register_fancybox' href="<?php echo $this->data['rootUrl'].'?r=user/register'; ?>">注册</a>
		<a class='arial login_register_fancybox' href="<?php echo $this->data['rootUrl'].'?r=user/login'; ?>">登录</a>
<?php

}
?>

</div>
<div class='indexTop'>


	<div class='center'>
		<img src="source/img/logo.png" alt="logo" style="position:relative;width:29%;left:35%;">
		<p style="vertical-align: middle;" align="center" class='arial'>为您的个性化音乐需求提供最好体验</p>
		<form method="post" action="<?php echo $this->data['rootUrl'].'?r=post/search'; ?>" id="search">
  		<input name="searchContent" id="fname" type="text" size="30" placeholder="please enter the music"  >
		</form> 
	
	</div>
</div>

<div class='indexBot'>

			

	<div class='postList'>
		<?php

	foreach($this->data['data'] as $idx=>$dat) {
	// if (0 == $idx) {
	// 	$subject = $dat['subject'];
	// }
	// else {
	// 	$subject = '';
	// }

	$subject = $dat['subject'];
	$pid=$dat['id'];
	// echo $pid;
	echo "<div class='postInMain'>";

	echo "<hr/>";
	echo "<a class='title' href=".$this->data['rootUrl']."?r=post/showPost&pid=".$dat['id'].">精华:$subject</a> <br/><br/>";

	echo "<div class='content_view'>";
	echo $dat['content']."<br/>";
	if(!empty($dat['file_audio'])){
		echo "<br/><div class='player-container'>原声试听：<audio class='player' src='source/music/".$dat['file_audio']."'>  Your browser does not support the <code>audio</code> element. </audio></div>";

	}
	echo "</div>";
	echo "<div align=right>".$dat['addtime']."</div>";
	echo "<br/></div>";

	
}

?>
	<hr>

	</div>
</div>


	</body>
</html>
