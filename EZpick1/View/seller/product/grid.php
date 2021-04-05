<?php $products = $this->getProducts();?>

<div class="container">
    <h3>Products</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD PRODUCT</a>

    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Product_ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
    <?php if($products) : ?>       
    <?php foreach ($products->data as $key=>$product) {?>
    
            <tr>
              <td> <?php echo $product->product_id ?> </td>
              <td> <?php echo $product->name; ?> </td>
              <td> <?php echo $product->price; ?> </td>
              <td> <?php echo $product->discount; ?> </td>
              <td> <?php echo $product->quantity; ?> </td>
              <td><?php 
                    if($product->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$product->product_id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$product->product_id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
    <?php else : ?>
      <tr>
        <td colspan="7">NO RECORDS FOUND!!!</td>
      </tr>
    <?php endif; ?>
        </tbody>
    </table>
</div>