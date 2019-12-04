/*$(document).ready(function(){
    var suma_costo_presupuestado = 0;
    $('.valor_costo_presupuestado').each(function(){
        suma_costo_presupuestado += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        console.log(suma_costo_presupuestado);
        var this_input_box = document.getElementById("costo_presupuesto_total");
      this_input_box.placeholder = suma_costo_presupuestado;
    });

    var valor_saldo_total = 0;
    $('.valor_saldo_total').each(function(){
        valor_saldo_total += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        console.log(valor_saldo_total);
        var this_input_box = document.getElementById("saldo_total");
      this_input_box.placeholder = valor_saldo_total;
    });

    var valor_precio_cliente = 0;
    $('.valor_precio_cliente').each(function(){
        valor_precio_cliente += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
        console.log(valor_precio_cliente);
        var this_input_box = document.getElementById("precio_total");
      this_input_box.placeholder = valor_precio_cliente;
    });
  });*/

  $("#boton_volver").click(function(){
    window.location.href = "home.php";
  });

  $('#boton_guardar_proyecto').click(function(event){

    var cliente = $("#dropdown_cliente_nuevo").val();
    var tipo_cotizacion = $("#dropdown_tipo_cotizacion_nuevo").val();
    var subtipo_cotizacion = $("#dropdown_subtipo_cotizacion_nuevo").val();
    var nombre = $("#nuevo_proyecto").val();
    var producto = $("#nuevo_producto").val();
    var detalle = $("#nuevo_detalle").val();
    var costo_presupuestado = $("#nuevo_costo_presupuestado").val();
    var detalle = $("#nuevo_detalle").val();
    var nuevo_fecha_entrega = $("#nuevo_fecha_entrega").val();
    var nuevo_fecha_envio = $("#nuevo_fecha_envio").val();
    var nuevo_precio_cliente = $("#nuevo_precio_cliente").val();

    var hora_interno = $("#hora_interno").val();
    var minutos_interno = $("#minutos_interno").val();

    var hora_cliente = $("#hora_cliente").val();
    var minutos_cliente = $("#minutos_cliente").val();

    var dataString = 'nombre='+nombre+'&producto='+producto+'&cliente='+cliente+'&detalle='+detalle+'&tipo_cotizacion='+tipo_cotizacion+'&subtipo_cotizacion='+subtipo_cotizacion+'&costo_presupuestado='+costo_presupuestado+'&nuevo_fecha_entrega='+nuevo_fecha_entrega+'&nuevo_fecha_envio='+nuevo_fecha_envio+'&nuevo_precio_cliente='+nuevo_precio_cliente+'&hora_interno='+hora_interno+'&minutos_interno='+minutos_interno+'&hora_cliente='+hora_cliente+'&minutos_cliente='+minutos_cliente;

    console.log(dataString);
    $.ajax({  
      url:"agregar_proyecto.php",  
      method:"POST",
      data: dataString,
      success:function(data){  
        $('#modal_nuevo_proyecto').modal('hide');
        window.location.reload();
      }  
    });
  });

  $('.editar').click(function(){
    var id = $(this).attr('data-id');
    console.log(id);
    $.ajax({  
      url:"cargar_proyecto.php",  
      method:"POST",  
      data:{id:id},
      dataType:"json",
      success:function(data){
        $('#detalle_editar_proyecto').trumbowyg('html', data.detalle);
        $('#nombre_editar_proyecto').val(data.nombre_proyecto);
        $('#producto_editar_proyecto').val(data.producto_proyecto);
        $('#cliente_dropdown_editar_proyecto').val(data.cliente);
        //$('#detalle_editar_proyecto').val(data.detalle);
        $('#editar_costo_presupuestado').val(data.costo_presupuestado);
        $('#id_editar_proyecto').val(data.id);
        $('#precio_cliente_editar_proyecto').val(data.precio);
        $('#fecha_entrega_editar_proyecto').val(data.fecha_entrega);
        $('#fecha_envio_editar_proyecto').val(data.fecha_envio);
        $('#editar_consumido').val(data.consumido);
        $('#hora_interno_editar').val(data.hora_interno);
        $('#minutos_interno_editar').val(data.minutos_interno);
        $('#hora_cliente_editar').val(data.hora_cliente);
        $('#minutos_cliente_editar').val(data.minutos_cliente);
        $('#modal_editar_proyecto').modal('show');
        $('#dropdown_tipo_cotizacion_editar').val(data.tipo_cotizacion);
        $('#dropdown_subtipo_cotizacion_editar').val(data.subtipo_cotizacion);
      }  
    }); 
  });

  $('.click_adicional').click(function(){
    id = $(this).data("id");
        console.log(id);
        window.location = "ver_adicionales.php?id="+id;

    /*var id = $(this).attr('data-id');
    console.log(id);
    $.ajax({  
              url:"cargar_adicional.php",  
              method:"POST",  
              data:{id:id},
              dataType:"json",
              success:function(data){
                $("#mostrar_adicionales").html(data);
                  $('#modal_solicitar_adicional').modal('show');
              }  
         }); */
  });

  $('#boton_editar_proyecto').click(function(event){        
    var cliente = $("#cliente_dropdown_editar_proyecto").val();
    var nombre = $("#nombre_editar_proyecto").val();
    var producto = $("#producto_editar_proyecto").val();
    var detalle = $("#detalle_editar_proyecto").val();
    var costo_presupuestado = $("#editar_costo_presupuestado").val();
    var id = $("#id_editar_proyecto").val();
    var fecha_entrega = $("#fecha_entrega_editar_proyecto").val();
    var fecha_envio = $("#fecha_envio_editar_proyecto").val();
    var precio_cliente = $("#precio_cliente_editar_proyecto").val();
    var consumido = $('#editar_consumido').val();
    var tipo_cotizacion = $("#dropdown_tipo_cotizacion_editar").val();
    var subtipo_cotizacion = $("#dropdown_subtipo_cotizacion_editar").val();

    var hora_interno = $("#hora_interno_editar").val();
    var minutos_interno = $("#minutos_interno_editar").val();

    var hora_cliente = $("#hora_cliente_editar").val();
    var minutos_cliente = $("#minutos_cliente_editar").val();

    costo_presupuestado = parseFloat(costo_presupuestado);
    precio_cliente = parseFloat(precio_cliente);
    consumido = parseFloat(consumido);
    
    saldo = costo_presupuestado - consumido;

    

    var dataString = 'nombre='+nombre+'&cliente='+cliente+'&producto='+producto+'&detalle='+detalle+'&costo_presupuestado='+costo_presupuestado+'&fecha_entrega='+fecha_entrega+'&fecha_envio='+fecha_envio+'&precio_cliente='+precio_cliente+'&id='+id+'&saldo='+saldo+'&tipo_cotizacion='+tipo_cotizacion+'&subtipo_cotizacion='+subtipo_cotizacion+'&hora_interno='+hora_interno+'&minutos_interno='+minutos_interno+'&hora_cliente='+hora_cliente+'&minutos_cliente='+minutos_cliente;
    console.log(dataString);
    console.log(precio_cliente);
    $.ajax({  
                 url:"editar_proyecto.php",  
                 method:"POST",
                 data: dataString,
                 success:function(data){  
        $('#modal_editar_proyecto').modal('hide');
        window.location.reload();
                 }  
            });
  });

  $('#boton_eliminar_proyecto').click(function(){
    $('#modal_eliminar').modal('show');
    var id = $(this).attr('data-id');
    var nombre = $(this).attr('data-nombre');
    $('#boton_eliminar_cliente').click(function(){
      console.log(id);
      $.ajax({  
                url:"eliminar_proyecto.php",  
                method:"POST",  
                data:'id='+id+'&nombre='+nombre,
                success:function(data){
                  $('#modal_eliminar').modal('hide');
          window.location.reload();
                }  
           }); 
    });
  });

  $('#boton_aprobar_adicional').click(function(event){        
    var monto_adicional = $("#mostrar_monto_adicional").val();
    var id_proyecto = $('#id_proyecto_adicional').val();
    monto_adicional = parseFloat(monto_adicional);
    console.log(monto_adicional);
    var dataString = 'monto_adicional='+monto_adicional+'&id_proyecto='+id_proyecto;

    $.ajax({  
                 url:"aprobar_adicional.php",  
                 method:"POST",
                 data: dataString,
                 success:function(data){  
        $('#modal_solicitar_adicional').modal('hide');
        //window.location.reload();
        var estado = "NUEVO";
        var id = $('#id_proyecto_adicional').val();
        console.log(estado);
        $.ajax({  
                  url:"cambiar_estado.php",  
                  method:"POST",  
                  data:'id='+id+'&estado='+estado,
                  success:function(data){
            window.location.reload();
                  }  
             });
                 }  
            });
  });

  $('#boton_nuevo_cliente').click(function(){
    var frm = document.getElementsByName('nuevo_cliente')[0];
     frm.reset(); 
  });

  $('#agregar_cliente').click(function(){
    $('#modal_nuevo_proyecto').modal('hide');
    $('#modal_nuevo_cliente').modal('show');
  });

  
  $('#cancelar_cliente_nuevo').click(function(){
    $('#modal_nuevo_cliente').modal('hide');
    $('#modal_nuevo_proyecto').modal('show');
  });

  $('#boton_agregar').click(function(event){        
    var nombre = $("#nombre_cliente_nuevo").val();
    var razon_social = $("#razon_social_cliente_nuevo").val();
    var cuit = $("#cuit_cliente_nuevo").val();
    var id = $("#id").val();
    var tiempo_pago = $("#tiempo_pago_cliente_nuevo").val();
    var forma_pago = $("#dropdown_forma_pago_nuevo").val();
    var porcentaje_ocurrencia = $("#porcentaje_ocurrencia_nuevo").val();

    var nuevo_oc = document.getElementById("nuevo_oc");
    if (nuevo_oc.checked) {
      nuevo_oc = "SI";
    } else {
      nuevo_oc = "NO";
    };

    var dataString = 'nombre='+nombre+'&razon_social='+razon_social+'&cuit='+cuit+'&id='+id+'&tiempo_pago='+tiempo_pago+'&forma_pago='+forma_pago+'&porcentaje_ocurrencia='+porcentaje_ocurrencia+'&nuevo_oc='+nuevo_oc;

    console.log(dataString);
    $.ajax({  
                 url:"agregar_cliente.php",  
                 method:"POST",
                 data: dataString,
                 success:function(data){  
        $('#modal_nuevo_cliente').modal('hide');
        window.location.reload(true);
        $('#modal_nuevo_proyecto').modal('show');
                 }  
            });
  });

 /* $('.datepicker_fecha_entrega').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd/mm/yyyy',
    locale: 'es-es'
  });
  $('.datepicker_fecha_envio').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd/mm/yyyy',
    locale: 'es-es'
  });
  $('.datepicker_fecha_entrega_editar').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd/mm/yyyy',
    locale: 'es-es'
  });
  $('.datepicker_fecha_envio_editar').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd/mm/yyyy',
    locale: 'es-es'
  });*/

  $(".ver").click(function() {
    id = $(this).data("id");
    estado = $(this).data("estado");
    console.log(id);
    console.log(estado);
    if (estado == "4" || estado == "5"){
      window.location = "cotizacion_confirmada.php?id="+id;
    } else{
      window.location = "cotizacion_entregada.php?id="+id;
    }
  });

  $('#nuevo_detalle').trumbowyg({
    lang: 'es_ar',
    autogrow: true
  });

  $('#detalle_editar_proyecto').trumbowyg({
    lang: 'es_ar',
    autogrow: true
  });