<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Специалисты</title>

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


                <div class="contentBox contentBox_page">

                    <h3 class="contentBox__title">Заголовок Заметки</h3>

                    <div class="contentBox-page">
                        <h1>Заголовок 1 уровня</h1>
                        <h2>Заголовок 2 уровня</h2>
                        <h3>Заголовок 3 уровня</h3>
                        <h4>Заголовок 4 уровня</h4>
                        <h5>Заголовок 5 уровня</h5>
                        <h6>Заголовок 6 уровня</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Ab aspernatur commodi delectus earum eos ipsam,
                            quis quisquam tempora vero vitae. Alias,
                            <strong>Жирный текст</strong>,
                            <em>Курсивный текст</em>
                            dignissimos ea, eveniet illo labore minus natus
                            nesciunt officia perferendis praesentium quae quam quis
                            recusandae vel vero voluptas voluptatem voluptates
                            voluptatum? Cumque esse incidunt perferendis ratione sit?
                        </p>
                        <ul>
                            <li>Пункт 1</li>
                            <li>Пункт 2</li>
                            <li>Пункт 3</li>
                            <li>Пункт 4</li>
                            <li>Пункт 5</li>
                        </ul>
                        <ol>
                            <li>Пункт 1</li>
                            <li>Пункт 2</li>
                            <li>Пункт 3</li>
                            <li>Пункт 4</li>
                            <li>Пункт 5</li>
                        </ol>
                        <a href="">Ссылка</a>
                        
                    </div>

                    <div class='contentBox-comment'>
                        
                    </div>

                    <div class="contentBox-bottombanner">
                        <a href="">
                            <img src="static/img/bottom_banner.jpg" alt="">
                        </a>
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