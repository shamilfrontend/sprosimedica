<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Профиль пользователя</title>

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

                    <div class="profile-user">
                        <div class="profile-userbar">
                            <span class="profile-user__name">
                                Магдигаджи Магдишапиев
                            </span>
                        </div>

                        <div class="profile-usercontent profile-usercontent_user">
                            <div class="profile-usercontent__photo">
                                <img src="static/media/1.jpg" alt="" >
                            </div>
                            <p class="profile-usercontent__address">
                                <span>Город</span>
                                Махачкала
                            </p>
                            <p class="profile-usercontent__age">
                                <span>Возраст:</span>
                                55
                            </p>
                            <p class="profile-usercontent__nasayte">
                                <span>На сайте с</span>
                                11.07.2014
                            </p>

                        </div>


                        <div class="profile-userbot">
                            <ul class="profile-userbottab__list">
                                <li class="profile-userbottab__li profile-userbottab__li_active">Вопросы</li>
                                <li class="profile-userbottab__li">Настройки</li>
                            </ul>
                            <div class="profile-userbottab__content">
                                <div class="profile-userbottab__contitem">
                                    <div class="profile-userbot-voprosi">
                                        <ul class="profile-userbot-voprosi__list">
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad atque, distinctio dolorum error facilis fuga fugiat iure magnam maxime quia quis reprehenderit sequi sit tempore unde veniam voluptates? Cum, placeat!
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut consequatur corporis cum deleniti earum ipsam iste, maiores minima mollitia nobis, odit officia perspiciatis quam quos similique ut vitae voluptate!
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aut cupiditate doloribus labore libero qui repellat sed? Consectetur eaque error excepturi exercitationem explicabo illum neque omnis quasi, reiciendis. Consequuntur, sequi.
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut delectus dignissimos dolores eos eveniet facilis hic illum labore natus necessitatibus, perspiciatis porro rem repellendus reprehenderit sit sunt, tempora tempore.
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores beatae dicta, dignissimos dolore dolorum earum eveniet, harum laudantium maiores minus obcaecati perferendis quae quidem, reprehenderit saepe soluta ullam vitae!
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi consectetur consequatur consequuntur deleniti doloremque eos expedita, harum laboriosam magnam maiores nulla numquam omnis, provident quo rem repudiandae soluta vitae.
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores fugit, labore natus recusandae voluptatem? Aliquid debitis laborum voluptatum? Architecto doloremque ducimus officia sint totam. Eos et facilis maiores nesciunt?
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias aliquam aspernatur commodi consequatur culpa cumque eum ex expedita facilis fugiat, ipsa itaque mollitia quidem ratione soluta totam. Perferendis, voluptate.
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad alias aliquid aperiam asperiores aspernatur beatae consequuntur dignissimos dolores eos eveniet fuga neque officia sequi sit suscipit, tempora vel voluptatem.
                                                </a>
                                            </li>
                                            <li class="profile-userbot-voprosi__li">
                                                <a href="" class="profile-userbot-voprosi__link">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi dignissimos ducimus eaque eos et eveniet incidunt libero magnam nesciunt odio omnis quis quisquam, sit tenetur vel voluptatem. Debitis, nesciunt.
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-userbottab__contitem">
                                    <div class="profile-userbot-tools">
                                        <form action="">
                                            <label>
                                                Город
                                                <input type="text" placeholder="Город" required>
                                            </label>
                                            <label>
                                                Дата рождения
                                                <input type="text" placeholder="Дата рождения">
                                            </label>
                                            <label>
                                                Новый пароль
                                                <input type="password" placeholder="Новый пароль">
                                            </label>
                                            <label>
                                                Изменить аватар
                                                <input type="file">
                                            </label>
                                            <button>Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
<script src="static/libs/lightgallery/js/lightGallery.min.js"></script>
<script>
    $('.user-sertificate').lightGallery();
</script>

</body>
</html>