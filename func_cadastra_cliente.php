<?php
	
	include('func_conectar_bd.php');
	
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$apelido = $_POST['apelido'];
	$tel = $_POST['tel'];
	$dt_nasc = $_POST['ano_nasc'] ."-". $_POST['mes_nasc'] ."-". $_POST['dia_nasc'] ;
	$est_civil = $_POST['est_civil'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	
	$query = "call cadastrarCliente(".$cpf. ",'" .$nome. "', '" .$sexo. "' ,'" .$apelido. "'," .$tel. ",'" .$dt_nasc. "', '" .$est_civil. "' ,'" .$email. "', '" .$senha. "')";
	echo $query; 
	mysqli_query($conn, $query);
	
	header("Location: index.php");
	
?>