<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Слайдер
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-photo"></i> Слайдер
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                             <?php if (!$st["slider"]): ?><div class="alert alert-danger"><strong>Ошибка!</strong> Пожалуйста включите слайдер в настройках!</div><?php endif;?>
                    </div>
                </div>
                <!-- /.row -->
				<script type="text/javascript">
					function confirmUser($id) {
						var ask = confirm("Вы действительно хотите удалить слайд?!");
						if (ask) {window.location = "index.php?view=del_slider&id="+$id+"";}
					}
				</script>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Слайдер на сайте</h2>
						<a href="index.php?view=add_slider" class="btn btn-sm btn-primary">Добавить слайд</a><br><br>
                        <?php if (is_array($sliders) && !empty($sliders)): ?>
						<div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Номер</th>
                                        <th>ссылка</th>
                                        <th>Дата размещения</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($sliders as $item): ?>
                                    <tr>
                                        <td>ID: <?=$item["id"]?></td>
                                        <td><?=$item["href"]?></td>
                                        <td><?=$item["date"]?></td>
                                        <td style="text-align:center;">
											<a href="index.php?view=edit_slider&id=<?=$item["id"]?>" type="button" class="btn btn-sm btn-success">Изменить</a>
											<a href="#" onclick='confirmUser(<?=$item["id"]?>);return false;' type="button" class="btn btn-sm btn-danger">Удалить</a>
										</td>
                                    </tr>
									<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
						<?php else: ?>
						<div class="alert alert-warning">
							<strong>Слайдов не найдено!</strong> Слайдов пока нет, добавьте первый!
						</div>
						<?php endif; ?>
                    </div>
 
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>