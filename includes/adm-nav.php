<?php if ($_SESSION['admin']) { ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4" id="navbar">
  <a class="navbar-brand" href="#">Панель администратора</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/panel/news">Опубликовать новость</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/panel/index">Управление сайтом</a>
      </li>
    </ul>
  </div>
</nav>
<?php } ?>