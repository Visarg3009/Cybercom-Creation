<?php $data = $this->getShipments();?>

<div class="container">
    <h3>SHIPMENTS</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD SHIPMENT</a>

    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Method_ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            
    <?php foreach ($data->data as $key=>$value) {?>
    
            <tr>
              <td> <?php echo $value->method_Id ?> </td>
              <td> <?php echo $value->Name; ?> </td>
              <td> <?php echo $value->Code; ?> </td>
              <td> <?php echo $value->Amount; ?> </td>
              <td><?php echo $value->Description; ?> </td>
              <td><?php 
                    if($value->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>