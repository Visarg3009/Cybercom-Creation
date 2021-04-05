<?php $attribute = $this->getAttribute();?>
<?php $options = $this->getOptions();?>

<?php if (!$options && $attribute->inputType != 'text') : ?>
	No Options Found!
<?php else: ?>
	<?php switch ($attribute->inputType):
		case 'select': ?>
			<div class="form-row">
				<div class="form-group col-md-4">
	            <label for="<?php echo $attribute->name?>"><?php echo $attribute->name?>:</label>
		            <select class="form-control" name="<?php echo $attribute->entityTypeId; ?>[<?php echo $attribute->name?>]">   
		            <?php foreach ($options->data as $option): ?>
		            	<option value="<?php echo $option->name; ?>"><?php echo $option->name;?></option>
		            <?php endforeach;?>
		            </select>
	          </div>
			</div>
		<?php break;?>

		<?php case 'text': ?>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="<?php echo $attribute->name?>"><?php echo $attribute->name?>:</label>
					<input type="text" class="form-control" name="<?php echo $attribute->entityTypeId; ?>[<?php echo $attribute->name?>]" value="">
				</div>
			</div>
		<?php break;?>

		<?php case 'textarea': ?>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="<?php echo $attribute->name?>"><?php echo $attribute->name?>:</label>
					<textarea name="<?php echo $attribute->entityTypeId; ?>[<?php echo $attribute->name?>]"></textarea>
				</div>
			</div>
		<?php break;?>

		<?php case 'checkbox': ?>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="<?php echo $attribute->name?>"><?php echo $attribute->name?>:</label><br>
		            <?php foreach ($options->data as $option): ?>
		            	<?php echo $option->name;?>: <input type="checkbox" class="form-group" name="<?php echo $attribute->entityTypeId; ?>[<?php echo $attribute->name;?>]" value="<?php echo $option->name; ?>">
		            <?php endforeach;?>
		        </div>    
			</div>
		<?php break;?>

		<?php case 'radio': ?>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="<?php echo $attribute->name?>"><?php echo $attribute->name?>:</label><br>
		            <?php foreach ($options->data as $option): ?>
		            	<?php echo $option->name;?>: <input type="radio" class="form-group" name="<?php echo $attribute->entityTypeId; ?>[<?php echo $attribute->name;?>]" value="<?php echo $option->name; ?>">
		            <?php endforeach;?>
		        </div>    
			</div>
		<?php break;?>

	<?php endswitch; ?>
<?php endif; ?>