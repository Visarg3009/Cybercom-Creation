<?php $product = $this->getTableRow();

?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="register" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputSku">SKU</label>
            <input type="text" name="product[sku]" class="form-control" id="inputSku" value="<?php echo $product->sku ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="product[name]" class="form-control" id="inputName" value="<?php echo $product->name ?>" required>
          </div> 
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputPrice">Price</label>
            <input type="text"  name="product[price]" class="form-control" id="inputPrice" value="<?php echo $product->price ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputDiscount">Discount</label>
            <input type="text"  name="product[discount]" class="form-control" id="inputDiscount" value="<?php echo $product->discount ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="inputQuantity">Quantity</label>
            <input type="text"  name="product[quantity]" class="form-control" id="inputQuantity" value="<?php echo $product->quantity ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" name="product[description]" id="inputDescription" cols="30" rows="2" value="<?php echo $product->description ?>" required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="product[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($product->status == $key) { if ($product->product_id) {echo "selected";} } ?>><?php echo $value;?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        
        <div class="form-row">
          <button type="button" name="save" onclick="mage.setform('#register').load()" class="btn btn-success">ADD/UPDATE PRODUCT</button>
        </div>
      </form>
    </div>
</div>

