
$('#btnAgregar').click(function(e) {
    e.preventDefault();
var tratamiento=$('#inputTratamiento').val();
var cantidad=$("#inputCant").val();
var unidad=$("#inputUnidad").val();
var cada=$("#inputCada").val();
var tiempo=$("#inputTiempo").val();
var contador=$("#inputContador").val();

var c = parseInt(contador);
var cont = c + 1;
$("#inputContador").val(parseInt(cont));
 $("#lista_agregar").append('<tr><input type="text" value="'+cont+'" hidden>'+
 '<td>'+tratamiento+'</td><td>'+cantidad+'</td>'+
 '<td>'+unidad+'</td><td>'+cada+'</td><td>'+tiempo+
 '<input type="hidden" id="tratamiento'+contador+'" name="tratamiento'+contador+'" value="'+contador+'"></input>' +
 '<input type="hidden" id="cantidad'+contador+'" name="cantidad'+contador+'" value="'+contador+'"></input>'+
 '<input type="hidden" id="unidad'+contador+'" name="unidad'+contador+'" value="'+contador+'"></input>' +
 '<input type="hidden" id="cada'+contador+'" name="cada'+contador+'" value="'+contador+'"></input>' +
 '<input type="hidden" id="tiempo'+contador+'" name="tiempo'+contador+'" value="'+contador+'"></input>' +
 '</td></tr>');
});

$('#btnAgregarConsulta').click(function(e) {
    e.preventDefault();
var material=$('#inputMaterial').val();
var cantidad=$("#inputCant").val();
var contador=$("#inputContador").val();

var c = parseInt(contador);
var cont = c + 1;
$("#inputContador").val(parseInt(cont));
 $("#lista_agregar").append('<tr><input type="text" value="'+cont+'" hidden>'+
 '<td>'+material+'</td><td>'+cantidad+'</td>'+
 '<input type="hidden" id="material'+contador+'" name="material'+contador+'" value="'+contador+'"></input>' +
 '<input type="hidden" id="cantidad'+contador+'" name="cantidad'+contador+'" value="'+contador+'"></input>'+
  '</td></tr>');
});








function calcular_total()
{
    cantidad=$("#inputCantidad").val();
    valor_unitario=$("#inputValorUnitario").val();
    if(cantidad !="" && valor_unitario!="")
    {
        $("#inputValorTotal").val(cantidad*valor_unitario);
    }
    else
    {
        $("#inputValorTotal").val("");
    }
}

$('#btnGuardar').click(function(e) {
    e.preventDefault();
	datos=$('#frmDetalleMateriales').serialize();
	 	$.ajax({
			type:'POST',
			url:'controlador/ControladorDetalle.php',
            data:datos,
            success:function(data){
//alert(data);		
document.getElementById('lista_agregar').innerHTML=data;			
			}
		});
});