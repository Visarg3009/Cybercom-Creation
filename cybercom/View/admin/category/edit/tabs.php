<?php
$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) { ?>
    <a class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl(null,null,['tab' => $key]); ?>').load();" href="javascript:void(0);"><?php echo $tab['label'];?></a><br><br>
<?php }?>