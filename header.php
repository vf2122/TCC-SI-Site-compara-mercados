<?php
	session_start();
?>
	
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
						<?php
						
							if(isset($_SESSION['cpf'])){
								echo '
								<div style="float: right; margin-right: 10px; ">
									<a href="pag_area_cliente.php" class="navbar-brand navbar-brand">
										<span class="glyphicon glyphicon-user"></span>
									</a>
								</div>';
							}else{
								echo '
								<div style="float: right; margin-right: 10px; ">
									<a data-toggle="modal" href="#mymodal" class="navbar-brand navbar-brand">
										<span class="glyphicon glyphicon-user"></span>
									</a>
								</div>';
							}
						?>
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
		
<?php var_dump($_SESSION);?>
