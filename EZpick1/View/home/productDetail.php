<section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <?php  echo $this->createBlock('Block\Home\ProductDetail\ProductPhotoPanel')->toHtml();?>
                <!-- Modal view content -->
                <?php  echo $this->createBlock('Block\Home\ProductDetail\ProductDetailPanel')->toHtml();?>
              </div>
            </div>
            <!-- Bottom Details -->
            <?php  echo $this->createBlock('Block\Home\ProductDetail\BottomDetailPanel')->toHtml();?>
            <!-- Related product -->
            <?php  echo $this->createBlock('Block\Home\ProductDetail\RelatedProductPanel')->toHtml();?> 
          </div>
        </div>
      </div>
    </div>
</section>