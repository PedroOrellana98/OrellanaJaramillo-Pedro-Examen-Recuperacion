function insertarU() {
    let params = new URLSearchParams(location.search);
    var cedula = params.get('cedula');
    var placa = params.get('placa');
    var marca = params.get('marca');
    var modelo = params.get('modelo');
    var numero = params.get('marca');
    var fecha = params.get('fecha');
    var hora = params.get('hora');

    if (cedula != ""){ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue cedula");
                //document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../admin/controladores/agregar.php?cedula="+cedula+"&placa="+placa+"&marca="+marca+"&modelo="+modelo+"&numero="+numero+"&fecha="+fecha+"&hora="+hora,true);
        xmlhttp.send();

    }
    return false;
}
