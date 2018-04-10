<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Dashboard heading</h4>
	</div>
	<div class="panel-body">
		<?php
		if (isset($launcher)) {
			foreach ($launcher as $key => $value) { ?>
			<div class="col-xs-12">
				<a href="<?php echo $value['url'];?>">
					<div class="card" style=" margin-right: 10px; ">
						<div class="card-body text-center" style="padding: 25px;">
							<i style="font-size: 24px;" class="<?php echo $value['icon'];?>">
							</i>
							<br/>
							<strong>
								<?php echo $value['label'];?>
							</strong>
						</div>
					</div>
				</a>
			</div>
			<?php	
		}
	}else{ ?>

	<?php	} ?>	
	<h2>
		Hai <?php echo (isset($username))? ucwords($username) : 'dude';?> !, <br/>
		<small>
			Congratulation u already signed in dashboard panel.
		</small>
	</h2>	
</div>
</div>

