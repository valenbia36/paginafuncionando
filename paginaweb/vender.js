function showimage(contenido)
	{
	vimg=true;
	var input = document.getElementById("upd1");
	var fReader = new FileReader();
	fReader.readAsDataURL(input.files[0]);
	fReader.onloadend = function(event)
		{
    	var img = document.getElementById("img1");
    	img.src = event.target.result;
    
		}
	validacionVender()
	}



function domi(contenido){
	if(contenido.value!="")
		{
		vdom=true;
		}
	else
		{
		vdom=false;
		}
		validacionVender()
}
function descripcion(contenido){
	if(contenido.value!="")
		{
		vdesc=true;
		}
	else
		{
		vdesc=false;
		}
		validacionVender()
}
function pre(contenido){
	var reg= new RegExp ("^([0-9]){1,7}$");

	if(reg.test(contenido.value))
		{
			if (contenido.value<=100000 )
				{
				vpre=true;
				}
			else
				{
				vpre=false;
				}
		}
	else
		{
		vpre=false;
		}
		validacionVender()
}
function validacionVender(){
	if (vpre && vdesc && vdom && vimg)
		{
		document.getElementById("publicar").disabled = false;
		}
	else
		{
		document.getElementById("publicar").disabled = true;
		}

}