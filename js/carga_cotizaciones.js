$(document).ready(function(){
  $(".dropdown_rubro").select2({
    tags: true
  });

  $(".dropdown_categoria").select2({
    tags: true
  });

  $(".dropdown_item").select2({
    tags: true
  });

  $(".dropdown_condicion").select2({
    tags: true
  });

  $("#ingreso_dias").select2({
    tags: true
  });

 let proyecto = document.getElementById('ingreso_id').innerHTML;

  $.ajax({
      url:"ajax_cotizaciones_1.php",
      method:"POST",
      data:'proyecto='+proyecto,
      success:function(data){
          $('#tabla_cotizaciones').html(data);
          //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
          MergeCommonRows($('#tabla_cotizaciones'));
          funciones_cotizaciones();
          total_cotizacion();
          $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
      }
  });

  /*$.ajax({
      url:"actualizar_adicionales.php",
      method:"POST",
      data:'proyecto='+proyecto,
      success:function(data){
          $('#table_adicionales').html(data);
          var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
          var consumido = document.getElementById('consumido_total').value;
          suma_adicionales = parseFloat(suma_adicionales);
          consumido = pasarafloat(consumido);
          var adicional_total = suma_adicionales + consumido;
          adicional_total = parseFloat(adicional_total);
          adicional_total = adicional_total.toFixed(2);
          document.getElementById('adicionales_total').value = suma_adicionales;
          $(".numerable").each(function(){abandonar(this);})
      }
  });*/

  var tipo_estado = document.getElementById('tipo_estado').innerHTML;

  console.log(tipo_estado);
  switch(tipo_estado){
    case "NUEVO":
      $("#tipo_estado").css("background-color", "#ff4c52");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "CANCELADO":
      $("#tipo_estado").css("background-color", "#23272b");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "APROBADO":
      $("#tipo_estado").css("background-color", "#218838");
      $("#tipo_estado").css("color", "#FFFFFF");
      $("#boton_actualizar").css("opacity", "1");
      break;
    case "CONFIRMADO":
      $("#tipo_estado").css("background-color", "#218838");
      $("#tipo_estado").css("color", "#FFFFFF");
      $("#boton_actualizar").css("opacity", "1");
      break;
    case "RECHAZADO":
      $("#tipo_estado").css("background-color", "#dc3545");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "AJUSTAR":
      $("#tipo_estado").css("background-color", "#138496");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "STAND BY":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      break;
    case "CON DUDAS":
      $("#tipo_estado").css("background-color", "#23272b");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "COTIZANDO":
      $("#tipo_estado").css("background-color", "#0069d9");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "ENTREGADO":
      $("#tipo_estado").css("background-color", "#218838");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "FRENADO":
      $("#tipo_estado").css("background-color", "#138496");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "SOLICITAR ADICIONAL":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      break;
    case "ADICIONAL SOLICITADO":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      $("#solicitar_adicional").css("display", "none");
  }
  $("input[oninput='calculate_edicion()']").on({
    blur: calculate_edicion,
    change: calculate_edicion,
    keyup: calculate_edicion
  });

});

function calculate() {
  //puntear(document.getElementById('ingreso_importe_neto'));
  var myBox1 = document.getElementById('ingreso_cantidad').value;
  var myBox2 = document.getElementById('ingreso_importe_neto').value;
  var myBox3 = document.getElementById('ingreso_jornadas').value;
  var result = document.getElementById('ingreso_importe_total');
  var myResult = myBox1 * myBox2 * myBox3;
  result.value = myResult;
  //console.log("en calculate: ", result.value);
  //abandonar(result);

};
function calculate_edicion() {
  //puntear(document.getElementById('edicion_importe_neto'));
  var myBox1 = document.getElementById('edicion_cantidad').value;
  var myBox2 = document.getElementById('edicion_importe_neto').value;
  var myBox3 = document.getElementById('edicion_jornadas').value;
  var result = document.getElementById('edicion_importe_total');
  var myResult = myBox1 * myBox2 * myBox3;
  result.value = myResult;
  //console.log("en calculate_edicion: ", myBox2, result.value);
  //abandonar(result);
};

$('#guardar_categoria').click(function(){
  var id_proyecto = document.getElementById('ingreso_id').innerHTML;
  var categoria = $("#ingreso_categoria").val();
  var detalle = $("#ingreso_detalle").val();
  $.ajax({
    url:"agregar_categoria.php",
    method:"POST",
    data: 'id_proyecto='+ id_proyecto+'&categoria='+ categoria+'&detalle='+ detalle,
    success:function(data){
      window.location.reload(true);
    }
  });
});


$("#agregar_proveedor").click(function(){
  $("#proveedores2").toggle({
  duration: 25,
  });
      $("#razon_social").toggle({
      duration: 25,
  });
      $("#proveedores1").toggle({
      duration: 25,
  });
      $("#nombre_fantasia").toggle({
      duration: 25,
  });
  /*$("#agregar_proveedor").toggle({
      duration: 25,
  });*/
  $("#boton_guardar_proveedor_nombre").toggle({
      duration: 25,
  });  
  $("#boton_cancelar_proveedor_nombre").toggle({
      duration: 25,
  });
    
  });

  

  
  

$('#boton_guardar_cotizacion').click(function(){
  var id_categoria = document.getElementById('codigo_categoria').innerHTML;
  var id_proyecto = document.getElementById('codigo_proyecto').innerHTML;
  var item = $("#ingreso_item").val();
  var condicion = $("#ingreso_condicion").val();
  var detalle = null;
  var cantidad = $("#ingreso_cantidad").val();
  var importe_neto = pasarafloat($("#ingreso_importe_neto").val());
  var importe_total = pasarafloat($("#ingreso_importe_total").val());
  var proveedor = $("#ingreso_proveedor").val();
  var forma_pago = $("#ingreso_forma_pago").val();
  var dias_pago = $("#ingreso_dias").val();
  if(dias_pago == 0){
    dias_pago = 90;
  }

  $.ajax({
               url:"agregar_cotizacion.php",
               method:"POST",
               data: 'id_proyecto='+ id_proyecto+'&id_categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
               success:function(data){
                $('#formulario_carga_cotizacion').trigger("reset");
      window.location.reload(true);
               }
          });
});
$('.eliminar_categoria').click(function(){
  $('#modal_eliminar_categoria').modal('show');
  var id = $(this).attr('data-id');

  $('#boton_eliminar_categoria').click(function(){
    console.log(id);
    $.ajax({
              url:"eliminar_categoria.php",
              method:"POST",
              data:'id='+id/*+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto*/,
              success:function(data){
                $('#modal_eliminar_categoria').modal('hide');
        window.location.reload(true);
              }
         });
  });
});



$('#solicitar_adicional').click(function(){
  $("#lista_cotizaciones").html('');
  $("#monto_adicional").html('');
  $("#motivo_adicional").html('');
  $('#modal_solicitar_adicional').modal('show');
  var proyecto = $(this).attr('data-proyecto');
  $.ajax({
            url:"cargar_registros_adicional.php",
            method:"POST",
            data:'proyecto='+proyecto,
            success:function(data){
              $("#lista_cotizaciones").append(data);
              //$('#modal_mensaje').modal('hide');
      //window.location.reload(true);
            }
       });
});
$('#boton_solicitar_adicional').click(function(){
  var id_proyecto = document.getElementById('ingreso_id').innerHTML;
  var monto_adicional = pasarafloat(document.getElementById('monto_adicional').value);
  var motivo_adicional = document.getElementById('motivo_adicional').value;
  var cotizacion = document.getElementById('dropdown_registros').value;
  console.log("Click: ",cotizacion);
  $.ajax({
    url:"solicitar_adicional.php",
    method:"POST",
    data:'cotizacion='+cotizacion+'&id_proyecto='+id_proyecto+'&monto_adicional='+monto_adicional+'&motivo_adicional='+motivo_adicional,
    success:function(data){
      $('#modal_solicitar_adicional').modal('hide');
      window.location.reload(true);
    }
  });
});

$('#boton_guardar_proveedor_nombre').click(function(){
  var nombre_fantasia = document.getElementById('nombre_fantasia').value;
  var razon_social = document.getElementById('razon_social').value;
  
  $.ajax({
    url:"agregar_proveedor_para_select.php",
    method:"POST",
    data:'&nombre_fantasia='+nombre_fantasia+'&razon_social='+razon_social,
    success:function(data){
      $('#modal_cargar_proveedor').modal('hide');
      window.location.reload(true);
    }
  });
});


$('.cambio_estado_mensaje').click(function(){
  var texto_estado = $(this).text();
  var estado = $(this).attr("data-estado");
  console.log(estado);
  if(estado == "3"){
    let proyecto = '<?php echo $_GET['id'];?>';
    console.log("Cambio de estado: ",proyecto);
    $.ajax({
      url:"ajax/comprobar_item_marcado.php",
      method:"POST",
      data:'proyecto='+proyecto,
      success:function(data){
        console.log(data);
        if(data == "null"){
          $('#modal_mensaje').modal('show');
          $("#estado_cotizacion").val(estado);
        } else {
          $('#modal_cotizacion_error').modal('show');
          $("#estado_cotizacion").val(estado);
        }
      }
    });
  } else {
    $('#modal_mensaje').modal('show');
    $("#estado_cotizacion").val(estado);
  }
});

$('#boton_mensaje').click(function(){
  var id = document.getElementById('ingreso_id').innerHTML;
  var mensaje = document.getElementById('motivo_cambio_estado').value;
  var estado = document.getElementById('estado_cotizacion').value;
  console.log(estado);
  $.ajax({
    url:"enviar_mensaje_registro.php",
    method:"POST",
    data:'id='+id+'&estado='+estado+'&mensaje='+mensaje,
    success:function(data){
      $('#modal_mensaje').modal('hide');
      window.location.reload(true);
    }
  });
});

$('.editar_cotizacion').click(function(){
    var id_registro = $(this).attr('data-id');
    cargar_editar_cotizacion(id_registro);
});

function cargar_editar_cotizacion(id_registro){
    console.log("Click id: ",id_registro);
    $.ajax({
    url:"cargar_registro.php",
    method:"POST",
    data:{id_registro:id_registro},
    dataType:"json",
    success:function(data){
      $("#edicion_rubro").val(data.rubro_cotizacion);
      $("#edicion_categoria").val(data.categoria_cotizacion);
      $("#edicion_item").val(data.nombre_item_cotizacion);
      $("#edicion_condicion").val(data.condicion_registro);
      $("#edicion_jornadas").val(data.jornadas_registro);
      $("#edicion_detalle_cotizacion").val(data.detalle_registro);
      $("#edicion_cantidad").val(data.cantidad);
      $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto")[0]);
      $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total")[0]);
      $("#edicion_proveedor").val(data.id_proveedor);
      $("#edicion_forma_pago").val(data.forma_pago);
      $("#edicion_dias").val(data.tiempo_pago);
      $("#edicion_id_registro").val(data.id);
      $("#edicion_id_item").val(data.item);
      $(".numerable").each(function(){abandonar(this);});
      if (data.registro_seleccionado == 1){
      $("#edicion_jornadas").attr("disabled", true);
      $("#edicion_cantidad").attr("disabled", true);
      $("#edicion_importe_neto").attr("disabled", true);
      } else {
        $('#edicion_jornadas').removeAttr('disabled');
        $('#edicion_cantidad').removeAttr('disabled');
        $('#edicion_importe_neto').removeAttr('disabled');
      }
      //$('#modal_editar_registro').modal('show');
    }
  });



    $('#boton_editar_cotizacion').click(function(){
    var rubro = $("#edicion_rubro").val();
    var categoria = $("#edicion_categoria").val();
    var item = $("#edicion_item").val();
    var id_item = $("#edicion_id_item").val();
    var condicion = $("#edicion_condicion").val();
    var detalle = $("#edicion_detalle_cotizacion").val();
    var cantidad = $("#edicion_cantidad").val();
    var jornadas = $("#edicion_jornadas").val();
    var importe_neto = pasarafloat($("#edicion_importe_neto").val());
    var importe_total = pasarafloat($("#edicion_importe_total").val());
    var proveedor = $("#edicion_proveedor").val();
    var forma_pago = $("#edicion_forma_pago").val();
    var dias_pago = $("#edicion_dias").val();
    var id_registro = $("#edicion_id_registro").val();
    $.ajax({
     url:"editar_registro.php",
     method:"POST",
     data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&id_item='+ id_item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
success:function(data){
        $('#modal_editar_registro').modal('hide');
        /*$('#modal_cargar_proveedor').modal('hide');*/
        /*proyecto = document.getElementById('ingreso_id').innerHTML;
        $.ajax({
          url:"ajax_cotizaciones_1.php",
          method:"POST",
          data:'proyecto='+proyecto,
          success:function(data){
            $('#tabla_cotizaciones').html(data);
            funciones_cotizaciones();
          }
        });*/
      }
});
});
}

/*var totalDeuda = 0;
var id_registro = 0;
var registro = 0;
$(".valor_promedio").each(function(){
  id_categoria = $(".eliminar_categoria").attr("data-id");
  id_registro = id_registro + 1;
  registro = $(this).attr('data-registro');
  totalDeuda+=parseInt($(this).attr('data-valor')) || 0;
  console.log("ID Registro: ",registro);
  console.log("Deuda: ",totalDeuda);
  console.log("Cantidad de cotizaciones: ",id_registro);
});*/

$(".checkbox").click(function(){
  var marca = 0;
  console.log("Click en Checkbox para actualizar iconos");
  registro = $(this).attr('data-registro');
  if ($(this).is(":checked")){
    marca = 1;
  }
  $(".eliminar_cotizacion").each(function(){
    check_eliminar = $(this).attr('data-id');
    if(check_eliminar == registro) {
      console.log("Eliminar: ",check_eliminar);
      console.log("Registro: ",registro);
      console.log("Marca: ",marca);
      if (marca == 1){
        $(this).fadeOut();
      } else {
        $(this).fadeIn();
      }
    }
  });
  $(".editar_cotizacion").each(function(){
    check_eliminar = $(this).attr('data-id');
    if(check_eliminar == registro) {
      console.log("Eliminar: ",check_eliminar);
      console.log("Registro: ",registro);
      console.log("Marca: ",marca);
      if (marca == 1){
        $(this).fadeOut();
      } else {
        $(this).fadeIn();
      }
    }
  });
});
$(".tiempo_pago_cambio").change(function(){
  var registro = $(this).attr('data-registro');
  var tiempo = $(this).val();
  $.ajax({
            url:"tiempo_pago_cambio.php",
            method:"POST",
            data:'registro='+registro+'&tiempo='+tiempo,
            success:function(data){
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({
                   url:'procesar_pagos.php',
                   type: 'POST',
                   dataType: 'json',
                   data: 'id_proyecto='+id_proyecto,
                   success:function(data){
                    $('#pago30').val(data.valor30dias);
                    $('#pago60').val(data.valor60dias);
                    $('#pago90').val(data.valor90dias);
                   }
              });
            }
       });
});
$(".eliminar_cotizacion").each(function(){
  $(this).css("display", "none");
  if($(this).attr('data-check') == 0) {
    console.log("Muestro");
    $(this).css("display", "inline-block");
  } else{
    console.log("Oculto");
  }
});
$(".editar_cotizacion").each(function(){
  $(this).css("display", "none");
  if($(this).attr('data-check') == 0) {
    console.log("Muestro");
    $(this).css("display", "inline-block");
  } else{
    console.log("Oculto");
  }
});

$(".checkbox").click(function(){
  sum = 0;
  sum_total = 0;
  total = 0;
  registro = 0;
  chk = 0;
  tiempo = 0;
  tiempo_pago = 0;
  sum_pago = 0;
  sum_total_pago = 0;
  total_pago = 0;

  if ($(this).is(":checked")) {
    chk = 1;
    registro = $(this).attr('data-registro');
    proyecto = document.getElementById('ingreso_id').innerHTML;
    $(this).closest("tr").toggleClass("selected", this.checked);

  } else {
    chk = 0;
    registro = $(this).attr('data-registro');
    proyecto = document.getElementById('ingreso_id').innerHTML;
    $(this).closest("tr").removeClass("selected", this.checked);
    console.log(registro);
  }

  $.each($('input[type="checkbox"]:checked'), function() {
    sum = pasarafloat($(this).val());
    sum_total = sum_total + sum;
    total = sum_total.toFixed(2);
    document.getElementById('consumido_total').value = total;
  });
  saldo = document.getElementById('costo_presupuesto_total').value;
  saldo = pasarafloat(saldo);
  saldo_total = saldo - total;
  saldo_total = saldo_total.toFixed(2);
  //document.getElementById('saldo_total').value = saldo_total;
  var id_proyecto = document.getElementById('ingreso_id').innerHTML;
  var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
  costo_presupuesto_total = pasarafloat(costo_presupuesto_total);
  /*if(costo_presupuesto_total == saldo_total){
    console.log("Pongo consumido en 0");
    document.getElementById('consumido_total').value = "0,00";
    document.getElementById('adicionales_total').value = "0,00";
    document.getElementById('pago30').value = "0,00";
    document.getElementById('pago60').value = "0,00";
    document.getElementById('pago90').value = "0,00";
  }*/
  $.ajax({
            url:"actualizar_valores.php",
            method:"POST",
            data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
            success:function(data){
              console.log("Proyecto actualizado");
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({
                   url:'procesar_pagos.php',
                   type: 'POST',
                   dataType: 'json',
                   data: 'id_proyecto='+id_proyecto+'&registro='+registro+'&chk='+chk,
                   success:function(data){
                    $('#pago30').val(data.valor30dias);
                    $('#pago60').val(data.valor60dias);
                    $('#pago90').val(data.valor90dias);
                    $.ajax({
                    url:"actualizar_adicionales.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                        $('#table_adicionales').html(data);
                        var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
                        var consumido = document.getElementById('consumido_total').value;
                        suma_adicionales = parseFloat(suma_adicionales);
                        consumido = pasarafloat(consumido);
                        var adicional_total = suma_adicionales + consumido;
                        adicional_total = parseFloat(adicional_total);
                        adicional_total = adicional_total.toFixed(2);
                        console.log("Adicional + Consumido: ",adicional_total);
                        console.log("Adicional: ",suma_adicionales);
                        console.log("Consumido :",consumido);
                        document.getElementById('adicionales_total').value = suma_adicionales;
                        $(".numerable").each(function(){abandonar(this);})
                    }
                });
                   }
              });
            }
        });
});

function MergeCommonRows(table, firstOnly) {/*
        var firstColumnBrakes = [];
        for (let i=2; i<=4; i++) {
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("tr.cotizacion_pagos_group > td:nth-child(" + i + ")").each(function(index, el){
                //console.log("i", i, " index ", index, " text ", $(el).text())
                if (previous == $(el).text() && $(el).text() !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    $(el).addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan = rowspan+1));
                }else{
                    if(firstOnly == 'first only'){
                        if(i === 1) firstColumnBrakes.push(index);
                    }else{
                        if($.inArray(index, firstColumnBrakes) === -1) firstColumnBrakes.push(index);
                    }
                    if (i == 2) $(el).addClass('primerRubro');
                    if (i == 3) $(el).addClass('primerCategoria');
                    rowspan = 1;
                    previous = $(el).text();
                    cellToExtend = $(el);
                }
            });
        }
        agregarSubtotales(table);*/
      }

      function agregarSubtotales(table) {
          //console.log(table.find(".primerRubro"));
          table.find(".primerRubro").parents('.cotizacion_pagos_group + tr').before($('<tr><td/><td>Subtotales</td><td colspan="7"/><td/></tr>').addClass('subtotalRubro'));
          table.find(".primerRubro").each(function(ix, rubro) {
              let $tr = $(rubro).parents('tr');

              let total = 0;
              let promedios = [];
              let promediosConCheck = [];
              let conteos = []
              let conteosConCheck = [];
              let anterior = undefined;

              while ($tr.length && !$tr.hasClass("subtotalRubro")) {
                  // Sólo se consideran los registros checkeados
                  let item_actual = $tr.find('[data-item]').data('item');
                  let total_actual = pasarafloat($tr.find('.cotizacion_pagos_total').text());
                  if (item_actual == anterior) {
                      promedios[promedios.length - 1] += total_actual;
                      conteos[conteos.length - 1] += 1;
                      if ($tr.find(".cotizacion_pagos_checked")[0].checked) {
                          promediosConCheck[promedios.length - 1] += total_actual;
                          conteosConCheck[conteos.length - 1] += 1;
                      }
                  } else {
                      promedios.push(total_actual);
                      conteos.push(1);
                      if ($tr.find(".cotizacion_pagos_checked")[0].checked) {
                          promediosConCheck.push(total_actual);
                          conteosConCheck.push(1);
                      }
                  }
                  anterior = item_actual;
                  $tr = $tr.next();
              }
              if (conteosConCheck.length > 0) {
                  promedios = promediosConCheck;
                  conteos = conteosConCheck;
              }
              for (let i=0; i<promedios.length; i++) {
                  console.log("premedios y conteos ", promedios[i], conteos[i]);
                  total += promedios[i]/conteos[i];
              }
              $total = $('<span></span>')
                            .appendTo($tr.find('td:last-child').empty())
                            .addClass('subtotalRubroMonto numerable')
                            .before($('<span>$</span>'))
                            .text(total);
              $total.text(completar(puntearTexto($total.text())));
          });
      }

      function total_cotizacion(total_cotizacion){
        valor = 0;
        total_cotizacion = 0;
        $(".subtotal_rubro").each(function(){
            valor = $(this).text();
            valor_float = pasarafloat(valor);
            total_cotizacion = total_cotizacion + valor_float;
            console.log(valor);
            console.log(total_cotizacion);
        });
        total_cotizacion = total_cotizacion.toFixed(2);

        $('#total_cotizacion').html(total_cotizacion);
        
        $('#consumible_total').html(total_cotizacion);
      }

      function funciones_cotizaciones(){

        $('.mensaje_item').click(function(e){
          let registro = $(this).attr('data-registro');
          let item = $(this).attr('data-item');
          let mensaje = $(this).attr('data-mensaje');
          let proyecto = '<?php echo $_GET['id'];?>';

          console.log("Proyecto: ",proyecto);

          if(mensaje == 0){
            $('#modal_mensaje_item').modal('show');
            $('#boton_mensaje_item').click(function(){
              let texto_mensaje = document.getElementById('escribir_mensaje_item').value;
              let archivo_comentario= document.getElementById('archivo_comentario').files[0].name;
              
              $.ajax({
                url:"ajax/guardar_mensaje_cotizacion.php",
                method:"POST",
                data:'registro='+registro+'&texto_mensaje='+texto_mensaje+'&archivo_comentario='+archivo_comentario,
                success:function(data){
                  $.ajax({
                    url:"ajax_cotizaciones_1.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                      $('#escribir_mensaje_item').val('');
                      $('#modal_mensaje_item').modal('hide');
                      $('#tabla_cotizaciones').html(data);
                      funciones_cotizaciones();
                      total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                      //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                    }
                  });
                }
              });
            });
          } else {
            $.ajax({
              url:"ajax/cargar_mensaje_cotizacion.php",
              method:"POST",
              dataType:"json",
              data:'registro='+registro,
              success:function(data){
                $("#mostrar_mensaje_item").val(data.texto_mensaje_cotizacion);
                $('#modal_mostrar_mensaje_item').modal('show');
              }
            });
          }
        });

        var proyecto = document.getElementById('ingreso_id').innerHTML;

        $(".dropdown_rubro").select2({
          tags: true
        });

        $(".dropdown_categoria").select2({
          tags: true
        });

        $(".dropdown_condicion").select2({
          tags: true
        });

        $("#ingreso_dias").select2({
          tags: true
        });

        $("#ingreso_rubro").select2({
          tags: true
        });

        $("#ingreso_categoria").select2({
          tags: true
        });

        $("#ingreso_condicion").select2({
          tags: true
        });

        $("#edicion_proveedor").select2({
          tags: true,
          dropdownParent: $("#modal_editar_registro")
        });
        

        MergeCommonRows($('#tabla_cotizaciones'));

        $('#guardar_categoria').click(function(){
          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var categoria = $("#ingreso_categoria").val();
          var detalle = $("#ingreso_detalle").val();
          $.ajax({
            url:"agregar_categoria.php",
            method:"POST",
            data: 'id_proyecto='+ id_proyecto+'&categoria='+ categoria+'&detalle='+ detalle,
            success:function(data){
              window.location.reload(true);
            }
          });
        });

        $('#boton_actualizar').click(function(){
          var proyecto = '<?php echo $_GET['id'];?>';
          $.ajax({
            url:"ajax/actualizar_cotizacion.php",
            method:"POST",
            data: 'proyecto='+ proyecto,
            success:function(data){
              console.log("Proyecto actualizado");
            }
          });
        });

        $(document).keydown(function(event) { 
         if (event.keyCode == 27) { 
          $('#modal_cargar_proveedor').modal('hide');
           }
          });

        $('#ingreso_condicion').change(function(){
          var condicion = $(this).val();
          console.log("Cambio condición: ",condicion);
          if(condicion == 2){
            $('#ingreso_jornadas').attr('disabled', 'disabled').val(1);
          } else {
             $('#ingreso_jornadas').removeAttr('disabled');
          }
        });

        $('#edicion_condicion').change(function(){
          var condicion = $(this).val();
          console.log("Cambio condición: ",condicion);
          if(condicion == 2){
            $('#edicion_jornadas').attr('disabled', 'disabled').val(1);
          } else {
             $('#edicion_jornadas').removeAttr('disabled');
          }
        });

        $('#boton_guardar_cotizacion').click(function(){
          console.log("Guardar cotizacion");
          var proyecto = '<?php echo $_GET['id'];?>';
          var rubro = $("#ingreso_rubro").val();
          var categoria = $("#ingreso_categoria").val();
          var item = $("#ingreso_item").val();
          var condicion = $("#ingreso_condicion").val();
          var detalle = $("#ingreso_detalle_cotizacion").val();
          var jornada = $("#ingreso_jornadas").val();
          var cantidad = $("#ingreso_cantidad").val();
          var importe_neto = pasarafloat($("#ingreso_importe_neto").val());
          var importe_total = pasarafloat($("#ingreso_importe_total").val());
          /*var proveedor = $("#ingreso_proveedor").val();
          var forma_pago = $("#ingreso_forma_pago").val();*/
          //var dias_pago = $("#ingreso_dias").val();
          //var pagos = cotizacion_pagos.guardable();
          //var pagos = '{"0":{"plazo":"90","porcentaje":"100","forma":"3","fecha1":"","fecha2":"undefined"}}';
          $.ajax({
            url:"agregar_cotizacion_manual.php",
            method:"POST",
            data: 'proyecto='+ proyecto+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornada='+ jornada+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total,//+'&pagos=' + pagos,
            success:function(data){
                console.log(data);
              //window.location.reload(true);
              $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
              });
          },
          error:function(error){
              console.log(error);
          }
          });
        });

        $('#boton_guardar_proveedor_cotizacion').click(function(){
          var id = $("#ot").val();
          var id_proveedor = $("#proveedores1").val();
          var forma_pago = $("#forma_pago_nuevo").val();
          var tipo_factura = $("#tipo_factura_nuevo_registro").val();
          var numero_factura = $("#numero_factura_nuevo_registro").val();
          var fecha_factura = $("#fecha_facturacion").val();
          var fecha_pactada = $("#fecha_pago").val();
          var importe_neto = $("#importe_neto").val();
          var iva = $("#iva").val();
          var percepcion = $("#percepcion").val();
          var importe_bruto = $("#importe_bruto").val();

          var archivo_adjunto = $('.upload_file').val();

          if (archivo_adjunto == ''){
            var archivo_adjunto = "sin_subir";
          } else {
            var adjunto = $(".upload_file")[0].files[0];
            var archivo_adjunto = adjunto.name;
          }

          importe_neto = parseFloat(importe_neto);
          iva = parseFloat(iva);
          percepcion = parseFloat(percepcion);
          importe_bruto = parseFloat(importe_bruto);


          $.ajax({
            url:"agregar_proveedor_cotizacion.php",
            method:"POST",
            data: 'id='+id+'&id_proveedor='+id_proveedor+'&forma_pago='+forma_pago+'&tipo_factura='+tipo_factura+'&numero_factura='+numero_factura+'&fecha_factura='+fecha_factura+'&fecha_pactada='+fecha_pactada+'&archivo_adjunto='+archivo_adjunto+'&importe_neto='+importe_neto+'&iva='+iva+'&percepcion='+percepcion+'&importe_bruto='+importe_bruto,
            success:function(data){
              $('#formulario_carga_cotizacion')[0].reset();
              var drEvent = $('.upload_file').dropify();
              var proyecto = $(this).attr('data-proyecto');
              drEvent = drEvent.data('dropify');
              drEvent.resetPreview();
              drEvent.clearElement();
              $.ajax({
                  url:"ajax_mostrar_cotizaciones_aprobadas.php",
                  method:"POST",
                  data:'proyecto='+proyecto,
                  success:function(data){
                      $('#modal_cargar_proveedor').modal('hide');
                      window.location.reload(true);
                  }
              });
            }
          });
        });

        $('.eliminar_categoria').click(function(){
          $('#modal_eliminar_categoria').modal('show');
          var id = $(this).attr('data-id');
          $('#boton_eliminar_categoria').click(function(){
            console.log(id);
            $.ajax({
              url:"eliminar_categoria.php",
              method:"POST",
              data:'id='+id/*+'&saldo_sumar='+saldo_sumar+'&consumido='+consumido+'&id_proyecto='+id_proyecto*/,
              success:function(data){
                $('#modal_eliminar_categoria').modal('hide');
                window.location.reload(true);
              }
            });
          });
        });

        $('#boton_eliminar_cotizacion_').click(function(){
          var id = $(this).closest('[data-registro]').data('registro');
          console.log(id);
          $.ajax({
            url:"eliminar_cotizacion_nocheck.php",
            method:"POST",
            data:'id='+id,
            success:function(data){
                console.log(data);
              $('#modal_eliminar_cotizacion').modal('hide');
              $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
              });
          },
          error:function(data){ console.log(data); }
          });
        });


        $('.editar_cotizacion').click(function(id_item){
          var id_registro = $(this).attr('data-id');
          console.log("Click id: ",id_registro);
          $.ajax({
            url:"cargar_registro.php",
            method:"POST",
            data:{id_registro:id_registro},
            dataType:"json",
            success:function(data){
              $("#edicion_rubro").val(data.rubro_cotizacion);
              $("#edicion_categoria").val(data.categoria_cotizacion);
              $("#edicion_item").val(data.nombre_item_cotizacion);
              $("#edicion_condicion").val(data.condicion_registro);
              $("#edicion_detalle_cotizacion").val(data.detalle_registro);
              console.log(data.jornadas_registro);
              $("#edicion_jornadas").val(data.jornadas_registro);
              $("#edicion_cantidad").val(data.cantidad);
              $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto"));
              $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total"));
              $("#edicion_proveedor").val(data.id_proveedor);
              $("#edicion_forma_pago").val(data.forma_pago);
              $("#edicion_dias").val(data.tiempo_pago);
              $("#edicion_id_registro").val(id_registro);
              $(".numerable").each(function(){abandonar(this);});
              //$('#modal_editar_registro').modal('show');
              $("#edicion_id_item").val(data.item);
            }
          });
        });

        $('#boton_editar_cotizacion').click(function(){
          var proyecto = document.getElementById('ingreso_id').innerHTML;
          var rubro = $("#edicion_rubro").val();
          var categoria = $("#edicion_categoria").val();
          var item = $("#edicion_item").val();
          var id_item = $("#edicion_id_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var jornadas = $("#edicion_jornadas").val();
          var importe_neto = parseFloat($("#edicion_importe_neto").val());
          var importe_total = parseFloat($("#edicion_importe_total").val());
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          var id_registro = $("#edicion_id_registro").val();
          $.ajax({
           url:"editar_registro.php",
           method:"POST",
           data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&id_item='+ id_item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
           success:function(data){
            $('#modal_editar_registro').modal('hide');
            //$('#modal_cargar_proveedor').hide();
            $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                  total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                  //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
              });
            }
          });
        });

        $(".checkbox").click(function(){
          var marca = 0;
          console.log("Click en Checkbox para actualizar iconos");
          registro = $(this).attr('data-registro');
          if ($(this).is(":checked")){
            marca = 1;
          }
          $(".eliminar_cotizacion").each(function(){
            check_eliminar = $(this).attr('data-id');
              if(check_eliminar == registro) {
                console.log("Eliminar: ",check_eliminar);
                console.log("Registro: ",registro);
                console.log("Marca: ",marca);
                if (marca == 1){
                  $(this).fadeOut();
                } else {
                  $(this).fadeIn();
                }
              }
          });
          $(".editar_cotizacion").each(function(){
            check_eliminar = $(this).attr('data-id');
            if(check_eliminar == registro) {
              console.log("Eliminar: ",check_eliminar);
              console.log("Registro: ",registro);
              console.log("Marca: ",marca);
              if (marca == 1){
                $(this).fadeOut();
              } else {
                $(this).fadeIn();
              }
            }
          });
        });

        $(".tiempo_pago_cambio").change(function(){
          var registro = $(this).attr('data-registro');
          var tiempo = $(this).val();
          $.ajax({
            url:"tiempo_pago_cambio.php",
            method:"POST",
            data:'registro='+registro+'&tiempo='+tiempo,
            success:function(data){
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({
                url:'procesar_pagos.php',
                type: 'POST',
                dataType: 'json',
                data: 'id_proyecto='+id_proyecto,
                success:function(data){
                  $('#pago30').val(data.valor30dias);
                  $('#pago60').val(data.valor60dias);
                  $('#pago90').val(data.valor90dias);
                }
              });
            }
          });
        });

        $(".eliminar_cotizacion").each(function(){
          $(this).css("display", "none");
          if($(this).attr('data-check') == 0) {
            console.log("Muestro");
            $(this).css("display", "inline-block");
          } else{
            console.log("Oculto");
          }
        });

        $(".editar_cotizacion").each(function(){
          $(this).css("display", "none");
          if($(this).attr('data-check') == 0) {
            console.log("Muestro");
            $(this).css("display", "inline-block");
          } else{
            console.log("Oculto");
          }
        });

        $(".checkbox").click(function(){
          sum = 0;
          sum_total = 0;
          total = 0;
          registro = 0;
          chk = 0;
          tiempo = 0;
          tiempo_pago = 0;
          sum_pago = 0;
          sum_total_pago = 0;
          total_pago = 0;

          if ($(this).is(":checked")) {
            chk = 1;
            registro = $(this).attr('data-registro');
            proyecto = document.getElementById('ingreso_id').innerHTML;
            $(this).closest("tr").toggleClass("selected", this.checked);

          } else {
            chk = 0;
            registro = $(this).attr('data-registro');
            proyecto = document.getElementById('ingreso_id').innerHTML;
            $(this).closest("tr").removeClass("selected", this.checked);
            console.log(registro);
          }

          $.each($('input[type="checkbox"]:checked'), function() {
            sum = parseFloat($(this).val());
            sum_total = sum_total + sum;
            total = sum_total.toFixed(2);
            document.getElementById('consumido_total').value = total;
          });

          saldo = document.getElementById('costo_presupuesto_total').value;
          saldo = pasarafloat(saldo);
          saldo_total = saldo - total;
          saldo_total = saldo_total.toFixed(2);

          //document.getElementById('saldo_total').value = saldo_total;

          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
          costo_presupuesto_total = pasarafloat(costo_presupuesto_total);

          /*if(costo_presupuesto_total == saldo_total){
            console.log("Pongo consumido en 0");
            document.getElementById('consumido_total').value = "0,00";
            document.getElementById('adicionales_total').value = "0,00";
            document.getElementById('pago30').value = "0,00";
            document.getElementById('pago60').value = "0,00";
            document.getElementById('pago90').value = "0,00";
          }*/
          $.ajax({
            url:"actualizar_valores.php",
            method:"POST",
            data:'id_proyecto='+id_proyecto+'&total='+total+'&saldo_total='+saldo_total+'&registro='+registro+'&chk='+chk,
            success:function(data){
              console.log("Proyecto actualizado");
              var id_proyecto = document.getElementById('ingreso_id').innerHTML;
              $.ajax({
                url:'procesar_pagos.php',
                type: 'POST',
                dataType: 'json',
                data: 'id_proyecto='+id_proyecto+'&registro='+registro+'&chk='+chk,
                success:function(data){
                  $('#pago30').val(data.valor30dias);
                  $('#pago60').val(data.valor60dias);
                  $('#pago90').val(data.valor90dias);
                  $(".numerable").each(function(){abandonar(this);});
                    $.ajax({
                      url:"ajax_cotizaciones_1.php",
                      method:"POST",
                      data:'proyecto='+proyecto,
                      success:function(data){
                          $('#tabla_cotizaciones').html(data);
                          //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                          MergeCommonRows($('#tabla_cotizaciones'));
                          funciones_cotizaciones();
                          total_cotizacion();
                $('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                          //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                      }
                    });
                  /*$.ajax({
                    url:"actualizar_adicionales.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                      $('#table_adicionales').html(data);
                      var suma_adicionales = document.getElementById('suma_adicionales').innerHTML;
                      var consumido = document.getElementById('consumido_total').value;
                      suma_adicionales = parseFloat(suma_adicionales);
                      consumido = pasarafloat(consumido);
                      var adicional_total = suma_adicionales + consumido;
                      adicional_total = parseFloat(adicional_total);
                      adicional_total = adicional_total.toFixed(2);
                      console.log("Adicional + Consumido: ",adicional_total);
                      console.log("Adicional: ",suma_adicionales);
                      console.log("Consumido :",consumido);
                      document.getElementById('adicionales_total').value = suma_adicionales;
                    }
                  });*/
                }
              });
            }
          });
        });

        $('.seleccion_item').click(function(){
          var registro = $(this).attr('data-id_registro');
          var rubro = $(this).attr('data-rubro');
          var categoria = $(this).attr('data-categoria');
          var item = $(this).attr('data-item');

          console.log("Rubro: ",rubro);
          console.log("Categoria: ",categoria);
          console.log("Item: ",item);
          console.log("Registro: ",registro);

          $('#ingreso_rubro').val(rubro).trigger('change');
          $('#ingreso_categoria').val(categoria).trigger('change');
          $('#ingreso_item').val(item);

          $('html, body').animate({
            scrollTop: $("#tr_mostrar").offset().top
          }, 1000);

        });

        $(".numerable").each(function(){abandonar(this);});

        $('.cargar_proveedor_cotizacion').click(function(){
          var id = $(this).attr('data-id');
          console.log("Cargando modal para registro ", id);
          $.ajax({
              url:"traer_cotizaciones.php",
              method:"POST",
              data:{id:id},
              dataType:"json",
              success:function(data){
                $('#modal_cargar_proveedor').attr('data-registro', id).modal('show');
                $('.proveedores').val(data.id_proveedor);
                $('#ot').val(data.id);
                $('#tipo_item').val(data.nombre_item_cotizacion);
                $('#detalle').val(data.detalle_registro);
                $('#importe_neto').val(data.importe_total);
                $('#total_cotizacion2').html(data.importe_total);
                $('#forma_pago_nuevo').val(data.forma_pago);
                $('#tiempo_pago').val(data.tiempo_pago);
                $('.upload_file').attr('data-default-file',data.archivo_adjunto);
                $("#tipo_factura_nuevo_registro").val(data.tipo_factura);
                $("#numero_factura_nuevo_registro").val(data.numero_factura);
                $("#fecha_facturacion").val(data.fecha_factura);
                $("#fecha_pago").val(data.fecha_pago);
                $("#importe_neto").val(data.importe_total);
                $("#iva").val(data.iva);
                $("#percepcion").val(data.percepcion);
                $("#importe_bruto").val(data.importe_bruto);
                $("#cotizacion_pagos_avatar .cotizacion_pagos_container").attr("data-id_registro", id);
                cotizacion_pagos.cargar_avatar();
              }
          });
          console.log('.editar_cotizacion[data-id='+id+']');
          cargar_editar_cotizacion(id);
        });

        $("#tipo_iva").change(function(){
          valor = $(this).val();
          importe_neto = document.getElementById('importe_neto').value;
          importe_neto = parseFloat(importe_neto);
          iva = (importe_neto*valor)/100;
          document.getElementById('iva').value = iva;
          importe_bruto = importe_neto + iva;
          $(".importe_bruto").val(importe_bruto);
        });

        $('#fecha_facturacion').change(function(){
          var fecha = document.getElementById('fecha_facturacion').value;
          var dias = document.getElementById('tiempo_pago').value;
          dias = parseFloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_pago').value = fecha_calculo;
        });

        $('#tiempo_pago').change(function(){
          var fecha = document.getElementById('fecha_facturacion').value;
          var dias = document.getElementById('tiempo_pago').value;
          dias = parseFloat(dias);
          fecha_calculo = moment(fecha).add(dias, 'days').calendar();
          fecha_calculo = moment(fecha_calculo).format("L");
          console.log(fecha_calculo);
            document.getElementById('fecha_pago').value = fecha_calculo;
        });

        $('#proveedores').change(function(){
          id = $(this).val();
          console.log("Proveedor elegido: "+id);
          $.ajax({
            url:"cargar_proveedor.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
              $('#forma_pago_nuevo').val(data.forma_pago);
              $('#tiempo_pago').val(data.tiempo_cobro);
            }
          });
        });

        $('#tipo_factura_nuevo_registro').change(function() {
          if ($('#tipo_factura_nuevo_registro').val() == 'A') {
              $('#iva').removeAttr('disabled');
              $('#tipo_iva').removeAttr('disabled');
              $('#numero_factura_nuevo_registro').removeAttr('disabled');
              $('#fecha_facturacion').removeAttr('disabled');
              $('#percepcion').removeAttr('disabled');
          } else {
              $('#iva').attr('disabled', 'disabled').val('');
              if ($('#tipo_factura_nuevo_registro').val() == 'Sin factura') {
                $('#numero_factura_nuevo_registro').attr('disabled', 'disabled').val('');
                $('#fecha_facturacion').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#iva').attr('disabled', 'disabled').val('');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#percepcion').attr('disabled', 'disabled').val('');
              } else {
                $('#numero_factura_nuevo_registro').removeAttr('disabled');
                $('#fecha_facturacion').removeAttr('disabled');
                $('#tipo_iva').attr('disabled', 'disabled').val('');
                $('#fecha_cobro').removeAttr('disabled');
                $('#percepcion').attr('disabled', 'disabled').val('');
              }
          }
          if ($('#tipo_factura_nuevo_registro').val() == '') {
            $('#iva').attr('disabled', 'disabled').val('');
            $('#tipo_iva').attr('disabled', 'disabled').val('');
            $('#numero_factura_nuevo_registro').attr('disabled', 'disabled').val('');
              $('#fecha_facturacion').attr('disabled', 'disabled').val('');
              $('#fecha_cobro').attr('disabled', 'disabled').val('');
              $('#percepcion').attr('disabled', 'disabled').val('');
          }
        }).trigger('change'); // added trigger to calculate initial tipo_factura

        $(".upload_file").change(function(){
          var fd = new FormData();
          var files = $('.upload_file')[0].files[0];
          fd.append('file',files);
          console.log(fd);
          uploadData(fd);
        });

        function uploadData(formdata){
          $.ajax({
            url: 'subir_archivo.php',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
            }
          });
        }

        $("#archivo_comentario").change(function(){
          var fd = new FormData();
          var files = $('#archivo_comentario')[0].files[0];
          fd.append('file',files);
          console.log(fd);
          uploadData_comentario(fd);
        });

        function uploadData_comentario(formdata){
          $.ajax({
            url: 'subir_archivo_comentarios.php',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
            }
          });
        }

        
        $(document).on("change", ".sumar", function() {
          var sum = 0;
          $(".sumar").each(function(){
              sum += +$(this).val();
          });
          $(".importe_bruto").val(sum);
        });
        // Inicializa el modulo de utilidades de tabla
        utiles_tabla.set_table($("#tabla_cotizaciones td"));
        // Inicializa el modulo de plazos de pagos
        cotizacion_pagos.inicio(<?php echo $_GET['id']; ?>);

$('.datepicker_ff').datepicker({
  uiLibrary: 'bootstrap4',
  locale: 'es-es'
});
$('.datepicker_fp').datepicker({
  uiLibrary: 'bootstrap4',
  locale: 'es-es'
});

var X = XLSX;
    var XW = {
      /* worker message */
      msg: 'xlsx',
      /* worker scripts */
      worker: 'js/excel/xlsxworker.js'
    };

    var global_wb;

    var process_wb = (function() {

      function desMerge(wb){
        wb.SheetNames.forEach(function(shName){
          var ws = wb.Sheets[shName];
          if (ws.hasOwnProperty('!merges')){
            var mergArr = ws['!merges'];
            var mergResto = [];
            console.log ("cant de merges: ", mergArr.length);
            //console.log(XLSX.utils.decode_range(ws['!ref']));
            mergArr.forEach(function(m){
              //console.log(XLSX.utils.encode_range(m));
              if (m.s.c == m.e.c){
                for (let i=m.s.r; i<m.e.r; i++){
                  ws[XLSX.utils.encode_cell({c:m.s.c, r:i+1})] = ws[XLSX.utils.encode_cell(m.s)];
                }
              } else {
                mergResto.push(m);
              }
            });
            ws['!merges'] = mergResto;
          }
        });
      }

      function checkSubTotal(cadena){
        let regexp = /.*total.*/i;
        return regexp.test(cadena);
      }

      function checkRubro(rubro){
        let url = "esta_el_rubro.php";
        let id_rubro = "";
        let rub = /[\w]+/.test(rubro) ? rubro.trim() : "sin definir";
        $.ajax({
          url: url,
          method: 'get',
          data: {
            rubro: rub
          },
          dataType: 'json',
          async: false,
          success: function(resp){
            //console.log(resp);
            id_rubro = resp[0];
          },
          error: function(error){
            console.log(error);
          }
        });
        return id_rubro;
      }
      

      function checkCategoria(categoria){
        let url = "esta_la_categoria.php";
        let id_categoria = "";
        let cat = /[\w]+/.test(categoria) ? categoria.trim() : "sin definir";
        //console.log("Test", categoria, cat, /[\w]+/.test(categoria));
        $.ajax({
          url: url,
          method: 'get',
          data: {
            categoria: cat
          },
          dataType: 'json',
          async: false,
          success: function(resp){
            //console.log(resp);
            id_categoria = resp[0];
          },
          error: function(error){
            console.log(error);
          }
        });
        return id_categoria;
      }

      function numCondicion(strCondicion){
        if (/^alq.*/i.test(strCondicion)) return 1;
        else if (/^compr.*/i.test(strCondicion)) return 2;
        else if (/^c.*ntr.*t.*/i.test(strCondicion)) return 3;
        else return "";
      }

      function guardarDatos(data){
        console.log("Este item ",data[2]," esta bueno? ", /[\w]+/.test(data[2]))
        if ( checkSubTotal(data[0]) || !/[\w]+/.test(data[2]) ) {
          console.log("Subtotal o total encontrado o linea inválida: ", data[0], data[2])
        } else {
          console.log("ID de rubro: ", checkRubro(data[0]));
          console.log("ID de categoria: ", checkCategoria(data[1]));
          console.log("Guardando a base de datos");
          guardarCotizacion(data);
        }
      }

      function guardarCotizacion(data){
        let id_proyecto = '<?php echo $_GET['id'];?>';
        let id_rubro = checkRubro(data[0]);
        let id_categoria = checkCategoria(data[1]);
        let item = data[2];
        let condicion = numCondicion(data[3]);
        let detalle = data[4];
        let jornada = data[5];
        let cantidad = data[6];
        var importe_neto = data[7];
        var importe_total = data[8];
        var proveedor = '';
        var forma_pago = '';
        var dias_pago = 90;

        $.ajax({
           url:"agregar_cotizacion_manual.php",
           method:"POST",
           data: 'proyecto='+ id_proyecto+'&rubro='+id_rubro+'&categoria='+ id_categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&jornada='+ jornada+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
           success:function(data){
              console.log(data);
            },
            error: function(error){
              console.log(error);
            }
        });
      }

      function buscarCotizaciones(wb){
        wb.SheetNames.forEach(function(shName){
          var ws = wb.Sheets[shName];
          var ref = XLSX.utils.decode_range(ws['!ref']);
          console.log(ref);
          for (let row = ref.s.r; row<=ref.e.r; row++){
            let col = 8;
            if (typeof ws[XLSX.utils.encode_cell({c:col, r:row})] !== 'undefined'){
              if (ws[XLSX.utils.encode_cell({c:col, r:row})].t=='n') {
                let data = new Array(9);
                data[8] = ws[XLSX.utils.encode_cell({c:col, r:row})].v;
                for (let j=0; j<8; j++){
                  data[j] = typeof ws[XLSX.utils.encode_cell({c:j, r:row})] === 'undefined'? '' : ws[XLSX.utils.encode_cell({c:j, r:row})].v;
                }
                console.log(data.join(', '));
                guardarDatos(data);
              }
            }
          }
        });
      }

      return function process_wb(wb) {
        //console.log("id dentro de funcion ",id_proyecto);
        console.log(wb);
        desMerge(wb);
        buscarCotizaciones(wb);
            $.ajax({
                url:"ajax_cotizaciones_1.php",
                method:"POST",
                data:'proyecto=<?php echo $_GET["id"]; ?>',
                success:function(data){
                    $('#tabla_cotizaciones').html(data);
                    $('#cargando').hide();
                    /*
                    if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                    else $('#cargaExcel').show();*/
                    $('#cargaExcel').show();
                    MergeCommonRows($('#tabla_cotizaciones'));
                    funciones_cotizaciones();
                    boton();
                    //$('#tabla_cotizaciones .numerable').each(function(ix, tag){ abandonar(tag); });
                }
            });
      };
    })();

    var do_file = (function() {

      var xw = function xw(data, cb) {
        var worker = new Worker(XW.worker);
        worker.onmessage = function(e) {
          switch(e.data.t) {
            case 'ready': break;
            case 'e': console.error(e.data.d); break;
            case XW.msg: cb(JSON.parse(e.data.d)); break;
          }
        };
        worker.postMessage({d:data,b:rABS?'binary':'array'});
      };

      return function do_file(files) {
        rABS = typeof FileReader !== "undefined" && (FileReader.prototype||{}).readAsBinaryString;
        use_worker = typeof Worker !== 'undefined';
        var f = files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#cargaExcel').hide();
          $('#cargando').show();
          if(typeof console !== 'undefined') console.log("onload", new Date(), rABS, use_worker);
          var data = e.target.result;
          if(!rABS) data = new Uint8Array(data);
          if(use_worker) xw(data, process_wb);
          else process_wb(X.read(data, {type: rABS ? 'binary' : 'array'}));
        };
        if(rABS) reader.readAsBinaryString(f);
        else reader.readAsArrayBuffer(f);
      };
    })();

    (function() {
      var drop = document.getElementById('drop');
      if(!drop.addEventListener) return;

      function handleDrop(e) {
        e.stopPropagation();
        e.preventDefault();
        do_file(e.dataTransfer.files);
      }

      function handleDragover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.dataTransfer.dropEffect = 'copy';
      }

      drop.addEventListener('dragenter', handleDragover, false);
      drop.addEventListener('dragover', handleDragover, false);
      drop.addEventListener('drop', handleDrop, false);
    })();

    (function() {
      var xlf = document.getElementById('xlf');
      if(!xlf.addEventListener) return;
      function handleFile(e) { do_file(e.target.files); }
      xlf.addEventListener('change', handleFile, false);
    })();
    </script>
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

        


        function boton(){
          let id=<?php echo $_GET['id']; ?>;

          $.ajax({
            url: "datos_tabla_cotizaciones.php",
            data: {id: id},
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
        }