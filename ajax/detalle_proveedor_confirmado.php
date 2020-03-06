<?php  
	include "conexion.php"; 
	include 'session.php';
	$id = $_POST['id'];
	mysql_set_charset('utf8');	
 //fetch.php  
	$sql = "SELECT * FROM facturas_cotizaciones fc LEFT JOIN pagos pp ON fc.id_factura_cotizacion = pp.id_factura_pp LEFT JOIN registros r ON fc.id_registro_cotizacion = r.id  LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN proyectos pro ON r.id_proyecto = pro.id LEFT JOIN clientes c ON pro.cliente = c.id_cliente LEFT JOIN forma_pago fp ON fc.id_forma_pago_cotizacion = fp.id LEFT JOIN tipo_factura tf ON fc.id_tipo_factura_cotizacion = tf.id_factura LEFT JOIN item_cotizacion it ON r.item = it.id_item_cotizacion WHERE r.registro_seleccionado = 1 AND fc.id_factura_cotizacion = '$id'";
    /*$sql = "SELECT * FROM registros_confirmados r LEFT JOIN rubros_cotizaciones rc ON r.rubro_cotizacion = rc.id_rubros_cotizaciones LEFT JOIN categorias_cotizaciones cc ON r.categoria_cotizacion = cc.id_catcot LEFT JOIN condicion_cotizacion concot ON r.condicion_registro = concot.id_concot LEFT JOIN proveedores p ON r.id_proveedor = p.id_proveedor LEFT JOIN item_cotizacion ic ON r.item = ic.id_item_cotizacion WHERE id = '".$_POST["id"]."'";  */
    $result = mysqli_query($conexion, $sql);  
	$row = mysqli_fetch_array($result);  
	echo json_encode($row); 
?>