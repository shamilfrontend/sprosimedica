<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Записи
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Записи
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->
				<script type="text/javascript">
					function confirmUser($id) {
						var ask = confirm("Вы действительно хотите удалить запись?!");
						if (ask) {window.location = "index.php?view=del_article&id="+$id+"";}
					}
				</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Записи на сайте</h2>
						<a href="index.php?view=add_article" class="btn btn-sm btn-primary">Добавить запись</a><br><br>
                        <?php if (is_array($articles) && !empty($articles)): ?>
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Рубрика</th>
                                        <th>Адрес</th>
                                        <!--th>Просмотры</th-->
                                        <th>Дата размещения</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($articles as $item): ?>
                                    <tr>
                                        <td><?=$item["title"]?></td>
                                        <td><?=$item["title_ct"]?></td>
                                        <td><a target="_blank" href="/<?=$item["slug"]?>"><?=$item["slug"]?></a></td>
                                        <!--td><?=$item["views"]?></td-->
                                        <td><?=$item["date"]?></td>
                                        <td style="text-align:center;">
											<a href="index.php?view=edit_article&id=<?=$item["id"]?>" type="button" class="btn btn-sm btn-success">Изменить</a>
											<a href="#" onclick='confirmUser(<?=$item["id"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php if ($config["pages_count"] > 1) getAdminNavi($config["page"], $config["pages_count"], "index.php?view=articles&"); ?>
						<?php else: ?>
						<div class="alert alert-warning">
							<strong>Записей не найдено!</strong> Записей пока нет, добавьте первую!
						</div>
						<?php endif; ?>
                    </div>
 
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>