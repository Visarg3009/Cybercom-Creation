<?php $shipment = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="shipment[Name]" class="form-control" id="inputName" value="<?php echo $shipment->Name ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputCode">Code</label>
            <input type="text" name="shipment[Code]" class="form-control" id="inputCode" value="<?php echo $shipment->Code ?>" required>
          </div> 
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputAmount">Amount</label>
            <input type="text"  name="shipment[Amount]" class="form-control" id="inputAmount" value="<?php echo $shipment->Amount ?>" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" name="shipment[Description]" id="inputDescription" cols="30" rows="2" value="<?php echo $shipment->Description ?>" required></textarea>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="shipment[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($shipment->status == $key) { if ($shipment->method_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-row">
        <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-success">ADD/UPDATE SHIPMENT</button>
        </div>
      </form>
    </div>
</div>

