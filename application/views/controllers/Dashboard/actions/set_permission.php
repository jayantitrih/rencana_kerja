<div class="container">
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
				?>
				<a href="<?php echo site_url('dashboard/set_permission/'.$value.'/');?>" class="list-group-item <?php echo $active;?>">
					<?php 
						if (function_exists('set_module_name')) {
							echo set_module_name($value);
						}
					?>
				</a>
			<?php	
			}
		}
	?>
	</div>
	</div>
		
	</div>
	<div class="col-xs-12 col-md-8">
		<div class="row">
			<div class="col-xs-12">

			<?php if(isset($controller_name) && !empty($controller_name)) : ?>

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
			<?php else: ?>
				<div style="padding-top: 25px;">
					<i > level user akan muncul disini setelah modul aplikasi terpilih</i>	
				</div>
				
			<?php endif; ?>

			</div>
			
		</div>
		<div class="row">
			<div class="col-xs-12">


			<h4>Tentukan aksi pengguna</h4>
			<hr/>
			<?php if(isset($actions)) : ?>


					<?php if ($actions) {
						
							foreach ($actions as $key => $value) { 	
							$checked ='';
							if (isset($actions_selected) &&
								in_array($value, $actions_selected)
							) {
								$checked='checked';
							}

						?>
						<input 
							type="checkbox" name="aksi[]" 
							value="<?php echo $value;?>"
							<?php echo $checked;?>
							>&nbsp;
						<?php echo $value;?><br/>
						<?php	
							}
					}else{
						echo '<i>'.ucwords('module aplikasi yang dipilih tidak memiliki aksi').'</i>';
					}
				?>
			<?php else: ?>
				<i>pilih module aplikasi terlebih dahulu sebelum menentukan aksi pengguna</i>
			<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>
</div>


