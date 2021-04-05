<?php $shipments = $this->getShipments();?>

<div class="container">
    <h3>SHIPMENTS</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD SHIPMENT METHOD</a>

    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Method_ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
    <?php if($shipments) : ?>
    <?php foreach ($shipments->data as $key=>$shipment) :?>
            <tr>
              <td> <?php echo $shipment->method_Id ?> </td>
              <td> <?php echo $shipment->name; ?> </td>
              <td> <?php echo $shipment->code; ?> </td>
              <td> <?php echo $shipment->amount; ?> </td>
              <td><?php 
                    if($shipment->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$shipment->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$shipment->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr>
          <td colspan="6">NO RECORDS FOUND!</td>
        </tr>
    <?php endif;?>
        </tbody>
    </table>
</div>