<div class="panel panel-default">
	<div class="panel-heading">

		<div class="row">
			<div class="col-xs-4">
				List Users
			</div>
			<div class="col-xs-8">
				<div class="text-right">
					<div class="btn-groups">
						<?php echo anchor('managed/add_user','<i class="fa fa-plus"></i> Add User',array('class'=>'btn btn-primary'));?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="panel-body">
		<table class="table table-bordered datatables">
			<thead>
				<th>No</th>
				<th>Username</th>
				<th>Email</th>
				<th>Roles</th>
				<th>Active</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
				if (isset($users)) {
					$no =1;
					foreach ($users as $key => $value) { ?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $value['username'];?></td>
						<td><?php echo $value['email'];?></td>
						<td>
							<?php
							$roles = get_user_groups_by($value['id']);
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
							<?php echo anchor('managed/remove_user/','<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger','onclick'=>"return confirm('are you sure?');"));?>
							<?php echo anchor('managed/details_user/'.$value['id'],'Details',array('class'=>'btn btn-primary'));?>
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