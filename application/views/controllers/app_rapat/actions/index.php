<div class="row">
	<div class="col-xs-12">

		<div class="panel panel-default" >
			<div class="panel-heading">
				<h4><?php echo date('l, d F Y');?></h4>
			</div>
			<div class="panel-body">
				<table class="table table-bordered datatables">
					<thead>
						<th>#</th>
						<th>Tanggal </th>
						<th>Tempat </th>
						<th>Materi Tinjauan </th>
						<th>Waktu</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<?php
						if (isset($meetings)) {
							$no =1;
							foreach ($meetings as $key => $value) { ?>
							<tr>
								<td>
									<?= $no ?>
								</td>
								<td>
									<?php echo (isset($value->meeting_date))? $value->meeting_date : '';?>	
								</td>
								<td>
									<?php echo (isset($value->meeting_place))? $value->meeting_place : '';?>	
								</td>
								<td>
									<?php echo (isset($value->meeting_review))? $value->meeting_review : '';?>	
								</td>
								<td>
									<?php 
									if (isset($value->start_at) && isset($value->finish_at)) {
										echo $value->start_at;
										echo '&nbsp;s/d&nbsp;';
										if (
											empty($value->finish_at) ||
											$value->finish_at == '00:00:00'
										) {
											echo 'selesai';
										}else{
											echo $value->finish_at;
										}
									}
									?>	
								</td>
								<td>
									<?php
									if (
										isset($user_id) &&
										(isset($value->secretary) && isset($value->chairman)) &&
										($value->secretary == $user_id || $value->chairman == $user_id)
									) {
										echo anchor(
											'app_rapat/buat_notulen/'.$value->id_meeting,
											'<i class="fa fa-pencil"></i> Tulis Notulen',
											array('class'=>'btn btn-primary')); 

									}else{
										echo anchor(
											'app_rapat/join_rapat/'.$value->id_meeting,
											'<i class="fa fa-sign-in"></i> Join',
											array('class'=>'btn btn-info')); 
									}
									?>
									
									<?php

									?>
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
</div>
</div>