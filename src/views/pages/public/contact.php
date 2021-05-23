    <?php include_once("../../config/config.php"); ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <?php include_once '../includes/headerpublic.php'; ?>
    <script src="../../js/pages.js"></script>
    <link rel="stylesheet" href="../../css/stylePublic.css" type="text/css">
    </head>

    <body>
    <?php include_once '../includes/nav.php'; ?>
    <div id=continer-contacto>
        <div id=form>
        <form class="myForm" action="" method="post">
            <div class="message">
            <label for="msg">Message</label>
            <textarea id="msg"></textarea>
            </div>
            <div class="contact">
            <h3>DINOS LO QUE NECESITAS</h3>
            <label for="name">Nombre</label>
            <input type="text" id="name">

            <label for="townborn">Town you were born in</label>
            <input type="text" id="townborn">

            <label for="email">Email Address</label>
            <input type="email" id="email">

            <button type="submit">Submit</button>
            </div>
        </form>
        </div>
    </div>
    <?php include_once '../includes/footer.php'; ?>
    </body>

    </html>