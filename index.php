<?php
  /*inicio seccion */
  session_start();
  if(!isset($_SESSION["estado"])){
    $_SESSION["estado"]=1;
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Minas</title>
</head>
<script type="text/javascript">
/*evitar que se abra pestaña secundaria*/
document.addEventListener("contextmenu", function (e) {
   if(e.target.matches(".pos")){//valido que sea un input de class pos
    e.preventDefault();
   }
});

/*reecribir el input con lo que mando el servidor */
let inter=setInterval(function(){
  const time1=document.querySelector('.time');
  if(time1!==null){
    document.Tabla.time.value=parseInt(time1.innerHTML.split("Tiempo:")[1]);
  }
  clearInterval(inter);      
}, 1);
/*interval de suma de tiempo */
setInterval(function(){
  const time1=document.querySelector('.time');
    if(time1!==null){
      if(parseInt(time1.innerHTML.split("Tiempo:")[1])==0){
       document.Tabla.time.value=1;
       time1.innerHTML="Tiempo:"+1;
       incre=1;
      }else{
        if(ban==0){
          time1.innerHTML="Tiempo:"+(incre+parseInt(time1.innerHTML.split("Tiempo:")[1]));
          document.Tabla.time.value=(incre+parseInt(time1.innerHTML.split("Tiempo:")[1]));
          incre=parseInt(time1.innerHTML.split("Tiempo:")[1]);
          ban=1;
        }else{
          time1.innerHTML="Tiempo:"+(incre);
          document.Tabla.time.value=(incre);
        }
        incre++;
      }
    }
},1000);
/*aux1 es que tipo de click ,ban es para iniciar el contador de tiempo y incre es contador*/
let aux1=0,ban=0,incre=0;
window.onmousedown = function (e) {
    if(e.button==0){
        aux1=0;
    }else{
        aux1=2;
    }
    
}

function jugar(i,j)
{
  let inter=setInterval(function(){
      document.Tabla.fila.value=i;
	    document.Tabla.columna.value=j;
      document.Tabla.estado.value=0;
      if(aux1==0){
        /*si aux1==0  es click iz*/
        document.Tabla.marca.value=-1;
      }else{
        /*si aux1==2  es click der*/
        document.Tabla.marca.value=2;
      } 
      document.Tabla.submit();
      clearInterval(inter);      
  }, 100);
}

function njuego(v)
{
  if(v==0){
    document.Tabla.estado.value=4;
  }else{
    document.Tabla.estado.value=5;
  }
  document.Tabla.submit();
}

</script>
<style>
body{
    margin:0;
    padding:0;
    width:100%;
    height:100vh;
    display:grid;
    place-items:center;
}
.Tabla{
    width:100%;
    height:100%;
    display:grid;
    place-items:center;
}
.IngresarDatos{
    display:grid;
    width:250px;
    height:250px;
    background-color: grey;
    text-align:center;
    border-radius:15px;
}
.input{
  width:80%;
  height:30px;
  border-radius:10px;
}
.title1{
  margin:0;
}
.pos{
    height: 40px;
    width: 40px;
    background-color: #9b9b9b;
}
.color1{
    color:blue;
    background: white;
}
.color2{
    color:green;
    background: white;
}
.color3{
    color:red;
    background: white;
}
.bom{
    background-color: red;
}
.bom1{
    background-color: green;
}
.posDatos{
    height: 40px;
    width: 100%;
    display:grid;
    grid-template-columns:50% 50%;
}
.reiniciar,.minas,.time,.time1,.title,.posDatosM,.input{
  display:block;
  margin: auto;
  text-align:center;
}
.reiniciar{
  width: 150px;
  height: 30px;
}
.minas,.time,.time1{
  width: 100px;
  height: 20px;
}
.tablero{
  background-color: grey;
}
</style>
<body>
    <form class="Tabla" name="Tabla" method="post" action="">
    <?php
    switch($_SESSION["estado"]){
       case 1:
         include("login.php");
       break;
       case 2:
        include("generarDatos.php");
       break;
       case 3:
        include("juego.php");
       break;
    }
    
    ?>
    <input name="fila" type="hidden" value="" />
    <input name="columna" type="hidden" value="" />
    <input name="estado" type="hidden" value="" />
    <input name="marca" type="hidden" value="" />
    <input name="time" type="hidden" value="" />
    <input name="nameR" type="hidden" value="" />
    <input name="timeR" type="hidden" value="" />
    </form>
</body>
</html>