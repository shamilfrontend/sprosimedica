<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Добавление страницы
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-copy"></i> Добавление страницы
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=add_page" method="POST" role="form">
							
							<div class="form-group">
                                <label>Название страницы</label>
                                <input class="form-control" name="title">
                            </div>
							
							<div class="form-group">
                                <label>Адрес</label>
								<div class="alert alert-danger">
									<strong>Внимание!!!</strong> Данное поле является адресом страницы http://example.ru/<b>page</b>.html
									<br>Заполнять строго согласно инструкции иначе ничего работать не будет, а так же есть возможность нарушить целостность БД.<br>
									<u>В это поле разрешается записывать только латинские буквы нижнего регистра, цифры и знак подчеркивания.</u><br>
									<u>Данное поле является уникальным и не должно повторяться</u>
								</div>
                                <input class="form-control" name="slug" placeholder="example или my_example">
                            </div>

							<div class="form-group">
                                <label>Ключевые слова</label>
                                <input class="form-control" name="keywords" placeholder="слово, первое, второе, третье">
                            </div>
							
   							<div class="form-group">
                                <label>Описание</label>
                                <input class="form-control" name="description">
                            </div>
							
							<!--div class="form-group">
                                <label>Меню</label>
                                <select name="menu">
									<option value="0" selected>Сайдбар</option>
									<option value="1">Над слайдером</option>
									<option value="2">Под слайдером</option>
									<option value="3">Подвал</option>
							   </select>
                            </div-->
							
							<div class="form-group">
                                <label>Текст страницы</label>
								<textarea class="form-control" name="text" id="editor1"></textarea>
								<script type="text/javascript" src="/sm-admin/static/ckeditor/ckeditor.js"></script>
								<script>CKEDITOR.replace('editor1');</script>
                            </div>
							
                            <button type="submit" class="btn btn-success">Добавить страницу</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>