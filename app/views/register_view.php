
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>eigenTunes Signup page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="source/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="<?php echo $this->data['rootUrl'].'?r=user/register'; ?>" method="POST">
        <h2 class="form-signin-heading">用户注册</h2>
        <label for="inputEmail" class="sr-only">用户名:</label>
        <input  id="inputEmail" class="form-control" placeholder="用户名" name="register_name" value="" required >
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="register_password" value="" required>
        <label for="inputPassword2" class="sr-only">密码确认</label>
        <input type="password" id="inputPassword2" class="form-control" placeholder="密码确认" name="register_password_again" value="" required >
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



<!-- <html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<title>Test</title>
	</head>
	<body onload=document.f.register_name.focus()>

		<form name="f" action="<?php echo $this->data['rootUrl'].'?r=user/register'; ?>" method="POST">
			<strong>用户名:     </strong>
			<input type="text" maxLength=32 name="register_name" value=""></input></br>
			<strong>密码:         </strong>
			<input type="password" maxLength=64 name="register_password" value=""></input></br>
			<strong>确认密码: </strong>
			<input type="password" maxLength=64 name="register_password_again" value=""></input></br>
			<input type="submit" value="注册"></input></br>
		</form>
	</body>
</html> -->
