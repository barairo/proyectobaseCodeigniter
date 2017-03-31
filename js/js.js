$(document).ready(function () {

    var total = 0;
        $(".cantidad").each(function () {
            total = parseFloat(total) + parseFloat($(this).text());
        });
        $('#total').text("$ " + total);
    
    $("#btn1").click(function () {
        var descripcion = $('#descripcion').val();
        var cantidad = $('#cantidad').val();
        var gasto = $('#gasto').val();
        var idcategoria = $('#categoria').text();

        $("#descripcion").replaceWith("<p>" + descripcion + "</p>");
        $("#cantidad").replaceWith("<p>" + cantidad + "</p>");
        $("#gasto").replaceWith("<p class=\"cantidad\">" + gasto + "</p>");
        $('#descripcion').removeAttr('id');
        $('#cantidad').removeAttr('id');
        $('#gasto').removeAttr('id');
        $("#lastRow").before("<tr><td><textarea id=\"descripcion\" cols=\"50\" rows=\"1\"></textarea></td><td><textarea id=\"cantidad\" cols=\"5\" rows=\"1\"></textarea></td><td><textarea id=\"gasto\" cols=\"50\" rows=\"1\" onkeypress=\"validate(event)\"></textarea></td></tr>");
        var total = 0;
        $(".cantidad").each(function () {
            total = parseFloat(total) + parseFloat($(this).text());
        });
        $('#total').text("$ " + total);


        $.ajax({
            type: "POST",
            url: BASE_URL + "Agregar/data_ajax",
            dataType: 'json',
            data: {
                //id: 
               
                descripcion: descripcion,
                gasto: gasto,
                idCategoria: idcategoria,
                cantidad: cantidad
            },
            success: function (result) {
                $("#contenedor").html(result);
            }});

    });

    $('.borrar').click(function (event){
        var idRegistro = $(event.target).attr('id');
        alert(idRegistro);
        $.ajax({
            type: "POST",
            url: BASE_URL + "Agregar/borrarRegistro",
            dataType: 'text',
            data: {
                //id: 
                id: idRegistro
            },
            success: function (result) {
                window.location = window.location
            }});
      
    });
    
    

});
