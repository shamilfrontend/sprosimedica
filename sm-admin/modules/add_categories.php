<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Добавление рубрики
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Панель</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-folder-open-o"></i> Добавление рубрики
                            </li>
                        </ol><?php if (isset($_SESSION['answer']['result'])) {echo $_SESSION['answer']['result']; unset($_SESSION['answer']);}  ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-8">

                        <form action="index.php?view=add_categories" method="POST" role="form" enctype="multipart/form-data">
							
							<div class="form-group">
                                <label>Название рубрики</label>
                                <input class="form-control" name="title">
                            </div>
							
							<div class="form-group">
                                <label>Адрес</label>
								<div class="alert alert-danger">
									<strong>Внимание!!!</strong> Данное поле является адресом рубрики в которой будут храниться записи. http://example.ru/<b>category</b>/
									<br>Заполнять строго согласно инструкции иначе ничего работать не будет, а так же есть возможность нарушить целостность БД.<br>
									<u>В это поле разрешается записывать только латинские буквы нижнего регистра, цифры и знак подчеркивания.</u><br>
									<u>Данное поле является уникальным и не должно повторяться</u>
								</div>
                                <input class="form-control" name="slug" placeholder="example или my_example">
                            </div>
                            
                            <div class="form-group">
                                <label>Рубрика</label>
								<select name='parent'><option selected disabled value="0">Родительская рубрика</option>
                                <?=getOptionMenu($tree);?>
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Миниатюра</label>
                                <input type="file" name="baseimg">
                            </div>
							
							<!--div class="form-group">
                                <label>Мега Меню</label>
								<select name='mega'>
									<option selected value="0">Отсутствует</option>
									<option value="1">Первая колонка</option>
									<option value="2">Вторая колонка</option>
									<option value="3">Третья колонка</option>
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Кол-во последних записей</label>
								<select name='last'>
									<option selected value="0">0</option>
									<option value="2">2</option>
									<option value="4">4</option>
									<option value="6">6</option>
									<option value="8">8</option>
									<option value="10">10</option>
                                </select>
                            </div>
							
							<div class="form-group">
                                <label>Отображать рубрику?</label>
								<input type="checkbox" name="visible" value="1" checked>
                            </div-->
                            
                            
                            <button type="submit" class="btn btn-success">Добавить рубрику</button>

                        </form>

                    </div>
 
                </div>
                <!-- /.row -->

            </div>

        </div>