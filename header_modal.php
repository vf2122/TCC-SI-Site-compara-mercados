
		<section class="row">
			<div class="col-md-12">
				
				<div id="mymodal" class="modal fade">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<header class="modal-header">
								<button id="botao_sair_modal" class="close" data-dimiss="modal" onClick="modal_hide()">x</button>
								<h3>Login de Usuário</h3>
							</header> <!-- /header modal -->

							<section class="modal-body">
								<div class="container-fluid">
									<nav class="row">
										<div class="col-md-3">
										</div>

										<div class="col-md-6">
											<form action="func_login.php" id="form_modal_login" method="POST">
												<div class="row form-group">
													<input type="text" name="login" class="form-control" placeholder="Login">
												</div>
												<div class="row form-group">
													<input type="password" name="password" class="form-control" placeholder="Senha">
												</div>
										</div>

										<div class="col-md-3">
										</div>
									</nav>
								</div>
							</section> <!-- /section modal -->

							<footer class="modal-footer">
								<div class="container-fluid">
									<nav class="row">
										<div class="col-md-3">
										</div>

										<div class="col-md-3">
											<button type="submit" class="btn btn-primary form-control">Entrar</button>
										</div>
										<div class="col-md-3">
											<button class="btn btn-danger form-control">Cancelar</button>
										</div>
											</form>
										<div class="col-md-3">
											<a href="pag_cadastra_cliente.php">Inscreva-se</a>
										</div>
									</nav>
								</div>
							</footer> <!-- /footer modal -->

						</div> <!-- /div modal-content -->
					</div> <!-- /div2 modal -->
				</div> <!-- /div1 modal -->
			</div>			
		</section>
