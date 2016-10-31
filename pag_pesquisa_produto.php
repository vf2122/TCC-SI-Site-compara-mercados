<?php

$produto = $_GET['pesquisa'];
	
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
		
		<section id="conteudo">
		<section class="row" id="section_resultados_pesquisa">
			
			<div class="col-md-8">
				<div class="row">
				<?php	
				
				$count = 0;
				
				$query = "SELECT * FROM tb_supermercado";
				$res = mysqli_query($conn, $query);

				
				while($row = mysqli_fetch_array($res)){
					$array_mercado[] = $row['nm_supermercado'];
					
					$query_produto = 	"SELECT * FROM bd_".$array_mercado[$count].".tb_produto 
										INNER JOIN bd_facilitte.tb_marca 
										ON bd_".$array_mercado[$count].".tb_produto.id_marca = bd_facilitte.tb_marca.id_marca
										WHERE nome_produto = '".$produto."'";
										
					$res_produto = mysqli_query($conn, $query_produto);
					
					$count2 = 0;
						while($resultado = mysqli_fetch_array($res_produto)){
		
							$id_produto = $resultado['id_produto'];
							$nome_produto = $resultado['nome_produto'];
							$marca_produto = $resultado['id_marca'];
							$peso = $resultado['volume'].$resultado['un_medida'];	
							$valor = $resultado['valor'];
							$marca = $resultado['descricao'];
							
							
							if(isset($resultado_id_produto)){
								
								if(in_array($marca, $resultado_marca)){
									$count2++;
								}else{
									
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
							}else{
							
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
						}
					$count++;
					}
				?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<?php
					
					$query = 'SELECT id_lista, nome_lista FROM tb_lista_compra_cliente WHERE cpf_cliente = ' .$_SESSION['cpf'] ;
					$res = mysqli_query($conn, $query);
					$count = 0;
					
					
					echo '<div class="row">';
					while($row = mysqli_fetch_array($res)){
						$id_lista[] = $row['id_lista'];
						$nome_lista[] = $row['nome_lista'];
						
						
						echo '<div class="col-md-12" style="padding-left: 25px; padding-right: 25px;">
								<div id="div_lista_pag_pesquisa">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-1">
												<div>
													<button class="btn btn-primary btn-xs" onClick="mostra_lista('.$id_lista[$count].')">
													<span class="glyphicon glyphicon-triangle-bottom"><span></button>
												</div>
											</div>
											<div class="col-md-8">
												<b>'.strtoupper($nome_lista[$count]).'</b>
											</div>
											<div class="col-md-3">
											</div>
										</div>
									
										<div class="row" id="lista_'.$id_lista[$count].'" style="display: none;">
										
											<hr>
									
											<div class="row" style="margin-top: 5px;">
													<div class="col-md-1">
														
													</div><div class="col-md-2">
														<b>item
													</div>
													<div class="col-md-5">
														descrição
													</div>
													<div class="col-md-2">
														peso 
													</div>
													<div class="col-md-2">
														qtd
													</div></b>
											</div>
											
											<hr>';
										
											$query2 = "SELECT tb_item_lista.id_produto, tb_produto.nome_produto, tb_produto.volume, tb_produto.un_medida, tb_item_lista.quantidade, tb_marca.descricao 

														FROM tb_item_lista 

														inner join tb_produto 
														on tb_item_lista.id_produto = tb_produto.id_produto 

														inner join tb_marca 
														on tb_produto.id_marca = tb_marca.id_marca 

														WHERE tb_item_lista.id_lista = " .$id_lista[$count];
																																  
											$res2 = mysqli_query($conn, $query2);

											$count2 = 0;
											
											while($row2 = mysqli_fetch_array($res2)){
															
												$array_id_produto[] = $row2['id_produto'];
												$array_nome_produto[] = $row2['nome_produto'];
												$array_quantidade[] = $row2['quantidade'];
												$descricao[] = $row2['descricao'];
												$peso2[] = $row2['volume'].$row2['un_medida'];					
																	
																	
												echo'
													<div class="row">
														<div class="col-md-1">
														
														</div>
														<div class="col-md-2">
															'.($count2+1).'
														</div>
														<div class="col-md-5">
															<p style="font-size: 10px">'.$array_nome_produto[$count2].' '.$descricao[$count2].'</p>
														</div>
														<div class="col-md-2">
															<p style="font-size: 12px">'.$peso2[$count2].'</p>
														</div>
														<div class="col-md-2">
															<p style="font-size: 12px">'.$array_quantidade[$count2].'</p>
														</div>
													</div>';
												$count2++;
											}
											
									echo'</div>
									</div>
								</div>
							</div>';
						
						unset($array_id_produto);
						unset($array_nome_produto);
						unset($array_quantidade);
						unset($descricao);
									
						
						if(($count+1) % 3 == 0){
							echo'
								</div>
								<div class="row">
							';
						}
						
					$count++;
					}
					echo '</div>';
				?>
				</div>
			</div>
		</section>	<!-- /section da página -->
		</section>
		
		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>		
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

	function mostra_lista(num){
		
		var id = "lista_" + num;
		if(document.getElementById(id).style.display == "block"){
			document.getElementById(id).style.display = "none";
		}else{
			document.getElementById(id).style.display = "block";
		}
		
	}

	
</script>
</html>