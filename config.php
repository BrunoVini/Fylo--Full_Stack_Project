<?php

    session_start();
    date_default_timezone_set("America/Sao_Paulo");

    $autoload = function($class){
        if($class == 'Email') {
            include("classes/phpmailer/PHPMailerAutoload.php");
        }
        include("classes/$class.php");
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://localhost/');
    define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');
    define('BASE_DIR_PAINEL',__DIR__.'/painel');


    //Conectar com banco de dados!
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
    define('DATABASE','crud_php');
    
    function menuSelected($link) {
        $url = explode('/',@$_GET['url'])[0];
        if($url == $link) {
           echo 'class="menu-active"'; 
        }
    }

    function verifyPermission($office) {
        if($office != null) {
            if ($office === 'Administrador' || $office === 'Sub-administrador') {
                return true;
            } else {
                return false;
            }
        }
    }

?>
