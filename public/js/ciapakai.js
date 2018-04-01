$(document).ready(function(){
	
    /* summernote */
    if ( $("#summernote").length > 0) {
    	$("#summernote").summernote({ 
    		height: 200,
    		toolbar : [
    			['style',['style']],
    			['font',['bold','italic','underline']],
    			['fontname',['fontname']],
    			['fontsize',['fontsize']],
    			['color',['color']],
    			['para',['ol','li','paragraph','height']],
    			['table',['table']],
    			['insert',['link']],
    			//['view',['undo','redo','fullscreen','codeview','help']],
    		]
    	}); 
    }
	
	if ($('.breadcrumb').length == 1) {
		$('.breadcrumb').find('li').last().find('a').css({
			'text-decoration' :'none',
			'color' :'#777',
			'text-weight' :'bold'
		});
	}

	var url = window.location;
	$('ul.nav a[href="'+ url +'"]').parent().addClass('active');
	$('ul.nav a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');

	/*
	* input checkout untuk memilih action 
	*/

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
				alert('select group permissions first');
				$('select[name="group_id"]').focus();
			}else{
				if ($(this).is(':checked')) {
					action_url+='api/add_permission';
				}else{
					action_url+='api/delete_permission';
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

	if ($('.datatables').length == 1) {
		$('.datatables').DataTable();
	}
	
	if ($('input[name="active"]').length > 0) {
		$(document).on('click','input[name="active"]',function(){
			if (confirm('are you sure?')) {
				var action_url 	= $('.site_url').text();	
				action_url +='api/activation_user/';
				action_url +=$(this).val();
				if ($(this).is(':checked')) {
					action_url +='/1';
				}else{
					action_url +='/0';
				}
				$.ajax({
					url: action_url,
					type:"POST",
					dataType:"json",
					success: function(data){
						console.log(data);
					}
				});
			}else{
				$(this).prop('checked', true);
			}
			
			
		});
	}

	if ($('.choose-module').length > 0) {

		$(document).on('click', '.choose-module', function() {
			$(".choose-module").removeClass("active");
			$(this).addClass("active");
			var action_url 	= $('.site_url').text();
			action_url += $(this).attr('id');
			action_url += '/json_get_methods';
			var html_checkbox = '';
			$.ajax({
				url: action_url,
				type:"POST",
				dataType:"json",
				success: function(data){

					console.log(data);
				}
			});

			return false;
		});
	}
	
	if ($('.auto-users').length == 1) {
		
		var action_url 	= $('.site_url').text();
        action_url+='api/get_by_keyword/users/email';
        $(".auto-users").autocomplete({
        	source: action_url,
            minLength: 1,
            select: function (event, ui) { 
            	console.log(ui.item.key);
            	$('input[name="id_user"]').val(ui.item.key);
            }
        });
    }
});