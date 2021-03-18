<?php $cmsPage = $this->getTableRow();?>

<div class="container mt-20">
    <h3><?php echo $this->getTitle(); ?></h3>
    <hr>
      <form method="post" id="form" action="<?php echo $this->getFormUrl();?>">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="text" name="cmsPage[title]" class="form-control" id="inputTitle" value="<?php echo $cmsPage->title ?>" required>
          </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputIdentifier">Identifier</label>
                <input type="text"  name="cmsPage[identifier]" class="form-control" id="inputIdentifier" value="<?php echo $cmsPage->identifier ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputContent">Content</label>
                <textarea name="cmsPage[content]" value="<?php echo $cmsPage->content;?>"></textarea>
            </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="status">Status</label>
            <select class="form-control" name="cmsPage[status]">
              <option value=" "  selected>Select</option>
              <?php foreach ($this->getTableRow()->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key ?>" <?php if ($cmsPage->status == $key) { if ($cmsPage->page_Id) {echo "selected";} } ?>><?php echo $value;?> </option>
              <?php endforeach;?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <button type="button" name="save" onclick="mage.setCms().load()" class="btn btn-success">ADD/UPDATE CMS-PAGE</button>
        </div>
      </form>
    </div>
</div>

<script>
  CKEDITOR.replace('cmsPage[content]');
</script>