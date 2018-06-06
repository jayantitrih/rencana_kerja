<div class="row">
	<div class="col-xs-12 col-md-3">
		<div class="row">
			<div class="col-xs-12 text-center">
				<img src="<?=base_url('public/images/placeholder-user.png') ?>" class="img-circle col-xs-12">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 " style="padding: 10px" >
				<?php //anchor('#','<i class="fa fa-pencil"></i>&nbsp;Ubah Foto',array('class'=>'btn btn-default col-xs-12')) ;?>
				<?= anchor('auth/logout','<i class="fa fa-sign-out"></i>&nbsp;Logout',array('class'=>'btn btn-default col-xs-12','onclick'=>"return confirm('are you sure?')")) ?>
				
				
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-9">
		<?= form_open('#')?>
		<div class="panel with-nav-tabs panel-primary">
			<div class="panel-heading">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#account" aria-controls="account" role="tab" data-toggle="tab">
							Informasi Akun
						</a>
					</li>
					<li role="presentation" >
						<a href="#biodata" aria-controls="biodata" role="tab" data-toggle="tab">
							Identitas
						</a>
					</li>
					<li role="presentation" >
						<a href="#informasidosen" aria-controls="informasidosen" role="tab" data-toggle="tab">
							Informasi Dosen
						</a>
					</li>
				</ul>
			</div>
			<div class="panel-body">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="account">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" value="<?= (isset($profile['username']))? $profile['username'] : ''  ?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="email" class="form-control" value="<?= (isset($profile['email']))? $profile['email'] : ''  ?>">
								</div>
								<div class="form-group">
									<label>No. Handphone</label>
									<input type="text" name="phone" class="form-control" value="<?= (isset($profile['phone']))? $profile['phone'] : ''  ?>">
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label>Nama Depan</label>
									<input type="text" name="first_name" class="form-control" value="<?= (isset($profile['first_name']))? $profile['first_name'] : ''  ?>">
								</div>
								<div class="form-group">
									<label>Nama Belakang</label>
									<input type="text" name="last_name" class="form-control" value="<?= (isset($profile['last_name']))? $profile['last_name'] : ''  ?>">
								</div>

							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="biodata">
							<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label>NIDN</label>
									<input type="text" name="identity_number" class="form-control" value="<?= $identitas['NIDN'] ?>">
								</div>
								<div class="form-group">
									<label>Nama Dosen</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Nama']?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Jenis_Kelamin']?>">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Tempat_Lahir']?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Tgl_Lahir']?>">
								</div>
							</div>
							<div class="col-xs-6">
								
								<div class="form-group">
									<label>No KTP</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['No_KTP']?>">
								</div>
								<div class="form-group">
									<label>Alamat Rumah</label>
									<textarea name="employee_type" class="form-control" value="<?= $identitas['Alamat_Rmh']?>"></textarea> 
								</div>
								<div class="form-group">
									<label>Telepon Rumah</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Tlp_Rmh']?>">
								</div>
								<div class="form-group">
									<label>No HP</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['No_HP']?>">
								</div>
								<div class="form-group">
									<label>email</label>
									<input type="text" name="employee_type" class="form-control" value="<?= $identitas['email']?>">
								</div>
								
							</div>
						</div>					
					</div>
					<div role="tabpanel" class="tab-pane" id="informasidosen">
						<div class="row">
							<div class="col-xs-6">
							<div class="form-group">
								<label>Gelar Depan</label>
								<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Gelar_Depan']?>">
							</div>
							<div class="form-group">
								<label>Gelar Belakang</label>
								<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Gelar_Belakang'
								]?>">
							</div>
							<div class="form-group">
								<label>Th_TerimaTunjangan</label>
								<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Th_TerimaTunjangan']?>">
							</div>
							<div class="form-group">
								<label>Th_TerimaTunjanganProfesi</label>
								<input type="text" name="employee_type" class="form-control" value="<?= $identitas['Th_TerimaTunjanganProfesi']?>">
							</div>
								
							</div>
							
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="text-right">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save"></i>&nbsp;
						Simpan
					</button>
				</div>
			</div>
		</div>
		<?= form_close() ?>
		<hr/>
	</div>
</div>