function modificarUsuario(usuario) {
    $("#nuevo").hide();
    $("#contenido").show();
    $.ajax({
        type:'POST',
        data:{ accion:"modificar",
                nombre:$("#nombre"+usuario).val(),
                passwd:$("#passwd"+usuario).val(),
        },
        url: "controller/usuarios_controller.php",
        success: function(response){
            console.log(response);
            $("#contenido").html(response);
        },
        error: function(error){
            console.log(error);
        },
    });
}

function modificarProducto(id) {
    $("#nuevo").hide();
    $("#contenido").show();
    $.ajax({
        type:'POST',
        data:{ accion:"modificar",
                id: id,
                nombre:$("#nombre"+id).val(),
                precio:$("#precio"+id).val(),
                stock:$("#stock"+id).val(),
        },
        url: "controller/productos_controller.php",
        success: function(response){
            console.log(response);
            $("#contenido").html(response);
        },
        error: function(error){
            console.log(error);
        },
    });
}

function cancelar() {
    $("#nuevo").show();
    $("#contenido").hide();
}