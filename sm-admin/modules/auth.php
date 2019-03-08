<?php if (isset($_SESSION['auth']['admin']) && $_SESSION['auth']['admin'] == "ADMIN") {redirect("index.php");}
	
    if ($_POST) {
		if ($_POST["login"] && $_POST["password"]) {
			
			connect(HOST, USER, PASS, DB);
				$auth = auth($_POST["login"], $_POST["password"]);
			close_connect($connect);
			
			if ($auth == "done") {
				$_SESSION['auth']['admin'] = "ADMIN";
				header("Location: index.php");
			} else {
				$error = $auth;
			}
			
		} else {
			$error = "Заполните все поля!";
		}
	}

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="ru"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Авторизация на сайте</title>
	<link rel="stylesheet" href="static/auth/css/style.css">
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>

  <section class="container">
  
    <div class="login">
      <h1>Войти в личный кабинет</h1>
	  <p><img style="margin-left:57px;width:200px;" src="static/auth/img/logo.png"></p>
	  <?php if (isset($error)): ?><p style="color:red;padding:10px;border:1px dotted red;text-align:center;margin-bottom:5px;"><?=$error?></p><?php endif; ?>
      <form method="post" action="index.php">
        <p><input type="text" name="login" value="" placeholder="Логин или ID"></p>
        <p><input type="password" name="password" value="" placeholder="Пароль"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Войти"></p>
      </form>
    </div>

  </section>
</body>
</html>