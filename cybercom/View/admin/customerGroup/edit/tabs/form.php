<?php $customerGroup = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle();?></h3>
    <hr>
      <form method="post"  id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="customerGroup[Name]" class="form-control" id="inputName" value="<?php echo $customerGroup->Name ?>" required>
          </div> 
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="customerGroup[Status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($customerGroup->Status == $key) { if ($customerGroup->Group_ID) {echo "selected";} } ?>><?php echo $value;?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="form-row">
        <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-success">ADD/UPDATE CUSTOMER</button>
        </div>
      </form>
    </div>
</div>

