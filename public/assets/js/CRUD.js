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
function crearCliente(){
    $("#identificacion").val('')
    $('#nombres').val('')
    $('#apellidos').val('')
    $('#telefono').val('')
    $('#direccion').val('')
    $("#id").val('')
    $("#titulo").text("Agregar Cliente")
    $("#modal_crearCliente").modal("show")

}

function deleteProveedor(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"proveedor/"+id,
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

function updateProveedor(id){
    $.ajax({
        url:"proveedor/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            console.log(data)
            $("#modal_crearProveedor").modal("show")
            $("#nombre").val(data.message.nombre)
            $('#nit').val(data.message.nit)
            $('#telefono').val(data.message.telefono)
            $('#direccion').val(data.message.direccion)
            $("#id").val(data.message.id)
            $("#titulo").text("Editar Cliente")
        }
    });
}

function crearProveedor(){
    $("#nombre").val('')
    $('#nit').val('')
    $('#telefono').val('')
    $('#direccion').val('')
    $("#id").val('')
    $("#titulo").text("Agregar Proveedor")
    $("#modal_crearProveedor").modal("show")

}

function deleteProducto(id){
    if(confirm('¿Estas seguro de eliminar?')){
        $.ajax({
            url:"producto/"+id,
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

function updateProducto(id){
    $.ajax({
        url:"producto/"+id,
        type:"GET",
        data:{id:id},
        success:function (data){
            console.log(data)
            $("#modal_crearProducto").modal("show")
            $("#foto").val(data.message.foto)
            $('#descripcion').val(data.message.descripcion)
            $('#proveedores_id').val(data.message.proveedores_id)
            $('#precio_costo').val(data.message.precio_costo)
            $('#precio_venta').val(data.message.precio_venta)
            $("#id").val(data.message.id)
            $("#titulo").text("Editar Producto")
        }
    });
}

function crearProducto(){
    $("#foto").val('')
    $('#descripcion').val('')
    $('#proveedores_id').val('')
    $('#precio_costo').val('')
    $('#precio_venta').val('')
    $("#id").val('')
    $("#titulo").text("Agregar Producto")
    $("#modal_crearProducto").modal("show")

}
