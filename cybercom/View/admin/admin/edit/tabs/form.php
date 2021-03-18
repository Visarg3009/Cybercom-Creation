<?php $admin = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle();?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputUserName">UserName</label>
            <input type="text" name="admin[userName]" class="form-control" id="inputUserName" value="<?php echo $admin->userName ?>" required>
          </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPassword">Password</label>
                <input type="password"  name="admin[password]" class="form-control" id="inputPassword" value="<?php echo $admin->password ?>" required>
            </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="admin[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($admin->status == $key) { if ($admin->admin_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
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