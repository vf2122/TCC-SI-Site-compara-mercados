<?php
session_start();
include('func_conectar_bd.php');
	
$login = $_POST['login'];
$senha = $_POST['password'];

$query = "SELECT * FROM tb_cliente WHERE email = '" . $login ."'";

$result = mysqli_query($conn, $query);	

if($result){
	echo "encontrou";
	while($consulta = mysqli_fetch_array($result)){
		
		$_SESSION['cpf'] = $consulta['cpf'];
		$_SESSION['nome'] = $consulta['nome'];
		$_SESSION['id'] = $consulta['id_cliente'];
		$_SESSION['sexo'] = $consulta['sexo'];
		$_SESSION['apelido'] = $consulta['apelido'];
		$_SESSION['telefone'] = $consulta['telefone'];
		$_SESSION['dataNasc'] = $consulta['dataNasc'];
		$_SESSION['estado_civil'] = $consulta['estado_civil'];
		$_SESSION['email'] = $consulta['email'];
		$_SESSION['senha'] = $consulta['senha'];
		
		if($_SESSION['senha'] == $senha){
			$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/pag_area_cliente.php";
			header($pag_voltar);
		}else{
			echo '<br>senha INcorreta';
			session_destroy();
			$pag_voltar = "Location: http://localhost/TCC%20-%20SI%20(site%20compara%20mercados)/index.php";
			header($pag_voltar);
		}
	}
}else{
	echo "nao encontrou";
}

?>