<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="stylesheet" type="text/css" href="source/style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="source/search/search.css">
		<link rel="stylesheet" type="text/css" href="source/simpleplayer.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="source/jquery.simpleplayer.js"></script>
		<script type="text/javascript" src="source/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.2"></script>
		<script type="text/javascript" src="source/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
		<script type="text/javascript" src="source/fancybox/jquery.fancybox.js?v=2.0.6"></script>
		<link rel="stylesheet" type="text/css" href="source/fancybox/jquery.fancybox.css?v=2.0.6" media="screen" />
		<link rel="stylesheet" type="text/css" href="source/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.2" />
		<script type="text/javascript" src="source/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.2"></script>
		<script type="text/javascript" src="source/jquery.simpleplayer.js"></script>
		<script type="text/javascript" src="source/script.js"></script>


		<title>eigenTunes</title>
	</head>
	<body onload=document.f.content.focus()>

<div id="login">		
		<a href="<?php echo $this->data['rootUrl'].'?r=post/ask'; ?>">提问</a>


</div>
<div class='indexTop'>


	<div class='center'>
		<!-- <img src="source/img/logo.jpg" alt="logo" style="position:relative;width:26%;left:33%;">
 		-->
		<a href="<?php echo $this->data['rootUrl'].'?r=index'; ?>"><img src="source/img/logo.png" alt="logo" style="position:relative;width:29%;left:35%;"></a>		
		<p align="center" style="font-size:13px;">为您的个性化音乐需求提供最好体验</p>
		<form method="post" action="<?php echo $this->data['rootUrl'].'?r=post/search'; ?>" id="search">
  		<input name="searchContent" id="fname" type="text" size="30" placeholder="please enter the music"  >
		</form>
	</div>
</div>

<div class='indexBot'>
<div class='postList'>
<script>
//js global variable set
baseUrl="<?php echo $this->data['rootUrl'];?>";
pid="<?php echo $this->data['data'][0]['id'];?>";
</script>
		<?php
	//show the post
	$dat=$this->data['data'][0];
	// print_r($dat);
	$subject = $dat['subject'];
	$pid=$dat['id'];

	// echo $pid;
	//print_r($dat);
	echo "<h3>".$dat['subject']."</h3>";
	echo "<hr/><br/>";
	if(!empty($dat['file_audio'])){
		echo "音频：";
		echo "<div class='player-container'><audio class='player' src='source/music/".$dat['file_audio']."'>  Your browser does not support the <code>audio</code> element. </audio></div> <br/>";
	}
	if(!empty($dat['file_pic'])){
		echo "乐谱：<br/>";
		echo "<a class='music_box_left' data-fancybox-group='button' href='source/music/scores/".$dat['file_pic']."'><img class='img02' src='source/img/wuyuzhixuanlv_fengmian.png' alt='' /></a> <br/>";
	}
	echo "<br/>内容：<br/>&nbsp;&nbsp;&nbsp;&nbsp;".$dat['content']."<br/>";
	echo "<div align=right>".$dat['addtime']."</div>";
	echo "<div align=right><a class='login_register_fancybox' href=".$this->data['rootUrl']."?r=post/postComment&pid=".$pid.">评论</a></div>";
	echo "<br/><hr/><br/>";



		echo "<div class='commentDiv'>";
			$counter =1;
			$commentStructure=[];
			foreach($this->data['comments'] as $idx=>$comment) {
				if(!is_null($comment['parent_comment_id'])) {
					if(isset($commentStructure[$comment['parent_comment_id']])){
						array_push($commentStructure[$comment['parent_comment_id']], $comment);
					}
					else{
						$commentStructure[$comment['parent_comment_id']]=[$comment];
					}
					continue;
				}
			}
		//print_r($commentStructure);

			foreach($this->data['comments'] as $idx=>$comment) {
				if(!is_null($comment['parent_comment_id'])) {
					continue;
				}
				$subject = $comment['subject'];
				// echo $pid;
				//print_r($dat);
				echo "<div class='commentEach'>";
				echo "<h3> Comment #".$counter.": ".$comment['subject']."</h3>";
				echo "<hr/><hr/><br/>";
				// if(!empty($dat['file_pic'])){
				// 	echo "乐谱：<br/>";
				// 	echo "<a class='music_box_left' data-fancybox-group='button' href='source/music/scores/".$dat['file_pic']."'><img class='img02' src='source/img/wuyuzhixuanlv_fengmian.png' alt='' /></a> <br/>";
				// }
				 echo "<br/>内容：<br/>&nbsp;&nbsp;&nbsp;&nbsp;".$comment['content']."<br/>";
				 echo "<div align=right>".$comment['time']."</div>";
				 echo "<div align=right>".count($commentStructure[$comment['id']])."条评论</div>";
				 echo "<div align=right><a class='login_register_fancybox' href=".$this->data['rootUrl']."?r=post/postComment&pid=".$pid."&parent_comment_id=".$comment['id'].">评论</a></div>";
				 $root=urlencode($this->data["rootUrl"]);

				 $setGlobaleVar='setGlobaleVar('.$this->data["rootUrl"].','.$pid.');';

				 echo "<div align=right><a href='#' onclick='showReplies(this.parentNode.parentNode,".$comment['id'].",".json_encode($commentStructure).",1, this); return false;'>显示评论</a></div>";
				 echo "<br/><hr/><br/>";
				 echo "</div>";
				 $counter=$counter+1;
			}
		echo "</div>";



?>

	</div>

</div>
<script>
</script>
	</body>
</html>
