<?php $configs = $this->getConfigs(); ?>
<?php $configGroup = $this->getTableRow();?>

<div class="container">
<form action="<?php echo $this->getUrl()->getUrl('save','admin\ConfigGroup\Config');?>" method="post" id="update">    
    <div class="form-group">
        <button type="button" name="save" onclick="mage.setform('#update').load()" class="btn btn-warning float-right m-3">UPDATE</button>
    </div>

    <table id="existingOption" class="table table-striped table-hover table-bordered mt-5">
        <thead>
            <tr>
                <th colspan="7">Configs</th>
            </tr>
            <tr class="bg-dark text-white text-center">
                <th>Title</th>
                <th>Code</th>
                <th>Value</th>
                <th>REMOVE</th>
            </tr>
        </thead>

        <tbody>
        <?php if ($configs) :?>
        <?php foreach ($configs->getData() as $key=>$config) :?>
            <tr>
                <td><input type="text" value="<?php echo $config->title; ?>" name="exist[<?php echo $config->configId; ?>][title]"></td>
                <td><input type="text" value="<?php echo $config->code; ?>" name="exist[<?php echo $config->configId; ?>][code]"></td>
                <td><input type="text" value="<?php echo $config->value; ?>" name="exist[<?php echo $config->configId; ?>][value]"></td>
                <td>
                    <div class="form-group col-md-6">
                        <button type="button" name="remove" onclick="mage.remove(this)" class="btn btn-danger">REMOVE CONFIG</button>
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
            <button type="button" name="addOption" onclick="mage.addOption()" class="btn btn-success float-right">ADD CONFIG</button>
    </div>
    
</form>
    <div style="display:none">
        <table id="newOption">
            <tbody>
                <tr>
                    <td><input type="text" name="new[title][]"></td>
                    <td><input type="text" name="new[code][]"></td>
                    <td><input type="text" name="new[value][]"></td>
                    <td>
                        <div class="form-group col-md-6">
                            <button type="button" name="remove" onclick="mage.remove(this)" class="btn btn-danger">REMOVE CONFIG</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>