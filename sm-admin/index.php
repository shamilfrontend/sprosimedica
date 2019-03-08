<?php define("_SMARTMEDIA", TRUE); session_start();
header('Content-Type: text/html; charset=utf-8');

require ("../config.php");
require ("../library/library.php");

if (!isset($_SESSION['auth']['admin']) || $_SESSION['auth']['admin'] != "ADMIN") {include("modules/auth.php"); die;}
if (isset($_GET["do"]) == "logout") {unset($_SESSION['auth']['admin']); redirect("");}
$getView = isset($_GET["view"]) ? $_GET["view"] : "default";
    connect(HOST, USER, PASS, DB);
    $tree = getCatMy();
switch ($getView) {
	
	case ("categories"):
		$cat = getCat();
		$tmpl = "categories";
		$title = "Панель администратора - Рубрики";
	break;
	
	case ("add_categories"):
		if ($_POST) addCat();
		$tmpl = "add_categories";
		$title = "Панель администратора - Добавить рубрику";
	break;
	
	case ("edit_categories"): 
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=categories");}
			if ($_POST) editCat($_GET["id"]);
		$st = getCat(true); $st = $st[$_GET["id"]];
		if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=categories");}
		$tmpl = "edit_categories";
		$title = "Панель администратора - Редактор рубрик";
		if ($st["img"]) $img = '<p class="help-block" style="color:#A94442;">Для того что бы заменить картинку кликните по ней.</p><img onclick="confirmUser();return false;" class="img-thumbnail" src="/files/cat/'.$st["img"].'" alt="" width="200" height="200">';
			else $img = '<input type="file" name="baseimg">';
	break;
	
	case ("del_categories"): 
		if ($_GET["id"]) delCat($_GET["id"]);
		redirect("index.php?view=categories");
	break;
	
	case ("articles"):
		$articles = getFunction(false, "articles", "getArticles", $config["perpage_admin"]);
		$tmpl = "articles";
		$title = "Панель администратора - Записи";
	break;
	
	case ("add_article"):
		if ($_POST) addArticle();
		$st = getCat(true);
		if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Не найдено рубрик!</div>";redirect("index.php?view=articles");}
		$tmpl = "add_article";
		$title = "Панель администратора - Добавить запись";
	break;
	
	case ("edit_article"): 
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=articles");}
			if ($_POST) editArticle($_GET["id"]);
		$st = getPost(false, $_GET["id"]);
		$cat = getCat(true);
		if (!is_data($cat)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Не найдено рубрик!</div>";redirect("index.php?view=articles");}
		if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=articles");}
		$tmpl = "edit_article";
		$title = "Панель администратора - Редактор записи";
		if ($st["imgg"] && $st["path"]) $img = '<p class="help-block" style="color:#A94442;">Для того что бы заменить картинку кликните по ней.</p><img onclick="confirmUser();return false;" class="img-thumbnail" src="'.$st["path"].$st["imgg"].'" alt="" width="200" height="200">';
			else $img = '<input type="file" name="baseimg">';	
        
        if ($st["img_genesis"] && $st["path"]) $img1 = '<p class="help-block" style="color:#A94442;">Для того что бы заменить картинку кликните по ней.</p><img onclick="confirmUser();return false;" class="img-thumbnail" src="'.$st["path"].$st["img_genesis"].'" alt="" width="400" height="400">';
			else $img1 = '<input type="file" name="genesis">';
        
        //print_array($st, true);
	break;
	
	case ("del_article"): 
		if ($_GET["id"]) delArticle($_GET["id"]);
		redirect("index.php?view=articles");
	break;
	
	case ("pages"):
		$pages = getPages(true);
		$tmpl = "pages";
		$title = "Панель администратора - Страницы";
	break;
	
	case ("add_page"):
		if ($_POST) addPage();
		$tmpl = "add_page";	
		$title = "Панель администратора - Добавить cтраницу";
	break;
	
	case ("edit_page"): 
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=pages");}
			if ($_POST) editPage($_GET["id"]);
		$st = getPage(false, $_GET["id"]);
		$tmpl = "edit_page";
		$title = "Панель администратора - Редактор страницы";
		if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=pages");}		
	break;
	
	case ("del_page"): 
		if ($_GET["id"]) delPage($_GET["id"]);
		redirect("index.php?view=pages");
	break;
	
	case ("feedback"): 
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=dashboard");}
		$tmpl = "feedback"; $st = getFeed($_GET["id"]); if (!is_array($st) || empty($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=dashboard");}
		$title = "Панель администратора - Тикеты";
	break;
	
	case ("del_feedback"): 
		if ($_GET["id"]) delFeedback($_GET["id"]);
		redirect("index.php?view=dashboard");
	break;
	
	case ("user"):
		if ($_POST) updateAuth();
		$tmpl = "user";
		$title = "Панель администратора - Профиль";
	break;
	
	case ("settings"): 
		if ($_POST) updateEtc($_POST);
		$st = getEtc();
		$tmpl = "settings";
		$title = "Панель администратора - Настройки";
	break;
	##############################################################
	##############################################################
	
    case ("slider"):
        $st = getEtc();
		$sliders = getSliders();
		$tmpl = "sliders";
		$title = "Панель администратора - Слайдер";
	break;
	
	case ("add_slider"):
		if ($_POST) addSlider();
		$tmpl = "add_slider";
		$title = "Панель администратора - Добавить слайд";
	break;
	
	case ("edit_slider"): 
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=slider");}
			if ($_POST) editSlider($_GET["id"]);
        $st = getSlider($_GET["id"]);
        if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=slider");}
		$tmpl = "edit_slider";
		$title = "Панель администратора - Редактор слайда";
		if ($st["img"]) $img = '<p class="help-block" style="color:#A94442;">Для того что бы заменить картинку кликните по ней.</p><img onclick="confirmUser();return false;" class="img-thumbnail" src="/files/sliders/'.$st["img"].'" alt="" width="400" height="400">';
			else $img = '<input type="file" name="baseimg">';			
	break;
	
	case ("del_slider"): 
		if ($_GET["id"]) delSlider($_GET["id"]);
		redirect("index.php?view=slider");
	break;    
        
    ##############################################################
	##############################################################
	case ("video"):
		$media = getFunction(false, 'video', 'getMedia', $config["perpage_admin"]);
		$tmpl = "video";
		$title = "Панель администратора - Витжет";
	break;
	
	case ("add_video"):
		if ($_POST) addMedia();
		$tmpl = "add_video";
		$title = "Панель администратора - Добавить Виджет";
	break;
	
	case ("edit_video"):
		if (!$_GET["id"]) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=video");}
		if ($_POST) {
			// загрузка картинок AjaxUpload
			if ($_POST['upload']) {
				uploadImage($_POST['upload']);
			} else if ($_POST['delet'] && $_POST['id']) {
				removeImage();
			} else {
				editMedia($_GET["id"]);
			}
		} 
		$st = getMediaFile($_GET["id"]);
		if (!is_data($st)) {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Неверные параметры!</div>";redirect("index.php?view=video");}	
		$tmpl = "edit_video";
		$title = "Панель администратора - Редактор Виджета";
			
	break;
	
	case ("del_video"): 
		if ($_GET["id"]) delMedia($_GET["id"]);
		redirect("index.php?view=video");
	break;
	
	default:
		$tmpl = "dashboard";
		$title = "Панель администратора";
		$feedback = getFunction(false, 'feedback', 'getFeedback', $config["perpage_admin"]);
}	close_connect($connect);

require "modules/header.php";
    include("modules/{$tmpl}.php");
require "modules/footer.php";
//http://sparqproductions.com/images/kcfinder/files/Font%20Awesome%20Cheatsheet.pdf