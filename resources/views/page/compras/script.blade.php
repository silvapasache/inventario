
<script type="text/javascript">

$(document).ready(function(){
    $("#agregar").click(function(){
        agregar();
    });

});

var impuesto=0.00;
var precio=0.00;
var subtotal=0.00;
var total_items=0.00;
var total_impuesto=0.00;
var total=0.00;
var i=0;
var contador=0;

$("#btnSave").hide();
   

function agregar(){
    var cantidad=$("#cantidad").val();
    precio=$("#precio").val();
    if(cantidad>0 && precio>0){
    var nombre=$("#producto option:selected").html();
    var id_producto=$("#producto").val();
    var subtotal_item=cantidad*precio;
        var fila='<tr id="item'+i+'" data-subtotal="'+subtotal_item+'" data-procod="'+id_producto+'" data-pronom="'+nombre+'">'+
            '<td><button type="button" class="btn btn-danger" onClick="eliminar('+i+')"><i class="fa fa-trash-o"></i></button></td>'+
            '<td><input id="prod_id[]" name="prod_id[]"  type="hidden" value="'+id_producto+'">'+nombre+'</td>'+
            '<td class="cantidad"><input id="prod_cantidad[]" name="prod_cantidad[]" value="'+cantidad+'"></td>'+
            '<td><input id="prod_precio[]" name="prod_precio[]"   value="'+precio+'"></td>'+
            '<td id="">S/.'+subtotal_item.toFixed(2)+'</td>'+
        '</tr>';
    total_items=total_items+subtotal_item;
    operar(total_items);
    $('#detalles  tbody').append(fila);
    i=i+1;
    contador=contador+1;
    showBoton();
    remover();
    limpiar();
    }
    else{        
            Swal.fire({
            title:'Error',
            text:'Complete los campos de cantidad y precio',
            icon:'error',
            confirmButtonText:'Cool'
            });
        }
}

function limpiar(){
    $("#cantidad").val("");
    $("#precio").val("");
}

function eliminar(index){
    var codigo_prod=$("#item"+index).data("procod");
    var titulo_prod=$("#item"+index).data("pronom");
    var fila='<option value="'+codigo_prod+'">'+titulo_prod+'</option>';
    var itemEliminado=$("#item"+index).data("subtotal");
    total_items=total_items-itemEliminado;
    $('#item'+index).remove();
    $("#producto").append(fila);
    operar(total_items);
    contador=contador-1;
    showBoton()
}
function operar(total){
    total_items=total;
    total_impuesto=total_items*18/100;
    total=total_items+total_impuesto;
    $('#total_items').html('S/.'+total_items.toFixed(2));
    $('#total_impuesto').html('S/.'+total_impuesto.toFixed(2));
    $('#total').html('S/.'+total.toFixed(2));
    $("#total_compra").val(total.toFixed(2));
    limpiar();
}
function remover(){
    $("#producto option:selected").remove();
}
function showBoton(){
    if(contador>0){
        $("#btnSave").show();
    }else{
        $("#btnSave").hide()
    }
}
</script>
