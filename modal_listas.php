<div id="modal_listas" class="modal fade">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<header class="modal-header">
				<button class="close" id="botao_sair_modal" onClick="modal_hide('#modal_listas')" data-dimiss="modal">x</button>
				<h3>Selecione a Lista</h3>
			</header>
			<section class="modal-body">
				<?php
					$query = "SELECT * FROM tb_lista_compra_cliente WHERE cpf_cliente = ".$_SESSION['cpf'];
					$resultado = mysqli_query($conn, $query);
					$count = 0;
					
					while($consulta = mysqli_fetch_array($resultado)){
						$array_nome_lista[] = $consulta['nome_lista'];
						$array_id_lista[] = $consulta['id_lista'];
						
						echo '<input type="checkbox" name="checkbox'.$count.'" value="'.$array_id_lista[$count].'"> ' .ucfirst($array_nome_lista[$count]) . '<br>';
						$count++;
					}
				?>
			</section>
			<footer class="modal-footer">
					<button class="btn btn-success" onClick="adiciona_lista()">Adicionar</button>
			</footer>
		</div>
	</div>
</div>
<script>
	
	function adiciona_lista(){
	
			location.replace("func_add_carrinho_lista.php");
		
	}
</script>