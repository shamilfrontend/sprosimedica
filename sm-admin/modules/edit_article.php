<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Редактор записи
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Редактор записи
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="index.php?view=edit_article&id=<?=$st["id"]?>" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Название записи</label>
                                <input class="form-control" name="title" value="<?=htmlspecialchars($st["title"])?>">
                            </div>
							
							<div class="form-group">
                                <label>Адрес</label>
								<div class="alert alert-danger">
									<strong>Внимание!!!</strong> Данное поле является адресом записи. http://example.ru/category/<b>novaya_zapis.html</b>
									<br>Заполнять строго согласно инструкции иначе ничего работать не будет, а так же есть возможность нарушить целостность БД.<br>
									<u>В это поле разрешается записывать только латинские буквы нижнего регистра, цифры и знак подчеркивания.</u><br>
									<u>Данное поле является уникальным и не должно повторяться</u>
								</div>
                                <input class="form-control" name="slug" placeholder="example или my_example" value="<?=$st["slug"]?>">
                            </div>

							<div class="form-group">
                                <label>Ключевые слова</label>
                                <input class="form-control" name="keywords" placeholder="слово, первое, второе, третье" value="<?=$st["keywords"]?>">
                            </div>
							
   							<div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" name="description" value="<?=$st["description"]?>">
                            </div>
							
							<!--div class="form-group">
                                <label>Категория</label>
                                <?php if (is_data($cat)): ?>
								<select name="category1" class="form-control">
									<?php foreach($cat as $item): ?>
									<option value="<?=$item["id_ct"]?>"<?php if ($item["id_ct"] == $st["category"]) echo " selected"; ?>><?=$item["title_ct"]?></option>
									<?php endforeach; ?>
								</select>
								<?php endif; ?>
                            </div-->
                            
                            <div class="form-group">
                                <label>Рубрика</label>
                                <select name="category" class="form-control">
                                <?=getOptionMenu($tree, 0,0,$st["category"]);?>
                                </select>
                            </div>
							
							<script type="text/javascript">
								function confirmUser() {
									var ask = confirm("Вы действительно хотите удалить миниатюру?!");
									if (ask) {
										!function ($) {
											 $("#thumb").fadeOut(500, function(){$(this).html("<input type=\"file\" name=\"baseimg\">").fadeIn(500);});
										}(window.jQuery);
									}
								}
							</script>
							<style>
								.img-thumbnail:hover {
									border: 1px dotted #A94442;
								}
							</style>
							<!--div class="form-group">
                                <label>Миниатюра</label>
                                <div id="thumb"><?=$img?></div>
                            </div-->
                            
                            <script type="text/javascript">
								function confirmUser() {
									var ask = confirm("Вы действительно хотите удалить картинку?!");
									if (ask) {
										!function ($) {
											 $("#thumb1").fadeOut(500, function(){$(this).html("<input type=\"file\" name=\"genesis\">").fadeIn(500);});
										}(window.jQuery);
									}
								}
							</script>
							<style>
								.img-thumbnail:hover {
									border: 1px dotted #A94442;
								}
							</style>
							<!--div class="form-group">
                                <label>Картинка в Мега меню</label>
                                <div id="thumb1"><?=$img1?></div>
                            </div>
							
							<div class="form-group">
                                <label>Цитата</label>
								<textarea class="form-control" name="quote" rows="5"><?=$st["quote"]?></textarea>
                            </div-->
														<div class="form-group">
                                <label>Заглавный пост</label>
								<textarea class="form-control" name="quote" id="editor2"><?=$st["quote"]?></textarea>
								<script type="text/javascript" src="/sm-admin/static/ckeditor/ckeditor.js"></script>
								<script>CKEDITOR.replace('editor2');</script>
                            </div>
                            
							<div class="form-group">
                                <label>Полный текст записи</label>
								<textarea class="form-control" name="text" id="editor1"><?=$st["text"]?></textarea>
								<script>CKEDITOR.replace('editor1');</script>
                            </div>
							
                            <button type="submit" class="btn btn-primary">Обновить запись</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>