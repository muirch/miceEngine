<nav class="navbar navbar-expand-lg mice" id="usernav" style="background:transparent;">
  <div class="navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Главная</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/ranking">Топ игроков</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/stats">Статистика</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Правила игры</a>
      </li>
    </ul>
    <ul class="navbar-nav ">
      <?php if(!isset($_SESSION['admin']) and !isset($_SESSION['user'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/usr/login">Войти в личный кабинет &raquo;</a>
      </li>
      <?php } elseif(isset($_SESSION['admin']) or isset($_SESSION['user'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="?logout">&laquo; Выйти</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="<?=$siteLink?>/usr/profile">Личный кабинет &raquo;</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
<?php if (!empty(isset($pub)) or !empty(isset($adid))) { ?>
<div class="foot"></div>
<nav class="navbar navbar-expand-lg mice" id="google-ad" style="background:transparent;">
  <div class="navbar-collapse">
    <ins class="adsbygoogle navbar-collapse" style="display:block" 
    data-ad-client="<?=$pub?>" 
    data-ad-slot="<?=$adid?>"
    data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</nav>
<?php } ?>
<div class="foot"></div>
