<?php
session_start();
include('func_conectar_bd.php');

$lista = $_SESSION['carrinho'];

foreach($_POST as $arr){

	for($i = 0 ; $i < count($lista) ; $i++){
	
		$resultado = mysqli_query($conn , "SELECT * FROM tb_item_lista WHERE id_lista = " .$arr[0]. " AND id_produto = " .$lista[$i]['id']. " AND quantidade = " .$lista[$i]['quantidade']);
		$rows = mysqli_num_rows($resultado);
	
		if($rows == 0){
			$query = "INSERT INTO tb_item_lista (id_lista, id_produto, quantidade) VALUES (" .$arr[0]. " , " .$lista[$i]['id']. " , " .$lista[$i]['quantidade']. " )";
			mysqli_query($conn , $query);
		}
	}
}
header("Location: pag_area_carrinho.php");

?>