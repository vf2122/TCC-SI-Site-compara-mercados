<?php

session_start();

?>
<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "bd_facilitte";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
	$produto = $_GET['pesquisa'];
	
	$query = "SELECT * FROM tb_products WHERE nome_produto = '".$produto."'";
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
	
<!-- HEADER -->
		<header class="row navbar navbar-fixed-top">
			<div class="col-md-12">
				<nav class="row">
					<div class="col-md-1">
						<a href="index.php" class="navbar-brand">PRINCIPAL </a>
					</div>
				
					<div class="col-md-9">
				
					</div>
			
			
					<div class="col-md-2">
						<div style="float: right; margin-right: 10px; ">
							<a data-toggle="modal" href="#mymodal" class="navbar-brand navbar-brand">
								<span class="glyphicon glyphicon-user"></span>
							</a>
						</div>
						<div style="float: right;">
							<a href="pag_area_carrinho.php" class="navbar-brand navbar-brand">
								<span class="glyphicon glyphicon-shopping-cart"></span>
							</a>
						</div>
					</div>
				</nav>
			
				<nav class="row">
				
					<div class="col-md-3">
					
					</div>
				
				<!-- input de busca -->
					<div class="col-md-6">
						<form id="form_pesquisa" action="pag_pesquisa_produto.php" method="GET">
							<div class="input-group">
								<input type="text" name="pesquisa" id="input_pesquisa" class="form-control" placeholder="Digite um produto...">
								<span class="input-group-btn">
									<input type="submit" class="btn btn-primary" value="Procurar">
								</span>
							</div>	
						</form>
					</div> <!-- /input de busca -->
	
					<div class="col-md-3">
							
					</div>
				</nav>
			</div>
		</header>	
		
		<?php	//inclui o codigo do modal de login
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
					$resultado_marca_produto[] = $resultado['marca_produto'];
					$resultado_peso[] = $resultado['peso'];	
					
					
					echo ' 
						<div class="col-md-4 div_resultado_busca_exerno">
							<div class="div_resultado_busca_interno">
								<p>'.$resultado_nome_produto[$count].'   '.$resultado_marca_produto[$count].'<br>'.$resultado_peso[$count].'</p>
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