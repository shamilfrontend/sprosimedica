<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Профиль
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Профиль
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
							  <?php if (isset($_SESSION["aho"])): ?>
								<div class="alert alert-info">
									<strong>Внимание!</strong> Необходимо перезайти.
								</div>
							  <?php unset($_SESSION["aho"]); unset($_SESSION['auth']['admin']); endif; ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=user" method="POST" role="form">
							
							<div class="form-group">
                                <label>Логин</label>
                                <input class="form-control" name="login">
                            </div>
							
							<div class="form-group">
                                <label>Пароль</label>
                                <input class="form-control" name="passwd">
                            </div>

                            <button type="submit" class="btn btn-primary">Обновить профиль</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>