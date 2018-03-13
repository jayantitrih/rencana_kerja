<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-4">
				List groups
			</div>
			<div class="col-xs-8">
				<div class="text-right">
					<div class="btn-groups">
						<?php echo anchor('managed/add_group','<i class="fa fa-plus"></i> Add Group',array('class'=>'btn btn-primary'));?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatables">
			<thead>
				<th>No</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				if (isset($groups)) {
					$no =1;
					foreach ($groups as $key => $value) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $value['name'];?></td>
						<td><?php echo $value['description'];?></td>
						<td>
							<?php echo anchor('managed/remove_group/'.$value['id'],'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger','onclick'=>"return confirm('are you sure?');"));?>
							<?php echo anchor('managed/edit_group/'.$value['id'],'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-primary'));?>

						</td>
					</tr>

					<?php	
					$no++;
				}
			}
			?>
		</tbody>
	</table>
</div>
</div>