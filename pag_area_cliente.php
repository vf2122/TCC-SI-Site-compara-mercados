
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
			include('listas_modal.php');
			include('func_conectar_bd.php');
			
			if(isset($_SESSION['cpf'])){
				
			}else{
			$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/index.php";
			header($pag_voltar);
			}
		?>
	
<!-- /HEADER -->

	<section id="conteudo">
	<nav class="row" style="margin-top: 20px">

	<nav class="col-md-4">
		<aside class="container-fluid">
	
		<div class="row">
			<div class="col-md-7"  style="background-color: #CCCCFD">				
				<img src="a" style="height: 110px;">
				<a href="#"><p>trocar - <?php echo $_SESSION['nome'];?></p></a>
				<a href="func_logout.php"><p>sair</p></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7" style="background-color: #CCCCFD">
				<p>MEUS DADOS</p>
				<a href="#" onClick="funcaomostrar('aside_dados_pessoais')"><p>Dados Pessoais</p></a>
				<a href="#" onClick="funcaomostrar('aside_enderecos')"><p>Endereços</p></a>
				<a href="#" onClick="funcaomostrar('aside_trocar_senha')"><p>Trocar Senha</p></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7" style="background-color: #CCCCFD">
				<p>COMPRAS</p>
				<a href="#" onClick="funcaomostrar('aside_minhas_compras')"><p>Minhas Compras</p></a>
				<a href="#" onClick="funcaomostrar('aside_minhas_listas')"><p>Minhas Listas</p></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6" style="background-color: #CCCCFD">
				
			</div>
		</div>
	</aside>
	</nav>
	
	<nav class="col-md-8">
		<aside id="aside_dados_pessoais" class="container-fluid" style="display: none">
				<div class="row">
					<div class="col-md-4">
						<label>sexo:</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label class="radio-inline"><input type="radio" name="sexo" value="masculino" checked>Masculino</label>
						<label class="radio-inline"><input type="radio" name="sexo" value="feminino">Feminino</label>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-4">
						<label>nome:</label>
						<input type="text" class="form-control" placeholder="nome" value="<?php echo $_SESSION['nome'];?>">
					</div>	
				</div>		


				<div class="row">
					<div class="col-md-4">
						<label>cpf:</label>
						<input type="text" class="form-control" placeholder="nome" value="<?php echo $_SESSION['cpf'];?>">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>apelido:</label>
						<input type="text" class="form-control" placeholder="nome" value="<?php echo $_SESSION['apelido'];?>">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-2">
						<label>Data de Nascimento:</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<input type="text" class="form-control" placeholder="dd">
					</div>
					<div class="col-md-1">
						<input type="text" class="form-control" placeholder="mm">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" placeholder="aaaa">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>Telefone:</label>
						<input type="text" class="form-control" placeholder="nome" value="<?php echo $_SESSION['telefone'];?>">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>Estado Civil:</label>
						<select name="est_civil" class="form-control">
							<option value="s">Solteiro (a)
							<option value="c">Casado (a)							
						</select>
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>Email:</label>
						<input type="text" class="form-control" placeholder="nome" value="<?php echo $_SESSION['email'];?>">					
					</div>
				</div>
		</aside>
		
		
		<aside id="aside_enderecos" class="container-fluid" style="display: block">
			<div class="row">
				<div class="col-md-2">
					<a data-toggle="modal" href="#modal_endereco">
						<img src="img/icone_mais_casa.png" style="border-radius: 35px;">
					</a>
				</div>
				
				<div class="col-md-8">
					<?php
						include('modal_endereco.php');
						$query = "SELECT * FROM tb_endereco WHERE id_cliente = ".$_SESSION['id'];
						$res = mysqli_query($conn , $query);
						
						while($row = mysqli_fetch_array($res)){
							$nome_end = $row['nome_endereco'];
							$rua = $row['logradouro'];
							$numero = $row['logradouro_numero'];
							$complemento = $row['complemento'];
							$bairro = $row['bairro'];
							$cep = $row['CEP'];
						}
						
						
					?>
				</div>
			</div>
		</aside>

		
		<aside id="aside_trocar_senha" class="container-fluid" style="display: none">
			<div class="row">
				<div class="col-md-3">
					email
					senha atual
					nova senha
					confirma nova senha
				</div>
			</div>
		</aside>
		
		
		<aside id="aside_minhas_compras" class="container-fluid" style="display: none">
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-primary"> ok </button>
				</div>
			</div>
		</aside>
		
		
		<aside id="aside_minhas_listas" class="container-fluid" style="display: none">
			
							
						<div class="col-md-5" style="padding-left: 25px; padding-right: 25px;">
							<div id="div_lista_pag_pesquisa">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-2">
											<button class="btn btn-success" data-toggle="modal" href="#modal_listas"> 
												<span class="glyphicon glyphicon-list-alt"></span>	 
											</button>
										</div>
										<div class="col-md-10">
											<h3 style="display: inline;">Criar nova Lista</h3>
										</div>	
									</div>
								</div>
							</div>
						</div>
			
			<?php
				$query = 'SELECT * FROM tb_lista_compra_cliente WHERE cpf_cliente =' .$_SESSION['cpf'];
				$resultado = mysqli_query($conn, $query);
				$count = 0;
				
				while($consulta = mysqli_fetch_array($resultado)){
					$array_nome_lista[] = $consulta['nome_lista'];
					$array_id_lista[] = $consulta['id_lista'];

						echo '<div class="col-md-5" style="padding-left: 25px; padding-right: 25px;">
									<div id="div_lista_pag_pesquisa">
										<div class="container-fluid">
											<div class="row">
												<div class="col-md-2">
													<form action="func_remove_lista.php" method="POST">
														<button name="id_da_lista" value="'.$array_id_lista[$count].'" class="btn btn-danger" data-toggle="modal" href="func_remove_lista.php"> 
															<span class="glyphicon glyphicon-trash"></span>	 
														</button>
												</div>
												<div class="col-md-10">
														<h3 style="display: inline;">'.$array_nome_lista[$count].'</h3>
													</form>
												</div>	
											</div>
										</div>
									</div>
							</div>
						';
					$count++;
				}
			?>
		</aside>
	</nav>
	</section>
	
		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>		
	</div> <!-- /div.container-fluid -->
</body>

</html>