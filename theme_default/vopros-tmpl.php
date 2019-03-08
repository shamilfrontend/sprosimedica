<div class="contentBox">

	<?php require_once('template/contentBox-search.php') ?>
	<?=show_message()?>
	<div class="voprosi-detail">
	
		<h3 class="voprosi-detail__title"><?=$vorpos['title']?></h3>

		<p class="voprosi-detail__reg">
			<span class="voprosi-detail__number">№ <?=$vorpos['id_vopros']?></span>
			<a class="voprosi-detail__cat" href="?type=category&category=catvop&catid=<?=$vorpos['catid']?>"><?=$vorpos['cat_name']?></a>
			<span class="voprosi-detail__date"><?=date_format($vorpos['date'], 'd.m.Y')?></span>
		</p>
		<p class="voprosi-detail__quest"><?=$vorpos['text']?></p>
		<p class="voprosi-detail__author">
			<span><?=($vorpos['unknown'])?'Анонимно':'<a href="?type=profile&uid='.$vorpos['authorid'].'">'.$vorpos['last_name'].' '.$vorpos['first_name'].'</a>'?></span>
		</p>
		<?php if (!empty($vorpos['tags_name'])): ?>
		<div class='contentBox-voprosi__bottom'>
			<ul class="contentBox-voprosi__tags">
				<?php $vorpos['tags_name'] = explode(',',$vorpos['tags_name']);  if (empty($vorpos['tags_name'][0])) unset($vorpos['tags_name'][0]); foreach($vorpos['tags_name'] as $item): ?>
					<li class="contentBox-voprosi__tag"><a href="?type=tag&tag=<?=$item?>"><?=$item?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
		<!--div class="voprosi-detail__bottom">
			<span class="voprosi-detail__otvotov">
				<a href="vopros-detail.php">2 ОТВЕТА</a>
			</span>
		</div-->
		
		<div class='voprosi-detail-admin'>
			<?php if ($_SESSION['auth']['role'] > 0 or $_SESSION['auth']['id'] == $vorpos['authorid']): ?><a class='voprosi-detail-admin__edit'>Редактировать</a><?php endif; ?>
			<?php if ((count($otveti) < 1 && $_SESSION['auth']['id'] == $vorpos['authorid']) || $_SESSION['auth']['role'] > 0): ?><a href="?type=edit_v&action=delete&id=<?=$vorpos['id_vopros']?>" class='voprosi-detail-admin__del'>Удалить</a><?php endif; ?>
			<?php if ($_SESSION['auth']['role'] > 0): ?><a class='voprosi-detail-admin__ban'>Заблокировать</a><?php endif; ?>
		</div>

	</div>

	<?php if (is_data($otveti)): ?>
	<div class="vopros-comment">
		<ul class="vopros-comment__list">
			<?php foreach($otveti as $otvet): ?>
			<li class="vopros-comment__li">
				<div class="vopros-comment__box">
					<div class="vopros-comment__img-m"><img src="<?=$otvet['photo']?>" alt="" class="vopros-comment__img"></div>
					<h4 class="vopros-comment__title">
						<a href="?type=profile&uid=<?=$otvet['id']?>"><?=$otvet['last_name']?> <?=$otvet['first_name']?></a>
					</h4>
					<p class="vopros-comment__text"><?=$otvet['text']?></p>
					<span class="vopros-comment__date"><?=date_format($otvet['date'], 'd.m.Y')?></span>
					<!--<a href="#" class="vopros-comment__like">Поблагодарить</a>-->
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	<?php if ($_SESSION['auth']['role'] > 0): ?>
	<div class="vopros-comment-add">
		<h4 class="vopros-comment-add__title">
			Написать ответ
		</h4>
		<form method="post">
			<textarea name="vopros" class="vopros-comment-add__text" placeholder="Ваш Комментарий" required></textarea>
			<button class="vopros-comment-add__btn">Отправить</button>
		</form>
	</div>
	<?php endif; ?>


	<!--<div class="related-voprosi">-->
	<!--	<h4 class="related-voprosi__title">Похожие вопросы:</h4>-->

	<!--	<ul class="related-voprosi__list">-->
	<!--		<li class="related-voprosi__li">-->
	<!--			<a href="" class="related-voprosi__link">-->
	<!--				Доктор подскажите как поступить? Обследоватся? Хотелось бы выяснить точную причину аллергии.-->
	<!--			</a>-->
	<!--			<span class="related-voprosi__date">26.11.2015</span>-->
	<!--			<a href="#" class="related-voprosi__otvetov">Ответов 2</a>-->
	<!--		</li>-->
	<!--		<li class="related-voprosi__li">-->
	<!--			<a href="" class="related-voprosi__link">-->
	<!--				Ожог при лишае-->
	<!--			</a>-->
	<!--			<span class="related-voprosi__date">26.11.2015</span>-->
	<!--			<a href="#" class="related-voprosi__otvetov">Ответов 22</a>-->
	<!--		</li>-->
	<!--		<li class="related-voprosi__li">-->
	<!--			<a href="" class="related-voprosi__link">-->
	<!--				Анализ на специфический иммуноглобулин е детям до года-->
	<!--			</a>-->
	<!--			<span class="related-voprosi__date">26.11.2015</span>-->
	<!--			<a href="#" class="related-voprosi__otvetov">Ответов 21</a>-->
	<!--		</li>-->
	<!--	</ul>-->

	<!--</div>-->



	<!--div class="contentBox-bottombanner">
		<a href="">
			<img src="static/img/bottom_banner.jpg" alt="">
		</a>
	</div-->

</div>