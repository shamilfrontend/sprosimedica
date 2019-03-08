<div class="leftSidebar">

    <!--div class="leftSidebar-usermenu">
        <h4 class="leftSidebar-usermenu__title">Личный кабинет (врача)</h4>

        <ul class="leftSidebar-usermenu__list">
            <li class="leftSidebar-usermenu__li">
                <a href="profile-specialist.php" class="leftSidebar-usermenu__link">Мой профиль</a>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="profile-voprosi.php" class="leftSidebar-usermenu__link">Вопросы мне</a>
                <span class="leftSidebar-usermenu__span">+2</span>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="profile-otzivi.php" class="leftSidebar-usermenu__link">Мои отзывы</a>
                <span class="leftSidebar-usermenu__span">+1</span>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="profile-zametki.php" class="leftSidebar-usermenu__link">Мои заметки</a>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="profile-tools.php" class="leftSidebar-usermenu__link">Настройки</a>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="index.php" class="leftSidebar-usermenu__link">Выход</a>
            </li>
        </ul>
    </div>

    <div class="leftSidebar-usermenu">
        <h4 class="leftSidebar-usermenu__title">Личный кабинет (юзера)</h4>

        <ul class="leftSidebar-usermenu__list">
            <li class="leftSidebar-usermenu__li">
                <a href="profile-user.php" class="leftSidebar-usermenu__link">Мой профиль</a>
            </li>
            <li class="leftSidebar-usermenu__li">
                <a href="index.php" class="leftSidebar-usermenu__link">Выход</a>
            </li>
        </ul>
    </div-->

    <div class="leftSidebar-login">
        <h4 class="leftSidebar-login__title"><?=(is_auth()?'Личный кабинет':'Авторизация')?></h4>

        <!--form>
            <input class="leftSidebar-login__log" type="text" placeholder="Логин" required>
            <input class="leftSidebar-login__pass" type="password" placeholder="Пароль" required>
            <label for="leftSidebar-login__che">
                <input class="leftSidebar-login__check" id="leftSidebar-login__che" type="checkbox"> Запомнить
            </label>
            <br>
            <button class="leftSidebar-login__btn">Войти</button>
            <a class="leftSidebar-login__reg" href="registracia.php">Регистрация</a>
            <a class="leftSidebar-login__newpass" href="forget-pass.php">Забыли пароль</a>
        </form-->
		
		<p class='leftSidebar-login__hello'>
		    <?php 
    		    if( is_auth() ) {
    		    
    		        $hours = getdate()[hours];
    		        
    		        if( $hours > 5 and $hours <= 11 ) {
    		            echo "Доброе утро, ";
    		        }
    		        else if( $hours > 11 and $hours <= 18 ) {
    		            echo "Добрый день, ";
    		        }
    		        else if( $hours > 18 and $hours < 22 ) {
    		            echo "Добрый вечер, ";
    		        }
    		        else if( $hours > 22 or $hours < 5 ) {
    		            echo "Доброй ночи, ";
    		        }
    		    
    		        echo $_SESSION['auth']['first_name'] ." ". $_SESSION['auth']['last_name'];
    		    }
    		    else{
    		      //  echo "Авторизуйся мразь";
    		    }
		    ?>  
		</p>
		
		
		
		<?=(is_auth()?'<div class="leftSidebar-img"><img src="'.$_SESSION['auth']['photo'].'"></div>':false)?>
		<?=(is_auth()?'<a href="/?do=logout" class="leftSidebar-login__btn">Выйти</a>':'<div id="uLogin" data-ulogin="display=panel;fields=first_name,last_name,nickname,photo;providers=vkontakte,odnoklassniki,facebook,instagram;hidden=yandex,google,mailru,twitter;redirect_uri='.$ulogin_mat_evo_redirect.'"></div>')?>
		
    </div>
    
    <!--<div class="leftSidebar-xsmenu">-->
    <!--    <h4 class="leftSidebar-xsmenu__title">Главное меню</h4>-->

    <!--    <ul class="leftSidebar-xsmenu__list">-->
    <!--        <li class="leftSidebar-xsmenu__li">-->
    <!--            <a class="leftSidebar-xsmenu__link leftSidebar-xsmenu__link_active" href="index.php">ВОПРОСЫ</a>-->
    <!--        </li>-->
    <!--        <li class="leftSidebar-xsmenu__li">-->
    <!--            <a class="leftSidebar-xsmenu__link" href="zametki.php">Заметки</a>-->
    <!--        </li>-->
    <!--        <li class="leftSidebar-xsmenu__li">-->
    <!--            <a class="leftSidebar-xsmenu__link" href="specialists.php">ВРАЧИ</a>-->
    <!--        </li>-->
    <!--        <li class="leftSidebar-xsmenu__li">-->
    <!--            <a class="leftSidebar-xsmenu__link" href="guestbook.php">Гостевая</a>-->
    <!--        </li>-->
    <!--    </ul>-->
    <!--</div>-->
	
    <div class="leftSidebar-cat">
        <h4 class="leftSidebar-cat__title">Категории вопросов</h4>

        <ul class="leftSidebar-cat__list">
            <?php if (is_data($catvop)): ?>
				<?php foreach($catvop as $item): ?>
				<li class="leftSidebar-cat__li">
					<a class="leftSidebar-cat__link" href="?type=category&category=catvop&catid=<?=$item['id_catvop']?>">
						<span><?=$item['name']?></span>
					</a>
				</li>
				<?php endforeach; ?>
			<?php endif; ?>
        </ul>

    </div>
	
 <!--   <div class="leftSidebar-stat">-->
 <!--       <h4 class="leftSidebar-stat__title">Статистика</h4>-->

 <!--       <p class="leftSidebar-stat__text">Пользователей на сайте: 133</p>-->
 <!--       <p class="leftSidebar-stat__text">Врачей-специалистов всего: 706</p>-->
 <!--       <br>-->
 <!--       <h5 class="leftSidebar-stat__h5">ЗА СЕГОДНЯ:</h5>-->
 <!--       <p class="leftSidebar-stat__text">задано 47 вопросов</p>-->
 <!--       <p class="leftSidebar-stat__text">получено 59 ответов</p>-->
 <!--       <br>-->
 <!--       <h5 class="leftSidebar-stat__h5">ВСЕГО:</h5>-->
 <!--       <p class="leftSidebar-stat__text">Вопросов 28253</p>-->
 <!--       <p class="leftSidebar-stat__text">Ответов 23421</p>-->
 <!--   </div>-->
	
	<!--<div class="leftSidebar-social">-->
 <!--       <h4 class="leftSidebar-social__title">ПОДДЕРЖИТЕ НАС!</h4>-->
	<!--		<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter" data-counter=""></div>-->
 <!--   </div>-->
	

	
    <!--div class="leftSidebar-social">
        <h4 class="leftSidebar-social__title">ПОДПИШИСЬ НА НАС</h4>
        <ul class="leftSidebar-social__list">
            <li class="leftSidebar-social__li">
                <a href="" class="leftSidebar-social__vk"></a>
            </li>
            <li class="leftSidebar-social__li">
                <a href="" class="leftSidebar-social__ok"></a>
            </li>
            <li class="leftSidebar-social__li">
                <a href="" class="leftSidebar-social__fb"></a>
            </li>
            <li class="leftSidebar-social__li">
                <a href="" class="leftSidebar-social__tw"></a>
            </li>
            <li class="leftSidebar-social__li">
                <a href="" class="leftSidebar-social__ins"></a>
            </li>
        </ul>
    </div-->
</div>