<?php defined("_SMARTMEDIA") or die(); ?>

<div id="page-wrapper">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Просмотр тикетов
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-support"></i> Обратная связь
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                       <div class="row">
							<div class="col-lg-4 text-center">
								<div class="panel panel-default">
									<div class="panel-body">
										<b>Имя:</b> <?=$st["name"]?>
									</div>
								</div>
							</div>
							<div class="col-lg-4 text-center">
								<div class="panel panel-default">
									<div class="panel-body">
										<b>Почта:</b> <?=$st["phone"]?>
									</div>
								</div>
							</div>
							<div class="col-lg-4 text-center">
								<div class="panel panel-default">
									<div class="panel-body">
										<b>Дата:</b> <?=$st["date"]?>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12 text-center">
								<div class="panel panel-default">
									<div class="panel-body" style="text-align: left;">
										<?=$st["message"]?>
									</div>
								</div>
							</div>
						</div>
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>