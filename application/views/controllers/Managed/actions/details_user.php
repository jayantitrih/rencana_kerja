
<div class="row">
	<div class="col-xs-12 col-md-4">
		<h3>Account Information </h3>
		<div class="form-group">
			<h4>
				<small><?php echo lang('create_user_fname_label');?></small><br/>
				<?php echo (isset($users['first_name']))? $users['first_name'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small><?php echo lang('create_user_lname_label');?></small><br/>
				<?php echo (isset($users['last_name']))? $users['last_name'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>User</small><br/>
				<?php echo (isset($users['username']))? $users['username'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small><?php echo lang('create_user_email_label');?></small><br/>
				<?php echo (isset($users['email']))? $users['email'] : '';?>
			</h4>
		</div>

	</div>
	<div class="col-xs-12 col-md-4">
		<h3>General Information</h3>
		
		<div class="form-group">
			<h4>
				<small>Born Place, Date of Birthday</small>
				<?php 
				if (isset($employee['born_place']) && isset($employee['date_of_birth'])) {
					echo ucfirst($employee['born_place']);
					echo ", ".$employee['date_of_birth'];
				}

				?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Address</small>
				<?php echo (isset($employee['address']))? $employee['address'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Gender</small>
				<?php echo (isset($employee['gender']))? $employee['gender'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Photo Profile</small>
				<?php
				if (isset($employee['photo'])) {
					$url = trim($url);
					if (!empty($url)) {
						$url = base_url($employee['photo']);
						$length_url = strlen($url);
						if ($length_url > 5) {
							echo anchor($url,'preview');
						}
					}
					
				}
				
				?>
			</h4>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<h3>Employeement</h3>
		<div class="form-group">
			<h4>
				<small>NIK / NIDN</small>
				<?php echo (isset($employee['identity_number']))? $employee[''] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Join Date</small>
				<?php echo (isset($employee['join_at']))? $employee['join_at'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Terminate At</small>
				<?php echo (isset($employee['join_at']))? $employee['join_at'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Employee Type</small>
				<?php echo (isset($employee['employee_type']))? $employee['employee_type'] : '';?>
			</h4>
		</div>
		<div class="form-group">
			<h4>
				<small>Employee Status</small>
				<?php echo (isset($employee['employee_status']))? $employee['employee_status'] : '';?>
			</h4>
		</div>
	</div>
</div>
<?php $roles = get_user_groups_by($users['id']); ?>
<div class="row">
	<div class="col-xs-6">
		<h3>
			<?php
			$count_roles = count($roles);
			if ($count_roles > 0) {
				echo "Have $count_roles group permissions";
			}else{
				echo "Dont't have a group permissions";
			}
			?>
		</h3>
	</div>
	<div class="col-xs-6">
		<div class="text-right">
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				<?php echo ucwords('add group permission');?>
			</button>

		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<h3>Group Permissions</h3>
		
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					

					if ($roles) {
						$tbody ='<tbody>';
						$no =1;
						foreach ($roles as $key => $value) {
							$tbody .='<tr>';
							$tbody .='<td>'.$no.'</td>';
							$tbody .='<td>'.$value['name'].'</td>';
							$tbody .='<td>'.$value['description'].'</td>';
							$tbody .='<td>';
							$tbody .= anchor('managed/remove_group_permission/'.$users['id'].'/'.$value['id'],'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger','onclick'=>"return confirm('are you sure?');"));
							$tbody .='</td>';
							$tbody .='</tr>';
							$no++;
						}
						$tbody .='</tbody>';

						echo $tbody;
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Group Permission</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open('managed/add_group_permission/'.$users['id'],array('class'=>'form-inline'));?>
				<form class="form-add-group" method="post" class="">
					<div class="row">
						<div class="col-xs-10">
							<select class="col-xs-12" name="group_id">
							<option value="0">Choose one</option>
							<?php
							if (isset($roles) && isset($groups)) {

								foreach ($groups as $key => $value) {
									if (!isset($roles[$key]['name'])) {
										echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
									}
								}
							}
							?>
						</select>
						</div>
						<div class="col-xs-2">
							<button type="submit" class="btn btn-primary ">
							<i class="fa fa-plus"></i>&nbsp;
							Add
							</button>
						</div>
					</div>

					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
