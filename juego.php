<?php
 function limite($i,$j,$N){//juncion para chequear los limites de la matris
    return ($i>=0&&$j>=0&&$i<$N&&$j<$N);
 }
 function revelar(&$jugado,&$matris,$N,$x,$y){//funcion recursiva que revela espacios en blanco
    $giro=0;           
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
    $ii=$x+1*$v;
    $jj=$y+1*$v1;
    if(limite($ii,$jj,$N)){
        if($jugado[$ii][$jj]==0&&$matris[$ii][$jj]==0){
            $jugado[$ii][$jj]=1;
            revelar($jugado,$matris,$N,$ii,$jj);
        }else{
            $jugado[$ii][$jj]=1;
        }
                 
    }
    $giro++;
    }
 }
   if($_SESSION["estado"]==3){//estado=3 el juego ya se cargo con exito o esta jugando
    //si del index se manda algo por el input estado diferente a 3 puede ser un reinicio o una nueva partida
        if(isset($_POST["estado"])){
          if($_POST["estado"]==4){//reinicio
            $jugado=[];
            for($i=0;$i<$_SESSION["valorN"];$i++){
                for($j=0;$j<$_SESSION["valorN"];$j++){
                    $jugado[$i][$j]=0;
                }
            }
            $_SESSION["jugado"]=$jugado;
            $_SESSION["minasT"]=0;
            if(isset($_SESSION["game"])){
                if($_SESSION["game"]==-1){
                    $_SESSION["estado"]=2;
                    header("Location:index.php");
                }
            }else{
                $_SESSION["estado"]=3;
                header("Location:index.php");
            }

          }else if($_POST["estado"]==5){//nueva partida
            $_SESSION["estado"]=1;  
            header("Location:index.php");          
          }   
        }
        /*cargo valores*/
        $N=$_SESSION["valorN"];
        $matris=$_SESSION["matris"];
        $jugado=$_SESSION["jugado"];
        $minas=$_SESSION["minas"];
        $minasT=$_SESSION["minasT"];
        $ganadores=$_SESSION["ganadores"];
        $tiempoT=0;
        if(isset($_POST["time"])){//el tiempo que hay al momento de hacer la peticion
           if(is_numeric($_POST["time"])){
            $tiempoT=$_POST["time"];
            $_SESSION["time"]=$_POST["time"];
           }
        }
        $marca=0;
        if(isset($_POST["marca"])){//valido que tipo de click se hizo si uno para revelar o un para marcar posible mina
            $marca=$_POST["marca"];
        }
        $game=0;
        if(isset($_SESSION["game"])){//valido si ya se gano o no
            $game=11;
        }else{
            $game=1;
        }
        /*
        reviso la casilla de matris y jugadas junto a marca y estado de juego 
        para prosesar la marca , la victoria , la derrota ,el revelado del mapa 
        y la cantidad minas marcadas
         */
        if(isset($_POST["fila"])&&isset($_POST["columna"])&&$game!=11){
            if($matris[$_POST["fila"]][$_POST["columna"]]==-1&&$marca==-1){//derrota al revelar una mina
                $game=-1;$minasT=0;
            }
            if($game!=-1){
                if($marca==-1){//jugada para revelar
                    if($jugado[$_POST["fila"]][$_POST["columna"]]==2){
                        $jugado[$_POST["fila"]][$_POST["columna"]]=1;$minasT--;
                    }else{
                        /*valdiar si es espacio en blanco*/ 
                        if($matris[$_POST["fila"]][$_POST["columna"]]==0){
                            $jugado[$_POST["fila"]][$_POST["columna"]]=1;
                            /*muestra me si hay mas espacios en blanco */
                            revelar($jugado,$matris,$N,$_POST["fila"],$_POST["columna"]);
                        }else{
                            $jugado[$_POST["fila"]][$_POST["columna"]]=1;
                        }
                    }
                }else if($marca==2){//jugada para marcar posible mina
                    if($jugado[$_POST["fila"]][$_POST["columna"]]!=2){
                        $jugado[$_POST["fila"]][$_POST["columna"]]=2;$minasT++;
                    }else{
                        $jugado[$_POST["fila"]][$_POST["columna"]]=0;$minasT--;
                    }
                }
            }
            /*Gano? */
            $contM=0;
            for($i=0;$i<$N;$i++){
                for($j=0;$j<$N;$j++){
                    //valido si la cantida de marcas son la misma en cada casilla 
                    //de las matris jugado y matris
                    if($jugado[$i][$j]==2&&$matris[$i][$j]==-1){
                        $contM++;
                    }
                }
            }
            /* si la cantidad de minas y marcas son iguales gano*/
            if($contM==$minas&&$minasT==$minas){
                $game=10;
            }
        }

        echo "<div class='tablero'>";
        $res=$minas-$minasT;
        if(array_key_exists($N,$ganadores)){//valido si exite un ganado con anterior a ese tablero N si exite lo muestro
            $Gana=explode("-",$ganadores[$N]);
            echo "<div class='posDatos'><div class='minas'>Recor:".$Gana[0]."</div><div class='time1'>TiempoR:".$Gana[1]."</div></div>";
        }
        if($game==1){//valido si a un sigue en juego para seguir aumentando el tiempo
            echo "<div class='posDatos'><div class='minas'>Minas:$res</div><div class='time'>Tiempo:".($tiempoT+1)."</div></div>";
        }else{
            /*si gano o perdio se cambia la clase time a time1 para que el setinterval no modifique los datos */
            echo "<div class='posDatos'><div class='minas'>Minas:$res</div><div class='time1'>Tiempo:".($tiempoT)."</div></div>";
        }
        if($game==10){//depediendo del valor muestro mensaje de victoria o derrota
            echo "<h2 class='title'>Gano   :D </h2>";
        }else if($game==-1){
            echo "<h2 class='title'>Perdio :c </h2>";
        }else if($game==1){
            echo "<h2 class='title'>Juego </h2>";
        }
        for($i=0;$i<$N;$i++){
            for($j=0;$j<$N;$j++){
                /*validaciones para mostrar los diferentes estados que puede tener un boton */
               if($game==1&&($jugado[$i][$j]==0||$jugado[$i][$j]==2)){//si esta marcado o esta sin revelar
                   if($jugado[$i][$j]==0){
                    echo "<input class='pos' type='button' onmousedown='jugar(".$i.",".$j.")' value='' >";//sin revelar
                   }else{
                    echo "<input class='pos' type='button' onmousedown='jugar(".$i.",".$j.")' value='#' >";//marcado
                   }
               }else{
                   if($matris[$i][$j]<0){
                       if($game==10){
                        echo "<input class='pos bom1' type='button'  value='#' >";//gano mina marcado
                       }else{
                        echo "<input class='pos bom' type='button'  value='".$matris[$i][$j]."' >";//mina revelada al perder
                       }
                   }else{
                      if($jugado[$i][$j]==1){
                        if($matris[$i][$j]==0){
                            echo "<input class='pos color1' type='button'  value='' >";//espacio en blanco
                        }else if($matris[$i][$j]==1){
                            echo "<input class='pos color1' type='button'  value='".$matris[$i][$j]."' >";//adyacencia en azul=1
                        }else if($matris[$i][$j]==2){
                            echo "<input class='pos color2' type='button'  value='".$matris[$i][$j]."' >";//adyacencia en verde=2
                        }else if($matris[$i][$j]>2){
                            echo "<input class='pos color3' type='button'  value='".$matris[$i][$j]."' >";//adyacencia en rojo>2
                        }
                      }else{
                        echo "<input class='pos' type='button'  value='' >";//sin revelar y sin jugar
                      }
                   }
               }
            }
            echo"<br/>";
        }
        /* muestro boton de reiniciar y nuevo juego*/
        echo "<div class='posDatos'><input class='reiniciar' name='reiniciar' type='button' value='Reiniciar juego' onclick='njuego(0)'  ><input class='reiniciar' name='nuevoJuevo' type='button' value='nuevoJuevo' onclick='njuego(1)'  ></div>";
        echo "</div>";
        /*guardo datos de la partida */
        $_SESSION["jugado"]=$jugado;
        $_SESSION["minasT"]=$minasT;
        if($game==10){//si gano activo el registro
            $_SESSION["game"]=11;
            include("registro.php");
        }
        
    }
     
?>