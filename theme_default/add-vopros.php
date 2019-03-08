<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Задать вопрос</title>

</head>
<body>

<div class="main">

    <?php require_once('template/header.php') ?>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <!-- Подключение левого сайдбара-->
                <?php require_once('template/leftside.php') ?>
                <!-- Подключение левого сайдбара end-->

                <!-- Подключение левого сайдбара-->
                <?php require_once('template/rightside.php') ?>
                <!-- Подключение левого сайдбара end-->

                <div class="contentBox">

                    <div class="contentBox-addvopros">
                        <h3 class="contentBox-addvopros__title">Задать вопрос врачу онлайн</h3>
                        <p class="contentBox-addvopros__descrpage">
                            <span>Медицинские онлайн-консультации бесплатно и без регистрации</span>
                            Вы сразу получите уведомление об ответе на e-mail.
                            Также вы сможете: задавать уточняющие вопросы, поднять вопрос в ленте консультаций, удалить вопрос.
                        </p>
                        <ul class="contentBox-addvopros__about">
                            <li class="contentBox-addvopros__about-24">
                                <div class="contentBox-addvopros__box">
                                    <span>Круглосуточно</span>
                                    <p>Консультируйтесь без очередей и в удобное для вас время</p>
                                </div>
                            </li>
                            <li class="contentBox-addvopros__about-profi">
                                <div class="contentBox-addvopros__box">
                                    <span>Профессионально</span>
                                    <p>Вам ответят только поверенные врачи с образованием и стажем</p>
                                </div>
                            </li>
                            <li class="contentBox-addvopros__about-good">
                                <div class="contentBox-addvopros__box">
                                    <span>Комфортно</span>
                                    <p>Консультируйтесь не вставая с дивана с любого устройства</p>
                                </div>
                            </li>
                        </ul>

                        <div class="contentBox-addvopros-forma">

                            <h4 class="contentBox-addvopros-forma__title">Заполните форму ниже</h4>

                            <form action="" method="post">
                                <p>
                                    <input class="contentBox-addvopros-forma__input" type="text" placeholder="ФИО" name="fio" value="">
                                    <label class="contentBox-addvopros-forma__label">
                                        <input type="checkbox">Анонимно
                                    </label>
                                </p>

                                <p>
                                    <input class="contentBox-addvopros-forma__input" type="text" placeholder="E-mail:" name="email">
                                    <span class="vosk">Правильно укажите ваш E-Mail. На него придет ответ.</span>
                                </p>

                                <p>
                                    <select name="cat" class="contentBox-addvopros-forma__input">
                                        <option value="">Выберите специализацию врача</option>
                                        <option value="1">Аллерголог-Иммунолог</option>
                                        <option value="2">Беременность и роды</option>
                                        <option value="4">Болезни волос</option>
                                        <option value="29">Болезни сосудов</option>
                                        <option value="5">Венеролог</option>
                                        <option value="6">Гастроэнтеролог</option>
                                        <option value="7">Гинеколог</option>
                                        <option value="10">Гирудотерапевт</option>
                                        <option value="8">Гомеопат</option>
                                        <option value="11">Дерматолог</option>
                                        <option value="12">Диетолог</option>
                                        <option value="13">Инфекционист</option>
                                        <option value="14">Кардиолог</option>
                                        <option value="15">Косметолог</option>
                                        <option value="9">Лечение бесплодия</option>
                                        <option value="36">Логопед</option>
                                        <option value="24">ЛОР</option>
                                        <option value="23">Маммолог</option>
                                        <option value="16">Мануальный терапевт</option>
                                        <option value="17">Нарколог</option>
                                        <option value="18">Невропатолог</option>
                                        <option value="35">Онколог</option>
                                        <option value="19">Офтальмолог</option>
                                        <option value="33">Педиатр</option>
                                        <option value="20">Пластический хирург</option>
                                        <option value="34">Проктолог</option>
                                        <option value="22">Психолог</option>
                                        <option value="21">Психотерапевт</option>
                                        <option value="37">Ревматолог</option>
                                        <option value="25">Сексолог</option>
                                        <option value="41">Сомнолог</option>
                                        <option value="26">Стоматолог</option>
                                        <option value="27">Терапевт</option>
                                        <option value="28">Уролог</option>
                                        <option value="30">Хирург</option>
                                        <option value="31">Эндокринолог</option>
                                    </select>
                                    <span class="vopr">Выберите категорию</span>
                                </p>

                                <div class="tema-voprosa">
                                    <strong>Изложите суть вопроса одним предложением.</strong>
                                    <input name="tema" class="contentBox-addvopros-forma__input_tema" type="text" placeholder="Например: «Как вылечить насморк?»">
                                </div>

                                <div class="text-voprosa">
                                    <strong>Опишите суть Вашего вопроса</strong>
                                    <textarea name="text" placeholder="Старайтесь максимально подробно описать вашу проблему."></textarea>
                                    <input type="file" name="file" multiple="" placeholder=""> <span>Добавить фото, документы, либо другие файлы</span>
                                    <button class="text-voprosa__btn">Отправить</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php require_once('template/footer.php') ?>

</div>




<?php require_once('template/bottom-scripts.php') ?>

</body>
</html>