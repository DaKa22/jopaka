$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//user
function deleteCliente(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"cliente/"+id,
            type:"DELETE",
            data:{id:id},
            success:function (data){



            },complete: function(data) {
                window.location.reload();
            }
        });
    }else{
        alert('Cancelacion Exitosa')
    }
}

function updateCliente(id){
    $.ajax({
        url:"cliente/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            // console.log(data)
            $("#modal_crearCliente").modal("show")
            $("#identificacion").val(data.message.identificacion)
            $("#nombres").val(data.message.nombres)
            $('#apellidos').val(data.message.apellidos)
            $('#telefono').val(data.message.telefono)
            $('#direccion').val(data.message.direccion)
            $("#id").val(data.message.id)
            $("#titulo").text("Editar Cliente")
        }
    });
}





