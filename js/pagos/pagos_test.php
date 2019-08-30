<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Test de módulo pagos.js</title><script
			  src="https://code.jquery.com/jquery-3.4.0.min.js"
			  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
			  crossorigin="anonymous"></script>
    <script src="pagos.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="cotizacion_pagos_container" data-id_registro="<?php echo $_GET['reg']; ?>" data-id_proyecto="<?php echo $_GET['id']; ?>">
      <span class="cotizacion_pagos_ver_interfaz">&cudarrr;</span>
      <div class="cotizacion_pagos_interfaz">
        <table>
          <tbody class="cotizacion_pagos_lista">
            <tr><th>Pago</th><th>Porcentaje</th><th>Forma</th>
            <tr class="cotizacion_pagos_data" data-id_pago="">
              <td><select class="cotizacion_pagos_plazo"><select></td>
              <td><input type="number" class="cotizacion_pagos_porcentaje"></input></td>
              <td><select class="cotizacion_pagos_forma"><select></td>
              <td><button class="cotizacion_pagos_borrar">borrar</button></td>
            </tr>
          </tbody>
        </table>
        <span><button class="cotizacion_pagos_guardar">guardar</button></span>
        <span><button class="cotizacion_pagos_cancelar">cancelar</button></span>
        <span style="float:right;"><button class="cotizacion_pagos_mostrar_agregar_pago">+</button></span>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function(){

      $(".cotizacion_pagos_ver_interfaz").click(function(){
        $(".cotizacion_pagos_interfaz").toggle("slow");
      });
    });
  </script>
</html>
