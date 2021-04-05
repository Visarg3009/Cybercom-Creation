<?php $payments = $this->getPayments();?>

<div class="container">
    <h3>Payments</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD PAYMENT METHOD</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Method_ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
    <?php if($payments) : ?>      
    <?php foreach ($payments->data as $key=>$payment) :?>
            <tr>
              <td> <?php echo $payment->method_Id ?> </td>
              <td> <?php echo $payment->name; ?> </td>
              <td> <?php echo $payment->code; ?> </td>
              <td> <?php echo $payment->description; ?> </td>
              <td><?php 
                    if($payment->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$payment->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$payment->method_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
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