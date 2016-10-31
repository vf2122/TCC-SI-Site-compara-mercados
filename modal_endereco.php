<div id="modal_endereco" class="modal fade">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<header class="modal-header">
				<button class="close" id="botao_sair_modal" onClick="modal_hide('#modal_endereco')" data-dimiss="modal">x</button>
				<h3>Crie seu novo endereço</h3>
			</header>
			<section class="modal-body">
	
				<div class="container-fluid">
					<form action="func_salvar_endereco.php" method="POST">
						<div class="row">
							<div class="col-md-2">
							</div>
						
							<div class="col-md-8">
								<div class="container-fluid">
								
									<div class="row">
										<div class="col-md-2">
										
										</div>
										<div class="col-md-8">
											<input type="text" name="nome_end" class="form-control" placeholder="Digite o nome do Endereço">					
										</div>
										<div class="col-md-2">
									
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12">
											<label>Rua:</label>
											<input type="text" name="rua" class="form-control" placeholder="nome">					
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-md-4">
											<label>N°:</label>
											<input type="text" name="numero" class="form-control" placeholder="nome">					
										</div>
										<div class="col-md-8">
											<label>Complemento:</label>
											<input type="text"  name="complemento" class="form-control" placeholder="nome">					
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-md-6">
											<label>CEP:</label>
											<input type="text"  name="cep" class="form-control" placeholder="nome">					
										</div>
										<div class="col-md-6">
											<label>Bairro:</label>
											<input type="text"  name="bairro" class="form-control" placeholder="nome">					
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-md-6">
											<label>Cidade:</label>
											<input type="text"  name="cidade" class="form-control" placeholder="nome">					
										</div>
									
										<div class="col-md-6">
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
								</div>
							</div>
						</div>
				</div>
			</section>
			<footer class="modal-footer">
					<input type="submit" class="btn btn-success" value="Adicionar">
					
				</form>
			</footer>
		</div>
	</div>
</div>