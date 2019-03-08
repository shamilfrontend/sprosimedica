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