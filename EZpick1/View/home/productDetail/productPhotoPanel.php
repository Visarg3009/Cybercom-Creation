<?php
  $productImage = $this->getThumbnailPhoto($this->getRequest()->getGet('id'));
  $photos = $this->getPhotos($this->getRequest()->getGet('id'));
?>
<!-- Modal view slider -->
<div class="col-md-5 col-sm-5 col-xs-12">                              
    <div class="aa-product-view-slider">                                
    <div id="demo-1" class="simpleLens-gallery-container">
        <div class="simpleLens-container">
        <div class="simpleLens-big-image-container"><a data-lens-image="./Images/Product/<?= $productImage->image_name?>" class="simpleLens-lens-image"><img src="./Images/Product/<?= $productImage->image_name?>" class="simpleLens-big-image"></a></div>
        </div><br>
        <?php /*
        <div class="simpleLens-thumbnails-container">
            <?php foreach ($photos->getData() as $key => $photo):?>
            <a data-big-image="./Images/Product/<?= $photo->image_name?>" data-lens-image="./Images/Product/<?= $photo->image_name?>" class="simpleLens-thumbnail-wrapper" href="#">
                <img src="./Images/Product/<?= $photo->image_name?>" height="50px" width="60px">
            </a> 
            <?php endforeach;?>                              
        </div>  */?>
    </div>
    </div>
</div>