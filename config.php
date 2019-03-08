<?php defined("_SMARTMEDIA") or die();

    $config["theme"] = "/theme_default/"; //относительный путь до темы
    $config["prefix"] = "sm_"; //префикс таблиц в БД
    $config["controller"] = 0;
	
    $config["perpage"] = 6; //постраничная навигация на сайте
    $config["strlenvop"] = 250; //постраничная навигация на сайте
    //$config["perpage_gallery"] = 50; //постраничная навигация в галерее
    $config["perpage_admin"] = 10; //постраничная навигация в панели администратора
    $config["feedback"] = true; //false - отключает форму обратной связи в подвале сайта

    define('HOST', 'localhost'); // ХОСТ
    define('USER', 'c928944y_sm'); // ПОЛЬЗОВАТЕЛЬ
    define('PASS', 'qwerty123'); // ПАРОЛЬ
    define('DB', 'c928944y_sm'); // БД