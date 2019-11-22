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

  proyecto = document.getElementById('ingreso_id').innerHTML;
  $.ajax({
    url:"ajax_cotizaciones.php",
    method:"POST",
    data:'proyecto='+proyecto,
    success:function(data){
        $('#tabla_cotizaciones').html(data);
        MergeCommonRows($('#tabla_cotizaciones'));
        funciones_cotizaciones();
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
    case "1":
      $("#tipo_estado").css("background-color", "#3e8ef7");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "2":
      $("#tipo_estado").css("background-color", "#3e8ef7");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "9":
      $("#tipo_estado").css("background-color", "#23272b");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "5":
      $("#tipo_estado").css("background-color", "#218838");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "6":
      $("#tipo_estado").css("background-color", "#dc3545");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "8":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      break;
    case "10":
      $("#tipo_estado").css("background-color", "#23272b");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    case "3":
      $("#tipo_estado").css("background-color", "#218838");
      $("#tipo_estado").css("color", "#FFFFFF");
      break;
    /*case "SOLICITAR ADICIONAL":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      break;
    case "ADICIONAL SOLICITADO":
      $("#tipo_estado").css("background-color", "#ffc107");
      $("#tipo_estado").css("color", "#212529");
      $("#solicitar_adicional").css("display", "none");*/
  }
  $("input[oninput='calculate_edicion()']").on({
    blur: calculate_edicion,
    change: calculate_edicion,
    keyup: calculate_edicion
  });
});

  function calculate() {
    puntear(document.getElementById('ingreso_importe_neto'));
    var myBox1 = document.getElementById('ingreso_cantidad').value;
    var myBox2 = pasarafloat(document.getElementById('ingreso_importe_neto').value);
    var myBox3 = document.getElementById('ingreso_jornadas').value;
    var result = document.getElementById('ingreso_importe_total');
    var myResult = myBox1 * myBox2 * myBox3;
    result.value = myResult;
    console.log("en calculate: ", result.value);
    abandonar(result);

  };
  function calculate_edicion() {
    puntear(document.getElementById('edicion_importe_neto'));
    var myBox1 = document.getElementById('edicion_cantidad').value;
    var myBox2 = document.getElementById('edicion_importe_neto').value;
    var myBox3 = document.getElementById('edicion_jornadas').value;
    var result = document.getElementById('edicion_importe_total');
    var myResult = myBox1 * pasarafloat(myBox2) * myBox3;
    result.value = myResult;
    console.log("en calculate_edicion: ", myBox2, result.value);
    abandonar(result);
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

  $('#boton_guardar_cotizacion').click(function(){
    var id_categoria = document.getElementById('codigo_categoria').innerHTML;
    var id_proyecto = document.getElementById('codigo_proyecto').innerHTML;
    var item = $("#ingreso_item").val();
    var condicion = $("#ingreso_condicion").val();
    var detalle = $("#ingreso_detalle_cotizacion").val();
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

  $('#boton_guardar_proveedor_cotizacion').click(function(){
    var id = $("#ot").val();
    var id_proveedor = $("#proveedores").val();
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
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        $.ajax({  
          url:"ajax_mostrar_cotizaciones_aprobadas.php",  
          method:"POST",  
          data:'proyecto='+proyecto,
          success:function(data){
            $('#modal_cargar_proveedor').modal('hide');
          }  
        });
      }  
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

  $('.cambio_estado_mensaje').click(function(){
    var estado = $(this).attr('data-estado');
    if(estado == "ENTREGADO"){
      let proyecto = '<?php echo $_GET['id'];?>';
      console.log("Cambio de estado: ",proyecto);
      $.ajax({
        url:"ajax/comprobar_item_marcado.php",
        method:"POST",
        data:'proyecto='+proyecto,
        success:function(data){
          console.log(data);
          if(data == "null"){
            document.getElementById('texto_cambio_estado').innerHTML = estado;
            $('#modal_mensaje').modal('show');
          } else {
            $('#modal_cotizacion_error').modal('show');
          }
        }
      });
    } else {
      document.getElementById('texto_cambio_estado').innerHTML = estado;
      $('#modal_mensaje').modal('show'); 
    } 
  });

      $('#boton_mensaje').click(function(){
        var estado = document.getElementById('texto_cambio_estado').innerHTML
        var id = document.getElementById('ingreso_id').innerHTML;
        var mensaje = document.getElementById('motivo_cambio_estado').value;
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
          console.log("Click id: ",id_registro);
          $.ajax({
          url:"cargar_registro.php",
          method:"POST",
          data:{id_registro:id_registro},
          dataType:"json",
          success:function(data){
            $("#edicion_rubro").val(data.rubro_cotizacion);
            $("#edicion_categoria").val(data.categoria_cotizacion);
            $("#edicion_item").val(data.item);
            $("#edicion_condicion").val(data.condicion_registro);
            $("#edicion_detalle_cotizacion").val(data.detalle_registro);
            $("#edicion_cantidad").val(data.cantidad);
            $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto")[0]);
            $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total")[0]);
            $("#edicion_proveedor").val(data.id_proveedor);
            $("#edicion_forma_pago").val(data.forma_pago);
            $("#edicion_dias").val(data.tiempo_pago);
            $(".numerable").each(function(){abandonar(this);})
            $('#modal_editar_registro').modal('show');
          }
        });

          $('#boton_editar_cotizacion').click(function(){
          var item = $("#edicion_item").val();
          var condicion = $("#edicion_condicion").val();
          var detalle = $("#edicion_detalle_cotizacion").val();
          var cantidad = $("#edicion_cantidad").val();
          var importe_neto = pasarafloat($("#edicion_importe_neto").val());
          var importe_total = pasarafloat($("#edicion_importe_total").val());
          var proveedor = $("#edicion_proveedor").val();
          var forma_pago = $("#edicion_forma_pago").val();
          var dias_pago = $("#edicion_dias").val();
          $.ajax({
                       url:"editar_registro.php",
                       method:"POST",
                       data: 'id_registro='+ id_registro+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
                       success:function(data){
              $('#modal_editar_registro').modal('hide');
              window.location.reload(true);
                       }
                  });
        });
      });

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
        document.getElementById('saldo_total').value = saldo_total;
        var id_proyecto = document.getElementById('ingreso_id').innerHTML;
        var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
        costo_presupuesto_total = pasarafloat(costo_presupuesto_total);
        if(costo_presupuesto_total == saldo_total){
          console.log("Pongo consumido en 0");
          document.getElementById('consumido_total').value = "0,00";
          document.getElementById('adicionales_total').value = "0,00";
          document.getElementById('pago30').value = "0,00";
          document.getElementById('pago60').value = "0,00";
          document.getElementById('pago90').value = "0,00";
        }
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

function MergeCommonRows(table, firstOnly) {
        var firstColumnBrakes = [];
        for(var i=2; i<=4; i++){
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("td:nth-child(" + i + ")").each(function(index, el){
                if (previous == $(el).text() && $(el).text() !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    $(el).addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan = rowspan+1));
                }else{
                    if(firstOnly == 'first only'){
                        if(i === 1) firstColumnBrakes.push(index);
                    }else{
                        if($.inArray(index, firstColumnBrakes) === -1) firstColumnBrakes.push(index);
                    }
                    rowspan = 1;
                    previous = $(el).text();
                    cellToExtend = $(el);
                }
            });
        }
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
              $.ajax({
                url:"ajax/guardar_mensaje_cotizacion.php",
                method:"POST",
                data:'registro='+registro+'&texto_mensaje='+texto_mensaje,
                success:function(data){
                  $.ajax({
                    url:"ajax_cotizaciones.php",
                    method:"POST",
                    data:'proyecto='+proyecto,
                    success:function(data){
                      $('#escribir_mensaje_item').val('');
                      $('#modal_mensaje_item').modal('hide');
                      $('#tabla_cotizaciones').html(data);
                      funciones_cotizaciones();
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
          var proyecto = document.getElementById('ingreso_id').innerHTML;
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
          var dias_pago = $("#ingreso_dias").val();
          $.ajax({
            url:"agregar_cotizacion.php",
            method:"POST",
            data: 'proyecto='+ proyecto+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornada='+ jornada+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&dias_pago='+ dias_pago,
            success:function(data){
              //window.location.reload(true);
              $.ajax({
                url:"ajax_cotizaciones.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
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
          var id = $("#edicion_id_registro").val();
          console.log(id);
          $.ajax({
            url:"eliminar_cotizacion_nocheck.php",
            method:"POST",
            data:'id='+id,
            success:function(data){
              $('#modal_eliminar_cotizacion').modal('hide');
              $.ajax({
                url:"ajax_cotizaciones.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
                }
              });
            }
          });
        });


        $('.editar_cotizacion').click(function(){
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
              $("#edicion_item").val(data.item);
              $("#edicion_condicion").val(data.condicion_registro);
              $("#edicion_detalle_cotizacion").val(data.detalle_registro);
              $("#edicion_jornadas").val(data.jornadas_registro);
              $("#edicion_cantidad").val(data.cantidad);
              $("#edicion_importe_neto").val(data.importe_neto); abandonar($("#edicion_importe_neto"));
              $("#edicion_importe_total").val(data.importe_total); abandonar($("#edicion_importe_total"));
              $("#edicion_proveedor").val(data.id_proveedor);
              $("#edicion_forma_pago").val(data.forma_pago);
              $("#edicion_dias").val(data.tiempo_pago);
              $("#edicion_id_registro").val(id_registro);
              $(".numerable").each(function(){abandonar(this);})
              $('#modal_editar_registro').modal('show');
            }
          });
        });

        $('#boton_editar_cotizacion').click(function(){
          var proyecto = document.getElementById('ingreso_id').innerHTML;
          var rubro = $("#edicion_rubro").val();
          var categoria = $("#edicion_categoria").val();
          var item = $("#edicion_item").val();
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
           data: 'id_registro='+ id_registro+'&rubro='+ rubro+'&categoria='+ categoria+'&item='+ item+'&condicion='+ condicion+'&detalle='+ detalle+'&jornadas='+ jornadas+'&cantidad='+ cantidad+'&importe_neto='+ importe_neto+'&importe_total='+ importe_total+'&proveedor='+ proveedor+'&forma_pago='+ forma_pago+'&dias_pago='+ dias_pago,
           success:function(data){
            $('#modal_editar_registro').modal('hide');
            $.ajax({
                url:"ajax_cotizaciones.php",
                method:"POST",
                data:'proyecto='+proyecto,
                success:function(data){
                  $('#tabla_cotizaciones').html(data);
                  funciones_cotizaciones();
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

          document.getElementById('saldo_total').value = saldo_total;

          var id_proyecto = document.getElementById('ingreso_id').innerHTML;
          var costo_presupuesto_total = document.getElementById('costo_presupuesto_total').value;
          costo_presupuesto_total = pasarafloat(costo_presupuesto_total);

          if(costo_presupuesto_total == saldo_total){
            console.log("Pongo consumido en 0");
            document.getElementById('consumido_total').value = "0,00";
            document.getElementById('adicionales_total').value = "0,00";
            document.getElementById('pago30').value = "0,00";
            document.getElementById('pago60').value = "0,00";
            document.getElementById('pago90').value = "0,00";
          }
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
                      url:"ajax_cotizaciones.php",
                      method:"POST",
                      data:'proyecto='+proyecto,
                      success:function(data){
                          $('#tabla_cotizaciones').html(data);
                          //if ($(data).find("tr").length>2) $('#cargaExcel').hide();
                          MergeCommonRows($('#tabla_cotizaciones'));
                          funciones_cotizaciones();
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
          var rubro = $(this).attr('data-rubro');
          var categoria = $(this).attr('data-categoria');
          var item = $(this).attr('data-item');

          console.log("Rubro: ",rubro);
          console.log("Categoria: ",categoria);
          console.log("Item: ",item);

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
          $.ajax({  
              url:"traer_cotizaciones.php",  
              method:"POST",  
              data:{id:id},
              dataType:"json",
              success:function(data){  
                $('#modal_cargar_proveedor').modal('show');
                $('#proveedores').val(data.id_proveedor);
                $('#ot').val(data.id);
                $('#tipo_item').val(data.item);
                $('#detalle').val(data.detalle_registro);
                $('#importe_neto').val(data.importe_total);
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
              }  
          });
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

        $(document).on("change", ".sumar", function() {
          var sum = 0;
          $(".sumar").each(function(){
              sum += +$(this).val();
          });
          $(".importe_bruto").val(sum);
        });
    }

  $('.datepicker_ff').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es'
      });
      $('.datepicker_fp').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es'
      });

  /**
     * Get the URL parameters
     * source: https://css-tricks.com/snippets/javascript/get-url-variables/
     * @param  {String} url The URL
     * @return {Object}     The URL parameters
     */
/*
    var getParams = function (url) {
      var params = {};
      var parser = document.createElement('a');
      parser.href = url;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
      }
      return params;
    };
    // Get parameters from the current URL
    let params = getParams(window.location.href);
    let id_proyecto;
    $(document).ready(function(){
      id_proyecto = params['id'];
      console.log("ID del proyecto: ", id_proyecto);
    });

    */
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
           url:"agregar_cotizacion.php",
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
            url:"ajax_cotizaciones.php",
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