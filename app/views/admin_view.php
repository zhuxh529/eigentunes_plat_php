<html>
	<head><title>�û�����</title>
	<meta charset="UTF-8">
	</head>
	<body>

<?php

	foreach($data['users'] as $user)
	if($user['username'] != $data['admin'])
	{
		echo "<p>";
		echo $user['username']."&nbsp;&nbsp;<a href=\"".$data['rootUrl']."?op=admin&delete=".$user['username']."\">ɾ��</a>";
		echo "</p>";
	}

?>

	</body>
</html>
