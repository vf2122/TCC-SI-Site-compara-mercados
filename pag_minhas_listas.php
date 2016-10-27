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
	
		<section class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="container-fluid">
			<div class="row">
			<?php
				$query = 'SELECT id_lista, nome_lista FROM tb_lista_compra_cliente WHERE cpf_cliente = ' .$_SESSION['cpf'] ;
				$resultado = mysqli_query($conn, $query);
				$count = 0;
				
				
				while($consulta = mysqli_fetch_array($resultado)){
					
					$array_id_lista[] = $consulta['id_lista'];
					$array_nome_lista[] = $consulta['nome_lista'];
					
					$query2 = "SELECT tb_item_lista.id_produto, tb_produto.nome_produto, tb_item_lista.quantidade 
							   FROM tb_item_lista
							   inner join tb_produto on tb_item_lista.id_produto = tb_produto.id_produto
							   WHERE tb_item_lista.id_lista = " .$array_id_lista[$count];
							  
					$res = mysqli_query($conn, $query2);
					
					if($count <> 0 and $count % 3 == 0){
						echo '<div class="row">';
					}
					
					echo 	'<div class="col-md-3">
								<div class="row">
									<input type="checkbox" onClick="selecionar_todos()">
										'.$array_id_lista[$count].' - ' .$array_nome_lista[$count]. ' 
										<button class="btn btn-primary btn-xs" onClick="mostra_lista('.$array_id_lista[$count].')">
										<span class="glyphicon glyphicon-triangle-bottom"><span></button>
										<form action="func_remove_da_lista.php" method="POST" style="display: inline">
										<input type="hidden" name="lista" value="'.$array_id_lista[$count].'">
										<button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button><br>
									<div id="lista_'.$array_id_lista[$count].'" style="display: block;">
							';
					
					$count2 = 0;
					
					while($row = mysqli_fetch_array($res)){
						$array_id_produto[] = $row['id_produto'];
						$array_nome_produto[] = $row['nome_produto'];
						$array_quantidade[] = $row['quantidade'];
						
						echo '
							<div class="row">
								<input type="checkbox" id="checkbox'.$count2.'" name="checkbox'.$count2.'" value="'.$array_id_produto[$count2].'"> '.($count2+1).' - '.$array_nome_produto[$count2].' - [ ' .$array_quantidade[$count2]. ' ] 
							</div>
						';
						
						$count2++;
					}
					
					echo '</div></div></form></div>';
					
					if($count <> 0 and $count % 3 == 0){
							echo '</div><br>';
					}
					$count++;
					
				}
			?>
			</div>
			</div>
			</div>
		</section>	
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
