<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Панель <small>Администратора</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Панель
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Добро пожаловать!</strong> Текущая версия панели администратора <a class="alert-link">0.6</a>!
                        </div>
                    </div>
                </div>
					<script type="text/javascript">
						function confirmUser($id) {
							var ask = confirm("Вы действительно хотите удалить новость?!");
							if (ask) {window.location = "/sm-admin/index.php?view=del_feedback&id="+$id+"";}
						}
					</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Обратная связь</h2>
                        <?php if (is_array($feedback) && !empty($feedback)): ?>
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Телефон</th>
                                        <th>Дата</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($feedback as $item): ?>
                                    <tr>
                                        <td><?=$item["name"]?></td>
                                        <td><?=$item["phone"]?></td>
                                        <td><?=$item["date"]?></td>
                                        <td style="text-align:center;">
											<a href="/sm-admin/index.php?view=feedback&id=<?=$item["id"]?>" type="button" class="btn btn-sm btn-success">Посмотреть</a>
											<a href="#" onclick='confirmUser(<?=$item["id"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php if ($config["pages_count"] > 1) getAdminNavi($config["page"], $config["pages_count"], "index.php?view=dashboard&"); ?>
						<?php else: ?>
						<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Нет новых тикетов</strong>
                        </div>
						<?php endif; ?>
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>