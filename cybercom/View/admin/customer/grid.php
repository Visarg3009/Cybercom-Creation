<?php $data = $this->getCustomers();?>

<div class="container">
    <h3>Customers</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD CUSTOMER</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr class="bg-dark text-white text-center">
                <th>Customer_ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Group_ID</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>ZipCode</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

    <?php foreach ($data->data as $key=>$value) {?>

            <tr>
              <td> <?php echo $value->customer_Id; ?> </td>
              <td> <?php echo $value->firstName; ?> </td>
              <td> <?php echo $value->lastName; ?> </td>
              <td> <?php echo $value->Name; ?> </td>
              <td> <?php echo $value->email; ?> </td>
              <td> <?php echo $value->mobile; ?> </td>
              <td> <?php echo $value->zipcode; ?> </td>
              <td><?php 
                    if($value->status == 0) {
                      echo "Disabled";
                    } else {
                      echo "Enabled";
                    }
                  ?>
              </td>
              <td>
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->customer_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->customer_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
    <?php } ?>
        </tbody>
    </table>
</div>