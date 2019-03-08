<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Страницы
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-copy"></i> Страницы
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->
				<script type="text/javascript">
					function confirmUser($id) {
						var ask = confirm("Вы действительно хотите удалить страницу?!");
						if (ask) {window.location = "/sm-admin/index.php?view=del_page&id="+$id+"";}
					}
				</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Страницы на сайте <?=$lang?></h2>
						<a href="/sm-admin/index.php?view=add_page" class="btn btn-sm btn-primary">Добавить страницу</a><br><br>
                        <?php if (is_array($pages) && !empty($pages)): ?>
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Адрес</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($pages as $item): ?>
                                    <tr>
                                        <td><?=$item["title"]?></td>
                                        <td><a target="_blank" href="/<?=$item["slug"]?>.html"><?=$item["slug"]?>.html</a></td>
                                        <td style="text-align:center;">
											<a href="/sm-admin/index.php?view=edit_page&id=<?=$item["id"]?>" type="button" class="btn btn-sm btn-success">Изменить</a>
											<a href="#" onclick='confirmUser(<?=$item["id"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php else: ?>
						<div class="alert alert-warning">
							<strong>Страниц не найдено!</strong> Страниц пока нет, добавьте первую!
						</div>
						<?php endif; ?>
                    </div>
 
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>