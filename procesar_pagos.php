<?php
//echo $_GET['id'];
include "session.php";
include "conexion.php"; 
mysql_set_charset('utf8');

$id_proyecto = $_POST["id_proyecto"];
$registro = $_POST["registro"];
$chk = $_POST["chk"];

$sql_dias = "SELECT * FROM registros WHERE registro_seleccionado = 1 AND id_proyecto = '".$id_proyecto."'"; 

$sql_adicionales ="UPDATE adicionales SET adicional_seleccionado = '$chk' WHERE id_cotizacion_adicional =  '".$registro."'";
mysqli_query($conexion, $sql_adicionales);

mysql_query("SET NAMES 'utf8'");
if($result_dias = mysqli_query($conexion, $sql_dias)){
    if(mysqli_num_rows($result_dias)){
        $i = 0;
        $valor30dias = 0;
        $valor60dias = 0;
        $valor90dias = 0;
        $importe_total30 = 0;
        $importe_total60 = 0;
        $importe_total90 = 0;
        while($row_dias = mysqli_fetch_array($result_dias)){
        	if($row_dias['tiempo_pago'] <= 30 AND $row_dias['tiempo_pago'] >= 0) {
        		$importe_total30 = floatval($row_dias['importe_total']);
        		$valor30dias = $valor30dias + $importe_total30;
        		
        	}

        	if ($row_dias['tiempo_pago'] <= 89 AND $row_dias['tiempo_pago'] >= 31) {
        		$importe_total60 = floatval($row_dias['importe_total']);
        		$valor60dias = $valor60dias + $importe_total60;
        		
        	}

        	if ($row_dias['tiempo_pago'] >= 90) {
        		$importe_total90 = floatval($row_dias['importe_total']);
        		$valor90dias = $valor90dias + $importe_total90;
        		
        	}
		}
		$output = array('valor30dias'=>$valor30dias,'valor60dias'=>$valor60dias,'valor90dias'=>$valor90dias);
    	echo json_encode($output, JSON_FORCE_OBJECT);
    	mysqli_free_result($result_dias);
	} else{
    	
    }
} else{
    
}
?>