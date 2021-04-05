<?php $categories = $this->getCategories();?>

<section id="menu">
  <div class="container">
    <div class="menu-area">
      <!-- Navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
        </div>
        <div class="navbar-collapse collapse">
          <!-- Left nav -->
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <?php foreach ($categories->data as $key=>$category) :?>
              <li><a href="<?php echo $this->getUrl()->getUrl('view','category',['id'=>$category->category_Id],true);?>"><?php echo $category->name; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>       
  </div>
</section>