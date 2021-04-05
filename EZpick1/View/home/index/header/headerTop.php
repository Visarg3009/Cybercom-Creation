<div class="aa-header-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-header-top-area">
          <!-- start header top left -->
          <div class="aa-header-top-left">
            <!-- start language -->
            <div class="aa-language">
              <div class="dropdown">
                <a class="btn" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <img src="Images/home/flag/english.jpg" alt="english flag">ENGLISH
                </a>
              </div>
            </div>
            <!-- / language -->

            <!-- start currency -->
            <div class="aa-currency">
              <div class="dropdown">
                <a class="btn" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-usd"></i>USD
                </a>
              </div>
            </div>
            <!-- / currency -->
            <!-- start cellphone -->
            <div class="cellphone hidden-xs">
              <p><span class="fa fa-phone"></span>00-12-253-456</p>
            </div>
            <!-- / cellphone -->
          </div>
          <!-- / header top left -->
          <div class="aa-header-top-right">
            <ul class="aa-head-top-nav-right">
              <li><a href="account.html">My Account</a></li>
              <li class="hidden-xs"><a href="wishlist.html">Wishlist</a></li>
              <li class="hidden-xs"><a href="<?= $this->getUrl()->getUrl('grid','customer\Cart');?>">My Cart</a></li>
              <li class="hidden-xs"><a href="http://localhost/EZpick1/View/home/customer/SellerSignup.php">Be A Seller</a></li>
               
              <?php if (isset($_SESSION['customerName'])) : ?>
                <li><span>Hello,</span><?php echo $_SESSION['customerName']; ?></li>
                <li><a href="View/home/logout.php">Logout</a></li>
              <?php  else : ?>
                <li><a href="View/home/login.php">Login</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>