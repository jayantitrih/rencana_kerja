<div class="panel panel-default">
	<div class="panel-heading">
	Edit Group
	</div>
	<div class="panel-body">
		<?php echo form_open('managed/update_group/'.$id);?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $group['name'];?>"  class="form-control"/>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" class="form-control"><?php echo $group['description'];?></textarea> 
		</div>
		<div class="form-group">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>