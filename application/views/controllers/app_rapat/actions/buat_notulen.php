<?php
$id_meeting 	='';
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

	$meeting_information = $meeting->meeting_information;
	$chairman 	= $meeting->chairman;
	$secretary 	= $meeting->secretary;

	$id_meeting = $meeting->id_meeting;
}
?>
<div class="row">
	<div class="col-xs-12 col-md-8">
		<div class="panel with-nav-tabs panel-primary">
			<div class="panel-heading">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							Buat Notulen
						</a>
					</li>
					<li role="presentation" >
						<a href="#notulen" aria-controls="notulen" role="tab" data-toggle="tab">
							Notulen
						</a>
					</li>
					<li role="presentation" >
						<a href="#rapat" aria-controls="rapat" role="tab" data-toggle="tab">
							Details Rapat
						</a>
					</li>
				</ul>
			</div>
			<div class="panel-body">
				
				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane active" id="home">
						<?php echo form_open('app_rapat/submit_buat_notulen/'.$id_meeting);?>
						<!-- Start tab info -->
						<div class="row">
							<div class="col-xs-12">
								<h4>Agenda & Pembahasan</h4>
								<textarea class="form-control" id="summernote" name="discussion"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-8">
								<div class="form-group">
									<label>Penanggung Jawab</label>
									<input type="hidden" name="discussion_pic" value="0" />
									<input type="text" name="email" class="form-control col-xs-12 input-auto-pic" >
								</div>
							</div>
							<div class="col-xs-12 col-md-4">
								<div style="padding-top: 25px;">
									<input type="checkbox" name="self_pic" value="<?= (isset($id_user))? $id_user : '0';?>">
									<label>
										Saya sendiri
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Mulai </label>
									<input type="date" name="discussion_start" class="form-control col-xs-12" >
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Target </label>
									<input type="date" name="discussion_target" class="form-control col-xs-12" >
								</div>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-save"></i>
										Simpan
									</button>
								</div>
							</div>
						</div>
						<!-- End tab info -->
						<?php echo form_close();?>
					</div>
					<div role="tabpanel" class="tab-pane" id="notulen">
						<?= (isset($tabel_notulen))? $tabel_notulen : ''?>
					</div>
					<div role="tabpanel" class="tab-pane" id="rapat">
						<div class="row">
							<div class="col-xs-12">
								<h4>
									<small>Materi Tinjauan </small><br/>
									<?= $meeting_review ?>
									<br/>
								</h4>
								<h4>
									<small>Tanggal rapat</small><br/>
									<?php
										if (function_exists('show_date_human_format')) {
											echo show_date_human_format($meeting_date);
										}
									?>
								</h4>
								<h4>
									<small>Tempat</small><br/>	
									<?= $meeting_place ?>
								</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<h4>
									<small>Dari jam</small><br/>
									<?= $start_at ?>
								</h4>
							</div>
							<div class="col-xs-12 col-md-6">
								<h4>
									<small>Sampai dengan</small><br/>
									<?= $finish_at ?>
								</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<label>
									ARAHAN / INFORMASI
								</label>
								<div class="well">
									<?= $meeting_information ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="text-right">

			<?= anchor('#','<i class="fa fa-ban"></i> Tutup Rapat',array('class'=>'btn btn-danger')) ?>
		</div>
		<h4>Daftar Partisipan</h4>
		<ul class="list-group">
			<li class="list-group-item">
				<h4 class="list-group-item-heading">
					hwew
				</h4>
				<p class="list-group-item-text">
					Just now
				</p>
				<div class="clearfix">
					<span class="pull-right">
						<div class="btn-group btn-group-xs" role="group" aria-label="...">
							<button type="button" class="btn btn-warning">
								<i class="fa fa-remove"></i>
								Tidak
							</button>
							<button type="button" class="btn btn-success">
								<i class="fa fa-check"></i>
								Hadir
							</button>
						</div>
					</span>
					<span class="pull-left">
						<?php
						echo anchor('#','email@domain.com');
						?>
					</span>
				</div>
			</li>
			
		</ul>
	</div>
</div>