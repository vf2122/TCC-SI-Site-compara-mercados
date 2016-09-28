<?php
	
	include('func_conectar_bd.php');
	
	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$cpf = $_POST['cpf'];
	$apelido = $_POST['apelido'];
	$tel = $_POST['tel'];
	$dt_nasc = $_POST['dia_nasc'] ."/". $_POST['mes_nasc'] ."/". $_POST['ano_nasc'];
	$est_civil = $_POST['est_civil'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	
	
	
	$sql_user = "INSERT INTO tb_customer (cpf , nome , sexo , apelido , telefone , dataNasc , estadoCivil , email)
	VALUES(".$cpf.",'".$nome."', '".$sexo."' ,'".$apelido."',".$tel.",'".$dt_nasc."', '".$est_civil."' ,'".$email."')";
	
	$sql_login = "INSERT INTO tb_login (cpf , email , senha) 
					VALUES(".$cpf." , '".$email."' , '".$senha."')";

	mysqli_query($conn, $sql_user);
	mysqli_query($conn, $sql_login);
	
	header("Location: index.php");
	
?>