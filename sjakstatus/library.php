<?php

function errorView($msg)
{
echo<<<EOT
<!DOCTYPE html>
<html>
  <head lang="da">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta charset="utf-8">
    <title>Sjakstatus</title>
    <link rel="stylesheet" href="/apo/capture/style.css">
  </head>
  <body>
	<p>{$msg}</p>
  </body>
</html>
EOT;
	exit();
}

function loginView($data)
{
	if (isset($_POST['pass'])) {
		$userpass = sha1($_POST['pass']);
		if ($userpass == $data['password']) {
			$_SESSION['loginok'] = true;
			$_SESSION['sjakid'] = $data['id'];
		} else {
			header('Location: ' . $_SERVER['REQUEST_URI']);
		}
	} else {
echo<<<EOT
<!DOCTYPE html>
<html>
  <head lang="da">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta charset="utf-8">
    <title>Sjakstatus - {$data['name']}</title>
    <link rel="stylesheet" href="/apo/capture/style.css">
  </head>
  <body>
	<p>{$msg}</p>
	<form method="post" action="{$_SERVER['REQUEST_URI']}">
		Password: <input type="password" name="pass">
		<input type="submit" value="Login">
	</form>
  </body>
</html>
EOT;
		exit();
	}
}
                                                     