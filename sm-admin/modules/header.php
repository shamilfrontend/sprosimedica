<?php defined("_SMARTMEDIA") or die(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>

    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/sb-admin.css" rel="stylesheet">
    <link href="static/css/plugins/morris.css" rel="stylesheet">
    <link href="static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Мобильное меню</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Genesis Platform "Alpha v0.6"</a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Администратор <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?view=user"><i class="fa fa-fw fa-user"></i> Профиль</a></li>
                        <li><a href="index.php?view=settings"><i class="fa fa-fw fa-gear"></i> Настройки</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?do=logout"><i class="fa fa-fw fa-power-off"></i> Выход</a></li>
                    </ul>
                </li>
            </ul>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="/" target="_blank"><i class="fa fa-fw fa-home"></i> На сайт</a></li>
					<li <?=activeUrl("dashboard")?>><a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Панель</a></li>
                    <!--li <?=activeUrl("categories")?>><a href="index.php?view=categories"><i class="fa fa-fw fa-folder-open-o"></i> Рубрики</a></li-->
                    <li <?=activeUrl("articles")?>><a href="index.php?view=articles"><i class="fa fa-fw fa-pencil"></i> Записи</a></li>
                    <li <?=activeUrl("pages")?>><a href="index.php?view=pages"><i class="fa fa-fw fa-copy"></i> Страницы</a></li>
					<li <?=activeUrl("video")?>><a href="index.php?view=video"><i class="fa fa-fw fa-film"></i> Виджет</a></li>
					<li <?=activeUrl("slider")?>><a href="index.php?view=slider"><i class="fa fa-fw fa-tags"></i> Слайдер</a></li>
					<!--li <?=activeUrl("slider")?>><a href="index.php?view=slider"><i class="fa fa-fw fa-photo"></i> Слайдер</a></li>
                    <li <?=activeUrl("media")?>><a href="index.php?view=media"><i class="fa fa-fw fa-film"></i> Галереи</a></li-->
					<li <?=activeUrl("ru")?>><a href="index.php?view=settings"><i class="fa fa-fw fa-gear"></i> Настройки</a></li>
                    <li <?=activeUrl("user")?>><a href="index.php?view=user"><i class="fa fa-fw fa-user"></i> Профиль</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>