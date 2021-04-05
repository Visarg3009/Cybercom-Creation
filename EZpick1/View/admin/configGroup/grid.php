<?php $configGroups = $this->getConfigGroups();?>

<div class="container">
    <h3>CONFIG-GROUP</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD CONFIG-GROUP</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>GROUP ID</th>
                <th>Name</th>
                <th>Created_Date</th>
                <th>Actions</th>
            </tr>
    <?php if (!$configGroups) : ?>
      <tr>
        <td>NO RECORDS FOUND!!!</td>
      </tr>
    <?php else : ?>
      <?php foreach ($configGroups->getData() as $key=>$configGroup) :?>
      
        <tr>
          <td> <?php echo $configGroup->groupId; ?> </td>
          <td> <?php echo $configGroup->name; ?> </td>
          <td> <?php echo $configGroup->created_Date; ?> </td>
          <td>
            <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$configGroup->groupId]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$configGroup->groupId]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php endforeach;?>
      <?php endif;?>
        </tbody>
    </table>
</div>