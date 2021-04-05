<?php $data = $this->getCustomerGroups();?>

<div class="container">
    <h3>CustomerGroups</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD CUSTOMER-GROUP</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Group_ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created_Date</th>
                <th>Actions</th>
            </tr>
    <?php foreach ($data->data as $key=>$value) {?>
    
            <tr>
              <td> <?php echo $value->Group_ID ?> </td>
              <td> <?php echo $value->Name; ?> </td>
              <td><?php 
                    if($value->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td> <?php echo $value->Created_Date; ?> </td>
              <td>
              <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->Group_ID]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->Group_ID]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>