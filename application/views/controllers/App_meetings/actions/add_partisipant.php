<div class="row">
	<div class="col-xs-12 col-md-6">
		
		<div class="clearfix">
			<h4 class="pull-left">Informasi Meeting</h4>
			<p class="pull-right">
				<?php
				echo anchor('app_meetings/edit_meeting/'.$meeting['id_meeting'],'<i class="fa fa-pencil"></i> Edit',array('class'=>''));
				?>
			</p>
		</div>
		<div class="list-group">
			<div class="list-group-item">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h4 class="list-group-item-heading">Tanggal Meeting</h4>
						<?php if(isset($meeting['meeting_date'])) : ?>
							<p>
								<?=  show_date_human_format($meeting['meeting_date']) ?>
							</p>
						<?php endif; ?>
					</div>
					<div class="col-xs-12 col-md-6">
						<h4 class="list-group-item-heading">Waktu</h4>
						<?php if(isset($meeting['start_at']) && isset($meeting['finish_at'])) : ?>
							<p>
								<?=  $meeting['start_at'] ?>
								&nbsp;s/d&nbsp;
								<?php
								if (empty($meeting['finish_at'])) {
									echo "selesai";
								}else{
									$meeting['finish_at'];
								}

								?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="list-group-item">
				<p class="list-group-item-heading">Tempat</p>
				<?php if(isset($meeting['meeting_place'])) : ?>
					<h4>
						<i class="fa fa-map-marker"></i>&nbsp;
						<?= strtoupper($meeting['meeting_place']) ?>
					</h4>
				<?php endif; ?>
			</div>
			<div class="list-group-item">
				<p>Materi Tinjauan</p>
				<?php if(isset($meeting['meeting_review'])) : ?>
					<h4>
						<?= strtoupper($meeting['meeting_review']) ?>
					</h4>
				<?php endif; ?>
			</div>
			<div class="list-group-item">
				<h4 class="list-group-item-heading">ARAHAN / INFORMASI</h4>
				<?php if(isset($meeting['meeting_information'])) : ?>
					<p>
						<?= $meeting['meeting_information'] ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<h4>Undang Partisipan</h4>
		<?php echo form_open('app_meetings/submit_add_partisipant');?>
		<?php 
		if (isset($meeting['id_meeting'])) {
			$id_meeting =array(
				'name' => 'id_meeting',
				'type'  => 'hidden',
				'value' => $meeting['id_meeting']
			);
			echo form_input($id_meeting);
		}
		?>
		<input type="hidden" name="id_user">
		<div class="input-group" style="margin-bottom: 10px;">
			<input type="text" name="email" class="auto-users form-control" placeholder="Masukkan Email Partisipan">
			<span class="input-group-btn">
				<button type="submit" class="btn btn-default" type="button">
					<i class="fa fa-envelope"></i>
				</button>
			</span>
		</div>
		<?php echo form_close();?>
		<h4>Daftar Partisipan</h4>
		<table class="table table-bordered">
			<thead>
				<th>#</th>
				<th>Email</th>
				<th>Opsi</th>
			</thead>
			<tbody>
				<?php
				if (isset($partisipant)) {
					$no =1;
					foreach ($partisipant as $key => $value) { ?>
					<td><?= $no ?></td>
					<td><?= $value->email ?></td>
					<td>
						<?= anchor('app_meetings/remove_partisipant/'.$meeting['id_meeting'].'/'.$value->id_user,
							'<i class="fa fa-trash"></i>',
							array('class'=>'btn btn-danger')
							) ?>
					</td>
					<?php	
					$no++;
				}
			}
			?>
		</tbody>
	</table>
</div>
</div>