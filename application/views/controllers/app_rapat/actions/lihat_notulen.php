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
					
					
					<div role="tabpanel" class="tab-pane active" id="notulen">
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
		<h4>Daftar Tugasku</h4>
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