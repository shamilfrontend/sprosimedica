<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Редактор слайда
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-photo"></i> Редактор слайда
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=edit_slider&id=<?=$st["id"]?>" method="POST" role="form" enctype="multipart/form-data">
							
							<!--div class="form-group">
                                <label>Первая строка</label>
                                <input class="form-control" name="title" value="<?=htmlspecialchars($st["title"])?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Вторая строка</label>
                                <input class="form-control" name="desc" value="<?=htmlspecialchars($st["desc"])?>">
                            </div-->

							<!--div class="form-group">
                                <label>Текст строки</label>
                                <input class="form-control" name="button" value="<?=htmlspecialchars($st["button"])?>">
                            </div-->
                            
                            <div class="form-group">
                                <label>Адрес строки (не обязательно заполнять)</label>
                                <input class="form-control" name="href" value="<?=htmlspecialchars($st["href"])?>">
                            </div>
							
                            <script type="text/javascript">
								function confirmUser() {
									var ask = confirm("Вы действительно хотите удалить слайд?!");
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
                                <label>Слайд (размер картинки: 653x230, размер не принципиален однако любой размер будет приведен именно к этому стандарту)</label>
                                 <div id="thumb"><?=$img?></div>
                            </div>
							
                            <button type="submit" class="btn btn-primary">Обновить слайд</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>