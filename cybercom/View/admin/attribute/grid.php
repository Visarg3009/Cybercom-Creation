<?php $attributes = $this->getAttributes();?>

<div class="container">
    <h3>ATTRIBUTES</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD ATTRIBUTE</a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>attributeId</th>
                <th>Entity-Type</th>
                <th>Name</th>
                <th>Code</th>
                <th>Input-Type</th>
                <th>Backend-Type</th>
                <th>Sort-Order</th>
                <th>Actions</th>
            </tr>
    <?php if (!$attributes) : ?>
      <tr>
        <td>NO RECORDS FOUND!!!</td>
      </tr>
    <?php else : ?>
      <?php foreach ($attributes->data as $key=>$value) :?>
      
        <tr>
          <td> <?php echo $value->attributeId; ?> </td>
          <td> <?php echo $value->entityTypeId; ?> </td>
          <td> <?php echo $value->name; ?> </td>
          <td> <?php echo $value->code; ?> </td>
          <td> <?php echo $value->inputType; ?> </td>
          <td> <?php echo $value->backendType; ?> </td>
          <td> <?php echo $value->sortOrder; ?> </td>
          <td>
            <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->attributeId]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->attributeId]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td>
        </tr>
      <?php endforeach;?>
      <?php endif;?>
        </tbody>
    </table>
</div>