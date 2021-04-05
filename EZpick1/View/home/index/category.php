<?php $categories = $this->getCategories();?>

<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
                <li><a href="#featured" data-toggle="tab">Featured</a></li>                 
            </ul>
                <div class="tab-content">             
                    <div class="tab-pane fade in active" id="featured">
                    <ul class="aa-product-catg aa-featured-slider">
                        <!-- start single product item -->
                        <?php foreach ($categories->data as $key=>$category) :?>
                        <li>
                        <figure>
                            <a class="aa-product-img" href="<?php echo $this->getUrl()->getUrl('view','customer\Category');?>"><img src="./Images/Category/<?= $category->image_name ?>" alt="polo shirt img"></a>
                            <figcaption>
                            <h4 class="aa-product-title"><a href="<?php echo $this->getUrl()->getUrl('view','customer\Category');?>"><?= $category->name; ?></a></h4>
                            </figcaption>
                        </figure>
                        </li>
                        <?php endforeach; ?>                                                                                
                    </ul>
                        <a class="aa-browse-btn" href="#">Browse all Categories <span class="fa fa-long-arrow-right"></span></a>
                    </div>              
                </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
</section>