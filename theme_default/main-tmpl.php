<div class="contentBox">

	<div class="contentBox-search">		
		<form>
			<input class="contentBox-search__pole" type="text" name="query" required placeholder="Поиск вопроса">
			<input type="hidden" name="type" value="search_vopros">
			<input class="contentBox-search__btn" type="submit" value="НАЙТИ">
		</form>	
		<?php if (isset($search)): ?>
		<div class='sm-search'><?=$message?></div>
		<?php endif; ?>		
	</div>

	<div class="contentBox-voprosi">
		<?=show_message()?>
			<?php if (is_data($vorposi)): ?>
			<h3 class="contentBox-voprosi__title">Последние вопросы</h3>
			<ul class="contentBox-voprosi__list">
				<?php foreach($vorposi as $item): ?>
				<li class="contentBox-voprosi__li">
					<h2 class="contentBox-voprosi__h2">
						<a href="?type=vopros&id=<?=$item['id_vopros']?>" class="contentBox-voprosi__h2link"><?=$item['title']?></a>
					</h2>
					<p class="contentBox-voprosi__reg">
						<span class="contentBox-voprosi__number">№ <?=$item['id_vopros']?></span>
						<a class="contentBox-voprosi__cat" href="?type=category&category=catvop&catid=<?=$item['catid']?>"><?=$item['cat_name']?></a>
						<span class="contentBox-voprosi__date"><?=date_format($item['date'], 'd.m.Y')?></span>
					</p>
					<p class="contentBox-voprosi__quest"><?=str_size($item['text'],$config["strlenvop"])?></p>
					<p class="contentBox-voprosi__author">
						<span><?=($item['unknown'])?'Анонимно':'<a href="?type=profile&uid='.$item['authorid'].'">'.$item['last_name'].' '.$item['first_name'].'</a>'?></span>
					</p>
					<div class="contentBox-voprosi__bottom">
						<a href="?type=vopros&id=<?=$item['id_vopros']?>" class="contentBox-voprosi__more">Читать далее</a>
						<span class="contentBox-voprosi__otvotov">
							<?=($item['count_otvet'])?'<a href="?type=vopros&id='.$item['id_vopros'].'">Ответов врачей '.$item['count_otvet'].' </a>':'<span>НЕТ ОТВЕТОВ</span>'?>
						</span>
						<?php $item['tags_name'] = explode(",",$item['tags_name']); if (empty($item['tags_name'][0])) unset($item['tags_name'][0]); ?>
						<?php if (!empty($item['tags_name'])): ?>
						<ul class="contentBox-voprosi__tags">
							<?php foreach($item['tags_name'] as $item): ?>
								<li class="contentBox-voprosi__tag"><a href="?type=tag&tag=<?=$item?>"><?=$item?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>		
			<?php else: ?>
			<p class='no-voprosov'>В этой категории нет вопросов, вы можете <a href='http://sprosimedica.ru/?type=add_vopros'>Задать вопрос</a></p>
			<?php endif; ?>
		
	</div>

	<?=(!empty($config["pages_count"] > 1)?getNavi($_GET['page'], $config["pages_count"]):false)?>

	<div class="contentBox-bottombanner">
		<!--a href="">
			<img src="static/img/bottom_banner.jpg" alt="">
		</a-->
	</div>

</div>