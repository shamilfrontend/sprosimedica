<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Редактор рубрики
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-folder-open-o"></i> Редактор рубрики
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="index.php?view=edit_categories&id=<?=$st["id_ct"]?>" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Название рубрики</label>
                                <input class="form-control" name="title" value="<?=htmlspecialchars($st["title_ct"])?>">
                            </div>
							
							<div class="form-group">
                                <label>Адрес</label>
								<div class="alert alert-danger">
									<strong>Внимание!!!</strong> Данное поле является адресом рубрики в которой будут храниться записи. http://example.ru/<b>category</b>/
									<br>Заполнять строго согласно инструкции иначе ничего работать не будет, а так же есть возможность нарушить целостность БД.<br>
									<u>В это поле разрешается записывать только латинские буквы нижнего регистра, цифры и знак подчеркивания.</u><br>
									<u>Данное поле является уникальным и не должно повторяться</u>
								</div>
                                <input class="form-control" name="slug" placeholder="example или my_example" value="<?=$st["slug_ct"]?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Рубрика</label>
								<select name='parent'>
								<option value="0">Родительская рубрика</option>
                                <?=getOptionMenu($tree, 0,0,$st["parent_id"]);?>
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
							<div class="form-group">
                                <label>Миниатюра</label>
                                <div id="thumb"><?=$img?></div>
                            </div>
							
							<!--div class="form-group">
                                <label>Мега Меню</label>
								<select name='mega'>
									<option <?php if ($st["mega"] == 0): ?>selected<?php endif; ?> value="0">Отсутствует</option>
									<option <?php if ($st["mega"] == 1): ?>selected<?php endif; ?> value="1">Первая колонка</option>
									<option <?php if ($st["mega"] == 2): ?>selected<?php endif; ?> value="2">Вторая колонка</option>
									<option <?php if ($st["mega"] == 3): ?>selected<?php endif; ?> value="3">Третья колонка</option>
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Кол-во последних записей</label>
								<select name='last'>
									<option <?php if ($st["last"] == 0): ?>selected<?php endif; ?> value="0">0</option>
									<option <?php if ($st["last"] == 2): ?>selected<?php endif; ?> value="2">2</option>
									<option <?php if ($st["last"] == 4): ?>selected<?php endif; ?> value="4">4</option>
									<option <?php if ($st["last"] == 6): ?>selected<?php endif; ?> value="6">6</option>
									<option <?php if ($st["last"] == 8): ?>selected<?php endif; ?> value="8">8</option>
									<option <?php if ($st["last"] == 10): ?>selected<?php endif; ?> value="10">10</option>
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Отображать рубрику?</label>
								<input type="checkbox" name="visible" value="1" <?php if ($st["visible"]): ?>checked<?php endif; ?>>
                            </div-->
							
                            <button type="submit" class="btn btn-primary">Обновить рубрику</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>