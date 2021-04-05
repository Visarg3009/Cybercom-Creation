<?php $products = $this->getProducts();?>

<div class="aa-product-related-item">
    <h3>Related Products</h3>
    <ul class="aa-product-catg aa-related-item-slider">
    <!-- start single product item -->
    <?php foreach ($products->getData() as $key => $product): ?>
    <li>
        <figure>
        <a class="aa-product-img" href="<?= $this->getUrl()->getUrl('view','ProductDetail',['id' => $product->product_id]);?>"><img src="./Images/Product/<?= $product->image_name?>" alt="product Image"></a>
        <a class="aa-add-card-btn"href="<?php echo $this->getUrl()->getUrl('addItemToCart','customer\cart',['id' => $product->product_id]); ?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
        <figcaption>
                <h4 class="aa-product-title"><a href="<?= $this->getUrl()->getUrl('view','ProductDetailPage');?>"><?= $product->name?></a></h4>
                <span class="aa-product-price">₹<?= $product->price;?></span>
                    <?php if($product->discount):?>
                    <span class="aa-product-price">&nbsp; &nbsp;<small>₹<?= $product->discount?> Discount</small></span>
                    <?php endif;?>
        </figcaption>
        </figure>                     
        <div class="aa-product-hvr-content">
        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
        </div> 
    </li>
    <?php endforeach;?>                                                                                 
    </ul>  
</div>