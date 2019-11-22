<?php
  mysql_set_charset('utf8');
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pasar cotizaciones a Excel</title>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="js/excel/xlsx.full.min.js"></script>

  </head>
  <body>
    <!--a href='<?php //echo $_SERVER["HTTP_REFERER"]; ?>'>VOLVER</a-->
    <div id="id_cotizacion"><?php echo $id_cotiz; ?></div>
    <button onclick="volver()">VOLVER</button>
  </body>
  <script>

    function getValues(data) {
      var header = [];
      var lista = [];
      var fila = 0;
      data['orden'].forEach( col => {
        header.push(data['encabezados'][col]);
      });
      lista = [header];
      for (let id in data['proyectos']){
        console.log("proyecto: "+id);
        // Primero se guardan las cotizaciones regulares
        let p_id = data['proyectos'][id];
        let pLista = [];
        data['orden'].forEach( col => {
            pLista.push(p_id[col]);
        });
        lista.push(pLista);
      }
      lista.push([ 'Totales',,,,,,,,,, data['precio'], data['costo'], data['saldo'] ]);
      // al final de todo se agregan los datos del cliente
      lista.push([]);
      lista.push([,,,, 'fecha', data.fecha]);
      return {
              'header'  : header,
              'data'    : lista,
             };
    }

    function mergeToRange(merge) {
      let mergeList = [];
      merge.forEach(function(m) {
        mergeList.push( { s:{r:m[0]+1,c:0}, e:{r:m[1]+1,c:0}} );
      })
      console.log(mergeList);
      return mergeList;
    }

    function aExcel(data) {
      console.log(getValues(data));
      var wb = XLSX.utils.book_new();
      var tabla = getValues(data);
      var ws = XLSX.utils.aoa_to_sheet(tabla.data);
      XLSX.utils.book_append_sheet(wb, ws, 'cotizaciones');

      if(typeof require !== 'undefined') XLSX = require('xlsx');
      XLSX.writeFile(wb, 'pedidos_cotizacion_'+data.fecha.replace(':',"'")+'.xlsx');
    }

    $(document).ready(function(){

      $.ajax({
        url: "datos_tabla_pedido_cotizacion.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
          console.log(data);
          aExcel(data);
          //window.location.assign("www.google.com.ar"); //<?php echo $_SERVER["HTTP_REFERER"]; ?>");
        },
        error: function() {
          console.log("Error en GET a "+this.url);
        },
        beforeSend: function() {
          console.log("Pidiendo datos...");
        }
      });



    });

    function volver() {
      window.location.assign("<?php echo $_SERVER["HTTP_REFERER"]; ?>");
    }
  </script>
</html>
