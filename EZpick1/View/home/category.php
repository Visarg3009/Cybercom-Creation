<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <?php echo $this->createBlock('Block\Home\Category\ProductList')->toHtml(); ?>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                <?php  echo $this->createBlock('Block\Home\Category\CategoryPanel')->toHtml();?>
                <?php  echo $this->createBlock('Block\Home\Category\PricePanel')->toHtml();?>
                <?php  //echo $this->createBlock('Block\Home\Category\ColorPanel')->toHtml();?>
                </aside>
            </div>
        </div>
    </div>
</section>