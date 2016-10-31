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
	<div class="container">	
		<?php	//inclui o codigo do modal de login
			include('header.php');
			include('header_modal.php');
		?>
		
		<section id="conteudo">
		<section class="row">
			
			<?php
				$query = 'SELECT id_lista, nome_lista FROM tb_lista_compra_cliente WHERE cpf_cliente = ' .$_SESSION['cpf'] ;
				$res = mysqli_query($conn, $query);
				$count = 0;
				
				echo '<div class="row">';
				while($row = mysqli_fetch_array($res)){
					$id_lista[] = $row['id_lista'];
					$nome_lista[] = $row['nome_lista'];
				
					echo '<div class="col-md-4" style="padding-left: 25px; padding-right: 25px;">
							<div id="div_lista">
								<div class="row">
									<div class="col-md-1">
										<input type="checkbox" onClick="selecionar_todos()"> 
									</div>
									<div class="col-md-8">
										'.strtoupper($nome_lista[$count]).'
									</div>
									<div class="col-md-3">
										<div>
										<button class="btn btn-primary btn-xs" onClick="mostra_lista('.$id_lista[$count].')">
										<span class="glyphicon glyphicon-triangle-bottom"><span></button>
										<input type="hidden" name="lista" value="'.$id_lista[$count].'">
										<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button><br>
										</div>
									</div>
								</div>
								<hr>
								<div class="row" style="margin-top: 5px;">
									<div class="col-md-1"><b>
									
									</div>
									<div class="col-md-2"><b>
										item
									</div>
									<div class="col-md-4">
										descrição
									</div>
									<div class="col-md-2">
										peso 
									</div>
									<div class="col-md-3">
										qtd
									</div></b>
								</div>
								
								<div class="row" id="lista_'.$id_lista[$count].'" style="display: none;">
								
								<hr>
									<div class="container-fluid">
								';
								
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
									$peso[] = $row2['volume'].$row2['un_medida'];					
														
														
									echo'
										<div class="row">
											<div class="col-md-1">
												<input type="checkbox">
											</div>
											<div class="col-md-2">
												'.($count2+1).'
											</div>
											<div class="col-md-4">
												<p style="font-size: 12px">'.$array_nome_produto[$count2].' '.$descricao[$count2].'</p>
											</div>
											<div class="col-md-2">
												'.$peso[$count2].' 
											</div>
											<div class="col-md-3">
												'.$array_quantidade[$count2].'
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
		</section>	
		</section>
		
		</div>
		
		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>		
	</div>	
</body>
<script>

	function selecionar_todos(){
		
		document.getElementById('checkbox30').checked = true;
		
	}
	
	function limpar_carrinho(){
	
		var confirmacao = window.confirm("Tem certeza que deseja remover tudo?");
		
		if(confirmacao == true){
			location.replace("func_remove_do_carrinho.php?funcao=1");
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
