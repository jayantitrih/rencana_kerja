<div class="row">
	<div class="col-xs-6">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="username" class="form-control" value="<?= (isset($profile['username']))? $profile['username'] : ''  ?>">
		</div>
		<div class="form-group">
			<label>email</label>
			<input type="text" name="employee_type" class="form-control" value="<?= $identitas['email']?>">
		</div>
		<div class="form-group">
			<label>Pesan</label>
			<textarea name="employee_type" class="form-control" value="<?= $identitas['pesan']?>"></textarea> 
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
	</div>
</div>