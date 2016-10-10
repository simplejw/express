Do.add('ocupload', {path :  '/js/jquery.ocupload.js', type :'js'});
Do.ready(function() {
	
	function showLayer(){
		var h = document.body.scrollHeight;
		var w = document.body.scrollWidth;
		$('#mongolia-layer').css({
			"width":w,
			"height":h}).show();
		$('#loading').show();
	}
	if((navigator.platform.indexOf('Win32')!=-1) || (navigator.platform.indexOf('Mac')!=-1)){
		Do('ocupload', function(){
			var allowfile = ['jpg','jpeg','png'];
			(function(){
				var fgupload = $('#upload_fg').upload({
					name: 'file',
					action: '/ajax/upload?t=' + new Date().getTime(),
					enctype: 'multipart/form-data',
					autoSubmit: true,
					onComplete: function(response) {
						$('#mongolia-layer').hide();
						$('#loading').hide();
						alert('上传成功');
						var img = $('<img src="/upload/' + response + '"/>');
						$('#upload_fg_img').html(img);
						$('#upload_fg_val').val(response);
					},
					onSelect: function() {
						fgupload.autoSubmit = false;
						var ext = fgupload.filename().split('.').pop().toLowerCase();
						if ($.inArray(ext, allowfile) == -1)
						{
							alert('文件格式不正确。');
							$('#mongolia-layer').hide();
							$('#loading').hide();
						}
						else
						{
							showLayer();
							fgupload.submit();
						}
					}
				});
			})();
			
			(function(){
				var bgupload = $('#upload_bg').upload({
					name: 'file',
					action: '/ajax/upload?t=' + new Date().getTime(),
					enctype: 'multipart/form-data',
					autoSubmit: true,
					onComplete: function(response) {
						$('#mongolia-layer').hide();
						$('#loading').hide();
						alert('上传成功');
						var img = $('<img src="/upload/' + response + '"/>');
						$('#upload_bg_img').html(img);
						$('#upload_bg_val').val(response);
					},
					onSelect: function() {
						bgupload.autoSubmit = false;
						var ext = bgupload.filename().split('.').pop().toLowerCase();
						if ($.inArray(ext, allowfile) == -1)
						{
							alert('文件格式不正确。');
							$('#mongolia-layer').hide();
							$('#loading').hide();
						}
						else
						{
							showLayer();
							bgupload.submit();
						}
					}
				});
			})();
		});
	}else{
		// $(".uploadimg").find('input').live('change',function(){
		// 	var i=$(this),a=this.files;
		// 	Do("lrz",function(){
		// 		lrz(a[0],{width:600},function(a){
		// 			alert(a.origin.name);
		// 			var o={
		// 				file:a.base64,
		// 				name:a.origin.name
		// 			};
		// 			$.post("/m/upload",o,function(o){
		// 				var n='<img src="'+a.blob+'"/>';
		// 				$('#upload_bg_img').html(n);
		// 				$('#upload_bg_val').val(o);
		// 				//$("#"+t).val(o);
		// 			})
		// 		})
		// 	})
		// })
	}
	
	$('.captcha_img').live('click',function(event) {
        	$('img.captcha_img').attr('src', '/captcha?v=' + Date.parse(new Date()));
   	 });
	$('#idcard_submit').click(function(){
		var name = $('.sjr').val();
		if(name == ""){
			alert('请填写联系人');
			$('.sjr').focus()
			return false;
		}
		var phone = $('.dh').val();
		if(phone == ""){
			alert('请填写联系电话');
			$('.dh').focus()
			return false;
		}
		var card = $('.sfz').val();
		if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(card))){
			alert('请填写正确的身份证号');
			$('.sfz').focus()
			return false;
		}
		var upload_fg_val = $('#upload_fg_val').val();
		var upload_bg_val = $('#upload_bg_val').val();
		if(upload_fg_val && upload_bg_val){
			$('#uploadcard_form').submit();
		}else{
			alert('请上传身份证');
			return false;
		}
	})
	
	$('#person_info').find('input').blur(function() {
        var _this = $(this);
		var realname = $('input[name="data[realname]"]').val();
		var mobile = $('input[name="data[mobile]"]').val();
		var idcard = $('input[name="data[idcard]"]').val();
		$.post("/site/ajaxup",{"realname" : realname , "mobile" : mobile , "idcard" : idcard},function(data){
			if(data.status){
				var bgimg = data.bg_img
				var bimg = $('<img src="/upload/' + bgimg + '"/>');
				$('#upload_bg_img').html(bimg);
				$('#upload_bg_val').val(bgimg);
				var fgimg = data.fg_img;
				var fimg = $('<img src="/upload/' + fgimg + '"/>');
				$('#upload_fg_img').html(fimg);
				$('#upload_fg_val').val(fgimg);
			}
		},'json');
			//{"status" : true|falss, "bg_img":"/s/dsadsadsadsa.jpg" , "fg_img" : "/dsd/dsdsda.jpg"}
    });
});