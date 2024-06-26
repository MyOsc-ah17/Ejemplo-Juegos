<?php
if($_SESSION["game"]==11){
    /*cargo los datos del jugador */
    $name=$_SESSION["nameJ"];
    $time=$_SESSION["time"];
    $n=$_SESSION["valorN"];
    $ganadores=$_SESSION["ganadores"];
    /*exite algun ganador en N matris? */
    if(array_key_exists($n,$ganadores)){
        /*si existe compruebo si hay un mejor tiempo */
        $Gana;
        $Gana=explode("-",$ganadores[$n]);
        if($Gana[1]>$time){
            $ganadores[$n]=$name."-".$time."-".$n."-\r\n";//reecribo al mejor ganador con el formato
        }
    }else{
        $ganadores[$n]=$name."-".$time."-".$n."-\r\n";//si no hay mejor tiempo, es el mejor con lo cual lo escribir con formato
    }

    $fh;
    if(file_exists ("ganadores.txt")){//validar si exite el archivo
        $fh = fopen("ganadores.txt", 'r+') or die("Se produjo un error al crear el archivo");
    }else{
        $fh = fopen("ganadores.txt", 'a+') or die("Se produjo un error al crear el archivo");
    }
    foreach ($ganadores as $g) {//cargo la lista de ganadores 
        fwrite($fh, $g) or die("No se pudo escribir en el archivo");
    }
    fclose($fh);//cierro
    
    $_SESSION["game"]=-1;
}


?>