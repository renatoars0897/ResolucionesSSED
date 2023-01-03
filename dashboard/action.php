<?php
session_start();

include('config.php');

date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');

$metodoAction  = (int) filter_var($_REQUEST['metodo'], FILTER_SANITIZE_NUMBER_INT);

//$metodoAction ==1, es crear un registro nuevo
if($metodoAction == 1){

    $fechaRegistro  = date('d-m-Y H:i:s A', time()); 
    $namefull       = filter_var($_POST['nexp'], FILTER_SANITIZE_STRING);
    $origen         = filter_var($_POST['origen'], FILTER_SANITIZE_STRING);
    $cedula         = filter_var($_POST['mat'], FILTER_SANITIZE_STRING);
    $sexo           = filter_var($_POST['tactp'], FILTER_SANITIZE_STRING);
    $section        = filter_var($_POST['req'], FILTER_SANITIZE_STRING);
    $jpon           = filter_var($_POST['jpon'], FILTER_SANITIZE_STRING);
    $votodiscordia  = filter_var($_POST['voto'], FILTER_SANITIZE_STRING);
    $resolucion     = filter_var($_POST['res'], FILTER_SANITIZE_STRING);
    $fechaauto      = filter_var($_POST['datepicker'], FILTER_SANITIZE_STRING);
    $sentidofallo   = filter_var($_POST['sentido'], FILTER_SANITIZE_STRING);
    $tematratado    = filter_var($_POST['tema'], FILTER_SANITIZE_STRING);
    $autor          = filter_var($_SESSION['s_usuario'], FILTER_SANITIZE_STRING);

    //Informacion de la foto
    $filename       = $_FILES["doc"]["name"]; //nombre de la foto
    $tipo_foto      = $_FILES['doc']['type']; //tipo de archivo
    $sourceFoto     = $_FILES["doc"]["tmp_name"]; //url temporal de la foto
    $tamano_foto    = $_FILES['doc']['size']; //tamaño del archivo (foto)


if ((strpos($tipo_foto, "pdf") || strpos($tipo_foto, "PDF"))){

    //Verificando si existe el directorio, de lo contrario lo creo
    $dirLocal       = "resoluciones";
    if (!file_exists($dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }

    $miDir 		      = opendir($dirLocal); //Habro mi  directorio
    $urlFotoAlumno    = $dirLocal.'/'.$filename; //Ruta donde se almacena la factura.

    //Muevo la foto a mi directorio.
    if(move_uploaded_file($sourceFoto, $urlFotoAlumno)){
        $SqlInsertAlumno = ("INSERT INTO table_resoluciones(
            nexp,
            origen,
            mat,
            tactp,
            req,
            jpon,
            voto,
            res,
            faut,
            sentido,
            ttrata,
            doc,
            fechaRegistro,
            autor
        )
        VALUES(
            '".$namefull."',
            '".$origen."',
            '".$cedula."',
            '".$sexo."',
            '".$section."',
            '".$jpon."',
            '".$votodiscordia."',
            '".$resolucion."',
            '".$fechaauto."',
            '".$sentidofallo."',
            '".$tematratado."',
            '".$filename."',
            '".$fechaRegistro."',
            '".$autor."'
        )");
        $resulInsert = mysqli_query($con, $SqlInsertAlumno);
        ///print_r( $SqlInsertAlumno);

    }
    closedir($miDir);
    
    header("Location:index.php?a=1");
    
  }else{
    header("Location:index.php?errorimg=1");
  
}
}
//cambiar contraseña
if($metodoAction == 2){
    

    $nueva= filter_var($_POST['nueva'], FILTER_SANITIZE_STRING);
    $usuario= filter_var($_SESSION['s_usuario'], FILTER_SANITIZE_STRING);
    

    $UpdateAlumno    = ("UPDATE usuarios
        SET password = md5('$nueva')        
        WHERE usuario = '$usuario' ");
    $resultadoUpdate = mysqli_query($con, $UpdateAlumno);
   
 }header("Location:index.php?a=1");

?>