<div class="panel panel-default">
	<div class="panel-heading">
		<h3>List groups</h3>
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatables">
			<thead>
				<th>No</th>
				<th>groupname</th>
				<th>Email</th>
				<th>Roles</th>
				<th>Active</th>
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
						<td><?php echo $value['email'];?></td>
						<td>
							<?php
							$roles = get_group_groups_by($value['id']);
							if ($roles) {
								foreach ($roles as $k => $role) {
									if ($k > 0) {
										echo '&nbsp;,&nbsp;';
									}
									echo anchor('managed/edit_group/'.$role['id'],ucwords($role['name']));

								}
							}
							?>
						</td>
						<td>
							<input type="checkbox" name="active" value="<?php echo $value['id'];?>"
							<?php echo ($value['active'] == 1)? 'checked' : '';?>
							 />
						</td>
						<td>
							<?php echo anchor('managed/remove_group/','<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger','onclick'=>"return confirm('are you sure?');"));?>
							<?php echo anchor('managed/details_group/'.$value['id'],'Details',array('class'=>'btn btn-primary'));?>
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