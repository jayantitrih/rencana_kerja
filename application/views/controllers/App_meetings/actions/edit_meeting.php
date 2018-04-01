<div class="row">
	<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-offset-2">
		<?php //echo form_open_multipart('app_meetings/submit_add_meeting');?>
		<?php echo form_open('app_meetings/submit_add_meeting');?>
		<div class="row">
			<div class="col-xs-12">
				<div class="text-right">
					<?php
						echo anchor('app_meetings/save_draft'
							,'<i class="fa fa-archive"></i> Arsipkan'
							,array('class'=>'btn btn-danger'));
					?>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-chevron-right"></i>&nbsp;
						Selanjutnya
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label>Tanggal Meeting <code>* Wajib diisi</code> </label>	
					<input type="date" name="meeting_date" class="form-control">
				</div>
				<div class="form-group">
					<label>Tempat</label>	
					<input type="text" name="meeting_place" class="form-control">
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="form-group">
					<label>Dari jam</label>	
					<input type="time" name="start_at" class="form-control">
				</div>
				<div class="form-group">
					<label>Sampai dengan</label>	
					<input type="time" name="finish_at" class="form-control">
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label>Materi Tinjauan <code>* Wajib diisi</code></label>
					<input type="text" name="meeting_review" class="form-control col-xs-12">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<h4>ARAHAN / INFORMASI</h4>
				<textarea id="summernote" name="meeting_information"></textarea>
			</div>
		</div>
		<?php echo form_close();?>
	</div>
	
</div>