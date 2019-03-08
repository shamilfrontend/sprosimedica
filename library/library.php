<?php defined("_SMARTMEDIA") or die();

function redirect($http = false) {
    if ($http) header("Location: {$http}");
        else header("Location: /"); die();
}

function print_array($array, $die = false) {
    echo "<pre>";
        print_r($array);
    echo "</pre>";
    if ($die) die();
}

function clearUrl($array) {
    if (is_array($array)) {$arr = array();
        foreach ($array as $key => $item) if (empty($item)) unset($array[$key]);
        foreach ($array as $item) $arr[] = $item;
    } return $arr;
}

function error_404() {
	header("HTTP/1.0 404 Not Found");
    die('404');
	
	global $config,$etc,$pages,$shares,$servc,$menu,$menuPost,$mobileMenu,$megaMenu;

    $etc["title"] = "Страница не найдена!";
	$etc["404"] = TRUE;  
    include("theme/404.php");die();
}

function connect($host, $user, $pass, $db) {
    global $connect;

    $connect = mysqli_connect($host, $user, $pass, $db) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_connect_errno().": ".mysqli_connect_error());

    mysqli_query($connect, "SET NAMES 'UTF8'") or die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
}

function close_connect($connect) {
    mysqli_close($connect) or die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
}

function clearData($item, $html=true) {
    global $connect;
	
    if ($html)
		$item = mysqli_real_escape_string($connect, strip_tags(trim($item)));
    else
		$item = mysqli_real_escape_string($connect, trim($item));
    return $item;
}

function is_data($array) {
	if (is_array($array) && !empty($array)) return TRUE;
		else return FALSE;
}

function activeUrl($url) {
	$getView = isset($_GET["view"]) ? $_GET["view"] : "default";
    if ($getView == $url) return 'class="active"';
	if (!$getView && $url=="dashboard") return 'class="active"';
}


function getEtc() {
    global $connect,$config;

    $query = "SELECT * FROM {$config["prefix"]}etc WHERE id = 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $etc = array();
    $etc = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $etc[0];
}

function updateEtc($array) {
    global $connect,$config;
	
	$title = clearData($array["title"]);
    $footer = clearData($array["footer"]);
	$description = clearData($array["description"]);
	$keywords = clearData($array["keywords"]);
	$vk = clearData($array["vk"]);
	$fc = clearData($array["fc"]);
	$inst = clearData($array["inst"]);
	$head = clearData($array["head_title"]);
	$text = $array["text"];
	$slider = (int)$array["slider"];
 
    $t1 = clearData($array["t1"]);
    $t2 = clearData($array["t2"]);
    $t3 = clearData($array["t3"]);
    $t4 = clearData($array["t4"]);
    $t5 = clearData($array["t5"]);
    $l1 = clearData($array["l1"]);
    $l2 = clearData($array["l2"]);
    $l3 = clearData($array["l3"]);
    $l4 = clearData($array["l4"]);
    $l5 = clearData($array["l5"]);
	
    $block1 = (int)$array["block1"];
	$block2 = (int)$array["block2"];

	$query = "UPDATE {$config["prefix"]}etc SET title = '$title',slider = '$slider',block1 = '$block1',block2 = '$block2',head_title = '$head',text = '$text',footer = '$footer',description = '$description',keywords = '$keywords',vk = '$vk',fc = '$fc',inst = '$inst',t1 = '$t1',t2 = '$t2',t3 = '$t3',t4 = '$t4',t5 = '$t5',l1 = '$l1',l2 = '$l2',l3 = '$l3',l4 = '$l4',l5 = '$l5' WHERE id = 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	
	if (mysqli_affected_rows($connect) > 0) {$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Настройки успешно обновлены!</div>"; } 
		else {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении настроек произошла ошибка или Вы ничего не меняли!</div>";}
			redirect("index.php?view=settings");
}

function getCatMy($test=false, $gg=false) {
    global $connect, $config;
            if ($gg) $where = " WHERE visible = 1"; else $where = "";
    $query = "SELECT * FROM {$config["prefix"]}categories".$where;
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $categories = array();
    $sqlIN = array();
    if (mysqli_num_rows($request) != 0) {
        while($row = mysqli_fetch_assoc($request)) {
            if (!$test) {
               if (empty($categories[$row["parent_id"]])) {
                   $categories[$row["parent_id"]] = array();

                }
                $categories[$row["parent_id"]][] = $row; 
            } else {
                $categories[$row["id_ct"]] = $row;
                $categories["sqlIN"][$row["id_ct"]] = $row["last"];
            }
            
        } //$categories["sqlIN"] = $sqlIN;
       
    }
    return $categories; 
}

function arrayMerge($array1, $array2) {
    if (!is_data($array1) || !is_data($array2)) return false;
    
    foreach ($array1 as $key => $item) {
        if (is_data($array2[$key])) $array1[$key]["posts"] = $array2[$key];
    } return $array1;
}

function getCatPost($array) {
    global $connect, $config;
    if (!is_data($array)) return false;
    
    foreach ($array as $id => $item) {
        $id = (int)$id;
        $item = (int)$item; if ($item < 1) continue;
        if ($query)
            $query .= " UNION (SELECT * FROM `{$config["prefix"]}articles` WHERE `category` = {$id} ORDER BY id DESC LIMIT {$item})";
        else
            $query .= "(SELECT * FROM `{$config["prefix"]}articles` WHERE `category` = {$id} ORDER BY id DESC LIMIT {$item})";
    }
    
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $posts = array();
    if (mysqli_num_rows($request) != 0) {
        while($row = mysqli_fetch_assoc($request)) {
            $posts[$row["category"]][] = $row;
        }
            
    }
       
    return $posts; 
}

function parentID($array, $id) {
    if (!is_data($array) || !$id) return false;
    $arr = array();
    foreach($array as $key => $item) {
        if ($key == $id) {$arr[] = $key;$p=1;} 
        if (is_data($item["sub"]))
            foreach($item["sub"] as $kk => $sub)
                if ($p || $kk == $id) $arr[] = $kk;
        $p=0;
        
    } return $arr;
}

function getTree($tree) {
    
    $tree['0'] = array('parent_id' => '','category_name' => 'Корень','category_url' => '');
    
    foreach ($tree as $id => $node) {
      if (isset($tree[$node['parent_id']])) {
        $tree[$node['parent_id']]['sub'][$id] =& $tree[$id];
      }
    } return $tree[0]["sub"];   
}

function getMegaTree($tree) {
    
    $tree['0'] = array('parent_id' => '','category_name' => 'Корень','category_url' => '');
    $array = array();
    unset($tree["sqlIN"]);
    //print_array($tree); echo "<hr>";
    foreach ($tree as $id => $item) {
      //echo print_array($tree[$item['parent_id']])."<br>";
        if (isset($tree[$item['parent_id']])) {
            $tree[$item['parent_id']]['sub'][$item['mega']][$id] =& $tree[$id];
        }
        
        /*if (isset($tree[$item['parent_id']])) {
        $tree[$item['parent_id']]['sub'][$id] =& $tree[$id];
        $array[$item['parent_id']]['sub'][$item["mega"]] =& $tree[$id];
          
      }*/
    } /*echo "<hr>";
    print_array($tree[0]['sub']);
    die("OK");*/
    return $tree[0]['sub'];   
}

function getOptionMenu($array, $parent_id = 0, $style=0, $cat=0) {
    if (empty($array[$parent_id])) return FALSE;
    $nbsp = "";$sl = ''; if ($parent_id) $style += 3; else $style = 0;
	for($i=0;$i<$style;$i++) $nbsp .= '&nbsp;';
    //echo "<select name='parent'><option disabled>Родительская категория</option>";
    foreach($array[$parent_id] as $item) { 
        if ($item["id_ct"] == $cat) $sl="selected"; else $sl = "";
        echo "<option value='{$item["id_ct"]}' {$sl}>{$nbsp}{$item["title_ct"]}</option>";
            getOptionMenu($array, $item["id_ct"], $style, $cat);
    }
    //echo "</select>";
}
/*
function getTree($array, $parent_id = 0) {
    global $arry;
    if (empty($array[$parent_id])) return FALSE;

    //echo "<ul>";
    foreach($array[$parent_id] as $item) {
       // echo "<li>".$item["title_ct"];
            $arry[] = $item;
            $arry["children"] = getTree($array, $item["id_ct"]);
       // echo "</li>";
    }
    //echo "</ul>";
    return $arry;
}*/
/*
function array_tree($array, $id = 'id_ct', $parent_id = 'parent_id', $children = 'children') {
    $tree = [[$children => []]];
    $references = [&$tree[0]];

    foreach($array as $item) {
        if(isset($references[$item[$id]])) {
            $item[$children] = $references[$item[$id]][$children];
        }

        $references[$item[$parent_id]][$children][] = $item;
        $references[$item[$id]] =& $references[$item[$parent_id]][$children][count($references[$item[$parent_id]][$children]) - 1];
    }

    return $tree[0][$children];
}*/

function getCat($admin = false) {
    global $connect,$config;

    $query = "SELECT * FROM {$config["prefix"]}categories";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $cat = array();
    while ($row = mysqli_fetch_assoc($request)) {
		if ($admin)
			$cat[$row["id_ct"]] = $row;
		else	
			$cat[$row["slug_ct"]] = $row;
	} return $cat;
}

function addCat() {
 	global $connect,$config;

    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
    $parent = (int)$_POST['parent'];
    $mega = (int)$_POST['mega'];
    $last = (int)$_POST['last'];
    $visible = (int)$_POST['visible'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У рубрики <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=categories"); 
	}
	
	if (!preg_match("/^[0-9a-z_]+$/", $slug)) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> В адресе у рубрики <u><b>не должно быть запрещенных символов!</b></u></div>";redirect("index.php?view=categories"); 
	}
	
	$query = "SELECT id_ct FROM {$config["prefix"]}categories WHERE slug_ct = '{$slug}' LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У рубрики <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=categories"); 
	}

    $query = "INSERT INTO {$config["prefix"]}categories (title_ct, slug_ct, parent_id, mega, last, visible) VALUES ('$title', '$slug', '$parent', '$mega', '$last', '$visible')";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/cat/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/cat/"; 
						/*$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	*/
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/cat/tmp/$baseimgName");
							$thumb->save("{$dirname}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/cat/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}categories SET img = '{$baseimgName}' WHERE id_ct = {$id}");
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/cat/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Рубрика успешно добавлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При добавлении рубрики произошла ошибка!</div>";
	} redirect("index.php?view=categories");
    
}

function editCat($id) {
 	global $connect,$config;
	
	$id = abs((int)$id);
    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
	$parent = (int)$_POST['parent'];
    $mega = (int)$_POST['mega'];
    $last = (int)$_POST['last'];
	$visible = (int)$_POST['visible'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У рубрики <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=edit_categories&id={$id}"); 
	}
	
	if (!preg_match("/^[0-9a-z_]+$/", $slug)) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> В адресе у рубрики <u><b>не должно быть запрещенных символов!</b></u></div>";redirect("index.php?view=edit_categories&id={$id}"); 
	}
	
	$query = "SELECT id_ct FROM {$config["prefix"]}categories WHERE slug_ct = '{$slug}' AND id_ct != {$id} LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У рубрики <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=edit_categories&id={$id}"); 
	}

    $query = "UPDATE {$config["prefix"]}categories SET title_ct = '$title', slug_ct = '$slug', parent_id = '$parent', mega = '$mega', last = '$last', visible = '$visible' WHERE id_ct = {$id}";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > -1) {
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/cat/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/cat/"; 
						/*$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	*/
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/cat/tmp/$baseimgName");
							$thumb->save("{$dirname}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/cat/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}categories SET img = '{$baseimgName}' WHERE id_ct = {$id}");
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/cat/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Рубрика успешно обновлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении рубрики произошла ошибка!</div>";
	} redirect("index.php?view=categories");
    
}

function delCat($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "SELECT id FROM {$config["prefix"]}articles WHERE category = {$id} LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У рубрики <b>не должно быть записей</b> пожалуйста удалите сначала все записи из удаляемой рубрики!</div>";redirect("index.php?view=categories"); 
	}
	
	$query = "DELETE FROM {$config["prefix"]}categories WHERE id_ct = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Рубрика успешно удалена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении рубрики произошла ошибка!</div>";
	}
}

function getNavi($page, $pages_count) { if (!$page) $page = 1;
	$action = explode("/", $_SERVER["REQUEST_URI"]);
	$action = clearUrl($action);
	if (strrpos($action[0], 'query=') == 1) {
		$action = urldecode($action[0]);
			$action = explode("=", $action);
			$action = explode("&", $action[1]);
			$action = $action[0];
		$action = "?query={$action}&";
	} else $action = "?";
	
	$action = "?";
	foreach($_GET as $key=>$item)
		if ($key=='page') continue; else $action .= $key.'='.$item.'&'; 
	
    if($page > 1){$startpage = "<li><a href=\"{$action}page=1\">«</a></li>";}
    if($page < $pages_count){$endpage = "<li><a href=\"{$action}page={$pages_count}\">»</a></li>";}
    if($page - 2 > 0){$page2left = "<li><a href=\"{$action}page=" .($page-2). "\">".($page-2)."</a></li>";}
    if($page - 1 > 0){ $page1left = "<li><a href=\"{$action}page=" .($page-1). "\">".($page-1)."</a></li>";}
    if($page + 2 <= $pages_count){$page2right = "<li><a href=\"{$action}page=" .($page+2). "\">".($page+2)."</a></li>";}
    if($page + 1 <= $pages_count){$page1right = "<li><a href=\"{$action}page=" .($page+1). "\">".($page+1)."</a></li>";}
    echo "<div class=\"contentBox-pager\"><ul>{$startpage}{$page2left}{$page1left}<li class=\"active\">{$page}</li>{$page1right}{$page2right}{$endpage}</ul></div>";
}

function getArticles($id = false, $start_pos = false, $perpage = false, $search=false) {
    global $connect,$config;
	
	 if(is_array($id)) {
                foreach($id as $it)
                    if ($ig) $ig .= ", ".$it;
                        else $ig .= $it;
                $id = " WHERE D.category IN ({$ig}) ";
            }	elseif ($id) {$id = abs((int)$id); $id = " WHERE D.category = {$id}";} else $id = "";
	if ($search) {$search = " WHERE D.text LIKE '%{$search}%' OR D.quote LIKE '%{$search}%' OR D.title LIKE '%{$search}%'";} else $search = "";
    if ($perpage) {
        if (!$start_pos) $start_pos = 0;
        $limit = " LIMIT $start_pos, $perpage";
    } else {$limit = "";}

    $query = "SELECT *,D.img as imgg, DATE_FORMAT(date, '%m.%d.%Y') as mdate, DATE_FORMAT(date, '%h:%i') as hdate FROM {$config["prefix"]}articles AS D LEFT JOIN {$config["prefix"]}categories AS C ON D.category = C.id_ct{$id}{$search} ORDER BY D.id DESC{$limit}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $articles = array();
    $articles = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $articles;
}

function addArticle() {
 	global $connect,$config;

    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
    $keywords = clearData($_POST['keywords']);
    $description = clearData($_POST['description']);
    $quote = clearData($_POST['quote'], false);
    $category = (int)$_POST['category'];
    $text = $_POST['text'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У записи <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=articles"); 
	}
	
	$query = "SELECT id FROM {$config["prefix"]}articles WHERE slug = '{$slug}' LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У записи <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=articles"); 
	}

    $query = "INSERT INTO {$config["prefix"]}articles (title, keywords, description, slug, quote, text, views, category, date) 
					VALUES ('$title', '$keywords', '$description', '$slug', '$quote', '$text', 0, {$category}, NOW())";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/articles/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/articles/"; 
						$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/articles/tmp/$baseimgName");
							$thumb->save("{$dirname}{$path_root}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/articles/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}articles SET img = '{$baseimgName}', path = '{$path_db}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/articles/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
        
        if ($_FILES['genesis']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['genesis']['name']));
                $baseimgName = "{$id}_genesis.{$baseimgExt}";
                $baseimgTmpName = $_FILES['genesis']['tmp_name'];
                $baseimgSize = $_FILES['genesis']['size'];
                $baseimgType = $_FILES['genesis']['type'];
                $baseimgError = $_FILES['genesis']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] .= "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/articles/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/articles/"; 
						$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/articles/tmp/$baseimgName");
							$thumb->save("{$dirname}{$path_root}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/articles/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}articles SET img_genesis = '{$baseimgName}', path = '{$path_db}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/articles/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Запись успешно добавлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При добавлении записи произошла ошибка!</div>";
	} redirect("index.php?view=articles");
    
}

function editArticle($id) {
 	global $connect,$config;
	$id = abs((int)$id);
	
    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
    $keywords = clearData($_POST['keywords']);
    $description = clearData($_POST['description']);
    $quote = clearData($_POST['quote'], false);
    $category = (int)$_POST['category'];
    $text = $_POST['text'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У записи <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=edit_article&id={$id}"); 
	}
	
	$query = "SELECT id FROM {$config["prefix"]}articles WHERE slug = '{$slug}' AND id != {$id} LIMIT 1";
	$request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У записи <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=edit_article&id={$id}"); 
	}

	$query = "UPDATE {$config["prefix"]}articles SET title = '$title',slug = '$slug',keywords = '$keywords',description = '$description',quote = '$quote',text = '$text',category = {$category},date = NOW() WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/articles/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/articles/"; 
						$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/articles/tmp/$baseimgName");
							$thumb->save("{$dirname}{$path_root}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/articles/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}articles SET img = '{$baseimgName}', path = '{$path_db}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/articles/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
        
            if ($_FILES['genesis']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['genesis']['name']));
                $baseimgName = "{$id}_genesis.{$baseimgExt}";
                $baseimgTmpName = $_FILES['genesis']['tmp_name'];
                $baseimgSize = $_FILES['genesis']['size'];
                $baseimgType = $_FILES['genesis']['type'];
                $baseimgError = $_FILES['genesis']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] .= "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/articles/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/articles/"; 
						$path_root = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						$path_thumb = date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/thumb/";
						$path_db = "/files/articles/".date("Y")."/".date("m")."/".date("W")."/".date("N")."/".$id."/";
						
						if (!file_exists($dirname.$path_root)) {
							mkdir($dirname.$path_thumb, 0755, true);
						}	
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/articles/tmp/$baseimgName");
							$thumb->save("{$dirname}{$path_root}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/articles/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}articles SET img_genesis = '{$baseimgName}', path = '{$path_db}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/articles/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Запись успешно обновлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении записи произошла ошибка!</div>";
	} redirect("index.php?view=articles");
    
}

function delArticle($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "DELETE FROM {$config["prefix"]}articles WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Запись успешно удалена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении записи произошла ошибка!</div>";
	}
}

function delSlider($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "DELETE FROM {$config["prefix"]}sliders WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Слайд успешно удален!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении слайда произошла ошибка!</div>";
	}
}

function getSliders() {
    global $connect,$config;

    $query = "SELECT * FROM {$config["prefix"]}sliders";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $sliders = array();
	while ($row = mysqli_fetch_assoc($request)) {
        $sliders[$row["id"]] = $row;
	}
    return $sliders;
}

function getSlider($id) {
    global $connect,$config;
	$id = (int)$id;	
	
    $query = "SELECT * FROM {$config["prefix"]}sliders WHERE `id` = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $slider = array();
    $slider = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $slider[0];
}

function addSlider() {
 	global $connect,$config;

    $title = clearData($_POST['title']);
    $desc = clearData($_POST['desc']);
    $button = clearData($_POST['button']);
    $href = clearData($_POST['href']);
	
	if (!$_FILES['baseimg']['name']) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У слайдера должна быть картинка!</div>";redirect("index.php?view=slider"); 
	}

    $query = "INSERT INTO {$config["prefix"]}sliders (`href`, `date`) 
					VALUES ('$href', NOW())";//echo $query; die;
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/sliders/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/sliders/"; 
						
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/sliders/tmp/$baseimgName");
							$thumb->save("{$dirname}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/sliders/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}sliders SET img = '{$baseimgName}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/sliders/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Слайд успешно добавлен!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При добавлении слайда произошла ошибка!</div>";
	} redirect("index.php?view=slider");
    
}

function editSlider($id) {
 	global $connect,$config;
	$id = abs((int)$id);
	
    $title = clearData($_POST['title']);
    $desc = clearData($_POST['desc']);
    $button = clearData($_POST['button']);
    $href = clearData($_POST['href']);
	
	if (!$_FILES['baseimg']['name']) {
	//	$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У слайдера должна быть картинка!</div>";redirect("index.php?view=slider"); 
	}

	$query = "UPDATE {$config["prefix"]}sliders SET href = '$href',date = NOW() WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
			define('SIZE', '1048576');
		
		if ($_FILES['baseimg']['name']) {
				$baseimgExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['baseimg']['name']));
                $baseimgName = "{$id}.{$baseimgExt}";
                $baseimgTmpName = $_FILES['baseimg']['tmp_name'];
                $baseimgSize = $_FILES['baseimg']['size'];
                $baseimgType = $_FILES['baseimg']['type'];
                $baseimgError = $_FILES['baseimg']['error'];
                $error = "";
                
                if (!in_array($baseimgType, $types)) $error .= "Допустимые расширения - .gif, .jpg, .png <br />";
                if ($baseimgSize > SIZE) $error .= "Максимальный вес файла - 1 Мб";
                if ($baseimgError) $error .= "Ошибка при загрузке файла. Возможно, файл слишком большой";
                
                if (!empty($error)) $_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка при загрузке миниатюры!</strong> <br /> {$error}</div>";

                if (empty($error)) {
                    if (@move_uploaded_file($baseimgTmpName, "../files/sliders/tmp/$baseimgName")) {
						$dirname = $_SERVER['DOCUMENT_ROOT']."/files/sliders/"; 
				
						require_once ('../library/ThumbLib/ThumbLib.php'); 
							
							$thumb = PhpThumbFactory::create("../files/sliders/tmp/$baseimgName");
							$thumb->save("{$dirname}{$baseimgName}", $baseimgExt);
							
                        @unlink("../files/sliders/tmp/$baseimgName");
						mysqli_query($connect, "UPDATE {$config["prefix"]}sliders SET img = '{$baseimgName}' WHERE id = {$id}");
					   
                    } else {
						$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> <br /> Не удалось переместить загруженные изображения. Проверьте права на папки в каталоге <b>files/sliders/tmp/$baseimgName</b></div>";
                    } 
                }
        }	
		
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Слайд успешно обновлен!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении слайда произошла ошибка!</div>";
	} redirect("index.php?view=slider");
    
}

function updateViews($id) {
	global $connect,$config;
	$id = abs((int)$id);
	
    $query = "SELECT id, views FROM {$config["prefix"]}articles WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $views = array();
    if (mysqli_num_rows($request) > 0) {
		$views = mysqli_fetch_all($request, MYSQLI_ASSOC);
		$views[0]["views"] += 1;
		
		$query = "UPDATE `{$config["prefix"]}articles` SET `views`='{$views[0]["views"]}' WHERE id = {$views[0]["id"]}";
		$request = mysqli_query($connect, $query) or
			die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	}
	return TRUE;
}

function getPopularPosts() {
    global $connect,$config;
	
    $query = "SELECT *, DATE_FORMAT(date, '%m.%d.%Y') as mdate FROM {$config["prefix"]}articles AS D LEFT JOIN {$config["prefix"]}categories AS C ON D.category = C.id_ct ORDER BY D.views DESC LIMIT 4";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $news = array();
    $news = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $news;
}


function getPost($slug = false, $id = false) {
    global $connect,$config; 
	$slug = clearData($slug);
    $id = (int)$id;
	
	if ($id) {
		$id = abs((int)$id);
		$slug = " WHERE D.id = '{$id}'";
        $query = "SELECT *,D.img as imgg, DATE_FORMAT(date, '%m.%d.%Y') as mdate, DATE_FORMAT(date, '%h:%i') as hdate FROM {$config["prefix"]}articles AS D LEFT JOIN {$config["prefix"]}categories AS C ON D.category = C.id_ct{$slug} ORDER BY D.id DESC LIMIT 1";
	} else {
		$query = "SELECT * FROM `warta_articles` WHERE `slug` = '{$slug}.html'";
	}
	
    
    //die($query);
    $request = mysqli_query($connect, $query) or
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $post = array();
    $post = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $post[0];
}


function getPages($admin = false) {
    global $connect,$config;

    $query = "SELECT * FROM {$config["prefix"]}pages";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $pages = array();
	while ($row = mysqli_fetch_assoc($request)) {
		if ($admin) {
			$pages[$row["id"]] = $row;
		} else {
			$pages["main"][] = $row;
		}
	}
    return $pages;
}

function getPage($slug = false, $id = false) {
    global $connect,$config;
	$slug = clearData($slug);
    $id = (int)$id;
	
	if ($id) {
		$id = abs((int)$id);
		$slug = " WHERE id = '{$id}'";
	} else {
		$slug = " WHERE slug = '{$slug}'";
	}	
	
    $query = "SELECT * FROM {$config["prefix"]}pages{$slug} LIMIT 1";//die($query);
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $page = array();
    $page = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $page[0];
}

function addPage() {
 	global $connect,$config;

    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
    $keywords = clearData($_POST['keywords']);
    $description = clearData($_POST['description']);
    $text = $_POST['text'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У страницы <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=pages"); 
	}
	
	$query = "SELECT id FROM {$config["prefix"]}pages WHERE slug = '{$slug}' LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У страницы <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=pages"); 
	}

    $query = "INSERT INTO {$config["prefix"]}pages (title, keywords, description, slug, text) 
					VALUES ('$title', '$keywords', '$description', '$slug', '$text')";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Страница успешно добавлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При добавлении страницы произошла ошибка!</div>";
	} redirect("index.php?view=pages");
    
}

function editPage($id) {
 	global $connect,$config;
	$id = abs((int)$id);
	
    $title = clearData($_POST['title']);
    $slug = clearData($_POST['slug']);
    $keywords = clearData($_POST['keywords']);
    $description = clearData($_POST['description']);
    $text = $_POST['text'];
	
	if (!$title || !$slug) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У страницы <b>минимум</b> должно быть название и адрес!</div>";redirect("index.php?view=edit_page&id={$id}"); 
	}
	
	$query = "SELECT id FROM {$config["prefix"]}pages WHERE slug = '{$slug}' AND id != {$id} LIMIT 1";
	$request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["id"]) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У страницы <b>должен быть уникальный</b> адрес! Введенный Вами адрес уже используется!</div>";redirect("index.php?view=edit_page&id={$id}"); 
	}

	$query = "UPDATE {$config["prefix"]}pages SET title = '$title',slug = '$slug',keywords = '$keywords',description = '$description',text = '$text' WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Страница успешно обновлена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении страницы произошла ошибка!</div>";
	} redirect("index.php?view=pages");
    
}

function delPage($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "DELETE FROM {$config["prefix"]}pages WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Страница успешно удалена!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении страницы произошла ошибка!</div>";
	}
}

function addFeedback() {
    global $connect,$config;
	
	if (!$config["feedback"]) die('<h2>Обратная связь временно недоступна.</h2>');
	
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);
	$str = "{$name}|{$phone}|{$message}";
	
	if ($str == $_SESSION["form"]) die('<h2>Повторная отправка формы!</h2>');
	$_SESSION["form"] = $str;
	
    if (empty($name) || empty($phone) || empty($message)) {
        die('<h2>Заполните все поля!</h2>');
    } else {
        $name = clearData($name);
        $phone = clearData($phone);
        $message = clearData($message);

        $query = "INSERT INTO {$config["prefix"]}feedback (name, phone, message, date)
                    VALUES ('$name', '$phone', '$message', NOW())";
        $request = mysqli_query($connect, $query) or
            die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

        if (mysqli_affected_rows($connect) > 0) {
                 $message = "<br /><br />
                    Новая заявка на сайте:<br />
                    Дата: ".date('d.m.Y - H:i:s')."<br />
                    Имя: {$name}<br />
                    Телефон: {$phone}
                 ";
                 send_mail('wartasu@yandex.ru', 'На Вашем сайте новая заявка', $message, 'info@warta.su');
            
            die('<h2>Сообщение успешно отправлено!</h2>');
        } else {
            die('<h2>Ошибка при отправке сообщения!</h2>');
        }
    }
}

function is_main() {
	global $action;
	if ($action[0] == "main") return TRUE;
		else return FALSE;
}

function drawSlash() {
	if (!is_main()) echo "/";
}

function getFeedback($false = false, $start_pos = false, $perpage = false) {
    global $connect,$config;

    if ($perpage) {
        if (!$start_pos) $start_pos = 0;
        $limit = " LIMIT $start_pos, $perpage";
    } else {$limit = "";}

    $query = "SELECT * FROM {$config["prefix"]}feedback ORDER BY `id` DESC{$limit}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $feedback = array();
    $feedback = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $feedback;
}

function getFeed($id) {
    global $connect,$config;
	$id = abs((int)$id);
	
    $query = "SELECT * FROM {$config["prefix"]}feedback WHERE `id` = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $feedback = array();
    $feedback = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $feedback[0];
}

function delFeedback($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "DELETE FROM {$config["prefix"]}feedback WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Тикет успешно удален!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении тикета произошла ошибка!</div>";
	}
}

function auth($login, $passwd) {
	global $connect,$config;
	$login = clearData($login);
	$passwd = clearData($passwd);
	$passwd = md5("SMARTMEDIA".$passwd);
	
	$query = "SELECT * FROM {$config["prefix"]}auth WHERE login='{$login}' AND passwd='{$passwd}' LIMIT 1";
	$request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	
	$auth = array();
	$auth = mysqli_fetch_all($request, MYSQLI_ASSOC);
	
	if (!empty($auth[0]["login"]) && $auth[0]["passwd"]) {
		return "done";
	} else {
		return "Неверная пара логин/пароль";
	}
 
}

function updateAuth() {
    global $connect,$config;
	
	$login = clearData($_POST["login"]);
	$passwd = clearData($_POST["passwd"]);
	
	if (!$login || !$passwd){$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> Заполните все поля!</div>";redirect("index.php?view=user");}		
	$passwd = md5("SMARTMEDIA".$passwd);
	
	$query = "UPDATE {$config["prefix"]}auth SET login = '$login', passwd = '$passwd' WHERE id = 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	
	if (mysqli_affected_rows($connect) > 0) {$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Профиль успешно обновлен!</div>"; $_SESSION["aho"] = "true";} 
		else {$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении профиля произошла ошибка или Вы ничего не меняли!</div>";}
			redirect("index.php?view=user");
}

function getMedia($false = false, $start_pos = false, $perpage = false) {
    global $connect,$config;

    if ($perpage) {
        if (!$start_pos) $start_pos = 0;
        $limit = " LIMIT $start_pos, $perpage";
    } else {$limit = "";}

    $query = "SELECT * FROM {$config["prefix"]}video ORDER BY `id` DESC{$limit}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $media = array();
    $media = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $media;
}

function addMedia() {
    global $connect,$config;
	$title = clearData($_POST["name"]);
	$video = clearData($_POST["video"]);
	
	if (!$title) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У виджета <b>минимум</b> должно быть название!</div>";redirect("index.php?view=video"); 
	}
	
	$query = "INSERT INTO {$config["prefix"]}video (name, video) VALUES ('$title', '$video')";
	$request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

		if (mysqli_affected_rows($connect) > 0) {		
			$_SESSION['answer']['result'] .= "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Виджет успешно добавлен!</div>";
		} else {
			$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При добавлении виджета произошла ошибка!</div>";
		} redirect("index.php?view=video");
		

}

function editMedia($id) {
 	global $connect,$config;
	
	$id = abs((int)$id);
	$title = clearData($_POST["name"]);
	$video = clearData($_POST["video"]);
	
	if (!$title) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> У виджета <b>минимум</b> должно быть название!</div>";redirect("index.php?view=video"); 
	}

    $query = "UPDATE {$config["prefix"]}video SET name = '$title', video = '$video' WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

			if (mysqli_affected_rows($connect) > 0) {
					
			$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Виджет успешно обновлен!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При обновлении виджета произошла ошибка!</div>";
	} redirect("index.php?view=video");	
  
}

function delMedia($id) {
	global $connect,$config;	
	$id = abs((int)$id);
	


	$query = "DELETE FROM {$config["prefix"]}video WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	if (mysqli_affected_rows($connect) > 0) {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-success\"><strong>Действие выполнено!</strong> Виджет успешно удален!</div>";
	} else {
		$_SESSION['answer']['result'] = "<div class=\"alert alert-danger\"><strong>Ошибка!</strong> При удалении Виджета произошла ошибка!</div>";
	}
}

function uploadImage($id) {
	global $connect,$config;
	$id = abs((int)$id);
	
    $file = $_FILES['userfile']['name'];
    $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $file));
    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png");
		define('SIZE', '1048576');
		
    if($_FILES['userfile']['size'] > SIZE){
        $res = array("answer" => "Ошибка! Максимальный вес файла - 1 Мб!");
        exit(json_encode($res));
    }
    
    if($_FILES['userfile']['error']) {
        $res = array("answer" => "Ошибка! Возможно, файл слишком большой.");
        exit(json_encode($res));
    }
    
    if(!in_array($_FILES['userfile']['type'], $types)){
        $res = array("answer" => "Допустимые расширения - .gif, .jpg, .png");
        exit(json_encode($res));
    }
	
	$query = "SELECT * FROM {$config["prefix"]}media WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	
    $row = mysqli_fetch_assoc($request);
    if($row['img']) {
        $images = explode("|", $row['img']);
        $lastimg = end($images);
        $lastnum = preg_replace("#\d+_(\d+)\.\w+#", "$1", $lastimg); // 1_1.ext
        $lastnum += 1;
			$newimg = "{$id}_{$lastnum}.{$ext}";
        $images = "{$row['img']}|{$newimg}"; 
    } else {
        $newimg = "{$id}_0.{$ext}";
        $images = $newimg; 
    }
    
	if (@move_uploaded_file($_FILES['userfile']['tmp_name'], "..{$row['path']}{$newimg}")) {
		
		$query = "UPDATE {$config["prefix"]}media SET img = '$images', date = NOW() WHERE id = {$id}";
		$request = mysqli_query($connect, $query) or
			die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
			
		$res = array("answer" => "OK", "file" => $newimg);
        exit(json_encode($res));
	} else {
		$res = array("answer" => "Не удалось переместить загруженную фотографию. Проверьте права на папки в каталоге {$row['path']}{$newimg}");
		exit(json_encode($res));
	} 
	
}

function removeImage() {
    global $connect,$config; 

	$id = (int)$_POST['id'];
	$img = clearData($_POST["delet"]);
	
	$query = "SELECT * FROM {$config["prefix"]}media WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
	$row = mysqli_fetch_assoc($request);
    $images = explode("|", $row['img']);
        foreach($images as $item) {
            if($item == $img) continue;
            if (!isset($files)) $files = $item;
				else $files .= "|$item";
        }
		
	$query = "UPDATE {$config["prefix"]}media SET img = '$files', date = NOW() WHERE id = {$id}";
	$request = mysqli_query($connect, $query) or
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	
	if (mysqli_affected_rows($connect) > 0) {
		@unlink("..{$row["path"]}{$img}");
		die("OK!");
	} else {
		die("NO!");
	}
}

function getMediaFile($id) {
    global $connect,$config; 
	$id = abs((int)$id);
	
    $query = "SELECT * FROM {$config["prefix"]}video WHERE id = {$id}";
    $request = mysqli_query($connect, $query) or
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $media = array();
    $media = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $media[0];
}

function is_page($str) {
	$str = explode("=", $str);
	if ($str[0] == "?page" && is_numeric($str[1])) return $_GET["page"] = $str[1];
		else return false;
}

function getAdminNavi($page, $pages_count, $module) {
    if($page > 1){$startpage = "<a href=\"{$module}page=1\" class=\"btn btn-sm btn-primary\">«</a>";}
    if($page < $pages_count){$endpage = "<a href=\"{$module}page={$pages_count}\" class=\"btn btn-sm btn-primary\">»</a>";}
    if($page - 2 > 0){$page2left = "<a href=\"{$module}page=" .($page-2). "\" class=\"btn btn-sm btn-primary\">".($page-2)."</a>";}
    if($page - 1 > 0){ $page1left = "<a href=\"{$module}page=" .($page-1). "\" class=\"btn btn-sm btn-primary\">".($page-1)."</a>";}
    if($page + 2 <= $pages_count){$page2right = "<a href=\"{$module}page=" .($page+2). "\" class=\"btn btn-sm btn-primary\">".($page+2)."</a>";}
    if($page + 1 <= $pages_count){$page1right = "<a href=\"{$module}page=" .($page+1). "\" class=\"btn btn-sm btn-primary\">".($page+1)."</a>";}
    echo "<div class='admin-navi'>{$startpage}{$page2left}{$page1left}<a class='btn btn-sm btn-info'>{$page}</a>{$page1right}{$page2right}{$endpage}</div>";
}

function send_mail($to, $subj, $text, $from = false, $file = array(), $contentType = 'text/html', $charset = 'utf-8') {
    $z = $text;
    $un = strtoupper(uniqid(time()));
    if (isset($file['path']) && is_array($file['path'])) {
      if (!isset($file['name']) || !is_array($file['name']) || count($file['name']) != count($file['path'])) {
        $file['name'] = array();
        foreach ($file['path'] as $path) {
          $file['name'][] = basename($path);
        }
      }
      $z = "------------".$un."\nContent-Type:".$contentType.";\n";
      $z .= "Content-Transfer-Encoding: 8bit\n\n$text\n\n";
      foreach($file['path'] as $idx => $path) {
        $f   = fopen($path, 'rb');
        $z .= "------------".$un."\n";
        $z .= "Content-Type: application/octet-stream;";
        $z .= "name=\"".basename($path)."\"\n";
        $z .= "Content-Transfer-Encoding:base64\n";
        $z .= "Content-Disposition:attachment;";
        $z .= "filename=\"".$file['name'][$idx]."\"\n\n";
        $z .= chunk_split(base64_encode(fread($f, filesize($path))))."\n";
        fclose($f);
      }
    }
    $head = "To: $to\n";
    if ($from) {
      $head .= "From: $from\n";
      $head .= "Reply-To: $from\n";
    }
    $head .= "X-Mailer: PHPMail Tool\n";
    $head .= "Mime-Version: 1.0\n";
    $head .= "Content-Type:";
    if ($z == $text) {
       $head .= $contentType."; charset=".$charset;
    } else {
      $head .= "multipart/mixed;";
    }
    $head .= "boundary=\"----------".$un."\"\n\n";
    return mail($to, $subj, $z, $head);
}

function is_user($uid=false, $network=false, $id=false) {
    global $connect, $config;
    if (!$id)
		$query = "SELECT * FROM {$config["prefix"]}auth where uid='{$uid}' and network='{$network}' limit 1";
	else
		$query = "SELECT * FROM {$config["prefix"]}auth where id='{$id}' limit 1";
    
	$request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $user = mysqli_fetch_all($request, MYSQLI_ASSOC);
	if ($user[0]['role'] > 0) $user[0]['admin'] = 'ADMIN';
	return $user[0];
}

function reg_user($user) {
	global $connect, $config;
	$query = "INSERT INTO {$config["prefix"]}auth (login,passwd,network,uid,first_name,last_name,nickname,photo,role) 
				VALUES ('', '', '{$user['network']}', '{$user['uid']}', '{$user['first_name']}', '{$user['last_name']}', '{$user['nickname']}', '{$user['photo']}', '0')";
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$user = is_user(false,false,$id);
		if (!empty($user['id'])) $_SESSION['auth'] = $user;
	}
	return;
}

function is_auth() {
	if (!empty($_SESSION['auth']['id'])) return true;
	return false;
}

function getCatVop() {
    global $connect, $config;
	$query = "SELECT * FROM {$config["prefix"]}catvop";
    
	$request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $cat = mysqli_fetch_all($request, MYSQLI_ASSOC);
	return $cat;
}

function count_rows($id = false, $table, $field, $search = false) {
	global $connect,$config;
	if(is_array($id)) {
		foreach($id as $it)if ($ig) $ig .= ", ".$it;else $ig .= $it;$id = " WHERE {$field} IN ({$ig}) ";
	}elseif ($id) {$id = abs((int)$id); $id = " WHERE {$field} = {$id}";}else $id = "";
	if ($search) {$search = " WHERE text LIKE '%".urldecode(clearData($search))."%' OR title LIKE '%".urldecode(clearData($search))."%'";} else $search = "";
	
    $query = "SELECT COUNT({$field}) FROM {$config["prefix"]}{$table}{$id}{$search}";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
    
	$count_news = array();
    $count_news = mysqli_fetch_row($request);
    return $count_news[0];
}

function getFunction($id = false, $table, $field, $func, $perpageFunction = false, $search = false) {
	global $connect,$config; 
	
	if ($perpageFunction) $config["perpage"] = $perpageFunction;
	if (isset($_GET['page'])) {
			$page = (int)$_GET['page'];
			if ($page < 1) $page = 1;
	} else { $page = 1; }
	
	$count_rows = count_rows($id, $table, $field, $search);
    $pages_count = ceil($count_rows / $config["perpage"]);
	if (!$pages_count) $pages_count = 1;
    if ($page > $pages_count) $page = $pages_count;
    $start_pos = ($page - 1) * $config["perpage"];
   
   $return = $func($id, $start_pos, $config["perpage"], $search);
	$config["page"] = $page;
	$config["pages_count"] = $pages_count;
   return $return;
}

function getVoprosi($id = false, $start_pos = false, $perpage = false, $search=false) {
    global $connect,$config;
	
	if (!$perpage) $perpage = $config["perpage"];
	if(is_array($id)) {foreach($id as $it) if ($ig) $ig .= ", ".$it; else $ig .= $it;$id = " where v.catid in ({$ig}) ";}
	elseif ($id) {$id = abs((int)$id); $id = " where v.catid = {$id}";} else $id = "";
	if ($search) {$search = " where v.title like '%".urldecode(clearData($search))."%' or v.text like '%".urldecode(clearData($search))."%' ";} else $search = "";
    if ($perpage) {if (!$start_pos) $start_pos = 0;$limit = " limit $start_pos, $perpage";} else {$limit = "";}
 
	$query = "select v.*,cv.name as cat_name,u.first_name,u.last_name,
				(select count(id_otvet) from {$config["prefix"]}otveti o where o.id_voprosid = v.id_vopros) as count_otvet,
				group_concat(t.name) as tags_name 
			  from sm_voprosi v 
				left join {$config["prefix"]}catvop cv on v.catid = cv.id_catvop 
				left join {$config["prefix"]}auth u on v.authorid = u.id 
				left join {$config["prefix"]}voptags_relationships r on (v.id_vopros = r.id_vopros) 
				left join {$config["prefix"]}voptags t on (t.id_voptag = r.id_voptag) {$id}{$search}
			  group by 1 desc {$limit}";
			  
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $voprosi = array();
    $voprosi = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $voprosi;
}

function str_size($str,$length) { $lng = strlen($str); if ($lng <= $length) return $str;
	$str = iconv("UTF-8","windows-1251", $str); $str = substr($str, 0, $length); $str = iconv("windows-1251", "UTF-8", $str); $str .= "..."; return $str;
}

function getVopros($id) {
    global $connect,$config;	
	$id = abs((int)$id);
	$query = "select v.*,cv.name as cat_name,u.first_name,u.last_name,
				(select count(id_otvet) from {$config["prefix"]}otveti o where o.id_voprosid = v.id_vopros) as count_otvet,
				group_concat(t.name) as tags_name 
			  from sm_voprosi v 
				left join {$config["prefix"]}catvop cv on v.catid = cv.id_catvop 
				left join {$config["prefix"]}auth u on v.authorid = u.id 
				left join {$config["prefix"]}voptags_relationships r on (v.id_vopros = r.id_vopros) 
				left join {$config["prefix"]}voptags t on (t.id_voptag = r.id_voptag) where v.id_vopros = {$id}";
			  
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    $voprosi = array();
    $voprosi = mysqli_fetch_all($request, MYSQLI_ASSOC);
    return $voprosi[0];
}

function get_uri() {
	$redirect_to = false;
	if (!empty($_GET) && is_array($_GET)) {
		$redirect_to = '/?';
		foreach($_GET as $key => $value) {
			if ($key == 'api') continue;
			$redirect_to .= $key .'='. $value.'&';
		}
		$redirect_to = substr($redirect_to, 0, -1);
	}
	if (strlen($redirect_to) < 4) $redirect_to = false;
	return $redirect_to;
}

function show_message() {
	if (!empty($_SESSION['response'])) {
		echo $_SESSION['response'];
		unset($_SESSION['response']);
	}
}

function is_email($email) {
  return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}

function getOtveti($id) {
	global $connect,$config;
	$id = abs((int)$id);
	$query = "select * from {$config["prefix"]}otveti 
				left join sm_auth on {$config["prefix"]}auth.id = {$config["prefix"]}otveti.iduser 
			  where {$config["prefix"]}otveti.id_voprosid = {$id} order by {$config["prefix"]}otveti.id_otvet desc";
			  
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    return mysqli_fetch_all($request, MYSQLI_ASSOC);
}

function delete_vopros($id) {
	if (!is_auth()) redirect();
	global $connect,$config;	
	$id = abs((int)$id);
	
	$query = "SELECT * FROM {$config["prefix"]}voprosi WHERE id_vopros = {$id} LIMIT 1";
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
	$row = array();
    $row = mysqli_fetch_all($request, MYSQLI_ASSOC);	
	if ($row[0]["authorid"]) {
		if ($_SESSION['auth']['role'] < 1) {
			if ($row[0]["authorid"] != $_SESSION['auth']['id']) {
				$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> В рот мне ноги, зачем пытаться удалить чужой вопрос?!</div>";
				redirect('/?type=vopros&id='.$id);
			}
			if (count(getOtveti($id)) > 0) {
				$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> В рот мне ноги, зачем пытаться удалить вопрос на который был получен ответ?! </div>";
				redirect('/?type=vopros&id='.$id);
			}
		}
		
		$query = "DELETE FROM {$config["prefix"]}voprosi WHERE id_vopros = {$id}";
		$request = mysqli_query($connect, $query) or
			die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		
		if (mysqli_affected_rows($connect) > 0) {
			$_SESSION['response'] = "<div class=\"message-success\">Вопрос успешно удален!</div>";
		} else {
			$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> Что то пошло не так, к такому жизнь нас не готовила!</div>";
		}
		
	} redirect();
}

function get_guestbook() {
    global $connect,$config;
	$query = "select * from {$config["prefix"]}guestbook g left join {$config["prefix"]}auth u on g.authorid = u.id order by g.book_id desc";	
    $request = mysqli_query($connect, $query) or
        die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
 
    $guestbook = array();
    while($cat =  mysqli_fetch_assoc($request)){
        $cats_ID[$cat['book_id']][] = $cat;
        $guestbook[$cat['parent_id']][$cat['book_id']] =  $cat;
    }
    return $guestbook;
}

function add_guestbook($arr) {
	if (!is_auth()) redirect();
	global $connect, $config;
	$id = !empty($arr['parent'])?abs((int)$arr['parent']):0;
	if ($id) {
		$query = "SELECT * FROM {$config["prefix"]}guestbook WHERE book_id = {$id} LIMIT 1";
		$request = mysqli_query($connect, $query) or
			die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));
		$row = array();
		$row = mysqli_fetch_all($request, MYSQLI_ASSOC);
		if (empty($row)) $id = 0;
	}
	
	$sms = !empty(trim($arr['message']))?str_size($arr['message'], 6000):'';
	if (empty($sms)) {
		$_SESSION['response'] = "<div class=\"message-error\">Пожалуйста оставьте Ваше послание!</div>";
		redirect(get_uri());
	}

	$query = "INSERT INTO {$config["prefix"]}guestbook (authorid,`date`,text,parent_id) 
				VALUES (".(int)$_SESSION['auth']['id'].", NOW(), '".clearData($sms)."', {$id})"; 
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

	if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$_SESSION['response'] = "<div class=\"message-success\">Ваше сообщение успешно опубликовано!</div>";
	} else {
		$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> Что то пошло не так, к такому жизнь нас не готовила!</div>";
	}	redirect(get_uri());
}

function add_vrach_otvet() {
	if (!is_auth()) redirect();
	$redirect_to = get_uri();
	$sms = !empty(trim($_POST['vopros']))?$_POST['vopros']:redirect($redirect_to);
	
	global $connect, $config;
	$query = "INSERT INTO {$config["prefix"]}otveti (id_voprosid,iduser,text,`date`,rating) 
				VALUES ('".(int)$_GET['id']."', ".(int)$_SESSION['auth']['id'].", '".clearData($sms)."', NOW(), 0)"; 
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$_SESSION['response'] = "<div class=\"message-success\">Ваш ответ успешно опубликован!</div>";
	} else {
		$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> Что то пошло не так, к такому жизнь нас не готовила!</div>";
	}
	
	redirect($redirect_to);
}

function clearMessageRS() {
	if (!empty($_SESSION['message-rs'])) unset($_SESSION['message-rs']);
}

function getMessageRS($field) {
	if (!empty($_SESSION['message-rs'][$field])) return $_SESSION['message-rs'][$field];
	return false;
}

function add_user_vopros($arr) {
	//$fio = !empty($arr['fio'])?$arr['fio']:'';
	if (!is_auth()) redirect();
	$email = !empty(trim($arr['email']))?$arr['email']:''; $_SESSION['message-rs']['email'] = $email;
	$cat = !empty($arr['cat'])?(int)$arr['cat']:0; $_SESSION['message-rs']['cat'] = $cat;
	$anon = !empty($arr['anon'])?1:0; $_SESSION['message-rs']['anon'] = $anon;
	$tema = !empty(trim($arr['tema']))?str_size($arr['tema'], 250):''; $_SESSION['message-rs']['tema'] = $tema;
	$text = !empty(trim($arr['text']))?str_size($arr['text'], 6000):''; $_SESSION['message-rs']['text'] = $text;
	
	$banned = $_SESSION['auth']['role'];
	$redirect_to = get_uri();
	
	$_SESSION['response'] = '';
	//if (empty($fio)) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Заполните Ф.И.О!</div>";
	if (empty($email)) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Заполните email!</div>";
	if (!is_email($email)) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Заполните правильно поле email!</div>";
	if (!$cat) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Пожалуйста выберите категорию вопроса!</div>";
	if (empty($tema)) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Пожалуйста укажите тему вопроса!</div>";
	if (empty($text)) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Пожалуйста расскажите нам о своей проблеме!</div>";
	
	if ($banned == -1) $_SESSION['response'] .= "<div class=\"message-error\"><strong>Ошибка:</strong> Доступ к сайту для Вас ограничен!</div>";
	
	if (!empty($_SESSION['response'])) redirect($redirect_to);
	
	global $connect, $config;
	$query = "INSERT INTO {$config["prefix"]}voprosi (title,catid,`date`,authorid,text,unknown,email) 
				VALUES ('".clearData($tema)."', {$cat}, NOW(), ".(int)$_SESSION['auth']['id'].", '".clearData($text)."', {$anon}, '".clearData($email)."')"; 
    $request = mysqli_query($connect, $query) or 
		die("You have an error in function ".__FUNCTION__." on line ".__LINE__.".<br> ".mysqli_errno($connect).": ".mysqli_error($connect));

    if (mysqli_affected_rows($connect) > 0) {
		$id = mysqli_insert_id($connect);
		$_SESSION['response'] = "<div class=\"message-success\">Ваш вопрос добавлен, ожидайте ответа!</div>";
		redirect('/?type=vopros&id='.$id);
	} else {
		$_SESSION['response'] = "<div class=\"message-error\"><strong>Ошибка:</strong> Что то пошло не так, к такому жизнь нас не готовила!</div>";
	}
	redirect($redirect_to);
}

/*
SELECT count(id) as u_count, 
	(SELECT count(id) FROM `sm_auth` WHERE role = 1) as v_count, 
	(SELECT count(id_vopros) FROM `sm_voprosi` WHERE DATE(`date`) = CURDATE()) as vop_count, 
	(SELECT count(id_otvet) FROM `sm_otveti` left join `sm_voprosi` on sm_otveti.iduser=sm_voprosi.authorid WHERE DATE(sm_voprosi.date) = CURDATE()) as otv_count, 
	(SELECT count(id_vopros) FROM `sm_voprosi`) as vop_count_all, 
	(SELECT count(id_otvet) FROM `sm_otveti` left join `sm_voprosi` on sm_otveti.iduser=sm_voprosi.authorid) as otv_count_all 
FROM `sm_auth` WHERE role < 1


select count(o.id_otvet) from sm_voprosi v left join `sm_otveti o on v.iduser = o.authorid 

*/