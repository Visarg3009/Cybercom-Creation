<?php $payment = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle();?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="payment[name]" class="form-control" id="inputName" value="<?php echo $payment->name ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCode">Code</label>
            <input type="text" name="payment[code]" class="form-control" id="inputCode" value="<?php echo $payment->code ?>" required>
          </div> 
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" name="payment[description]" id="inputDescription" cols="30" rows="2" value="<?php echo $payment->description ?>" required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="payment[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($payment->status == $key) { if ($payment->method_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-row">
        <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-success">ADD/UPDATE PAYMENT METHOD</button>
        </div>
      </form>
    </div>
</div>