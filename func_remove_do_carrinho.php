<?php
	
	session_start();
	
	if(isset($_GET['id'])) $id_Item = $_GET['id'];
	if(isset($_SESSION['carrinho'])) $array = $_SESSION['carrinho'];
	if(isset($_GET['funcao'])) $funcao = $_GET['funcao'];
	
	echo 'teste';
	
	
	if($funcao == 2){
		unset($array[array_search("$id_Item", $array)]);
		sort($array);
		$_SESSION['carrinho'] = $array;	
	
		$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/pag_area_carrinho.php";
		header($pag_voltar);
	}elseif($funcao == 1){
		unset($_SESSION['carrinho']);
		
		$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/pag_area_carrinho.php";
		header($pag_voltar);
	}
	
	
	
?>