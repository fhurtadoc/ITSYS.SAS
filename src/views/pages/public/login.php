<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("../../includes/headers.php") ?>   
   
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <div id="marco">
        <div id="continer">
            <div id=form >
                <form action=""> 
                    <label for="">email</label>               
                    <input type="text" id="email">
                    <label for="" >password</label>
                    <input type="text" id="pass">
                    <input type="button" value="enviar" onclick="login()">
                    
                    
                </form>
            </div>        
        </div>            
    </div>
</body>
<script src="../../js/pages/login.js"></script>
</html>