<div class="row">
	<div class="col-xs-12 col-md-4">
		<div class="form-group">
			<label><?php echo ucwords('pilih module aplikasi');?></label>
			<div class="list-group">
				<?php

				if (isset($modules)) {
					foreach ($modules as $key => $value) { 
						$active ='';
						if (isset($controller_name) && $controller_name == $value) {
							$active ='active';
							echo '<input type="hidden" value="'.$value.'" name="modul" />';
						}

						if (function_exists('set_module_name')) {
							echo anchor('#',set_module_name($value),array('class'=>'list-group-item choose-module '.$active,'id'=>$value));
						}

					}
				}
				?>
			</div>
		</div>
		
	</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
			<div class="col-xs-12">

				<div class="form-group">
					<label><?php echo ucwords('pilih level user');?></label>
					<select name="group_id" class="form-control">
						<option value="0">Pilih salah satu</option>
						<?php
						if (isset($groups)) {
							foreach ($groups as $key => $value) {
								$selected = '';

								if (isset($group_id) && $group_id == $value['id']) {
									$selected ='selected';
								}
								?>
								<option value="<?php echo ucwords($value['id']);?>" 
									<?php echo $selected;?>>
									<?php echo ucwords($value['name']);?>
								</option>
								<?php		}
							}
							?>
						</select>
					</div>

				</div>

			</div>
			<div class="row">
				<div class="col-xs-12">
					<h4>Tentukan aksi pengguna</h4>
					<hr/>
					<div class="checkbox-action">
						<i>pilih module aplikasi terlebih dahulu sebelum menentukan aksi pengguna</i>
					</div>
				</div>
			</div>
		</div>
	</div>