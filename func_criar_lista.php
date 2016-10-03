<?php
session_start();

include('func_conectar_bd.php');
$cpf = $_SESSION['cpf'];
$nome_lista = $_POST['nome_lista'];

$query = "SELECT * FROM tb_lista_compra_cliente WHERE nome_lista = '" .$nome_lista. "';";

$resultado = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($resultado);

if($num_rows > 0){
	echo "ja existe";	
}else{
	echo "nova linha";
	$query = "INSERT INTO tb_lista_compra_cliente VALUES (DEFAULT , ".$cpf." , '".$nome_lista."')";
	mysqli_query($conn, $query);
}

header('Location: pag_area_cliente.php');

?>