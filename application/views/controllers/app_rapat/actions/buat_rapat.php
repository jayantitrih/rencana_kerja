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
									<input type="date" name="meeting_date" class="form-control" value="">
								</div>
								<div class="form-group">
									<label>Tempat</label>	
									<input type="text" name="meeting_place" class="form-control" value="">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>Dari jam <code>* Wajib diisi</code> </label>	
									<input type="time" name="start_at" class="form-control" value="">
								</div>
								<div class="form-group">
									<label>Sampai dengan</label>	
									<input type="time" name="finish_at" class="form-control" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<label>Notulis Rapat</label>	
								<input type="hidden" name="secretary">
								<input type="text" class="form-control" value="">
							</div>
							<div class="col-xs-12 col-md-6">
								<label>Ketua Rapat</label>	
								<input type="hidden" name="chairman">
								<input type="text"  class="form-control" value="">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									
									<a href="#" class="btn btn-primary">
										<i class="fa fa-chevron-right"></i>&nbsp;
										Selanjutnya
									</a>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane active" id="home">
						<!-- Start tab info -->
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>Materi Tinjauan </label>
									<input type="text" name="meeting_review" class="form-control col-xs-12" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h4>ARAHAN / INFORMASI</h4>
								<textarea id="summernote" name="meeting_information"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="text-right">
									
									<a href="#" class="btn btn-default">
										<i class="fa fa-chevron-left"></i>&nbsp;
										Sebelumnya
									</a>
									<a href="#" class="btn btn-success">
										<i class="fa fa-save"></i>&nbsp;
										Simpan
									</a>
									
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
		<h4>Undang Partisipan</h4>
		<div class="input-group" style="margin-bottom: 10px;">
			<input type="text" class="auto-users form-control" placeholder="Masukkan Email Partisipan">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="fa fa-envelope"></i>
				</button>
			</span>
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