<?php
function limite($i,$j,$N){//funcion para validar los limites de la matris
  return ($i>=0&&$j>=0&&$i<$N&&$j<$N);
}

if(isset($_POST["valorN"])&&isset($_POST["nameJ"])){//valido si exite n y nombre
  if(is_numeric($_POST["valorN"])){//valido si es numero
   if($_POST["valorN"]>=8&&$_POST["valorN"]<=20){//el intervalo
    $_SESSION["estado"]=3;
    $_SESSION["valorN"]=$_POST["valorN"];
    $_SESSION["nameJ"]=$_POST["nameJ"];
    $N=$_SESSION["valorN"];
    if(isset($_SESSION["game"])){//si se gano elimino la varible para evitar reecribir al ganador
      unset($_SESSION["game"]);
    }
    $ganadores=[];//lista de ganadores en cada tablero 
    if(file_exists ("ganadores.txt")){//existe la lista de ganadores ?
      
      // Abriendo el archivo
      $archivo = fopen("ganadores.txt", "r");
      // Recorremos todas las lineas del archivo
      while(!feof($archivo)){
          // Leyendo una linea
          $traer = fgets($archivo);
          if(strlen ($traer)>0){
            $Gana;
            $Gana=explode("-",$traer);
            $ganadores[$Gana[2]]=$traer;
          }
      }
       
      // Cerrando el archivo
      fclose($archivo);
      
    }else{
      /*si no exite la creamos */
      $fh = fopen("ganadores.txt", 'a+') or die("Se produjo un error al crear el archivo");
      fclose($fh);
    }
    $_SESSION["ganadores"]=$ganadores;
    $minas=intval(($N*$N)*0.35); //calculo las minas 
    /*creo 
     matris=matris que guarda los valores de las minas y adyacencias
     jugado=tipo de jugada en la casilla 
    */
    $matris=[];
    $jugado=[];
     /*cargo las matrices */
      for($i=0;$i<$N;$i++){
        for($j=0;$j<$N;$j++){
            $matris[$i][$j]=0;
            $jugado[$i][$j]=0;
        }
      }
      $cont=0;
      /*creo las minas*/
      while($minas>$cont){
        $x=rand ( 0 , $N-1 );
        $y=rand ( 0 , $N-1 );
        if($matris[$x][$y]!=-1){
           $matris[$x][$y]=-1; $cont++;
        }
      }
    /*calculo la adyacencias las minas*/
      for($i=0;$i<$N;$i++){
        for($j=0;$j<$N;$j++){
            $giro=0;
            $minSer=0;
            if($matris[$i][$j]!=-1){
                while($giro<8){
                    $v=0;$v1=0;
                    switch($giro+1){
                        case 1: $v=1; $v1=1;  break;
                        case 2: $v=1; $v1=0;  break;
                        case 3: $v=1; $v1=-1; break;
                        case 4: $v=0; $v1=-1; break;
                        case 5: $v=-1;$v1=-1; break;
                        case 6: $v=-1;$v1=0;  break;
                        case 7: $v=-1;$v1=1;  break;
                        case 8: $v=0; $v1=1;  break;
                    }
                    $ii=$i+1*$v;
                    $jj=$j+1*$v1;
                    if(limite($ii,$jj,$N)){            
                       if($matris[$ii][$jj]===-1){
                        $minSer++;
                       }
                    }
                    $giro++;
                }
                $matris[$i][$j]=$minSer;
            }
        }
      }
      /*guardo los datos */
      $_SESSION["matris"]=$matris;
      $_SESSION["jugado"]=$jugado;
      $_SESSION["minas"]=$minas;
      $_SESSION["minasT"]=0;
      $_POST["estado"]=3;
      header("Location:index.php");            
    }else{
        /*estado 1 es que no se respeto el intervalo o se enviaron letras */
       $_SESSION["estado"]=1;
       header("location:index.php");  
    }
  }else{
    $_SESSION["estado"]=1; 
    header("location:index.php"); 
  } 
}else{
  $_SESSION["estado"]=1; 
  header("location:index.php"); 
}

?>