<?php

// definimos el localhost
define("_DOMAIN", "http://$_SERVER[HTTP_HOST]/");
define("RAIZ", $_SERVER['DOCUMENT_ROOT']."/");
define('CONTROLLER_PATH', RAIZ.'src/controller/');
define('MODEL_PATH', RAIZ.'src/model/');
define('VIEWS', RAIZ.'src/views/');
define('VIEWSHTML', _DOMAIN.'src/views/');



