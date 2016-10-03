<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "bd_facilitte";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
	if(isset($_SESSION['carrinho'])){
		$produto = $_SESSION['carrinho'];
	}
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
	<script type="text/javascript" src="js/scripts.js">
	</script>
	
</head>

<body>

	<div class="container-fluid">
		
		<?php	//inclui o codigo do modal de login
			include('header.php');
			include('header_modal.php');
		?>
		
		<section class="row" id="section_resultados_pesquisa">
			<div class="col-md-2">
				<button class="btn btn-success" style="width: 130px; height: 40px; margin: 2px">Adicionar a lista</button> 
				<button class="btn btn-danger" style="width: 130px; height: 40px; margin: 2px" onClick="limpar_carrinho()">Limpar tudo</button>
			</div>
			<div class="col-md-10">
				<?php
					if(isset($produto)){
						for($i = 0 ; $i< count($produto) ; $i++){
							
							$query = "SELECT * FROM tb_produto WHERE id_produto = '".$produto[$i]['id']."'";
							$consulta = mysqli_query($conn, $query);
					
							$count = $i;
				
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
								<div class="row">
									<div class="col-md-6 div_resultado_busca_carrinho">
											<div class="row">
												<div class="col-md-3">
													<img src="#" class="img_carrinho">
												</div>
												<div class="col-md-7">
													<p>'.$resultado_nome_produto[$count].'   '.$resultado_marca[$count].'<br>'.$resultado_peso[$count].'</p>
													<form action="func_remove_do_carrinho.php?funcao=2&id='.$resultado_id_produto[$count].'" method="POST">
														<input type="submit" value="remover" class="btn btn-danger">
													</form>
												</div>	
												<div class="col-md-2">
													<div class="btn-group-vertical">
														<button type="button" class="btn btn-xs" onClick="increm_qtd(-1, '.$resultado_id_produto[$count].')">-</button>
														<input name="qtd" type="text" maxlength="2" size="1" class="btn btn-xs" value='.$produto[$i]['quantidade'].'>
														<button type="button" class="btn btn-xs" onClick="increm_qtd(1, '.$resultado_id_produto[$count].')">+</button>
													</div>
												</div>
											</div>
										
									</div>
								</div>
								';
								$count++;
							}
						}
					}
				?>
				
			</div>
			<div class="col-md-1">
			</div>
		</section>	<!-- /section da página -->				
		
	</div> <!-- /div.container-fluid -->
</body>

<script>
	
	function limpar_carrinho(){
	
		var confirmacao = window.confirm("Tem certeza que deseja remover tudo?");
		
		if(confirmacao == true){
			location.replace("func_remove_do_carrinho.php?funcao=1");
		}
		
	}
</script>
</html>