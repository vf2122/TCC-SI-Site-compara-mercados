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
		
				
<!-- ASIDE -->
	
	

			
		<nav id="conteudo_principal_pag_cadast_cliente" class="row">
			
			<aside class="col-md-12">
				<div class="col-md-2">
				</div>
					
					<div class="col-md-8">
						<form id="form_info" action="func_cadastra_cliente.php" method="POST" name="form_cadastro" enctype="multipart/form-data">
							
							<div id="div_info_pessoal">

								<div class="row">
									<div class="col-md-3">
										<legend>info pessoal</legend>
									</div>
								</div>
							
							
								<div class="row form-group">
									<div class="col-md-6">
										<label>Nome completo:</label>
										<input type="text" name="nome" required="required" class="form-control">
										<label class="radio-inline"><input type="radio" name="sexo" value="m" checked>Masculino</label>
										<label class="radio-inline"><input type="radio" name="sexo" value="f">Feminino</label>
									</div>
								</div>
							
							
								<div class="row form-group">
									<div class="col-md-2">
										<label>CPF:</label>
										<input type="text" maxlength="11" name="cpf" placeholder="123456789" required="required" class="form-control">
									</div>
									<div class="col-md-2">
										<label>Apelido:</label>
										<input type="text" maxlength="11" name="apelido" required="required" class="form-control">
									</div>
									<div class="col-md-2">
										<label>Telefone:</label>
										<input type="text" maxlength="9" name="tel" required="required" class="form-control">
									</div>
								</div>
								
							
								<div class="row form-group">
									<div class="col-md-3">
										<label>Data de nascimento:</label>
										<div class="row">
											<div class="col-md-4">
												<input type="text" name="dia_nasc" required="required" class="form-control">
											</div>
											<div class="col-md-4">
												<input type="text" name="mes_nasc" required="required" class="form-control">
											</div>
											<div class="col-md-4">
												<input type="text" name="ano_nasc" required="required" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<label>Estado civil:</label>
										<select name="est_civil" class="form-control">
											<option value="s">Solteiro (a)
											<option value="c">Casado (a)
											<option value="v">Viúvo (a)
											<option value="d">Divorciado (a)										
										</select>
									</div>
								</div>	
							
							
								<div class="row form-group">
									<div class="col-md-3">
										<label>E-mail:</label>
										<div class="input-group"><span class="input-group-addon">@</span>
											<input type="email" id="email" name="email" required="required" class="form-control" onKeyUp="valida_email(0)" onBlur="valida_email(1)">
										</div>
									</div>
									<div class="col-md-3">
										<label>Confirme:</label>
										<input type="email" id="re_email" name="re_email" required="required" class="form-control" onKeyUp="valida_email(0)" onBlur="valida_email(1)">
									</div>
								</div>
							
							
								<div class="row form-group">
									<div class="col-md-3">
										<label>Senha:</label>
										<input type="password" id="senha" name="senha" required="required" class="form-control" onKeyUp="valida_senha(0)" onBlur="valida_senha(1)">
									</div>
									<div class="col-md-3">
										<label>Confirme:</label>
										<input type="password" id="re_senha" name="re_senha" required="required" class="form-control" onKeyUp="valida_senha(0)" onBlur="valida_senha(1)">
									</div>
								</div>
							
							</div> <!-- /div_info_pessoal -->
							
							
							

							
							<div id="div_info_endereco">

								<div class="row">
									<div class="col-md-3">
										<legend>info endereço</legend>
									</div>
								</div>
							
							
								<div class="row form-group">
									<div class="col-md-4">
										<label>Logradouro:</label>
										<input type="text" name="logradouro" class="form-control">
									</div>
									<div class="col-md-2">
										<label>CEP:</label>
										<input type="text" name="cep" maxleght="8" class="form-control">
									</div>
								</div>
						

								<div class="row form-group">
									<div class="col-md-1">
										<label>Nº:</label>
										<input type="text" name="num" maxleght="6" class="form-control">
									</div>
									<div class="col-md-3">
										<label>Complemento:</label>
										<input type="text" name="complem" class="form-control">
									</div>
									<div class="col-md-2">
											<label>Bairro:</label>
											<input type="text" name="bairro" class="form-control">
									</div>
								</div>
							

								<div class="row form-group">
									<div class="col-md-3">
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
									<div class="col-md-3">
										<label>Município:</label>
										<input type="text" name="municipio" class="form-control">
									</div>
								</div>

							</div> <!-- /div_info_endereco -->
							


							<div id="div_botoes_form_info">	
								<div class="row">
									<div class="col-md-3">
										<input type="submit" id="btn_submit" class="btn btn-success form-control">
									</div>
									<div class="col-md-3">
										<input type="reset" class="btn btn-danger form-control">
									</div>
								</div>
							</div> <!-- /div_botoes_form_info -->
						</form> <!-- /form_info -->
					</div>

				<div class="col-md-1">
				</div>
			</aside>
		</nav>		


		<footer class="row" style=" height: 50px; background-color: black;">
		</footer>				
	</div> <!-- /div.container-fluid -->
</body>

</html>