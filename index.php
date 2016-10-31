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
	<script type="text/javascript" src="js/jquery-ui.min.js">
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
		
	<section id="conteudo">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div id="div_imagens_index">
					<div style=" cursor: pointer; background-color: black; height: 100%; opacity: 0.4" class="col-md-1" onClick="muda_imagem(-1);"></div>
					<div style=" cursor: pointer; height: 100%;" class="col-md-10" onClick="pause_play()">
						<div style=" background-color: black; width: 50px; height: 50px; margin-left: 50%"><h2 style="margin: 50%; color: white; margin-top:160px;"><b>||</b><h2></div>
					</div>
					<div style=" cursor: pointer; background-color: black; height: 100%; opacity: 0.4" class="col-md-1" onClick="muda_imagem(1);"></div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		
		<hr style="color: #ff0;">
		
		<div class="row">
			<div class="col-md-4" style="background-color: #F5F5F5; border: 1px solid #C50; border-radius: 10px; margin: 25px; padding: 12px;">
				<?php
					include('func_conectar_bd.php');
					$query = "SELECT * FROM tb_supermercado";
					$res = mysqli_query($conn,$query);
					$count = 0;
					
					while($row = mysqli_fetch_array($res)){
						$bd_mercado[] = $row['bm_bd'];
						$nome_mercado[] = $row['nm_supermercado'];
						$count++;
					}
					
					for($i = 0; $i < $count ; $i++){
						$query = "SELECT * FROM ".$bd_mercado[$i].".tb_produto  WHERE nome_produto = 'arroz' AND id_marca = 1 AND volume = 5" ;
						$res = mysqli_query($conn,$query);
						
						while($row = mysqli_fetch_array($res)){
							$nome_produto[] = $row['nome_produto'];
							$volume[] = $row['volume'];
							$un_medida[] = $row['un_medida'];
							$valor[] = $row['valor'];
						}	
					}
					
					echo '
						<div class="row">
							<div class="col-md-4">
								<div style="float: left">
									<img src="#" style="height: 110px;">
								</div>
							</div>
							<div class="col-md-5">
								<h4>'.strtoupper($nome_produto[0]).' '.strtoupper($nome_produto[0]).'</h4>
								<h4>DE: '.$valor[0].'</h4>
							</div>
							';
							
					echo '	<div class="col-md-3">';
							
					for($i = $count-1; $i >= 0; $i--){
							
							echo '
								<h5 style="margin-bottom: 0px;"><b>'.strtoupper($nome_mercado[$i]).'</b></h5>
								<p style="font-size: 11px">'.$nome_produto[$i].' - '. $volume[$i]. $un_medida[$i].' R$ '. $valor[$i].'</p>							
							';	
						}
					echo '	</div>
						</div>';
				?>
			</div>
		</div>
		
		<div class="row">
							<?php	
				
				$count = 0;
				
				while($row = mysqli_fetch_array($res)){
					$array_mercado[] = $row['nm_supermercado'];
					
					$query_produto = 	"SELECT * FROM bd_".$array_mercado[$count].".tb_produto 
										INNER JOIN bd_facilitte.tb_marca 
										ON bd_".$array_mercado[$count].".tb_produto.id_marca = bd_facilitte.tb_marca.id_marca
										'";
										
					$res_produto = mysqli_query($conn, $query_produto);
					
					$count2 = 0;
						while($resultado = mysqli_fetch_array($res_produto)){
		
							$resultado_id_produto[] = $resultado['id_produto'];
							$resultado_nome_produto[] = $resultado['nome_produto'];
							$resultado_marca_produto[] = $resultado['id_marca'];
							$resultado_peso[] = $resultado['volume'].$resultado['un_medida'];	
							$resultado_valor[] = $resultado['valor'];
							$resultado_marca[] = $resultado['descricao'];
					
					
							echo ' 
							<div class="col-md-5 div_resultado_busca_exerno">
								<div class="div_resultado_busca_interno">
									<p>'.$resultado_nome_produto[$count2].'   '.$resultado_marca[$count2].'<br>'.$resultado_peso[$count2].' - R$ '.$resultado_valor[$count2].'</p>
									<img src="#" class="img_resultado_pesquisa">
								
									<form action="func_adiciona_carrinho.php?" method="GET">
								
										<button id="btn_add_carrinho" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span></button>
									
										<div class="btn-group">
											<button type="button" class="btn" onClick="increm_qtd(-1, '.$resultado_id_produto[$count2].')">-</button>
											<input id="input_qtd_'.$resultado_id_produto[$count2].'" name="qtd" type="text" maxlength="2" size="1" class="btn" value=1>
											<button type="button" class="btn" onClick="increm_qtd(1, '.$resultado_id_produto[$count2].')">+</button>
											<input name="id" value="'.$resultado_id_produto[$count2].'" style="display: none">
											<input name="pesquisa" value="'.$produto.'" style="display: none">
										</div>
								
									</form>
								</div>
							</div>
							';
							
							$count2++;
						}
					$count++;
					}
				?>

		</div>
	</section>
		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>		
	
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