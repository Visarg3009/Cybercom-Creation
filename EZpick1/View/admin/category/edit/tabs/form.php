<?php $category = $this->getTableRow();
$categoryOptions = $this->getCategoryOption();
?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="save" action="<?php echo $this->getFormUrl();?>">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="category[name]" class="form-control" value="<?php echo $category->name ?>" id="inputName" required>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Parent Category</label>
            <select name="category[parent_Id]">
            <?php if ($categoryOptions): ?> 
            <?php foreach ($categoryOptions as $categoryId => $name): ?>
              <option value="<?php echo $categoryId;?>"><?php echo $name; ?></option>
            <?php endforeach; ?>
            <?php endif; ?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputDescription">Description</label>
            <textarea class="form-control" name="category[description]" value="<?php echo $category->description ?>" id="inputDescription" cols="30" rows="2" required></textarea>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="category[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($category->status == $key) { if ($category->category_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
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