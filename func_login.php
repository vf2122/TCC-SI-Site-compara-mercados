<?php
session_start();
include('func_conectar_bd.php');
	
$login = $_POST['login'];
$senha = $_POST['password'];

$query = "SELECT * FROM tb_login WHERE email = '" . $login ."'";

$result = mysqli_query($conn, $query);	

if($result){
	echo "encontrou";
	while($consulta = mysqli_fetch_array($result)){
		
		$consulta_senha = $consulta['senha']; 
		$consulta_cpf = $consulta['cpf'];
		
		if($consulta_senha == $senha){
			$_SESSION['cpf'] = $consulta_cpf;
			header('Location: index.php');
		}else{
			echo '<br>senha INcorreta';

		}
	}
	
}else{
	echo "nao encontrou";
}

?>