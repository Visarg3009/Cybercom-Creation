<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="">Website Title</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item active">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('index','admin\Product'); ?>').load();" href="javascript:void(0);">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Admin'); ?>').load();" href="javascript:void(0);">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Product'); ?>').load();" href="javascript:void(0);">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Category'); ?>').load();" href="javascript:void(0);">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Customer'); ?>').load();" href="javascript:void(0);">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Payment'); ?>').load();" href="javascript:void(0);">Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Shipment'); ?>').load();" href="javascript:void(0);">Shipment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Customer\CustomerGroup'); ?>').load();" href="javascript:void(0);">CustomerGroup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\Attribute'); ?>').load();" href="javascript:void(0);">Attribute</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin\CMSPage'); ?>').load();" href="javascript:void(0);">CMS-Page</a>
      </li>
    </ul>
  </div>
</nav>