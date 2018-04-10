
<div class="table-responsive">
	<table class="table datatables">
		<thead>
			<tr>
				<th>No</th>
				<th>Agenda & Pembahasan</th>
				<th>PIC</th>
				<th>Durasi</th>
				<th>Selesai</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($discussions)) {
				$no =1;
				foreach ($discussions as $key => $value) { ?>

				<tr>
					<td>
						<?= $no ?> 
					</td>
					<td>
						<?= (isset($value->discussion))? $value->discussion : '' ?>	
					</td>
					<td>
						<?= (isset($value->discussion_pic))? get_info_user($value->discussion_pic) : '' ?>	
					</td>
					<td>
						<?php
						if (
							isset($value->discussion_start)
							&& 	isset($value->discussion_target)
						) {
							echo show_date_human_format($value->discussion_start);
							echo '<br/>&nbsp;s/d&nbsp;<br/>';
							echo show_date_human_format($value->discussion_target);
						}
						?>	
					</td>
					<td>
						<?php
						if(isset($value->discussion_finish)){
							if (
									empty($value->discussion_finish)
								|| is_null($value->discussion_finish)
								) {
								$args =array(
									'type'=>'date',
									'class'=>'form-control',
									'name'=>'discussion_finish'
								);
								echo form_input($args);

							}else{
								echo $value->discussion_finish;
							}
						}
						?>
					</td>
					<td>
						<?php
						if (isset($value->discussion_status)) {
							if ($value->discussion_status == 'open') {
								echo anchor('#','Close',array('class'=>'btn btn-warning'));
							}else{
								echo anchor('#','Open',array('class'=>'btn btn-success'));
							}
						}
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