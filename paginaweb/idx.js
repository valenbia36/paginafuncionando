

function sl()
{
document.getElementById("demo1").innerHTML=document.getElementById("range1").value;
}

function buscar(){   
  bar=document.getElementById("barrios").value;
  tip=document.getElementById("tipos").value;
  hab=document.getElementById("habitaciones").value;
  rang=document.getElementById("range1").value;

  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML =this.responseText;
    }
  };
  var url= "busqueda.php?barrio="+bar+"&tipo="+tip+"&habitaciones="+hab+"&rango="+rang;
  xhttp.open("GET", url, true);
  xhttp.send();
}


