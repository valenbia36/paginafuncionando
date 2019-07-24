function contrasenia(contenido){
	pass=contenido.value;
	validacontrasenia(document.getElementById("password2"));

}
function validacontrasenia(contenido){
	if (pass==contenido.value)
		{
		vpas=true;
		document.getElementById("contraseniainvalida").style.display="none";
		}
	else
		{
		vpas=false;
		document.getElementById("contraseniainvalida").style.display="block";
		}
		validacionTotal()
}

function validatel(contenido){
	var reg= new RegExp ("^([0-9]){8,15}$");
	if(reg.test(contenido.value))
		{
		vtel=true;
		document.getElementById("telinvalido").style.display="none";
		}
	else
		{
		vtel=false;
		document.getElementById("telinvalido").style.display="block";
		}
		validacionTotal()
	    
}

function validaMail(contenido){
	var reg= new RegExp ("^\\w+([\\.-]?\\w+)*@\\w+([\\.-]\\w+)*(\\.\\w{2,3})+$");
	if(reg.test(contenido.value))
		{
			vmail=true;
			document.getElementById("mailinvalido").style.display="none";
		}
	else
		{
			vmail=false;
			document.getElementById("mailinvalido").style.display="block";
		}
		validacionTotal()
}
function validanombre(contenido){
	if(contenido.value!="")
		{
		vname=true;
		}
	else
		{
		vname=false;
		}
		validacionTotal()
	    
}
function validaapellido(contenido){
	if(contenido.value!="")
		{
		vape=true;
		}
	else
		{
		vape=false;
		}
		validacionTotal()
	    
}

function validacionTotal(){
	if (vmail && vpas && vtel   && vname && vape)
		{
		document.getElementById("registrarse").disabled = false;
		}
	else
		{
		document.getElementById("registrarse").disabled = true;
		}

}
