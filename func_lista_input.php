<?php
	

	$query = "SELECT * FROM tb_supermercado";
	$res = mysqli_query($conn, $query);
	$count = 0;
	
	while($row = mysqli_fetch_array($res)){
		$sm_bd[] = $row['bm_bd']; 
	
		$query = "SELECT DISTINCT nome_produto FROM ".$sm_bd[$count].".tb_produto";
		$res2 = mysqli_query($conn, $query);
		
		while($row2 = mysqli_fetch_array($res2)){
			$nome_produto[] = $row2['nome_produto'];
		}
	}
	
	$nome_produto = array_unique($nome_produto);
	
	
?>