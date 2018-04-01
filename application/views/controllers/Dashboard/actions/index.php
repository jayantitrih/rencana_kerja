<h3>
	Hai <?php echo (isset($username))? ucwords($username) : 'dude';?> !, <br/>
	<small>
		Congratulation u already signed in dashboard panel.
	</small>
</h3>
<hr/>
<?php
if (isset($launcher)) {
	foreach ($launcher as $key => $value) { ?>
	<div class="col-xs-3">
		<a href="<?php echo $value['url'];?>">
			<div class="panel" style=" margin-right: 10px; ">
				<div class="panel-body text-center" style="padding: 25px;">
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
}
?>