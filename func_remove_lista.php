<?php
session_start();
include('func_conectar_bd.php');

$id_lista = $_POST['id_da_lista'];
$query = "DELETE FROM tb_lista_compra_cliente WHERE id_lista = ".$id_lista;
$resultado = mysqli_query($conn, $query);

header("Location: pag_area_cliente.php");

?>