<?php $attribute = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">

      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEntityTypeId">Entity-Type</label>
            <select class="form-control" name="attribute[entityTypeId]">
              <?php foreach ($attribute->getEntityTypeIdOptions() as $key => $value): ?>
                <option value="<?php echo $key ?>"><?php echo $value;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="attribute[name]" class="form-control" id="inputName" value="<?php echo $attribute->name ?>" required>
          </div>

          <div class="form-group col-md-6">
            <label for="inputCode">Code</label>
            <input type="text" name="attribute[code]" class="form-control" id="inputCode" value="<?php echo $attribute->code ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputType">InputType</label>
            <select class="form-control" name="attribute[inputType]">
              <?php foreach ($attribute->getInputTypeOptions() as $key => $value): ?>
                <option value="<?php echo $key ?>"><?php echo $value;?></option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="backendType">BackendType</label>
            <select class="form-control" name="attribute[backendType]">
              <?php foreach ($attribute->getBackendTypeOptions() as $key => $value): ?>
                <option value="<?php echo $key ?>"><?php echo $value;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputSortOrder">Sort-Order</label>
            <input type="text" name="attribute[sortOrder]" class="form-control" value="<?php echo $attribute->sortOrder ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputBackendModel">Backend-Model</label>
            <input type="text" name="attribute[backendModel]" class="form-control" value="<?php echo $attribute->backendModel ?>">
          </div>
        </div>

        <div class="form-row">
          <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-success">ADD/UPDATE ATTRIBUTE</button>
        </div>
      </form>
    </div>
</div>