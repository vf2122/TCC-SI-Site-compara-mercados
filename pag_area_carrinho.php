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
		
		<section id="conteudo">
		<section class="row" id="section_resultados_pesquisa">
				
			<div class="col-md-2">
					<a data-toggle="modal" href="#modal_listas"><button class="btn btn-success" style="width: 130px; height: 40px; margin: 2px">Adicionar a lista</button></a>
					<button class="btn btn-danger" style="width: 130px; height: 40px; margin: 2px" onClick="limpar_carrinho()">Limpar tudo</button>
			</div>
			<form action="func_add_carrinho_lista.php" method="POST">
			<div class="col-md-5">
			<?php
					
					include('modal_listas.php');
				
					if(isset($_SESSION['carrinho'])){
						$produto = $_SESSION['carrinho'];
					}
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
									<div class="col-md-12 div_resultado_busca_carrinho">
											<div class="row">
												<div class="col-md-3">
													<img src="#" class="img_carrinho">
												</div>
												<div class="col-md-7">
													<p>'.$resultado_nome_produto[$count].'   '.$resultado_marca[$count].'<br>'.$resultado_peso[$count].'</p>
														<button class="btn btn-danger" onClick="remove_carrinho('.$resultado_id_produto[$count].')">remover</button>
													
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
			</form>
			</div>
			
			<div class="col-md-1">
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
		</section>	<!-- /section da página -->				
		</section>
		
		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>				
	</div> <!-- /div.container-fluid -->
</body>

<script>
	function mostra_lista(num){
		
		var id = "lista_" + num;
		if(document.getElementById(id).style.display == "block"){
			document.getElementById(id).style.display = "none";
		}else{
			document.getElementById(id).style.display = "block";
		}
		
	}
	
	function func_add_carrinho_lista(){
		location.replace("func_add_carrinho_lista.php");
	}
	
	
	function limpar_carrinho(){
	
		var confirmacao = window.confirm("Tem certeza que deseja remover tudo?");
		
		if(confirmacao == true){
			location.replace("func_remove_do_carrinho.php?funcao=1");
		}
		
	}
	
	function remove_carrinho(id){
			
			return false;
			var id_produto = id;
			var confirmacao = window.confirm("Tem certeza que deseja remover este produto?");
			
			if(confirmacao == true){
				var confirmacao = window.confirm("entrou no if "+id_produto);
				location.replace("func_remove_do_carrinho.php?funcao=2&id="+id_produto);
			}
		
	}
</script>
</html>