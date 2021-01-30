<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery/jquery-3.5.1.min.js"></script>

</head>

<body>
    <input type="text" name="numero" id="numero">
    <input type="file" name="imagen" id="imagen">
    <button id="insertar">Continuar</button>
</body>

</html>
<script>
    $("#insertar").click(function() {
        var formData = new FormData();
        var archivo = $("#imagen")[0].files[0];
        var numero = $("#numero").val();
        formData.append('file', archivo);
        formData.append('numero', numero);
        $.ajax({
            type: 'post',
            url: "p.php",
            data: formData,
            contentType: false,
            processData: false,

        }).done(function(response) {
            console.log(response);
        })

    })
</script>