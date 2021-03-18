<?php $customer = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle();?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputFirstName">FirstName</label>
            <input type="text" name="customer[firstName]" class="form-control" value="<?php echo $customer->firstName ?>" id="inputFirstName" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputLastName">LastName</label>
            <input type="text" name="customer[lastName]" class="form-control" value="<?php echo $customer->lastName ?>" id="inputLastName" required>
          </div> 
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="customerGroup">Customer-Group</label>
            <select class="form-control" name="customer[Group_Id]" value="<?php echo $customer->Group_Id ?>">
              <option value="">Select</option>
              <option value="3">Retail</option>
              <option value="2">Wholsale</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email"  name="customer[email]" class="form-control" value="<?php echo $customer->email ?>" id="inputEmail" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputMobile">Mobile</label>
            <input type="text"  name="customer[mobile]" class="form-control" value="<?php echo $customer->mobile ?>" id="inputMobile" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword">Password</label>
            <input type="password"  name="customer[password]" class="form-control" value="<?php echo $customer->password ?>" id="inputPassword" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="customer[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($customer->status == $key) { if ($customer->customer_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
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