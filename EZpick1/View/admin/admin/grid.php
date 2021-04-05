<?php $data = $this->getAdmins();?>

<div class="container">
    <h3>ADMINS</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD ADMIN</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Admin_ID</th>
                <th>UserName</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            
    <?php foreach ($data->data as $key=>$value) {?>
    
            <tr>
              <td> <?php echo $value->admin_Id ?> </td>
              <td> <?php echo $value->userName; ?> </td>
              <td>  
                <?php 
                      if($value->status == 0) {
                        echo "Disabled";
                      } else {
                        echo "Enabled";
                      }
                ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->admin_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->admin_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>