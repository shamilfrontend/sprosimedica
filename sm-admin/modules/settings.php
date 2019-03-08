<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Настройки
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-gear"></i> Настройки
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=settings" method="POST" role="form">
							
							<div class="form-group">
                                <label>Название сайта</label>
                                <input class="form-control" name="title" value="<?=htmlspecialchars($st["title"])?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Включить слайдер на главной?</label>
                                <input type="checkbox" name="slider" value="1" <?php if ($st["slider"]) echo 'checked';?>>
                            </div>
							
							<div class="form-group">
                                <label>Описание сайта</label>
                                <input class="form-control" name="description" value="<?=$st["description"]?>">
                            </div>
							
							<div class="form-group">
                                <label>Ключевые слова</label>
                                <input class="form-control" name="keywords" value="<?=$st["keywords"]?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Подвал сайта</label>
                                <input class="form-control" name="footer" value="<?=htmlspecialchars($st["footer"])?>">
                            </div>
                            
                            <!--div class="form-group">
                                <label>Заголовок на главной</label>
                                <input class="form-control" name="head_title" value="<?=htmlspecialchars($st["head_title"])?>">
                            </div-->
                            
                            <div class="form-group">
                                <label>Первый номер телефона</label>
                                <input class="form-control" name="vk" value="<?=$st["vk"]?>">
                            </div>
							
							<div class="form-group">
                                <label>Второй номер телефона</label>
                                <input class="form-control" name="fc" value="<?=$st["fc"]?>">
                            </div>
                            
                            <!-- ######################################################### -->
                            
                            <div class="form-group">
                                <label>Instagram</label>
                                <input class="form-control" name="l2" value="<?=$st["l2"]?>">
                            </div>
                            
                            <div class="form-group">
                                <label>VK</label>
                                <input class="form-control" name="l3" value="<?=$st["l3"]?>">
                            </div>
                            
                            <div class="form-group">
                                <label>facebook</label>
                                <input class="form-control" name="l4" value="<?=$st["l4"]?>">
                            </div>
                            
                            <div class="form-group">
                                <label>live journal</label>
                                <input class="form-control" name="l5" value="<?=$st["l5"]?>">
                            </div>
                            
                            <!-- ######################################################### -->
                            
                            
                            <div class="form-group">
                                <label>Текст на главной</label>
								<textarea class="form-control" name="text" id="editor1"><?=$st["text"]?></textarea>
								<script type="text/javascript" src="static/ckeditor/ckeditor.js"></script>
								<script>CKEDITOR.replace('editor1');</script>
                            </div>
                            
                            <!--div class="form-group">
                                <label>Кол-во блоков под слайдером</label>
                                <select name="block1">
                                    <option value="3" <?php if ($st["block1"] == "3") echo "selected"; ?>>3</option>
                                    <option value="6" <?php if ($st["block1"] == "6") echo "selected"; ?>>6</option> 
                                    <option value="9" <?php if ($st["block1"] == "9") echo "selected"; ?>>9</option>
                                    <option value="12" <?php if ($st["block1"] == "12") echo "selected"; ?>>12</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Кол-во блоков услуг</label>
                                <select name="block2">
                                    <option value="3" <?php if ($st["block2"] == "3") echo "selected"; ?>>3</option>
                                    <option value="6" <?php if ($st["block2"] == "6") echo "selected"; ?>>6</option>
                                    <option value="9" <?php if ($st["block2"] == "9") echo "selected"; ?>>9</option>
                                    <option value="12" <?php if ($st["block2"] == "12") echo "selected"; ?>>12</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>vkontakte</label>
                                <input class="form-control" name="vk" value="<?=$st["vk"]?>">
                            </div>
							
							<div class="form-group">
                                <label>facebook</label>
                                <input class="form-control" name="fc" value="<?=$st["fc"]?>">
                            </div>
							
							<div class="form-group">
                                <label>instagram</label>
								<input class="form-control" name="inst" value="<?=$st["inst"]?>">
                            </div-->

                            <button type="submit" class="btn btn-primary">Обновить настройки</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>