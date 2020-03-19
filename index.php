
<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API Test</title>
	<style>
		#btn-submit{
			padding:7px 10px;
			background: #014a81;
			color:#fff;
			text-decoration: none;
		}
		.row{
			margin-top:30px;
			background: #cacaca;
		}
		.col1, .col2, .col3{
			float:left;
			width: 32%;
			border: 1px solid #f4f4f4;
			padding:5px;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<br>
	<input type="text" id="token" value="">
	<a style="margin-top:30px" href="#" id="btn-submit">Submit</a>
	<div class="container">
		
	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script>

		$(document).ready(function(){
			getApiCrm();
		});

		$('#btn-submit').click(function(e){
			e.preventDefault();
			let token = $('#token').val();
			$.ajax({
				type: 'GET',
				url: 'https://baocaosuco.jwhospital.vn/api/list-employment/'+token,
				dataType:'json',
				success:function(data){
					var html = "";
					if(data.error == true){
						html += '<p style="margin-top:50px; text-align:center;color:red">Bạn không được phép truy cập nội dung này!</p>';
					}
					else{
						for(let i=0; i<data.length; i++){
							html += '<div class="row"><div class="col1">'+ data[i].name +'</div><div class="col2">' + data[i].email +'</div><div class="col3">'+ i +'</div></div>';
						}
					}
					$('.container').html(html);
					console.log(data);
				}
			});
		});

		function randString(length) {
			var result           = '';
			var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			var charactersLength = characters.length;
			for ( var i = 0; i < length; i++ ) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
			}
			return result;
		}



		function getApi(){
			$.ajax({
				type: 'GET',
				url: 'https://baocaosuco.jwhospital.vn/api/list-employment/VeDJtNz0KVFCWE6KuhIW',
				dataType:'json',
				success:function(data){
					var html = "";
					for(let i=0; i<data.length; i++){
						html += '<div class="row"><div class="col1">'+data[i].name+'</div><div class="col2">'+data[i].email+'</div><div class="col3">'+ i +'</div></div>';
					}
					$('.container').html(html);
					console.log(data);
				}
			});
		}

		function getApiCrm(){
			$.ajax({
				type: 'GET',
				// beforeSend: function(request) {
				//     request.setRequestHeader("X-API-KEY", "d4auy79KV6tkFO8VNVm6rsitmO6OGT");
				//   },
				headers: {
			        'X-API-KEY':'d4auy79KV6tkFO8VNVm6rsitmO6OGT',
			        'Access-Control-Allow-Origin':'http://localhost',
			        'Content-Type':'application/json'
			    },
				url: 'https://jw.getflycrm.com/api/v3/accounts/',
				dataType:'json',
				success:function(data){
					// $('.container').html(html);
					console.log(data);
				}
			});
		}
	</script>
</body>
</html>