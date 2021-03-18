<?php 
    $attributeOptions = $this->getAttributeOptions();
    $attribute = $this->getTableRow();
?>

<div class="container">
<form action="<?php echo $this->getUrl()->getUrl('save','admin\Attribute\Option');?>" method="post" id="update">    
    <div class="form-group">
        <button type="button" name="save" onclick="mage.setform('#update').load()" class="btn btn-warning float-right m-3">UPDATE</button>
    </div>

    <table id="existingOption" class="table table-striped table-hover table-bordered mt-5">
        <thead>
            <tr>
                <th colspan="7">OPTIONS</th>
            </tr>
            <tr class="bg-dark text-white text-center">
                <th>Name</th>
                <th>SortOrder</th>
                <th>REMOVE</th>
            </tr>
        </thead>

        <tbody>
        <?php if ($attributeOptions) :?>
        <?php foreach ($attributeOptions->data as $key=>$attributeOption) :?>
            <tr>
                <td><input type="text" value="<?php echo $attributeOption->name; ?>" name="exist[<?php echo $attributeOption->optionId; ?>][name]"></td>
                <td><input type="text" value="<?php echo $attributeOption->sortOrder; ?>" name="exist[<?php echo $attributeOption->optionId; ?>][sortOrder]"></td>
                <td>
                    <div class="form-group col-md-6">
                        <button type="button" name="remove" onclick="mage.remove(this)" class="btn btn-danger">REMOVE OPTION</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else :?>
            <td colspan="7">No Records Found!</td>
        <?php endif;?>
        </tbody>
    </table>
    <div class="form-group">
            <button type="button" name="addOption" onclick="mage.addOption()" class="btn btn-success float-right">ADD OPTION</button>
    </div>
    
</form>
    <div style="display:none">
        <table id="newOption">
            <tbody>
                <tr>
                    <td><input type="text" name="new[name][]"></td>
                    <td><input type="text" name="new[sortOrder][]"></td>
                    <td>
                        <div class="form-group col-md-6">
                            <button type="button" name="remove" onclick="mage.remove(this)" class="btn btn-danger">REMOVE OPTION</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>