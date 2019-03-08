<!DOCTYPE html>
<html lang="ru">
<head>

    <meta name="description" content="описание страницы">
    <meta name="keywords" content="ключевое слово1, ключевое слово2">

    <?php require_once('template/head.php') ?>

    <title>Главная страница</title>

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

                <!-- Подключение правого сайдбара-->
                <?php require_once('template/rightside.php') ?>
                <!-- Подключение правого сайдбара end-->

                <div class="contentBox">

                    <?php require_once('template/contentBox-search.php') ?>

                    <div class="voprosi-detail">

                        <h3 class="voprosi-detail__title">После курса радиологии кровит мелонома?</h3>

                        <p class="voprosi-detail__reg">
                            <span class="voprosi-detail__number">№ 26 028</span>
                            <span class="voprosi-detail__cat">Венеролог</span>
                            <span class="voprosi-detail__date">21.11.2015</span>
                        </p>
                        <p class="voprosi-detail__quest">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Expedita officia porro repellendus voluptate.
                            Alias architecto aspernatur beatae blanditiis commodi debitis dolor et eveniet,
                            ex fugit, in inventore natus obcaecati omnis quam quasi repellat.
                            At deserunt eligendi ex hic iusto natus nostrum, quasi similique.
                            Accusantium aperiam asperiores aut delectus eum fugit officia omnis provident,
                            quaerat quas quibusdam, quisquam quod, saepe sequi soluta tempore vitae.
                            Animi consequatur fuga incidunt nesciunt nihil, numquam qui ullam velit?
                            Animi aperiam architecto enim est, eum hic ipsum numquam omnis praesentium
                            quae reiciendis repellat repellendus sed sit tempora vel, voluptates?
                            Accusamus animi autem commodi culpa cumque dignissimos distinctio earum
                            eius est explicabo iste labore magnam magni nam nemo, nesciunt numquam
                            odio omnis pariatur quo repudiandae saepe sint temporibus unde voluptates!
                            Consequuntur facilis in nam optio perferendis quidem quos. Amet commodi,
                            delectus eos esse est maxime optio quae quasi quos. Culpa nulla veniam
                            voluptates? In iusto, unde. Accusantium consequuntur corporis enim,
                            excepturi exercitationem expedita fuga laborum laudantium officiis
                            quae qui sed similique sunt tempora unde velit voluptatibus! A alias,
                            aliquid aperiam architecto dolore error facere fugiat fugit id impedit
                            ipsam minima nam non nostrum officia perspiciatis, possimus quo repudiandae
                            sed sunt ullam veritatis vitae? Asperiores debitis dignissimos dolores
                            doloribus id ipsam omnis quisquam repellendus soluta, vitae! Architecto
                            asperiores at consectetur dignissimos eligendi, enim, eos est, eveniet
                            exercitationem maxime minus perferendis quia repellat veniam voluptas.
                            Atque dicta dolorem ipsum modi velit! Accusantium architecto error incidunt
                            sint! Adipisci aspernatur assumenda eligendi esse itaque iusto laborum odio
                            unde, voluptatem. Ab adipisci aliquid, architecto at aut blanditiis consequatur
                            cum cumque dicta dolorem doloremque eligendi enim error est eveniet exercitationem
                            in itaque iure libero maxime minima modi mollitia nemo neque nobis numquam
                            obcaecati provident quaerat quasi quis quo quos rerum tempore velit veritatis
                            vitae voluptatem? Alias dolores iure magni minus nam nobis reprehenderit
                            voluptatem! Adipisci assumenda earum eius et, excepturi inventore, ipsa modi
                            nesciunt nobis numquam possimus quam repellendus tempora totam vitae!
                        </p>
                        <p class="voprosi-detail__author">
                            <span>Хабиб Нурмагомедов</span>
                        </p>
                        <div class="voprosi-detail__bottom">
                            <span class="voprosi-detail__otvotov">
                                <a href="vopros-detail.php">2 ОТВЕТА</a>
                            </span>
                        </div>
                        
                        <div class='voprosi-detail-admin'>
                            <a class='voprosi-detail-admin__del'>Удалить</a>
                            <a class='voprosi-detail-admin__edit'>Удалить</a>
                            <a class='voprosi-detail-admin__ban'>Удалить</a>
                        </div>

                    </div>

                    <div class="vopros-comment">
                        <ul class="vopros-comment__list">
                            <li class="vopros-comment__li">
                                <div class="vopros-comment__box">
                                    <img src="static/media/3.jpg" alt="" class="vopros-comment__img">
                                    <h4 class="vopros-comment__title">
                                        <a href="">Алиев Магомед</a>
                                    </h4>
                                    <p class="vopros-comment__text">
                                        Здравствуйте. Вам проводили лучевую терапию? А операция когда была?
                                    </p>
                                    <span class="vopros-comment__date">25.11.2015</span>
                                    <a href="#" class="vopros-comment__like">Поблагодарить</a>
                                </div>
                            </li>
                            <li class="vopros-comment__li">
                                <div class="vopros-comment__box">
                                    <img src="static/media/2.jpg" alt="" class="vopros-comment__img">
                                    <h4 class="vopros-comment__title">
                                        <a href="">Алиева Альсина</a>
                                    </h4>
                                    <p class="vopros-comment__text">
                                        У этих врачей нужно лицензию отобрать!!!
                                        Кто в мире первичную меланому облучает? ...
                                        Где есть такой протокол лечения?
                                        В данном случае необходима хирургическое удаление опухоли и стоит проверить
                                        близлежащие лимфатические узлы, а также сделать МРТ головного мозга,
                                        куда меланома может метастазировать...
                                        Если есть метастазы, помочь может только иммунотерапия препаратами
                                        Ipilimumab, Keytruda, Opdivo - http://www.medicaltourisrael.com/?p=359
                                    </p>
                                    <span class="vopros-comment__date">26.11.2015</span>
                                    <a href="#" class="vopros-comment__like">Поблагодарить</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="vopros-comment-add">
                        <h4 class="vopros-comment-add__title">
                            Написать ответ
                        </h4>
                        <form action="">
                            <textarea class="vopros-comment-add__text" placeholder="Ваш Комментарий" required></textarea>
                            <button class="vopros-comment-add__btn">Отправить</button>
                        </form>
                    </div>


                    <div class="related-voprosi">
                        <h4 class="related-voprosi__title">Похожие вопросы:</h4>

                        <ul class="related-voprosi__list">
                            <li class="related-voprosi__li">
                                <a href="" class="related-voprosi__link">
                                    Доктор подскажите как поступить? Обследоватся? Хотелось бы выяснить точную причину аллергии.
                                </a>
                                <span class="related-voprosi__date">26.11.2015</span>
                                <a href="#" class="related-voprosi__otvetov">Ответов 2</a>
                            </li>
                            <li class="related-voprosi__li">
                                <a href="" class="related-voprosi__link">
                                    Ожог при лишае
                                </a>
                                <span class="related-voprosi__date">26.11.2015</span>
                                <a href="#" class="related-voprosi__otvetov">Ответов 22</a>
                            </li>
                            <li class="related-voprosi__li">
                                <a href="" class="related-voprosi__link">
                                    Анализ на специфический иммуноглобулин е детям до года
                                </a>
                                <span class="related-voprosi__date">26.11.2015</span>
                                <a href="#" class="related-voprosi__otvetov">Ответов 21</a>
                            </li>
                        </ul>

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