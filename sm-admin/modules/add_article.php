<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Добавление записи
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/sm-admin/index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Добавление записи
                            </li>
                        </ol><?php if ($_SESSION['answer']['result']) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="/sm-admin/index.php?view=add_article" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Название записи</label>
                                <input class="form-control" name="title">
                            </div>
							
							<div class="form-group">
                                <label>Адрес</label>
								<div class="alert alert-danger">
									<strong>Внимание!!!</strong> Данное поле является адресом записи. http://example.ru/category/<b>novaya_zapis.html</b>
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
                                <label>Категория</label>
                                <?php if (is_data($st)): ?>
								<select name="category1" class="form-control">
									<?php foreach($st as $item): ?>
									<option value="<?=$item["id_ct"]?>"><?=$item["title_ct"]?></option>
									<?php endforeach; ?>
								</select>
								<?php endif; ?>
                            </div-->
							
							<div class="form-group">
                                <label>Рубрика</label>
                                <select name="category" class="form-control">
                                <?=getOptionMenu($tree);?>
                                </select>
                            </div>
							
							<!--div class="form-group">
                                <label>Миниатюра</label>
                                <input type="file" name="baseimg">
                            </div>
                            
                            <div class="form-group">
                                <label>Картинка в Мега меню</label>
                                <input type="file" name="genesis">
                            </div>
							
							<div class="form-group">
                                <label>Цитата</label>
								<textarea class="form-control" name="quote" rows="5"></textarea>
                            </div-->

							<div class="form-group">
                                <label>Заглавный пост</label>
								<textarea class="form-control" name="quote" id="editor2"></textarea>
								<script type="text/javascript" src="/sm-admin/static/ckeditor/ckeditor.js"></script>
								<script>CKEDITOR.replace('editor2');</script>
                            </div>
                            
							<div class="form-group">
                                <label>Полный текст записи</label>
								<textarea class="form-control" name="text" id="editor1"></textarea>
								<script>CKEDITOR.replace('editor1');</script>
                            </div>
							
                            <button type="submit" class="btn btn-success">Добавить запись</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>