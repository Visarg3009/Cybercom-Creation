<?php $images = $this->getImages();?>

<div class="container">
<form action="<?php echo $this->getUrl()->getUrl('save','admin\Category\Media');?>" method="post" id="upload" enctype="multipart/form-data">    
    <div class="form-group">
        <button type="button" name="delete" onclick="mage.setform('#upload').setUrl('<?php echo $this->getUrl()->getUrl('delete','admin\Category\Media');?>').load()"  class="btn btn-danger float-right">REMOVE</button>
    </div>
    <div class="form-group">
        <button type="button" name="save" onclick="mage.setform('#upload').load()" class="btn btn-warning float-right">UPDATE</button>
    </div>

    <table class="table table-striped table-hover table-bordered mt-5">
        <thead>
            <tr><th colspan="7">MEDIA</th>
            </tr>
            <tr class="bg-dark text-white text-center">
                <th>IMAGE</th>
                <th>LABEL</th>
                <th>SMALL</th>
                <th>THUMB</th>
                <th>BASE</th>
                <th>GALLERY</th>
                <th>REMOVE</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($images) {?>
        <?php foreach ($images->data as $key=>$image) {?>
            <tr>
                <td><img src="./Images/Category/<?php echo $image->image_name; ?>" alt="" hight="100px" width="100px"></td>
                <td><input type="text" value="<?php echo $image->image_name; ?>" name="image[data][<?php echo $image->image_Id;?>][image_name]"></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="<?php echo $image->image_Id; ?>" name="image[small]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="<?php echo $image->image_Id; ?>" name="image[thumb]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="<?php echo $image->image_Id; ?>" name="image[base]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $image->image_Id; ?>" name="image[data][<?php echo $image->image_Id?>][gallery]">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $image->image_Id;?>" name="image[remove][<?php echo $image->image_Id?>]">
                    </div>
                </td>
            </tr>
        <?php } ?>
        <?php } else {?>
            <td colspan="7">No Records Found!</td>
        <?php }?>
        </tbody>
    </table>
</form>
    
    <form action="<?php echo $this->getUrl()->getUrl('upload','admin\Category\Media');?>" method="post" id="save" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-6">
                <button type="button" name="save" onclick="mage.setform('#save').setUrl('<?php echo $this->getUrl()->getUrl('upload','admin\Category\Media');?>').uploadFile()" class="btn btn-success">UPLOAD</button>
            </div>
        </div>
    </form>
</div>