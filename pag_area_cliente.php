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
	
<!-- /HEADER -->
	<nav class="row" style="margin-top: 20px">

	<nav class="col-md-4" >
		<aside class="container-fluid">
	
		<div class="row">
			<div class="col-md-7"  style="background-color: #CCCCFD">				
				<img src="a" style="height: 110px;">
				<a href="#"><p>trocar - nome</p></a>
				<a href="#"><p>email</p></a>
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
						<input type="text" class="form-control" placeholder="nome">
					</div>	
				</div>		


				<div class="row">
					<div class="col-md-4">
						<label>cpf:</label>
						<input type="text" class="form-control" placeholder="nome">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>apelido:</label>
						<input type="text" class="form-control" placeholder="nome">
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
						<input type="text" class="form-control" placeholder="nome">
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>Estado Civil:</label>
						<select name="est_civil" class="form-control">
							<option value="solteiro">Solteiro (a)
							<option value="casado">Casado (a)
							<option value="viuvo">Viúvo (a)
							<option value="divorciado">Divorciado (a)										
						</select>
					</div>
				</div>
				
					
				<div class="row">
					<div class="col-md-4">
						<label>Email:</label>
						<input type="text" class="form-control" placeholder="nome">					
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
		
		
		<aside id="aside_minhas_listas" class="container-fluid" style="display: none">
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-primary"> ok </button>
				</div>
			</div>
		</aside>
	</nav>
	</div> <!-- /div.container-fluid -->
</body>

</html>