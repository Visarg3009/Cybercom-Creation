<?php $configGroup = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="configGroup[name]" class="form-control" id="inputName" value="<?php echo $configGroup->name ?>" required>
          </div>
        </div>

        <div class="form-row">
          <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-success">ADD/UPDATE Config-Group</button>
        </div>
      </form>
    </div>
</div>