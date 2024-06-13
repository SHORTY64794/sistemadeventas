<?php
https://www.youtube.com/watch?v=KM55caw6YDo&list=PLgLkBkgzqH2DkQwLNLgj9EjGAVW7kJQp8&index=2

/* declaramos 4 vbles globales xa todo nuestro sistema, q vamos a utilizar xa nuestra conexión con la base de datos:
El nombre del servidor es nuestro servidor local, en est caso. En la vida real, será el del hosting q contratemos.
El usuario viene de la base de datos.
*/
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemadeventas');

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;

try {
    //Establece la conexión con la base de datos
    $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexión con la base de datos ha sido exitosa...";

}catch(PDOException $e){
    //print_r($e); // está impresión sirve xa pruebas del programador y al final debe quedar en modo comentario. 
    echo "Error de conexión con la base de datos...";
}
// VARIABLES UTILIZADAS EN LAS DIFERENTES VISTAS
// Para redireccionar a la vista ppal desde las demas vistas del sistema.
$URL="http://localhost/www.sistemadeventas.com";

// Para capturar la fecha y hora del momento actual
date_default_timezone_set('America/Bogota');
$fechaHora=date("Y-m-d H:i:s");


