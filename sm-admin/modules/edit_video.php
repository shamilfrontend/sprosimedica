<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Редактор Виджета
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-film"></i> Редактор Виджета
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=edit_video&id=<?=$st["id"]?>" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Заголовок</label>
                                <input class="form-control" name="name" value="<?=htmlspecialchars($st["name"])?>">
                            </div>
							
							<div class="form-group">
                                <label>Ссылка на видео(ключ)</label>
								<p>https://www.youtube.com/watch?v=<b>T18M6iAt9jo</b><br><span style="color:red;">Указывать только то что выделено жирным!</span></p>
                                <input class="form-control" name="video" value="<?=htmlspecialchars($st["video"])?>">
                            </div>
							
                            <button type="submit" class="btn btn-primary">Обновить Виджет</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>