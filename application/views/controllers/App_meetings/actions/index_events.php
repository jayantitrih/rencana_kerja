<div class="row">
	<div class="col-xs-12 col-md-6">
		
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="text-right">
			<input type="text" name="">
		</div>
	</div>
</div>
<div class="row">
	<?php if(isset($meetings)) :  ?>
		<?php foreach ($meetings as $key => $value) { ?>
		<div class="col-xs-12 col-md-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="media">
						<div class="media-left" style="width: 600px;">
							<div class="text-center">
								<?php
								$string_date = $value->meeting_date;
								$time = strtotime($string_date);
								echo '<h3>'.date('d',$time).'</h3>';
								echo date('M Y',$time);
								echo '<br/>';
								
								?>
							</div>
						</div>
						<div class="media-body">
							
							<h4 class="media-heading"><?php echo $value->meeting_review;?>sdsadds sdsa</h4>
							<i class="fa fa-map-marker"></i>
							<strong><?php echo $value->meeting_place;?></strong><br/>
							<div class="label label-success" style="font-size: 14px;">
								<i class="fa fa-clock"></i>
								<?php
								echo $value->start_at;
								echo ' s/d ';
								echo $value->finish_at;
								?>
							</div>
							<br/>
							<div class="clearfix">

								<?php 
								$attend ='<i class="fa fa-users"></i>&nbsp;';
								$attend .='23 Siap Hadir';
								echo anchor('#',$attend,array('class'=>'pull-left','style'=>'padding-top:5px;')); //btn btn-sm btn-default ?>	
								<?php echo anchor('#','Selengkapnya <i class="fa fa-chevron-right"></i>',array('class'=>'btn btn-sm btn-info pull-right'));?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<?php	} ?>
	<?php endif;  ?>
</div>