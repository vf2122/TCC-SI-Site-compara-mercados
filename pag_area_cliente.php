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
		?>
	
<!-- /HEADER -->

	<nav class="row" style="margin-top: 20px">

	<nav class="col-md-4" >
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
		
		
		<aside id="aside_enderecos" class="container-fluid" style="display: none">
				<div class="row">
					<div class="col-md-5">
						<label>Rua:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-2">
						<label>N°:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
					<div class="col-md-3">
						<label>Complemento:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-5">
						<label>CEP:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
				</div>

				
				<div class="row">
					<div class="col-md-5">
						<label>Bairro:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-3">
						<label>Cidade:</label>
						<input type="text" class="form-control" placeholder="nome">					
					</div>
				
					<div class="col-md-2">
										<label>Estado:</label>
										<select name="estado" class="form-control">
											<option value="AC">(AC) Acre
											<option value="AL">(AL) Alagoas
											<option value="AM">(AM) Amapá
											<option value="BA">(BA) Bahia
											<option value="CE">(CE) Ceará
											<option value="DF">(DF) Distrito Federal
											<option value="ES">(ES) Espírito Santo
											<option value="GO">(GO) Goiás
											<option value="MA">(MA) Maranhão
											<option value="MT">(MT) Mato Grosso
											<option value="MS">(MS) Mato Grosso do Sul
											<option value="MG">(MG) Minas Gerais
											<option value="PA">(PA) Pará
											<option value="PB">(PB) Paraíba
											<option value="PR">(PR) Paraná
											<option value="PE">(PE) Pernambuco
											<option value="PI">(PI) Piauí
											<option value="RJ">(RJ) Rio de Janeiro
											<option value="RN">(RN) Rio Grande do Norte
											<option value="RS">(RS) Rio Grande do Sul
											<option value="RO">(RO) Rondônia
											<option value="RR">(RR) Roraima
											<option value="SC">(SC) Santa Catarina
											<option value="SP">(SP) São Paulo
											<option value="SE">(SE) Sergipe
											<option value="TO">(TO) Tocantins									
										</select>
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
		
		
		<aside id="aside_minhas_listas" class="container-fluid" style="display: block">
			<?php
				$query = 'SELECT * FROM tb_lista_compra_cliente WHERE cpf_cliente =' .$_SESSION['cpf'];
				$resultado = mysqli_query($conn, $query);
				$count = 0;
				
				while($consulta = mysqli_fetch_array($resultado)){
					$array_nome_lista[] = $consulta['nome_lista'];

						echo '
							<div class="row">
								<div class="col-md-5" style="background-color: blue">
									<h4 style="display: inline;">'.$array_nome_lista[$count].'</h4>
									<button class="btn btn-danger" data-toggle="modal" href="func_remove_lista.php" style="float: right"> 
										-	 
									</button>
								</div>
							</div>
						';
					$count++;
				}
			?>
							<div class="row">
								<div class="col-md-5" style="background-color: blue">
									<button class="btn btn-primary" data-toggle="modal" href="#modal_listas" style="float: right"> 
										+	 
									</button>
								</div>
							</div>
		</aside>
	</nav>
	</div> <!-- /div.container-fluid -->
</body>

</html>