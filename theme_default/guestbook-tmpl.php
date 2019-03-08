<div class="contentBox contentBox_page">

	<h2 class="contentBox__title">Гостевая книга</h2>
	<?=show_message()?>
	<p class="contentBox__descr"></p>

	<div class="guestbook">
		<?php if (is_auth()): ?>
		<div class="guestbook-add-m">
			<a href="#" class="guestbook-add">Добавить отзыв</a>
			<div class="guestbook-addforma">
				<form method="post">
					<textarea class="guestbook-addforma__text" name="message" required placeholder="Ваш отзыв..."></textarea>
					<button class="guestbook-addforma__btn">Отправить</button>
				</form>
			</div>
		</div>
		<?php else: ?>
		<div class="guestbook-top">
			<span class="contentBox-addvopros-forma__title">Войдите что бы продолжить:</span>
			<div style="text-align:center;" id="uLogin1" data-ulogin="display=panel;fields=first_name,last_name,nickname,photo;providers=vkontakte,odnoklassniki,facebook,instagram;hidden=yandex,google,mailru,twitter;redirect_uri=<?=$ulogin_mat_evo_redirect?>"></div>
		</div>
		<?php endif; ?>					
		<?php if (is_data($books[0])): ?>
		<ul class="guestbook-list">	
		<?php foreach($books[0] as $book): ?>
			<li class="guestbook-list__li">
				<div class="guestbook-card">
					<img class="guestbook-card__photo" src="<?=$book['photo']?>">
					<span class="commentBracket"></span>
					<div class="guestbook-card__content">
						<p class="guestbook-card__title">
							<a href="?type=profile&uid=<?=$book['id']?>" class="guestbook-card__name"><?=$book['last_name']?> <?=$book['first_name']?></a>
							<span class="guestbook-card__date"> <?=date_format($book['last_name'], 'd.m.Y - H:m:s')?></span>
						</p>
						<p class="guestbook-card__msg"><?=$book['text']?></p>
						<!--<a class='guestbook-card__delete' href="">Удалить</a>-->
						<!--<a class='guestbook-card__otvetit' href="">Ответить</a>-->
						<div class='guestbook-card__text'>
							<form method="post">
								<textarea name="message" placeholder='Ваш ответ...'></textarea>
								<input type="hidden" name="parent" value="<?=$book['book_id']?>">
								<button>Сохранить</button>
							</form>
						</div>
					</div> 
				</div>
				<?php if (is_data($books[$book['book_id']])): ?>
				<?php foreach($books[$book['book_id']] as $comment): ?>
				<div class="guestbook-card guestbook-card_otvet">
					<img class="guestbook-card__photo guestbook-card__photo_otvet" src="<?=$comment['photo']?>">
					<span class="commentBracket commentBracket_otvet"></span>
					<div class="guestbook-card__content guestbook-card__content_otvet">
						<p class="guestbook-card__title guestbook-card__title_otvet">
							<a href="?type=profile&uid=<?=$comment['id']?>" class="guestbook-card__name guestbook-card__name_otvet"><?=$comment['last_name']?> <?=$comment['first_name']?></a>
							<span class="guestbook-card__date guestbook-card__date_otvey"> <?=date_format($comment['last_name'], 'd.m.Y - H:m:s')?></span>
						</p>
						<p class="guestbook-card__msg guestbook-card__msg_otvet"><?=$comment['text']?></p>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>


	<?php #require_once('template/contentBox-pager.php') ?>

	<!--div class="contentBox-bottombanner">
		<a href="">
			<img src="static/img/bottom_banner.jpg" alt="">
		</a>
	</div-->

</div>