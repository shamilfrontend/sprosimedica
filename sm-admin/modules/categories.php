<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Рубрики
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-folder-open-o"></i> Рубрики
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->
				<script type="text/javascript">
					function confirmUser($id) {
						var ask = confirm("Вы действительно хотите удалить рубрику?!");
						if (ask) {window.location = "index.php?view=del_categories&id="+$id+"";}
					}
				</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Рубрики на сайте</h2>
						<a href="index.php?view=add_categories" class="btn btn-sm btn-primary">Добавить рубрику</a><br><br>
                        <?php if (is_array($cat) && !empty($cat)): ?>
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
									<?php foreach($cat as $item): ?>
                                    <tr>
                                        <td><?=$item["title_ct"]?></td>
                                        <td><a target="_blank" href="/<?=$item["slug_ct"]?>/"><?=$item["slug_ct"]?></a></td>
                                        <td style="text-align:center;">
											<a href="index.php?view=edit_categories&id=<?=$item["id_ct"]?>" type="button" class="btn btn-sm btn-success">Изменить</a>
											<a href="#" onclick='confirmUser(<?=$item["id_ct"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php else: ?>
						<div class="alert alert-warning">
							<strong>Рубрик не найдено!</strong> Рубрик пока нет, добавьте первую!
						</div>
						<?php endif; ?>
                    </div>
 
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>