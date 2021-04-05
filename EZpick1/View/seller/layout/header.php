<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">EZpick</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('index','seller\Product'); ?>').load();" href="javascript:void(0);">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','seller\Product'); ?>').load();" href="javascript:void(0);">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="View/home/logout.php">Logout</a>
      </li>
    </ul>
    <span class="navbar-text float-right">
      <?php echo $_SESSION['sellerName']; ?>
    </span>
  </div>
</nav>