<?php

session_start();
include('func_conectar_bd.php');

var_dump($_POST);

$array = array_keys($_POST);
echo $_POST[$array[0]];

$i=0;
foreach($_POST as $arr){

	if($i == 0){
		echo 'verdadeiro';
		$i++;
	}else{
		$query = 'DELETE FROM tb_item_lista WHERE id_lista = ' .$_POST['lista']. ' AND id_produto = ' .$_POST[$array[$i]] ;
		$res = mysqli_query($conn, $query);
		echo '<br>'.$query;
		$i++;
	}
}

header('Location: pag_minhas_listas.php');

?>