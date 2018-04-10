<div class="panel panel-default">
	<div class="panel-heading">
	Add Group
	</div>
	<div class="panel-body">
		<?php echo form_open('managed/store_group/');?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control"/>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" class="form-control"></textarea> 
		</div>
		<div class="form-group">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
</div>