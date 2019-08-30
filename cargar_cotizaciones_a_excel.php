<?php
  mysql_set_charset('utf8');
  $id_cotiz = '';
  if (isset($_GET['id'])){
    $id_cotiz = $_GET['id'];
  }
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

    function getValues(data, id='') {
      var header = [];
      var lista = [];
      var mergeRubro = [];
      var mergeCategoria = [];
      var fila = 0;
      let categoria_anterior = "";
      data['orden'].forEach( col => {
        header.push(data['encabezados'][col]);
      });
      lista = [header];
      let rangoCategoria = [ 0, 0 ];
      for (let rub in data['rubros']){
        let rangoRubro = [ fila ];
        console.log("rubro: "+rub);
        let nombre = data['rubros'][rub]['nombre_catcot'];
        // Primero se guardan las cotizaciones regulares
        data['rubros'][rub]['cotizaciones'].forEach(cot => {
          let catLista = [];
          data['orden'].forEach( col => {
              catLista.push(cot[col]);
          });
          lista.push(catLista);
          console.log(fila, catLista);
          if (cot['nombre_catcot']==categoria_anterior) {
            rangoCategoria[1]=fila;
          } else {
            mergeCategoria.push(rangoCategoria);
            rangoCategoria = [fila, fila];
            categoria_anterior = cot['nombre_catcot'];
          }
          fila++;
        });
        mergeCategoria.push(rangoCategoria);
        // Despues se agregan los adicionales
        rangoCategoria = [ fila, fila ];
        if ('adicional' in data['rubros'][rub]) {
          data['rubros'][rub]['adicional'].forEach(function(adicional) {
            lista.push([ nombre, 'adicional', adicional['item'], adicional['detalle_registro'], adicional['cantidad'], adicional['importe_neto'], adicional['importe_total'], adicional['motivo'], adicional['adicional'] ]);
            if(fila>rangoCategoria[1]) rangoCategoria[1]=fila;
            fila++;
          });
        }
        // Y finalmente el sub-total
        lista.push([ nombre, 'sub total',,,,,,, data['rubros'][rub]['sub_total'] ]);
        mergeCategoria.push(rangoCategoria);
        rangoRubro.push(fila);
        mergeRubro.push(rangoRubro);
        fila++;
      }
      console.log("rangos a unir ");
      console.log(mergeRubro);
      console.log(mergeCategoria)
      lista.push([ 'Total',,,,,,,, data['total'] ]);
      lista.push([ 'Presupuestado',,,,,,,, data['presupuestado'] ]);
      // al final de todo se agregan los datos del cliente
      lista.push([]);
      lista.push(['ID proyecto', id]);
      lista.push(['cliente', data.cliente.nombre]);
      lista.push(['razon social', data.cliente.razon_social]);
      lista.push(['cuit', data.cliente.cuit]);
      lista.push(['proyecto', data.cliente.proyecto]);
      lista.push(['producto', data.cliente.producto]);
      lista.push(['subtipo de servicio', data.cliente.servicio]);
      lista.push([,,,, 'fecha', data.fecha]);
      return {
              'header'  : header,
              'data'    : lista,
              'merge'   : [mergeRubro, mergeCategoria]
             };
    }

    function mergeToRange(merge) {
      let mergeList = [];
      merge.forEach(function(mer, ix) {
        mer.forEach(function(m) {
          if (m[0]<m[1]) mergeList.push( { s:{r:m[0]+1,c:ix}, e:{r:m[1]+1,c:ix}} );
        });
      })
      console.log(mergeList);
      return mergeList;
    }

    function aExcel(data, id) {
      //console.log(getValues(data));
      var wb = XLSX.utils.book_new();
      var tabla = getValues(data, id);
      var ws = XLSX.utils.aoa_to_sheet(tabla.data);
      console.log("por pasar el merge");
      //ws['!ref'] = "A1:Z50";
      ws['!merges'] = mergeToRange(tabla.merge);
      console.log("por agregar hoja al libro " + ws['!merges']);
      XLSX.utils.book_append_sheet(wb, ws, 'cotizaciones');

      if(typeof require !== 'undefined') XLSX = require('xlsx');
      XLSX.writeFile(wb, 'cotizaciones_'+data.cliente.nombre+'_id-'+id+'_'+data.fecha.replace(':',"'")+'.xlsx');
    }

    $(document).ready(function(){
      var id = $("#id_cotizacion").text();
      $.ajax({
        url: "datos_tabla_cotizaciones___.php",
        data: "id="+id,
        method: "GET",
        dataType: "json",
        success: function(data) {
          console.log(data);
          aExcel(data, id);
          //window.location.assign("www.google.com.ar"); //<?php echo $_SERVER["HTTP_REFERER"]; ?>");
        },
        error: function(erre) {
          console.log("Error en GET a "+this.url);
          console.log(erre);
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
