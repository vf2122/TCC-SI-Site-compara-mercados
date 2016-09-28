<?php
	
	session_start();
	$id_Item = $_GET['id'];
	$qtd_Item = $_GET['qtd'];
	$pesquisa = $_GET['pesquisa'];
	
	if(isset($_SESSION['carrinho']))
	{
		$array = $_SESSION['carrinho'];
	}
	$array[] = array("id" => $id_Item, "quantidade" => $qtd_Item);
	sort($array);
	$_SESSION['carrinho'] = $array;
	
	$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/pag_pesquisa_produto.php?pesquisa=".$pesquisa;
	header($pag_voltar);
?>