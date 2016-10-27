<?php
	
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "bd_facilitte";
	$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
	$produto = $_GET['pesquisa'];
	
	$query = "SELECT * FROM tb_supermercado";
	$res = mysqli_query($conn, $query);

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
			<div class="col-md-8">
				<div class="row">
				<?php	
				
				$count = 0;
				
				while($row = mysqli_fetch_array($res)){
					$array_mercado[] = $row['nm_supermercado'];
					
					$query_produto = 	"SELECT * FROM bd_".$array_mercado[$count].".tb_produto 
										INNER JOIN bd_facilitte.tb_marca 
										ON bd_".$array_mercado[$count].".tb_produto.id_marca = bd_facilitte.tb_marca.id_marca
										WHERE nome_produto = '".$produto."'";
										
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
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-2">
				<div class="row">
				<?php	
					include('func_conectar_bd.php');
					$query = "SELECT * FROM tb_supermercado";
					$res = mysqli_query($conn, $query);
					
					while($row = mysqli_fetch_array($res)){
						$array_nome_mercado[] = $row['nm_supermercado'];
					}
					
					$query2 = '
					(SELECT * FROM bd_'.$array_nome_mercado[0].'.tb_produto 
					INNER JOIN bd_facilitte.tb_marca 
					ON bd_'.$array_nome_mercado[0].'.tb_produto.id_marca = bd_facilitte.tb_marca.id_marca
					INNER JOIN bd_facilitte.tb_supermercado
					ON bd_facilitte.tb_supermercado.nm_supermercado = "'.$array_nome_mercado[0].'"
					WHERE tb_produto.nome_produto = "'.$produto.'")

					UNION

					(SELECT * FROM bd_'.$array_nome_mercado[1].'.tb_produto 
					INNER JOIN bd_facilitte.tb_marca 
					ON bd_'.$array_nome_mercado[1].'.tb_produto.id_marca = bd_facilitte.tb_marca.id_marca
					INNER JOIN bd_facilitte.tb_supermercado
					ON bd_facilitte.tb_supermercado.nm_supermercado = "'.$array_nome_mercado[1].'"
					WHERE tb_produto.nome_produto = "'.$produto.'")
					

					ORDER BY valor ASC';
					$res = mysqli_query($conn, $query2);
					
					$count = 0;
					
					while($row = mysqli_fetch_array($res)){
						$array_nome[] = $row['nome_produto'];
						$array_id_produto[] = $row['id_produto'];
						$array_volume[] = $row['volume'];
						$array_un_medida[] = $row['un_medida'];
						$array_valor[] = $row['valor'];
						$array_descricao[] = $row['descricao'];
						$array_nome_mercado[] = $row['nm_supermercado'];
						
						echo '<div class="row"><b>'.$array_nome_mercado[$count].' - </b>'.$array_nome[$count].' '.$array_descricao[$count].' '.$array_valor[$count].'</div>';
						$count++;
					}
				?>
				</div>
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