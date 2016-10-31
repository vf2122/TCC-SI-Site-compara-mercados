<?php
session_start();
include('func_conectar_bd.php');

var_dump($_SESSION);

$id = $_SESSION['id'];

$nome_end = $_POST['nome_end'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
//$cidade = $_POST['cidade'];
$cidade = 1;

$query = "INSERT INTO `tb_endereco`
		(`id_endereco`, `nome_endereco`, `id_cliente`, `logradouro`, `logradouro_numero`, `complemento`, `bairro`, `id_cidade`, `CEP`) 
		
		VALUES 
		
		(DEFAULT , '".$nome_end."' ,  ".$id." ,  '".$rua."' ,  ".$numero." ,  '".$complemento."' ,  '".$bairro."' ,  '".$cidade."' ,  ".$cep." )";

		echo $query;
$res = mysqli_query($conn , $query);	


			$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/pag_area_cliente.php";
			header($pag_voltar);					
							
?>