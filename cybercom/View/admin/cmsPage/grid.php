<?php $data = $this->getCmsPages();?>

<div class="container">
    <h3>CMS-PAGE</h3>
    <hr>
    <a class="btn btn-warning mb-2" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').load();" href="javascript:void(0);">ADD CMS-PAGE</a>
    <table class=" table table-striped table-hover table-bordered">
      <thead>
        <tr  class="bg-dark text-white text-center">
          <th>Page_ID</th>
          <th>Title</th>
          <th>Identifer</th>
          <th>Content</th>
          <th>Created_Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody><?php if ($data) {?> 
      <?php foreach ($data->data as $key=>$value) {?>
    
            <tr>
              <td> <?php echo $value->page_Id ?> </td>
              <td> <?php echo $value->title; ?> </td>
              <td> <?php echo $value->identifier; ?> </td>
              <td> <?php echo $value->content; ?> </td>
              <td> <?php echo $value->created_Date; ?> </td>
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
                <a class="btn btn-success" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['id'=>$value->page_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete',null,['id'=>$value->page_Id]); ?>').load();" href="javascript:void(0);"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
      <?php } ?>
      <?php } else {?>
            <td colspan="7">No Records Found!</td>
        <?php }?>
        </tbody>
    </table>
</div>