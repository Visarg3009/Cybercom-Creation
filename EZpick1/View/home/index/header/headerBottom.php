<div class="aa-header-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-header-bottom-area">
          <!-- logo  -->
          <div class="aa-logo">
            <!-- Text based logo -->
            <a href="<?php echo $this->getUrl()->getUrl('index','home',null,true); ?>">
              <span class="fa fa-shopping-cart"></span>
              <p>EZpick<span>Local As It Can Get</span></p>
            </a>
            <!-- img based logo -->
            <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
          </div>
          <!-- / logo  -->
          <div class="aa-cartbox">
            <a class="aa-cart-link" href="<?= $this->getUrl()->getUrl('grid','customer\Cart');?>">
              <span class="fa fa-shopping-basket"></span>
              <span class="aa-cart-title">SHOPPING CART</span>
            </a>
          </div>
          <!-- search box -->
          <div class="aa-search-box">
            <form action="">
              <input type="text" name="" id="" placeholder="Search here ex. 'food' ">
              <button type="submit"><span class="fa fa-search"></span></button>
            </form>
          </div>
          <!-- / search box -->             
        </div>
      </div>
    </div>
  </div>
</div>