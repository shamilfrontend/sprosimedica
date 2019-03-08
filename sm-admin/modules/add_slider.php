<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Добавление слайда
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-photo"></i> Добавление слайда
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=add_slider" method="POST" role="form" enctype="multipart/form-data">
							
							<!--div class="form-group">
                                <label>Первая строка</label>
                                <input class="form-control" name="title">
                            </div>
                            
                            <div class="form-group">
                                <label>Вторая строка</label>
                                <input class="form-control" name="desc">
                            </div-->

							<!--div class="form-group">
                                <label>Текст строки</label>
                                <input class="form-control" name="button">
                            </div-->
                            
                            <div class="form-group">
                                <label>Адрес строки (не обязательно заполнять)</label>
                                <input class="form-control" name="href">
                            </div>
							
							<div class="form-group">
                                <label>Слайд (размер картинки: 653x230, размер не принципиален однако любой размер будет приведен именно к этому стандарту)</label>
                                <input type="file" name="baseimg">
                            </div>
							
                            <button type="submit" class="btn btn-success">Добавить слайд</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>