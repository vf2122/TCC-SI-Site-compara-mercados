<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "bd_facilitte";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
	$produto = $_GET['pesquisa'];
	
	$query = "SELECT * FROM tb_produto WHERE nome_produto = '".$produto."'";
	$consulta = mysqli_query($conn, $query);

?>

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
	
</head>

<body>

	<div class="container-fluid">
	
		
		<?php	//inclui o codigo do modal de login
			include('header.php');
			include('header_modal.php');
		?>
		
		<section class="row" id="section_resultados_pesquisa">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="row">
				<?php	
				
				$count = 0;
				
				while($resultado = mysqli_fetch_array($consulta)){
		
					$resultado_id_produto[] = $resultado['id_produto'];
					$resultado_nome_produto[] = $resultado['nome_produto'];
					$resultado_marca_produto[] = $resultado['id_marca'];
					$resultado_peso[] = $resultado['volume'].$resultado['un_medida'];	
					
					$query_marca = "SELECT descricao FROM tb_marca WHERE id_marca = ".$resultado_marca_produto[$count];
					$consulta2 = mysqli_query($conn, $query_marca);
					while($resultado2 = mysqli_fetch_array($consulta2)){
						$resultado_marca[] = $resultado2['descricao'];
					}
					
					echo ' 
						<div class="col-md-4 div_resultado_busca_exerno">
							<div class="div_resultado_busca_interno">
								<p>'.$resultado_nome_produto[$count].'   '.$resultado_marca[$count].'<br>'.$resultado_peso[$count].'</p>
								<img src="#" class="img_resultado_pesquisa">
								
								<form action="func_adiciona_carrinho.php?" method="GET">
								
									<button id="btn_add_carrinho" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span></button>
									
									<div class="btn-group">
										<button type="button" class="btn" onClick="increm_qtd(-1, '.$resultado_id_produto[$count].')">-</button>
										<input id="input_qtd_'.$resultado_id_produto[$count].'" name="qtd" type="text" maxlength="2" size="1" class="btn" value=1>
										<button type="button" class="btn" onClick="increm_qtd(1, '.$resultado_id_produto[$count].')">+</button>
										<input name="id" value="'.$resultado_id_produto[$count].'" style="display: none">
										<input name="pesquisa" value="'.$produto.'" style="display: none">
									</div>
								
								</form>
							</div>
						</div>
						';
					$count++;
				}
					
				?>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</section>	<!-- /section da página -->
	</div> <!-- /div.container-fluid -->
</body>

<script type="text/javascript">

	
	function modal_hide(){
		$('#mymodal').modal('toggle');
	};
	
		
	function increm_qtd(qtd, id_produto){
		
		var id = "input_qtd_" + id_produto + "";
		var num = parseInt(document.getElementById(id).value) + qtd;
		document.getElementById(id).value = num;
		
		if(parseInt(document.getElementById(id).value) < 0){
			document.getElementById(id).value = 0;
		}

	}

	
</script>
</html>