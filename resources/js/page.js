page = [];
term = new Terminal();
sTerm = new Terminal();
page.server = "http://molly/moiras/server-terminal.php";
//- - - - - Pop
page.loaded = function(){
	//------------ configuracao
	term = new Terminal();
	sTerm = new Terminal();
	
	term.server = page.server;
	sTerm.server = page.server;
	
	sTerm.on();
	term.on();
	//------------------
	user.get();
}
//---- config
page.config = function(){
    page.popContent(page.tConfig);
    page.popUp();
}
//---- bakup
page.backupOpen = function(){
    page.popContent(page.tFormBeckup);
    
}
page.beckup = function(){
    window.open('server-terminal.php?comander=dado.dump()', '_blank');
}
//- - - - - PopUp
page.checkPop = false;
page.popUp = function(){
	//console.log("pop");
	this.checkPop = !this.checkPop;
	if(this.checkPop){
		document.getElementById("popUp").className = "popUP-true";
	}
	else{
		document.getElementById("popUp").className = "popUP-false";
	}

}
page.popContent = function(content){
	document.getElementById("popUp-content").innerHTML = content;
}
page.drop = function(id){
	com = "dado.drop(" + id + ")";
	console.log(com);
	term.com(com,page.rDrop);
};
page.rDrop = function(msg){
	console.log(msg);
	page.search();
}
page.replace = function(base,dados){
	var dadosK=Object.keys(dados);
	for (var i = 0; i < dadosK.length; i++) {
		base = base.replace(new RegExp("{" + dadosK[i] + "}", 'g'),dados[dadosK[i]]);
	}
	return base;
}
//------------
page.tConfig = document.getElementById("tConfig").innerHTML;
page.tFormBeckup = document.getElementById("formBeckup").innerHTML;

page.tFirstDado = "<dado onclick='page.novaNota()'><id>Novo Dado</id><valor><img src='resources/img/new.svg'></valor></dado>";
page.notaform = "<div id=\"fNotaCabecario\"></div><form><label>Dado</label><textarea id=\"fNotaDado\"></textarea><label>Tags</label><textarea id=\"fNotaTag\"></textarea><input id=\"fNotaAplic\" onclick=\"\" value=\"Salvar\" type=\"button\"><input id=\"fNotaAplic\" onclick=\"page.popUp()\" value=\"Cancelar\" type=\"button\"></form>";
page.loginform = "<form><label>Dado</label><textarea id=\"novaNotaDado\"></textarea><label>Tags</label><textarea id=\"novaNotaTag\"></textarea><input onclick=\"page.novaNotaAplic()\" value=\"Salvar\" type=\"button\"></form>";
console.log("page.js");