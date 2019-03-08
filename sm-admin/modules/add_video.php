<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Добавление Виджета
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-film"></i> Добавление Виджета
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=add_video" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" name="name">
                            </div>
							
							<div class="form-group">
                                <label>Ссылка на видео(ключ)</label>
								<p>https://www.youtube.com/watch?v=<b>T18M6iAt9jo</b><br><span style="color:red;">Указывать только то что выделено жирным!</span></p>
                                <input class="form-control" name="video">
                            </div>

                            <button type="submit" class="btn btn-success">Добавить Виджет</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>