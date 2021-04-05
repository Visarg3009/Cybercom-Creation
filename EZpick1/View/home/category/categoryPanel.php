<?php $categories = $this->getCategories(); ?>
<div class="aa-sidebar-widget">
    <h3>Category</h3>
    <ul class="aa-catg-nav">

    <?php foreach ($categories->getData() as $key => $category):?>
        <li><a href="<?= $this->getUrl()->getUrl('view','category',['id'=>$category->category_Id]);?>"><?= $category->name?></a></li>
    <?php endforeach;?>
    </ul>
</div>