<?php if ($_SESSION['admin']) { ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4" id="navbar">
  <a class="navbar-brand" href="#"><?=$lang["admnav1"]?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo url(); ?>/panel/news"><?=$lang["admnav2"]?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo url(); ?>/panel/index"><?=$lang["admnav3"]?></a>
      </li>
    </ul>
  </div>
</nav>
<?php } ?>