<?php 
$attributes = $this->getAttributes();
$product = $this->getTableRow();
?>

<form action="<?php echo $this->getFormUrl();?>" id="save" method="post">
	<?php if ($attributes) : ?>
		<?php foreach($attributes->data as $attribute):?>
			<?php
				$display = \Mage::getBlock('Block\Admin\Attribute\Display');
				$display->setAttribute($attribute)->setProduct($product);
				echo $display->toHtml();
			?>
		<?php endforeach;?>

	<div class="form-group">
        <button type="button" name="save" onclick="mage.setform('#save').load()" class="btn btn-warning">UPDATE</button>
    </div>
	<?php else: ?>

	<div class="ml-5">
		Attributes Are Not Available.
	</div>
	<?php endif;?>
</form>