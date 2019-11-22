$('#boton_volver, #boton_volver_abajo').click(function(){
	window.location.href = 'home.php';
});

$('#boton_nuevo_proveedor, #boton_nuevo_proveedor_abajo').click(function(){
	console.log("popup proveedor");
	$('#id_editar_en_nuevo').val(-1);
	$('#modal_nuevo').modal('show');
});

$('.editar').click(function(){
	var id = $(this).attr('data-id');
	console.log(id);
	$.ajax({
        url:"cargar_proveedor.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
							console.log(data);
							/*
             $('#nombre_cliente_editar').val(data.nombre);
             $('#razon_social_cliente_editar').val(data.razon_social);
             $('#cuit_cliente_editar').val(data.cuit);
             $('#tiempo_pago_cliente_editar').val(data.tiempo_pago);
             $('#dropdown_forma_pago_editar').val(data.forma_pago);
             $('#porcentaje_ocurrencia_editar').val(data.porcentaje_ocurrencia);
							*/
								 $('#id_editar_en_nuevo').val(id);
								 $('#servicio_nuevo').val(data.servicio);
								 $('#descripcion_nuevo').val(data.descripcion);
								 $('#razon_social_nuevo').val(data.razon_social);
								 $('#nombre_fantasia_nuevo').val(data.nombre_fantasia);
								 $('#cuit_nuevo').val(data.cuit);
								 $('#contacto_nuevo').val(data.contacto);
								 $('#telefono_nuevo').val(data.telefono);
								 $('#celular_nuevo').val(data.celular);
								 $('#mail_nuevo').val(data.mail);
								 $('#web_nuevo').val(data.website);
								 $('#ubicacion_nuevo').val(data.ubicacion);
								 $('#observaciones_nuevo').val(data.observaciones);
								 $('#iso_nuevo').val(data.iso);
								 $('#forma_pago_nuevo').val(data.forma_pago);
								 $('#tiempo_cobro_nuevo').val(data.tiempo_cobro);
								 $('#obligatoriedad_nuevo').val(data.obligatoriedad);
								 $('#descripcion_pago_nuevo').val(data.descripcion_pago);
             $('#modal_nuevo').modal('show');
             console.log("id del proveedor: ", data.id_proveedor, id);
        },
						error: function(error){
							console.log(error);
						},
						beforeSend: function(){
							console.log(this.url);
						}
   });
});

function escapar(cadena){
	return cadena.replace(/&/g,'%26');
}


$('#guardar_nuevo_proveedor').click(function(event){
	var id = $("#id_editar_en_nuevo").val();
	var servicio = escapar($("#servicio_nuevo").val());
	var descripcion = escapar($("#descripcion_nuevo").val());
	var razon_social = escapar($("#razon_social_nuevo").val());
	var nombre_fantasia = escapar($("#nombre_fantasia_nuevo").val());
	var cuit = $("#cuit_nuevo").val();
	var contacto = escapar($("#contacto_nuevo").val());
	var telefono = $("#telefono_nuevo").val();
	var celular = $("#celular_nuevo").val();
	var mail = $("#mail_nuevo").val();
	var web = $("#web_nuevo").val();
	var observaciones = escapar($("#observaciones_nuevo").val());
	var ubicacion = escapar($("#ubicacion_nuevo").val());
	var iso = $("#iso_nuevo").val();
	var forma_pago = escapar($("#forma_pago_nuevo").val());
	var descripcion_pago = escapar($("#descripcion_pago_nuevo").val());
	var tiempo_cobro = $("#tiempo_cobro_nuevo").val();
	var obligatoriedad = $("#obligatoriedad_nuevo").val();
	console.log("Id ",id);

	var url = (id < 0) ? "agregar_proveedor.php" : "editar_proveedor.php";
	console.log("url ", url);

	var dataString = 'id='+id+'&servicio='+servicio+'&descripcion='+descripcion+'&razon_social='+razon_social+'&nombre_fantasia='+nombre_fantasia+'&cuit='+cuit+'&contacto='+contacto+'&telefono='+telefono+'&celular='+celular+'&mail='+mail+'&web='+web+'&observaciones='+observaciones+'&ubicacion='+ubicacion+'&iso='+iso+'&forma_pago='+forma_pago+'&descripcion_pago='+descripcion_pago+'&tiempo_cobro='+tiempo_cobro+'&obligatoriedad='+obligatoriedad;

	console.log(dataString);
	$.ajax({
         url:url,
         method:"POST",
         data: dataString,
         success:function(data){
									$('#modal_nuevo').modal('hide');
									window.location.reload(true);
         },
							 beforeSend:function(){
								 console.log("Enviando datos a ", this.url);
							 }
    });
});

$('.eliminar').click(function(){
	$('#modal_eliminar').modal('show');
	var id = $(this).attr('data-id');
	$('#boton_eliminar_cliente').click(function(){
		console.log(id);
		$.ajax({
            url:"eliminar_proveedor.php",
            method:"POST",
            data:{id:id},
            success:function(data){
            	$('#modal_eliminar').modal('hide');
								window.location.reload();
            },
							error:function(error){
								console.log(error);
							},
							beforeSend:function(){
								console.log("eliminando ",this.url);
							}
       });
	});
});

$(".disponibilidad_proveedor").change(function(){
	var id_proveedor = $(this).attr('data-id');
	var disponibilidad = $(this).val();
	$.ajax({
        url:"disponibilidad_proveedor.php",
        method:"POST",
        data:'id_proveedor='+id_proveedor+'&disponibilidad='+disponibilidad,
        success:function(data){

        }
   });
});

$('.ver2').click(function(){
    var id = $(this).attr('data-id');
    console.log("Click id: ",id);
    $.ajax({
        url:"cargar_proveedor.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            $('#ver_servicio').val(data.servicio);
            $('#ver_descripcion').val(data.descripcion);
            $('#ver_razon_social').val(data.razon_social);
			$('#ver_nombre_fantasia').val(data.nombre_fantasia);
            $('#ver_cuit').val(data.cuit);
            $('#ver_contacto').val(data.contacto);
            $('#ver_telefono').val(data.telefono);
            $('#ver_celular').val(data.celular);
            $('#ver_mail').val(data.mail);
            $('#ver_web').val(data.website);
            $('#ver_observaciones').val(data.observaciones);
            $('#ver_ubicacion').val(data.ubicacion);
            $('#ver_iso').val(data.iso);
            $('#ver_forma_pago').val(data.forma_pago);
            $('#ver_forma_pago').attr("disabled", true);
            $('#ver_descripcion_pago').val(data.descripcion_pago);

            $("#boton_enviar_mail").click(function(){
            	window.location="mailto:"+data.mail;
            });

            $("#boton_visitar_sitio").click(function(){
            	window.location.href=data.website;
            });

            $('#modal_ver').modal('show');
        }
   });
});