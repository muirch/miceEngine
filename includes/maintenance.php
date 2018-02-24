<?php if($rowSiteData['maintenance']==0) { ?>
<div class="outer" id="maintenance">
	<div class="inner"> 
		<h1 class="display-4">Сайт находится на техническом обслуживании.</h1>
	</div>
</div>
<?php } elseif ($rowSiteData['maintenance']==1 and $_SERVER['REQUEST_URI']!="/stats.php" and $_SERVER['REQUEST_URI']!="/ranking.php") { ?>
<div class="outer" id="maintenance">
	<div class="inner"> 
		<h1 class="display-4">Данный модуль сайта находится на техническом обслуживании.</h1>
		<p>Вы можете перейти на страницы <a href="ranking.php">топа</a> и <a href="stats.php">статистики игроков</a></p>
	</div>
</div>
<?php } ?>