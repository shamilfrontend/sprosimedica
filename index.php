<?php define("_SMARTMEDIA", TRUE); session_start();header('Content-Type: text/html; charset=utf-8');

require ("config.php");
require ("library/library.php");
	ini_set('error_reporting', 0);ini_set('display_errors', 0);ini_set('display_startup_errors', 0);

	if (isset($_GET["do"]) == "logout") {unset($_SESSION['auth']); redirect();}
	
	connect(HOST, USER, PASS, DB);
	
	if (!empty($_GET['api'])) {
		switch($_GET['api']) {
			case('ulogin'):
				$s = file_get_contents('http://ulogin.ru/token.php?token='.$_POST['token'].'&host='.$_SERVER['HTTP_HOST']);
                $user_ulogin = json_decode($s, true);		
				$user_db = is_user($user_ulogin['uid'],$user_ulogin['network']);
				if (empty($user_db['id'])) reg_user($user_ulogin);
				else $_SESSION['auth'] = $user_db;
				redirect(get_uri());
			break;
		}               
	}
	
	$slash = (count($_GET) > 0) ? '%26' : '%3F';
	$ulogin_mat_evo_redirect = 'http%3A%2F%2Fsprosimedica.ru'.urlencode($_SERVER['REQUEST_URI']).$slash.'api%3Dulogin';
	
	# %2F - /
	# %3F - ?
	# %26 - &
	# %3D - =
	
	$etc = getEtc();
	$catvop = getCatVop();
    //$pages = getPages(false, true);
	//print_array($_SESSION['auth'], true);	
	//$post = getPage($page);//echo $page;
    //if (!is_data($post)) {$post = getPost($page);}
	//$articles = getFunction(32, "articles", "getArticles");   
	//$media = getFunction(false, 'video', 'getMedia', $config["perpage_admin"]);
	
	if (isset($_GET["debug"])) {redirect();}
	$type = !empty($_GET['type'])?$_GET['type']:'main';
	$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], 1);
	if (strpos($_SERVER['REQUEST_URI'], '/') === false) {} else error_404();

    switch($type) {
        case ("main"):
            $vorposi = getFunction(false, "voprosi", "id_vopros", "getVoprosi");
			$tmpl = 'main-tmpl.php';
		break;
		
		case ('search_vopros'):
			$search = !empty($_GET['query'])?$_GET['query']:'';
			if (!empty($search)) {
				$vorposi = getFunction(false, "voprosi", "id_vopros", "getVoprosi", false, $search);
			}
			$message = "Результаты поиска по запросу &laquo;{$search}&raquo;";
			$tmpl = 'main-tmpl.php';
		break;
		
		case ("vopros"):
			$id = !empty($_GET['id'])?$_GET['id']:1;
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				add_vrach_otvet($_POST);
			}
			$vorpos = getVopros($id);
			if (empty($vorpos['id_vopros'])) redirect();
			$otveti = getOtveti($id);
			$tmpl = 'vopros-tmpl.php';
		break;
		
		case ("guestbook"):
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				add_guestbook($_POST);
			}
			$books = get_guestbook();
			$tmpl = 'guestbook-tmpl.php';
		break;
		
		case ("edit_v"):
			$action = !empty($_GET['action'])?$_GET['action']:false;
			$id = !empty($_GET['id'])?$_GET['id']:0;
			if (!$id) redirect();
			switch($action) {
				case ("delete"):
					delete_vopros($id);
				break;
				
				default: redirect();
			}
		break;
		
		case ("add_vopros"):
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				add_user_vopros($_POST);
			}
			$tmpl = 'add-vopros-tmpl.php';
		break;
		
		case ("category"):
			$category = !empty($_GET['category'])?$_GET['category']:'category';
			$id = !empty($_GET['catid'])?$_GET['catid']:1;
			$vorposi = getFunction($id, "voprosi", "id_vopros", "getVoprosi");
			$tmpl = 'main-tmpl.php';
		break;

        case ("html"):
            
        break;
		
		case ("category2"): error_404();	$cat = getCat();
			if (isset($action[1]) && !(strrpos($action[1], 'page=') == 1)) {
				$action = explode(".", $action[1]);
					if ($action[1] != "html") error_404();
						else {
							$post = getPost($action[0]); 
							if (!is_data($post)) error_404(); 
								$etc["title"] .= " - ".$post["title"];
								$etc["keywords"] = $post["keywords"];
								$etc["description"] = $post["description"];
							updateViews($post["id"]); 
							$tmpl = "page";
                           // $breadcrumbs = "category-page";
						}
			} else {
				if (!array_key_exists($category, $cat)) error_404();
					else {
						$etc["title"] .= " - ".$cat[$category]["title_ct"]; $wp = getTree(getCat(true)); $wtf = parentID($wp, $cat[$category]["id_ct"]);
						$tmpl = "category"; //print_array(parentID($wp, $cat[$category]["id_ct"]));die("ok");
						$articles = getFunction(parentID($wp, $cat[$category]["id_ct"]), "articles", "getArticles");
                        if (!is_data($articles)) error_404();
						
						//print_array($cat[$category], true);
                            //$breadcrumbs = "category";
                            //$post["slug_ct"] = $cat[$category]["slug_ct"];
                            //$post["title_ct"] = $cat[$category]["title_ct"];
                        
					}
			}
			
		break;
		
        default: error_404();
    }
close_connect($connect);
require ("theme_default/index.php");