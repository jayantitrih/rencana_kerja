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
									<h4>
										<small>Tanggal Meeting </small><br/>	
										<?= $meeting_date?>
									</h4>
								</div>
								<div class="form-group">
									<h4>
										<small>Tempat</small><br/>	
										<?= $meeting_place ?>
									</h4>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<h4>
										<small>Dari jam</small><br/>
										<?= $start_at ?>
									</h4>
								</div>
								<div class="form-group">
									<h4>
										<small>Sampai dengan</small><br/>
										<?= $finish_at ?>
									</h4>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<h4>
									<small>Notulis Rapat</small><br/>
									<?= $secretary_name ?>
								</h4>
							</div>
							<div class="col-xs-12 col-md-6">
								<h4>
									<small>Ketua Rapat</small><br/>	
									<?= $chairman_name ?>
								</h4>
							</div>
						</div>


					</div>
					<div role="tabpanel" class="tab-pane active" id="home">
						<!-- Start tab info -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<h4>
										<small>Materi Tinjauan </small><br/>
										<?= $meeting_review ?>
									</h4>
								</div>
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

						<!-- End tab info -->
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-4">
		<div class="text-right">
			<?= anchor('app_rapat/edit_rapat/'.$id_meeting,'<i class="fa fa-pencil"></i> Edit',array('class'=>'btn btn-default')) ?>
			<?= anchor('#','<i class="fa fa-chevron-left"></i> Kembali',array('class'=>'btn btn-primary')) ?>
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
