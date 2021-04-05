<?php 
$product = $this->getTableRow();
$customerGroups = $this->getCustomerGroups();
?>

<form action="<?php echo $this->getUrl()->getUrl('save','Product_GroupPrice');?>" id="upload" method="post">
    <div class="form-group">
        <button type="button" name="save" onclick="mage.setform('#upload').load()" class="btn btn-warning float-right">UPDATE</button>
    </div>

<table class="table table-striped table-hover table-bordered mt-5">
    <thead>
        <tr class="bg-dark text-white text-center">
            <th>GroupID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Group-Price</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($customerGroups) {?>
    <?php foreach ($customerGroups->data as $key => $value) : ?>
    <?php $rowStatus = ($value->entityId) ? 'exist' : 'new';?> 
        <tr>
            <td><?php echo $value->Group_ID?></td>
            <td><?php echo $value->Name?></td>
            <td><?php echo $value->price?></td>
            <td><input type="text" name="groupPrice[<?php echo $rowStatus; ?>][<?php echo $value->Group_ID;?>]" value="<?php echo $value->groupPrice; ?>"></td>
        </tr>
    <?php endforeach; ?>
    <?php } else {?>
            <td colspan="7">No Records Found!</td>
    <?php }?>
    </tbody>
</table>
</form>