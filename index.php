<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	
	<script type="text/javascript" src="js/jquery.2.0.js">
	</script>
	<script type="text/javascript" src="js/bootstrap.min.js">
	</script>
	<script type="text/javascript" src="js/scripts.js">
	</script>
	
</head>

<body>

	<div class="container-fluid">
		
		<?php	//inclui o codigo do modal de login
			include('header.php');
			include('header_modal.php');
		?>
		
		<div id="div_imagens_index" class="row" style="height: 400px;background-image: url('img/bmw.jpg'); background-size: 100% 100%;" >
			<div style=" cursor: pointer; background-color: black; height: 100%; opacity: 0.4" class="col-md-1" onClick="muda_imagem(-1);"></div>
			<div style=" cursor: pointer; height: 100%;" class="col-md-10" onClick="pause_play()">
				<div style=" background-color: black; width: 50px; height: 50px; margin-left: 50%"><h2 style="margin: 50%; color: white; margin-top:160px;"><b>||</b><h2></div>
			</div>
			<div style=" cursor: pointer; background-color: black; height: 100%; opacity: 0.4" class="col-md-1" onClick="muda_imagem(1);"></div>
		</div>
	</div> <!-- /div.container-fluid -->
</body>
<script>

	var i = 0;
	
	var interval = setInterval("muda_imagem(1)", 1000);
	status_play = true;
	
	function pause_play(){
				
		if(status_play == true){
			clearInterval(interval);
		}else{
			interval = setInterval("muda_imagem(1)", 1000);
		}
		status_play = !status_play;
	}
	
	function muda_imagem(num){
		
		var image = [	"url('img/boca.jpg')" ,
						"url('img/scorpion.jpg')" ,
						"url('img/bmw.jpg')" ,
						"url('img/koala.jpg')" 	];
		
		i = i+num;
		if (i < 0){
			i = 3;
		}else if(i > 3){
			i = 0;
		} 
	
		document.getElementById('div_imagens_index').style.backgroundImage = image[i];
		
	}
</script>
</html>