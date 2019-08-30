<?php  
  
  include "conexion.php"; 
  mysql_set_charset('utf8');

  if($conexion === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error()); 
  } else {
    echo "conectado";
  } 

  $id_catcot = $_POST["id_catcot"];

  $sql = "SELECT * FROM categorias_cotizaciones WHERE id_proyecto_catcot = '".$_GET['id']."'";
  mysql_query("SET NAMES 'utf8'");
  if($result = mysqli_query($conexion, $sql)){
    $cantidad = mysqli_num_rows($result);
      if($cantidad > 0){
          $i = 0;
          $promedio = 0;
          while($row = mysqli_fetch_array($result)){
            $sql_promedio = "SELECT SUM(importe_total) AS suma FROM registros WHERE categoria_cotizacion = $id_catcot AND registro_seleccionado = 1";
            $resultado_promedio = mysqli_query($conexion, $sql_promedio);
            $datos_promedio=mysqli_fetch_assoc($resultado_promedio);
            $datos_promedio["suma"] = round($datos_promedio["suma"], 2);

            if($datos_promedio["suma"] == 0){
              $sql_promedio0 = "SELECT AVG(importe_total) AS suma FROM registros WHERE categoria_cotizacion = $id_catcot AND registro_seleccionado = 0";
              $resultado_promedio0 = mysqli_query($conexion, $sql_promedio0);
              $datos_promedio=mysqli_fetch_assoc($resultado_promedio0);
              $datos_promedio["suma"] = round($datos_promedio["suma"], 2);
            }
          }
      }
  }

  mysqli_close($conexion);

?>