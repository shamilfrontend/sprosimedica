<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Виджет
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-film"></i> Виджет
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->
				<script type="text/javascript">
					function confirmUser($id) {
						var ask = confirm("Вы действительно хотите удалить Виджет?!");
						if (ask) {window.location = "/sm-admin/index.php?view=del_video&id="+$id+"";}
					}
				</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Виджет на сайте</h2>
						<a href="/sm-admin/index.php?view=add_video" class="btn btn-sm btn-primary">Добавить Виджет</a><br><br>
                        <?php if (is_array($media) && !empty($media)): ?>
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Ключ</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($media as $item): ?>
                                    <tr>
                                        <td><?=$item["name"]?></td>
                                        <td><?=$item["video"]?></td>
                                        <td style="text-align:center;">
											<a href="/sm-admin/index.php?view=edit_video&id=<?=$item["id"]?>" type="button" class="btn btn-sm btn-success">Изменить</a>
											<a href="#" onclick='confirmUser(<?=$item["id"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php if ($config["pages_count"] > 1) getAdminNavi($config["page"], $config["pages_count"], "index.php?view=video&"); ?>
						<?php else: ?>
						<div class="alert alert-warning">
							<strong>Виджетов не найдено!</strong> Добавьте новый Виджет!
						</div>
						<?php endif; ?>
                    </div>
 
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>