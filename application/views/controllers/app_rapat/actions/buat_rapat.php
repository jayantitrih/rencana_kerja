<?php
$meeting_date 	='';
$meeting_place 	='';
$meeting_review ='';
$meeting_information = '';
$start_at 	='';
$finish_at 	='';
$chairman 	='';
$secretary 	='';
$chairman_name ='';
$secretary_name ='';
$id_meeting ='';
if (
	isset($meeting->meeting_date) 
	&& isset($meeting->meeting_place)
	&& isset($meeting->meeting_review)
	&& isset($meeting->meeting_information)
	&& isset($meeting->chairman)
	&& isset($meeting->secretary)
	&& isset($meeting->start_at)
	&& isset($meeting->finish_at)
	&& isset($meeting->id_meeting)
) {
	$meeting_date 	= $meeting->meeting_date;
	$meeting_place 	= $meeting->meeting_place;
	$meeting_review = $meeting->meeting_review;

	$start_at		= $meeting->start_at;
	$finish_at		= $meeting->finish_at;
	$id_meeting		= $meeting->id_meeting;

	$meeting_information = $meeting->meeting_information;
	$chairman 	= $meeting->chairman;
	$secretary 	= $meeting->secretary;
}
?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="panel with-nav-tabs panel-primary">
			<div class="panel-heading">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#about" aria-controls="about" role="tab" data-toggle="tab">
							Pelaksanaan
						</a>
					</li>
					<li role="presentation" >
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							Arahan / Informasi
						</a>
					</li>
				</ul>
			</div>
			<div class="panel-body">
				<?php if(isset($meeting)) : ?>
					<?php echo form_open('app_rapat/submit_update_rapat/'.$id_meeting);?>
				<?php else : ?>
					<?php echo form_open('app_rapat/submit_buat_rapat');?>
				<?php endif; ?>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="about">

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Tanggal Meeting </label>	
									<input type="date" name="meeting_date" class="form-control" value="<?= $meeting_date?>">
								</div>
								<div class="form-group">
									<label>Tempat</label>	
									<input type="text" name="meeting_place" class="form-control" value="<?= $meeting_place ?>">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Dari jam <code>* Wajib diisi</code> </label>	
									<input type="time" name="start_at" class="form-control" value="<?= $start_at ?>">
								</div>
								<div class="form-group">
									<label>Sampai dengan</label>	
									<input type="time" name="finish_at" class="form-control" value="<?= $finish_at ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<label>Notulis Rapat</label>	
								<input type="hidden" name="secretary">
								<input type="text" class="form-control input-auto-secretary" value="<?= $secretary_name ?>">
							</div>
							<div class="col-xs-12 col-md-6">
								<label>Ketua Rapat</label>	
								<input type="hidden" name="chairman">
								<input type="text"  class="form-control input-auto-chairman" value="<?= $chairman_name ?>">
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									<?php if(!isset($meeting)) : ?>
										<a href="#" class="btn btn-primary btn-next">
											<i class="fa fa-chevron-right"></i>&nbsp;
											Selanjutnya
										</a>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="home">
						<!-- Start tab info -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>Materi Tinjauan </label>
									<input type="text" name="meeting_review" class="form-control col-xs-12" value="<?= $meeting_review ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h4>ARAHAN / INFORMASI</h4>
								<textarea id="summernote" name="meeting_information"><?= $meeting_information ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									<?php if(!isset($meeting)) : ?>
										<a href="#" class="btn btn-default btn-previous">
											<i class="fa fa-chevron-left"></i>&nbsp;
											Sebelumnya
										</a>
									<?php endif;?>
									<button type="submit" class="btn btn-success">
										<i class="fa <?= (isset($meeting))? 'fa-refresh': 'fa-save'?>"></i>&nbsp;
										<?= (isset($meeting))? 'Update': 'Simpan' ?>
									</button>

								</div>
							</div>
						</div>

					</div>

				</div><!-- End tab pane -->
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<?php if(isset($meeting) && $meeting) : ?>
			<div class="text-right">
				<?= anchor('app_rapat/kirim_rapat','<i class="fa fa-send"></i>&nbsp;Kirim',array('class'=>'btn btn-primary')) ?>
			</div>
			<?php echo form_open('app_rapat/undang_partisipan/'.$id_meeting);?>
			<h4>Undang Partisipan</h4>
			<div class="input-group" style="margin-bottom: 10px;">
				<input type="hidden" name="id_user">
				<input type="text" name="email" class="input-auto-users form-control" placeholder="Masukkan Email Partisipan" >
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default" >
						<i class="fa fa-envelope"></i>
					</button>
				</span>
			</div>
			<?php echo form_close();?>
			<h4>Daftar Partisipan</h4>
			<ul class="list-group">
				<!--<li class="list-group-item">
					<span class="badge">14</span>
					Cras justo odio
				</li>-->
				<?php if(isset($partisipan)) : ?>
					<?php foreach ($partisipan as $key => $value) : ?>
						<li class="list-group-item">
							<?= $value->email ?>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		<?php else : ?>
			<?php
			echo anchor('app_rapat/index',
				'<i class="fa fa-remove"></i>&nbsp;Batal',
				array('class'=>'btn btn-danger')
			);
			?>
		<?php endif; ?>
	</div>
</div>