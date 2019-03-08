<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Страница регистрации</title>

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

                <div class="registracia">

                    <p class="registracia__title">ВЫБЕРИТЕ ТИП АККАУНТА</p>
                    <p class="registracia__descr">регистрация бесплатна для всех типов аккаунтов</p>

                    <div class="registracia-item">
                        <div class="registracia-item__img"></div>
                        <div class="registracia-item__title">
                            <p>Я ПОЛЬЗОВАТЕЛЬ</p>
                            <span>и хочу консультироваться онлайн</span>
                        </div>
                        <div class="registracia-item__reg">
                            <a href="">Зарегистрироваться</a>
                        </div>
                        <div class="registracia-item__opis">
                            <p>А ЕЩЕ У НАС МОЖНО:</p>
                            <ul>
                                <li>Моментально расшифровать медицинские анализы</li>
                                <li>Получить видеоконсультацию врача в онлайн режиме </li>
                                <li>Найти лучший близлежайший медцентр или нужного врача</li>
                                <li>Поделиться отзывом о работе медцентров и медперсонала</li>
                            </ul>
                        </div>
                    </div>

                    <div class="registracia-item">
                        <div class="registracia-item__img registracia-item__img_doctor"></div>
                        <div class="registracia-item__title">
                            <p>Я Врач</p>
                            <span>и хочу отвечать на вопросы</span>
                        </div>
                        <div class="registracia-item__reg">
                            <a href="">Зарегистрироваться</a>
                        </div>
                        <div class="registracia-item__opis">
                            <p>СРАЗУ ПОСЛЕ РЕГИСТРАЦИИ:</p>
                            <ul>
                                <li>Моментально расшифровать медицинские анализы</li>
                                <li>Получить видеоконсультацию врача в онлайн режиме </li>
                                <li>Найти лучший близлежайший медцентр или нужного врача</li>
                                <li>Поделиться отзывом о работе медцентров и медперсонала</li>
                            </ul>
                        </div>
                    </div>

<!--                    <div class="registracia-item">-->
<!--                        <div class="registracia-item__img registracia-item__img_admin"></div>-->
<!--                        <div class="registracia-item__title">-->
<!--                            <p>Я Руководитель</p>-->
<!--                            <span>и хочу привлекать пациентов</span>-->
<!--                        </div>-->
<!--                        <div class="registracia-item__reg">-->
<!--                            <a href="">Зарегистрироваться</a>-->
<!--                        </div>-->
<!--                        <div class="registracia-item__opis">-->
<!--                            <p>БЫСТРО ЭФФЕКТИВНО!</p>-->
<!--                            <ul>-->
<!--                                <li>Моментально расшифровать медицинские анализы</li>-->
<!--                                <li>Получить видеоконсультацию врача в онлайн режиме </li>-->
<!--                                <li>Найти лучший близлежайший медцентр или нужного врача</li>-->
<!--                                <li>Поделиться отзывом о работе медцентров и медперсонала</li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->

                </div>

            </div>
        </div>
    </div>

    <?php require_once('template/footer.php') ?>

</div>




<?php require_once('template/bottom-scripts.php') ?>

</body>
</html>