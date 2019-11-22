<?php
	include "session.php";
	include "conexion.php";
	mysql_set_charset('utf8');
  $datos_tabla = array('proyectos' => array());
  $precio = 0;
  $saldo = 0;
  $costo = 0;

  $datos_tabla['orden'] = [
                            'id',
          									'Cliente',
          									'Producto',
          									'Proyecto',
          									'Tipo',
          									'Subtipo',
          									'Fecha_Interna',
          									'Hora_Interna',
          									'Fecha_Cliente',
          									'Hora_Cliente',
          									'Precio',
          									'Costo',
          									'Saldo',
          									'Estado'
                          ];
    $datos_tabla['encabezados'] = [ 'id'             => 'id',
                  									'Cliente'        => 'Cliente',
                  									'Producto'       => 'Producto',
                  									'Proyecto'       => 'Proyecto',
                  									'Tipo'           => 'Tipo de proyecto',
                  									'Subtipo'        => 'Subtipo',
                  									'Fecha_Interna'  => 'Fecha Interna',
                  									'Hora_Interna'   => 'Hora Interna',
                  									'Fecha_Cliente'  => 'Fecha Cliente',
                  									'Hora_Cliente'   => 'Hora Cliente',
                  									'Precio'         => 'Precio',
                  									'Costo'          => 'Costo',
                  									'Saldo'          => 'Saldo',
                  									'Estado'         => 'Estado'
                                  ];
			// Attempt select query execution
			$sql = "SELECT * FROM proyectos p LEFT JOIN clientes c ON p.cliente = c.id_cliente LEFT JOIN tipo_cotizacion t ON p.tipo_cotizacion = t.id_tipo_cotizacion LEFT JOIN subtipo_cotizacion s ON p.subtipo_cotizacion = s.id_subtipo";
			mysql_query("SET NAMES 'utf8'");
			if($result = mysqli_query($conexion, $sql)){
			    if(mysqli_num_rows($result) > 0){
			        $i = 0;
			        while($row = mysqli_fetch_array($result)){
                $datos_tabla['proyectos'][$row['id']] = [
                                                'id'             => $row['id'],
                                                'Cliente'        => $row['nombre'],
                                                'Producto'       => $row['producto_proyecto'],
                                                'Proyecto'       => $row['nombre_proyecto'],
                                                'Tipo'           => utf8_encode($row['tipo_cotizacion']),
                                                'Subtipo'        => utf8_encode($row['nombre_subtipo']),
                                                'Fecha_Interna'  => $row['fecha_entrega'],
                                                'Hora_Interna'   => $row['hora_interno'].":".$row['minutos_interno'],
                                                'Fecha_Cliente'  => $row['fecha_envio'],
                                                'Hora_Cliente'   => $row['hora_cliente'].":".$row['minutos_cliente'],
                                                'Precio'         => floatval($row['precio']),
                                                'Costo'          => floatval($row['costo_presupuestado']),
                                                'Saldo'          => floatval($row['saldo']),
                                                'Estado'         => $row['estado']
                                              ];
                $costo += floatval($row['costo_presupuestado']);
                $precio += floatval($row['precio']);
                $saldo += floatval($row['saldo']);
							}
              $datos_tabla['costo'] = $costo;
              $datos_tabla['precio'] = $precio;
              $datos_tabla['saldo'] = $saldo;
							$datos_tabla['fecha'] = date('d-m-Y_g:ia');
			        // Free result set
			        mysqli_free_result($result);
				    } else{
				        echo "No hay datos para mostrar.";
				    }
				} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
				}
        echo json_encode($datos_tabla);
			?>
