function verificaPlaca(){
	var placa = document.getElementById("placa").value;
	if(placa.match(/[A-Z]{3}-[0-9]{4}/u).toUpperCase() == null || placa.length != 8){
		document.getElementById("erro").innerHTML = "Placa inválida";
		return false;
	}else{
		return true;
	}
}