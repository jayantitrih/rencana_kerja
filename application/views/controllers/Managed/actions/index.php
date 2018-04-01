<div class="row">
	<div class="col-xs-12 col-md-4">
	<div class="form-group">
		<label><?php echo ucwords('select the application module');?></label>
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

			<?php if(isset($controller_name) && !empty($controller_name)) : ?>

			<div class="form-group">
				<label><?php echo ucwords('select group permissions');?></label>
				<select name="group_id" class="form-control">
					<option value="0">select one</option>
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
					<i>
						group permissions will appear here after the application module is selected
					</i>	
				</div>
				
			<?php endif; ?>

			</div>
			
		</div>
		<div class="row">
			<div class="col-xs-12">
			<h4>Specify user action</h4>
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
						echo '<i>'.ucwords('the selected application module has no action').'</i>';
					}
				?>
			<?php else: ?>
				<i>select the application module first before determining the user action</i>
			<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>