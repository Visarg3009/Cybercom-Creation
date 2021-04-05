<?php $products = $this->getProducts();?>

<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#men" data-toggle="tab">Popular Products</a></li>
              </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <!-- Start men product category -->
                  <div class="tab-pane fade in active" id="men">
                    <ul class="aa-product-catg">
                    <?php foreach ($products->data as $key=>$product) :?>
                      <!-- start single product item -->
                      <li>
                        <figure>
                          <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','ProductDetail',['id' => $product->product_id]);?>"><img src="./Images/Product/<?php echo $product->image_name; ?>"></a>
                          <a class="aa-add-card-btn" href="<?php echo $this->getUrl()->getUrl('addItemToCart','customer\cart',['id' => $product->product_id]); ?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','ProductDetail');?>"><?php echo $product->name; ?></a></h4>
                            <span class="aa-product-price"><?php echo $product->price; ?></span>
                          </figcaption>
                        </figure>                        
                        <div class="aa-product-hvr-content">
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                          <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                        </div>
                      </li>
                    <?php endforeach; ?>                  
                    </ul>
                    <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>