<div class="row">
	<div class="col-xs-12">

		<div class="panel panel-default" >
			<div class="panel-heading">
				<h4>Rapat Terarsip</h4>
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
									echo anchor(
										'app_rapat/details_rapat/'.$value->id_meeting,
										'<i class="fa fa-eye"></i> Lihat',
										array('class'=>'btn btn-info')
									); 
									echo anchor(
										'app_rapat/details_rapat/'.$value->id_meeting,
										'<i class="fa fa-envelope-open"></i> Buka Kembali',
										array('class'=>'btn btn-success')
									); 
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