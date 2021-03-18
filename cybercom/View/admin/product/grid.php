<?php $data = $this->getProducts();?>

<div class="container">
    <h3>Products</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD PRODUCT</a>

    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Product_ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
    <?php foreach ($data->data as $key=>$value) {?>
    
            <tr>
              <td> <?php echo $value->product_id ?> </td>
              <td> <?php echo $value->name; ?> </td>
              <td> <?php echo $value->price; ?> </td>
              <td> <?php echo $value->discount; ?> </td>
              <td> <?php echo $value->quantity; ?> </td>
              <td><?php echo $value->description; ?> </td>
              <td><?php 
                    if($value->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->product_id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->product_id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>