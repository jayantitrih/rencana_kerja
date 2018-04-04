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
if (
	isset($meeting->meeting_date) 
	&& isset($meeting->meeting_place)
	&& isset($meeting->meeting_review)
	&& isset($meeting->meeting_information)
	&& isset($meeting->chairman)
	&& isset($meeting->secretary)
	&& isset($meeting->start_at)
	&& isset($meeting->finish_at)
) {
	$meeting_date 	= $meeting->meeting_date;
	$meeting_place 	= $meeting->meeting_place;
	$meeting_review = $meeting->meeting_review;

	$start_at		= $meeting->start_at;
	$finish_at		= $meeting->finish_at;

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
					<li role="presentation" >
						<a href="#about" aria-controls="about" role="tab" data-toggle="tab">
							Pelaksanaan
						</a>
					</li>
					<li role="presentation" class="active">
						<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
							Arahan / Informasi
						</a>
					</li>
				</ul>
			</div>
			<div class="panel-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane" id="about">

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
								<input type="text" class="form-control" value="<?= $secretary_name ?>">
							</div>
							<div class="col-xs-12 col-md-6">
								<label>Ketua Rapat</label>	
								<input type="hidden" name="chairman">
								<input type="text"  class="form-control" value="<?= $chairman_name ?>">
							</div>
						</div>


					</div>
					<div role="tabpanel" class="tab-pane active" id="home">
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

						<!-- End tab info -->
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="text-right">
			<?= anchor('#','<i class="fa fa-remove"></i> Batal',array('class'=>'btn btn-danger')) ?>
			<?= anchor('#','<i class="fa fa-save"></i> Simpan',array('class'=>'btn btn-success')) ?>
		</div>
		<h4>Daftar Partisipan</h4>
		<ul class="list-group">
			<li class="list-group-item">
				<span class="badge">14</span>
				Cras justo odio
			</li>
			<li class="list-group-item">
				<span class="badge">2</span>
				Dapibus ac facilisis in
			</li>
			<li class="list-group-item">
				<span class="badge">1</span>
				Morbi leo risus
			</li>
		</ul>
	</div>
</div>
