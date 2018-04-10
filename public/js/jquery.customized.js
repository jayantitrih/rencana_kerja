$(document).ready(function () {

	if ($('input[name="aksi[]"]').length > 0) {

		$(document).on('click','input[name="aksi[]"]',function(){
			var modul 		= $('input[name="modul"]').val();
			var aksi 		= $(this).val();
			var group_id 	= $('select[name="group_id"]').val();
			var action_url 	= $('.site_url').text();
			var data ={
				'modul':modul ,
				'aksi':aksi ,
				'group_id':group_id 
			}
			if (group_id == 0) {
				alert('pilih level user dahulu');
				$('select[name="group_id"]').focus();
			}else{
				if ($(this).is(':checked')) {
					action_url+='permission/ajax_insert';
				}else{
					action_url+='permission/ajax_delete';
				}

				$.ajax({
					url: action_url,
					data: data,
					type:"POST",
					success: function(data){
						console.log(data);
					}
				});

			}


		});    	
	}
});