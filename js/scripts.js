function modal_hide(id_modal){
		modal = id_modal;
		$(modal).modal('toggle');
	}
	
function funcaomostrar(id_div){

	document.getElementById('aside_dados_pessoais').style.display = "none";
	document.getElementById('aside_enderecos').style.display = "none";
	document.getElementById('aside_trocar_senha').style.display = "none";
	document.getElementById('aside_minhas_compras').style.display = "none";
	document.getElementById('aside_minhas_listas').style.display = "none";
	
		document.getElementById(id_div).style.display = "block";
	}
	

	
function mostra_lista(num){
	
	var id = "lista_" + num;
	if(document.getElementById(id).style.display == "block"){
		document.getElementById(id).style.display = "none";
	}else{
		document.getElementById(id).style.display = "block";
	}
	
	}

	