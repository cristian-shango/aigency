/*

*/


Object.compare = function (obj1, obj2) {
  //console.log("comparando ");
  //console.log(obj1);
  //console.log("con");
  //console.log(obj2);
  if (!obj1||!obj2) return false;

	//Loop through properties in object 1
	for (var p in obj1) {
		//Check property exists on both objects
		if (obj1.hasOwnProperty(p) !== obj2.hasOwnProperty(p)) return false;

		switch (typeof (obj1[p])) {
			//Deep compare objects
			case 'object':
				if (!Object.compare(obj1[p], obj2[p])) return false;
				break;
			//Compare function code
			case 'function':
				if (typeof (obj2[p]) == 'undefined' || (p != 'compare' && obj1[p].toString() != obj2[p].toString())) return false;
				break;
			//Compare values
			default:
				if (obj1[p] != obj2[p]) return false;
		}
	}

	//Check object 2 for any extra properties
	for (var p in obj2) {
		if (typeof (obj1[p]) == 'undefined') return false;
	}
	return true;
};

var cotizacion_pagos = (function(){

  let pagos = {};
  let pagosBackup = {};
  let montos = {};
  let totales = {};
  let suma_porciento = {};

  const pagoVacio = { plazo:'', porcentaje:100, forma:'', fecha1:'', fecha2:'' };
  const pagoDefault = { plazo: '90', porcentaje: 100, forma:'', fecha1:'', fecha2:'' };

  const url_guardar_pago="/ajax/cotizacion_pagos/pagos_guardar.php";
  const url_pagos_traer="/ajax/cotizacion_pagos/pagos_traer.php";
  const url_traer_forma="/ajax/cotizacion_pagos/pagos_traer_forma.php";
  const url_traer_plazo ="/ajax/cotizacion_pagos/pagos_traer_plazo.php";

  let forma_pago = {};
  let plazo_pago = undefined;

  let trayendo_plazo;
  let trayendo_forma;
  let trayendo_pagos;
  let guardando_pagos;

  // Cada registro con pagos cargados tiene un contador en el objeto proximos_pagos
  let proximos_pagos = {};

  let $data_modelo = $();

  function leer_data_modelo(html=document) {
    $data_modelo = $($(html).find(".cotizacion_pagos_data")[0]);
    //bind_eventos($data_modelo[0]);
  }
  function $container(registro){
    return $(".cotizacion_pagos_container[data-id_registro="+registro+"]");
  }
  function $group(registro){
    return $(".cotizacion_pagos_group[data-id_registro="+registro+"]");
  }
  function agregar_proximo_pago(registro){
      //console.log("Agregando pago para registro ", registro);
    let id_pagos = Object.keys(pagos[registro]);
    if (id_pagos.length==0) {
      proximos_pagos[registro] = 0;
    } else {
      proximos_pagos[registro] = Number(id_pagos.reduce(function(maxidpago, idpago){
                                            return maxidpago < idpago ? idpago : maxidpago;
                                          })) + 1;
      //console.log("proximo ", proximos_pagos[registro]);
    }
  }

  // Da funcionalidad al botón "borrar" y los eventos "change" de cada input
  function bind_eventos(html=document){
    //console.log(">>>>> Binding eventos");
    $(html).find(".cotizacion_pagos_borrar").click(function(){
      //console.log("Borrando ", $(this).closest(".cotizacion_pagos_data")[0])
      borrar_esto($(this).closest(".cotizacion_pagos_data")[0]);
    });
    $(html).find(".cotizacion_pagos_forma, .cotizacion_pagos_porcentaje, .cotizacion_pagos_plazo, .cotizacion_pagos_fecha1, .cotizacion_pagos_fecha2").on({
      change: function(){
        actualizar_esto(this);
      }
    });
  }

  function leer_tag(tag) {
    return tag ? ("value" in tag ? tag.value : $(tag).text()) : undefined;
  }
  function escribir_tag(tag, valor) {
    //console.log("escribiendo ", valor, " en ", tag);
    if ("value" in tag) tag.value = valor;
    else ($(tag).text(valor));
  }

  function traer_forma(callback = (function(){})) {
    trayendo_forma = $.ajax({
      url:url_traer_forma,
      dataType:"json",
      success:function(data){
        forma_pago = data;
        let $formas = $("<formas></formas>");
        let $op = $(".cotizacion_pagos_forma").children().first().clone();
        $op.clone().val('').text('forma...').appendTo($formas);
        Object.keys(data).forEach(function(forma){
          $op.clone().val(forma).text(data[forma]).appendTo($formas);
        });
        if ($data_modelo.length>0) {
          $op = $data_modelo.find(".cotizacion_pagos_forma").children().first().clone();
          let $data_modelo_forma = $data_modelo.find(".cotizacion_pagos_forma").empty();
          $op.clone().val('').text('forma...').appendTo($data_modelo_forma);
          Object.keys(data).forEach(function(forma){
            $op.clone().val(forma).text(data[forma]).appendTo($data_modelo_forma);
          });
          $data_modelo_forma.val('');
        }
        $(".cotizacion_pagos_forma").empty().append($formas.html()).each(function(ix, sel){
          let reg = $(sel).closest("[data-id_registro]").data("id_registro");
          if (reg){
            let pago = $(sel).closest("[data-id_pago]").data("id_pago");
            escribir_tag(sel, pagos[reg][pago].forma);
          } else escribir_tag(sel, "");
        });
        callback();
        console.log(forma_pago);
      },
      error:function(err){
        console.log("Error cargando formas de pago:");
        console.log(err);
      }
    });
  }

  function marcar_formas(registro){
    //console.log("Marcando formas para ", pagos[registro]);
    Object.keys(pagos[registro]).forEach(function(pago){
      $container(registro)
        .find("[data-id_pago="+pago+"] .cotizacion_pagos_forma")
        .val(pagos[registro][pago].forma);
    });
    //console.log("Formas marcadas en registro ", registro, ": ", pagos[registro]);
  }

  function popular_plazo_tag(tag){
    const reg = $(tag).closest("[data-id_registro]").data("id_registro");
    if (reg=="") {
      let $container = $(tag).closest(".cotizacion_pagos_container")
      let $op = $container.find(".cotizacion_pagos_plazo").first().children().first().clone();
      $container.find(".cotizacion_pagos_plazo").empty()
      Object.keys(plazo_pago).forEach(function(key){
        $op.clone().val(key).text(plazo_pago[key]).appendTo(this);
      }, $container.find(".cotizacion_pagos_plazo"));
      $container.find(".cotizacion_pagos_plazo").each(function(ix, sel){ escribir_tag(sel,""); });
    } else popular_plazo_registro(reg);
  }

  function popular_plazo_registro(registro){
    //console.log("Populando plazos en registro ", registro);
    let reg = registro;
    if (reg) {
      const prohibidos = Object.keys(pagos[reg]).map(function(pago){ return pagos[reg][pago].plazo; });
      let op = $(".cotizacion_pagos_plazo").children().first().clone();
      let key_plazos = Object.keys(plazo_pago);
      let pag = Object.keys(pagos[reg]);
      pag.forEach(function(pago){
        let $selPlazo = $("[data-id_registro="+reg+"] [data-id_pago="+pago+"] .cotizacion_pagos_plazo");
        $selPlazo.empty();
        key_plazos.forEach(function(plazo){
          if (plazo==pagos[reg][pago].plazo||!prohibidos.reduce(function(en,proh){return en||plazo==proh;},false)){
            let esteOp = $(op).clone()
                        .attr("value",plazo)
                        .text(plazo_pago[plazo]);
            $selPlazo.append(esteOp);
          }
        });
        $selPlazo.val(pagos[reg][pago].plazo);
      });
    }
  }

  function traer_plazo(callback = (function(){})) {
    //console.log("largo de plazo_pago ", plazo_pago==undefined, !trayendo_plazo);
    if (plazo_pago==undefined && !trayendo_plazo) {
      trayendo_plazo = $.ajax({
        url:url_traer_plazo,
        dataType:"json",
        success:function(data){
          plazo_pago = data;
          //console.log("Datos de plazo traidos ", data, plazo_pago)
          $(".cotizacion_pagos_plazo").each(function(ix,selPlazo){
            popular_plazo_tag(selPlazo);
          });
          Object.keys(pagos).forEach(function(reg){
            actualizar_monto(reg, actualizarTotales = false);
          });
          actualizar_totales();
          callback();
        },
        error:function(err){
          //console.log("Error cargando plazos de pago:");
          //console.log(err);
        }
      });
    } else {
      $(".cotizacion_pagos_plazo").each(function(ix,selPlazo){
        popular_plazo_tag(selPlazo);
      });
      Object.keys(pagos).forEach(function(reg){
        actualizar_monto(reg, actualizarTotales = false);
      });
      actualizar_totales();
    }
  }

  function leer_datos(html){
    // Precisa el tag con la clase "cotizacion_pagos_data"
    let pago_datos = {};
    pago_datos.registro = $(html).parents(".cotizacion_pagos_container").attr("data-id_registro");
    html = $(html).closest(".cotizacion_pagos_data")[0];
    pago_datos.id_pago = $(html).attr("data-id_pago");
    pago_datos.plazo = leer_tag($(html).find(".cotizacion_pagos_plazo")[0]);
    pago_datos.porcentaje = leer_tag($(html).find(".cotizacion_pagos_porcentaje")[0]);
    pago_datos.forma = leer_tag($(html).find(".cotizacion_pagos_forma")[0]);
    pago_datos.fecha1 = leer_tag($(html).find(".cotizacion_pagos_fecha1")[0]);
    pago_datos.fecha2 = leer_tag($(html).find(".cotizacion_pagos_fecha2")[0]);
    //console.log("datos leidos: ", pago_datos, " en ", html);
    return pago_datos;
  }

  function sumar_porciento(protoPagos) {
    let regs = Object.keys(protoPagos);
    regs.forEach(function(reg){
      let id_pagos = Object.keys(protoPagos[reg]);
      suma_porciento[reg] = id_pagos.reduce(function(pre, estepago){
                              return pre+Number(protoPagos[reg][estepago]['porcentaje']);
                            }, 0);
    });
    //console.log("Sumas ", suma_porciento);
    return suma_porciento;
  }

  function nohayotronuevo(registro){
    return Object.keys(pagos[registro]).reduce(function(nohay,estepago){
      return nohay && (pagos[registro][estepago].plazo!=="");
    }, true);
  }

  function agregar_nuevo_pago(registro) {
    if (nohayotronuevo(registro)){
        if (!pagos[registro] || !Object.keys(pagos[registro]).length) {
            pagos[registro] = { 0: pagoDefault };
            montos[registro] = {};
            proximos_pagos[registro] = 1;
            //console.log("montos: ", montos);
        } else {
            //console.log("Agregando pago en registro ", registro);
            //console.log(pagos[registro]);
            let prox_pago = proximos_pagos[registro]++;
            pagos[registro][prox_pago] = pagoVacio;
            pagos[registro][prox_pago].porcentaje = 100 - suma_porciento[registro];
            //console.log(pagos[registro]);
        }
        actualizar_registro(registro);
        return true;
    } else {
      //console.log("Ya hay un pago sin plazo definido");
      return false;
    }
  }

  function cargar_pago_registro(registro) {
    let $lista = $("[data-id_registro="+registro+"] .cotizacion_pagos_lista");
    $lista.find(".cotizacion_pagos_data").remove();
    //console.log("Cargando pagos ", pagos[registro], " en registro ", registro);
    //console.log("usando modelo ", $data_modelo);
    Object.keys(pagos[registro]).forEach(function(pago){
      //console.log("ahora en pago ", pago);
      $data = $data_modelo.clone().attr("data-id_pago", pago).appendTo($lista).each(function(ix, data){
          escribir_tag($(data).find(".cotizacion_pagos_porcentaje")[0], pagos[registro][pago].porcentaje);
          escribir_tag($(data).find(".cotizacion_pagos_fecha1")[0], pagos[registro][pago].fecha1);
          escribir_tag($(data).find(".cotizacion_pagos_fecha2")[0], pagos[registro][pago].fecha2);
      });
      // console.log("cargando...", $data, $data.find(".cotizacion_pagos_porcentaje")[0])
      // escribir_tag($data.find(".cotizacion_pagos_porcentaje")[0], pagos[registro][pago].porcentaje);
    });
  }

  function completitud(registro) {
      // Devuleve "vacio" si no hay pagos guardados, "parcial" si hay pagos incompletos
      // y "completo" si hay pagos por el 100% con todos los datos cargados.
      let datos = pagos[registro];
      //console.log(registro, datos);
      let hayPagos = Object.keys(datos).reduce(function(pre, pago){
                        return pre || datos[pago].plazo !== '';
                     }, false);
      //console.log("Completitud: porciento: ", suma_porciento[registro])
      return hayPagos ?
             ( suma_porciento[registro] == 100 &&
             Object.keys(pagos[registro]).reduce(function(completo, pago){
                 //console.log("pago ", pago, " plazo ", datos[pago].plazo, " forma ", datos[pago].forma);
                 return completo &&
                        (datos[pago].plazo == '' ||
                         datos[pago].forma !== '')
             }, true)
             ? "pagos_completo" : "pagos_parcial" )
             : "pagos_vacio";
  }

  function actualizar_completitud(html) {
      if (html){
          let reg = $(html).parents("[data-id_registro]").data("id_registro");
          let comp = completitud(reg);
          //console.log("el registro ", reg, " está ", comp);
          let clases = $(html).attr('class').split(/\s+/);
          clases.forEach(function(clase){
              if (/^pagos_/.test(clase)) $(html).removeClass(clase);
          });
          $(html).addClass(comp);
      }
  }

  function traer_pagos(id_proyecto=0, registro=0, callback = (function(){})) {
    trayendo_pagos = $.ajax({
      url:url_pagos_traer+"?id="+id_proyecto+"&reg="+registro,
      dataType:"json",
      success:function(data) {
        //console.log("Data cruda ", data);
        if (data.hasOwnProperty('data')){
          if (registro==0){
            Object.keys(data.data).forEach(function(reg){
              pagos[reg] = JSON.parse(data.data[reg]);
              suma_porciento[reg] = Object.keys(pagos[reg]).reduce(function(pre, pago){
                  return pre + Number(pagos[reg][pago].porcentaje);
              }, 0);
              agregar_proximo_pago(reg);
              montos[reg] = {};
            });
            $(".cotizacion_pagos_container").each(function(ix, container){
                let reg = $(container).data("id_registro");
                if (reg){
                    if (!pagos.hasOwnProperty(reg)) {
                        pagos[reg] = {0: pagoVacio};
                        agregar_proximo_pago(reg);
                        montos[reg] = {};
                    }
                    $container(reg).find(".cotizacion_pagos_ver_interfaz")
                        .each(function(ix, boton){ actualizar_completitud(boton); });
                    //console.log("Traer_pagos sin registro >>> montos: ", montos);
                    cargar_pago_registro(reg);
                } else {
                // resolver!
                }
            });
            traer_forma();
            traer_plazo();
            pagosBackup = jQuery.extend(true, {}, pagos);
            sumar_porciento(pagos);
            bind_eventos()
            Object.keys(pagos).forEach(function(reg){ enableGuardar(reg); });
          } else {
            //Promise.all([traer_forma(), traer_plazo()]).then(function(){
              console.log("Pagos traidos por registro ", registro, ": ", data['data']);
              pagos[registro] = data.hasOwnProperty('data') && data['data'].hasOwnProperty(registro) ?
                                JSON.parse(data['data'][registro]) : {0:pagoVacio};
              montos[registro] = {};
              //console.log("Traer_pagos con registro >>> montos: ", montos);
              pagosBackup[registro] = jQuery.extend(true, {}, pagos[registro]);
              actualizar_registro(registro);
              enableGuardar(registro);
              $container(registro).find(".cotizacion_pagos_ver_interfaz")
                .each(function(ix, boton){ actualizar_completitud(boton); });
            //});
          }
        } else {
          console.log("Trayendo pagos. No se recibió ningún dato!", data);
          pagos = {};
        }/*
        console.log("Pagos traidos: ", pagos);
        if (registro > 0) cargar_pagos(registro);*/
        callback();
      },
      error:function(err) {
        //console.log("Error trayendo pagos.");
        //console.log(err.responseText);
      },
      beforeSend:function() {
        //console.log("Enviando pedido de pagos a ", this.url);
      }
    });
  }

  function guardable(registro="guardable") {
    let datos = pagos[registro];
    Object.keys(datos).forEach(function(pago){
      if (datos[pago].plazo=='') {
        delete datos[pago];
      }
    });
    if (Object.keys(datos).length==0) datos = { 0: pagoDefault };
    console.log("pago guardado en registro ", registro, " ", datos);
    return JSON.stringify(datos);
  }

  function guardar_esto(html) {
    //console.log("guardando....", html);
    let registro = leer_datos(html).registro; // Sólo importa el registro, por lo q no preciso pasar el DOMelement con los datos
    //console.log("Con el registro ", registro);
    let jsondatos = guardable(registro);
    //console.log("Guardando los datos ", jsondatos);
    guardar_pago(registro, jsondatos);
  }

  function guardar_pago(reg, jsonpagos, callback=(function(){})) {
    if (!guardando_pagos){
      guardando_pagos = $.ajax({
        url:url_guardar_pago+"?id="+reg,
        method:"post",
        data:{ pagos: jsonpagos },
        dataType:"json",
        success:function(response){
          //console.log(response);
          traer_pagos(0, reg)
          callback();
        },
        error:function(err){
          //console.log("Error guardando pagos.", err);
        },
        beforeSend:function(){
          //console.log("Enviando pedido a ", this.url, "data: ", this.data);
        },
        complete:function(){ guardando_pagos = undefined; }
      });
    } else {
      //console.log("Ya se están guardando datos");
    }
  }

  function borrar_esto(html) {
      let $listahtml = $(html).closest(".cotizacion_pagos_lista");
      let datohtml = $(html).closest(".cotizacion_pagos_data")[0];
      let pago = leer_datos(datohtml);
      //console.log("Borrando ", pago);
      let reg = pago.registro;
      if (pagos[reg].hasOwnProperty(pago.id_pago)) {
          $(datohtml).remove();
          delete pagos[reg][pago.id_pago];
          if (Object.keys(pagos[reg]).length==0) {
              agregar_nuevo_pago(reg);
          }
          actualizar_registro(reg);
      }
      enableGuardar(reg);
  }

  function actualizar_totales(){
      totales = {};
      //console.log("++++++Actualizando totales ", montos);
      Object.keys(montos).forEach(function(reg){
          //console.log("Checkbox ",reg,$group(reg).find(".cotizacion_pagos_checked")[0].checked);
          let chk = $group(reg).find(".cotizacion_pagos_checked")[0];
          if (reg!=="guardable" && chk && chk.checked) {
              Object.keys(montos[reg]).forEach(function(plazo){
                  if (totales.hasOwnProperty(plazo)) totales[plazo] += montos[reg][plazo];
                  else totales[plazo] = montos[reg][plazo];
              });
          }
      });
      //console.log("++++++Totales", totales);
      let $totales = $(".cotizacion_pagos_totales");
      let $modelo = $totales.children(".cotizacion_pagos_totales_plazo").first().clone();
      $totales.empty();
      $totales.append($modelo.clone().hide());
      Object.keys(totales).forEach(function(plazo){
          if (plazo&&plazo!=="guardable"){
              if (totales[plazo] && totales[plazo]>0){
                  let label = plazo==0 ? "" : "Pago a ";
                  label += plazo_pago[plazo];
                  let $agregar = $modelo.clone().attr("data-plazo", plazo).show();
                  $agregar.find(".cotizacion_pagos_totales_label").text(label);
                  escribir_tag($agregar.find(".cotizacion_pagos_totales_monto")[0], totales[plazo]);
                  $totales.append($agregar);
                  //console.log($agregar);
              }
              $totales.find(".numerable").each(function(ix,valor){ abandonar(valor); });
          }
      });
  }

  function actualizar_monto(registro, actualizarTotales = true){
    let $grupo = $group(registro);
    let $cont = $container(registro);
    //console.log("Actualizando montos en container ", $cont.parents("tr").find(".cotizacion_pagos_total"), "\n valor: ", leer_tag($cont.parents("tr").find(".cotizacion_pagos_total")[0]));
    let valor = pasarafloat(leer_tag($grupo.find(".cotizacion_pagos_total")[0]));
    //console.log("Valor ", valor, " registro ", registro);
    //console.log("Actualizando montos del registro ", registro, " con total = ", valor);
    Object.keys(montos[registro]).forEach(function(plazo){ montos[registro][plazo] = 0; });
    //console.log("Actualizar_monto >>> montos: ", montos);
    Object.keys(pagos[registro]).forEach(function(pago){
      let montopago = 0.01*valor*pagos[registro][pago].porcentaje;
      let totalpago = valor;
      //console.log("Actualizando monto para pago a ", pagos[registro][pago].plazo, " días");
      $cont.find("[data-id_pago="+pago+"] .cotizacion_pagos_monto").each(function(ix, monto){
          escribir_tag(monto, montopago);
      });

      $cont.find("[data-id_pago="+pago+"] .cotizacion_pagos_total").each(function(ix, monto){
        escribir_tag(monto, totalpago);
    });

      montos[registro][pagos[registro][pago].plazo] = montopago;
    });
    //console.log("Actualizar_monto final >>> montos: ", montos);
    $cont.find(".cotizacion_pagos_monto").each(function(ix,monto){ abandonar(monto); });
    if (actualizarTotales) actualizar_totales();
  }

  function actualizar_esto(html) {
    let htmlDatos = $(html).closest(".cotizacion_pagos_data");
            //console.log("html para guardar: ", htmlDatos)
    let datos = leer_datos(htmlDatos[0]);
            //console.log("datos leidos en actualizar_esto: ", datos);
    let protoPagos = jQuery.extend(true, {}, pagos);
    protoPagos[datos.registro][datos.id_pago] = {
      plazo: datos.plazo,
      porcentaje: datos.porcentaje,
      forma: datos.forma,
      fecha1: datos.fecha1,
      fecha2: datos.fecha2,
      fecha3: datos.fecha3
    }
    let su = sumar_porciento(protoPagos);
            //console.log(protoPagos, " da una suma actual: ", su);
    if (su[datos.registro]<=100){
      pagos = jQuery.extend(true, {}, protoPagos);
              //console.log("Actualizando registo ", datos.registro, ", id ",datos.id_pago, ": ", pagos[datos.registro][datos.id_pago]);
    } else {
              //console.log("Se superó el 100% ");
    }
            //console.log("ACTUALIZAR ESTO: Datos propuestos ", protoPagos);
    actualizar_registro(datos.registro);
    enableGuardar(datos.registro);
  }

  function enableGuardar(registro) {
    let $bot = $container(registro).find(".cotizacion_pagos_guardar")
    if (registro=="guardable"||Object.compare(pagos[registro], pagosBackup[registro])) {
      //console.log("Deshabilitando guardar");
      $bot.prop("disabled", true);
      $bot.addClass("btn-default");
      $bot.removeClass("btn-success");
    } else {
      //console.log("Habilitando guardar");
      $bot.prop("disabled", false);
      $bot.removeClass("btn-default");
      $bot.addClass("btn-success");
    }
  }

  function bind_boton_guardar() {
    $(".cotizacion_pagos_guardar").click(function(){
      //console.log("Guardando ", $(this).parents(".cotizacion_pagos_container").find(".cotizacion_pagos_lista"))
      $(this).find(".cotizacion_pagos_porcentaje").each(function(ix,porce){ actualizar_esto(porce); });
      guardar_esto($(this).parents(".cotizacion_pagos_container").find(".cotizacion_pagos_lista")[0]);
    });
  }

  function actualizar_registro(registro) {
      sumar_porciento(pagos);
      cargar_pago_registro(registro);
      popular_plazo_registro(registro);
      marcar_formas(registro);
      actualizar_monto(registro);
      $container(registro).each(function(ix, container){
          bind_eventos(container);
      })
  }

  function bind_totales(){
      $(".cotizacion_pagos_total").each(function(ix, htmlTotal){
          let $cont = $(htmlTotal).parents("tr").find(".cotizacion_pagos_container")
          let registro = $cont.data("id_registro");
          //console.log("Binding totales al registro ", registro);
          $(htmlTotal).attr("data-registro", registro)
          .off("change.cotizacion_pagos")
          .on("change.cotizacion_pagos", function(event){
              actualizar_monto(registro);
          });
      });/*
      $(".cotizacion_pagos_checked").each(function(ix, htmlCheck){
          let $cont = $(htmlCheck).parents("tr").find(".cotizacion_pagos_container")
          let registro = $cont.data("id_registro");
          $(htmlCheck).attr("data-registro", registro)
          .off("change.cotizacion_pagos")
          .on("change.cotizacion_pagos", function(event){
              actualizar_totales();
          });
      });*/
  }

  function bind_boton_cancelar() {
      $(".cotizacion_pagos_cancelar").click(function(){
          //console.log("Cancelando ");
          pagos = jQuery.extend(true, {}, pagosBackup);
          let reg = leer_datos(this).registro;
          actualizar_registro(reg);
          enableGuardar(reg);
      });
  }

  function bind_boton_nuevo_pagos() {
      $(".cotizacion_pagos_mostrar_agregar_pago").click(function(){
          agregar_nuevo_pago($(this).parents("[data-id_registro]").attr("data-id_registro"));
      });
  }

  // var avatar(function(){
  //     return undefined;
  // })();

  // Acá empieza la interfase
  return {
    inicio: function(id_proyecto=0){
        leer_data_modelo($("#cotizacion_pagos_avatar")[0]);
        bind_totales();
        traer_pagos(id_proyecto);
        bind_boton_guardar();
        bind_boton_nuevo_pagos();
        bind_boton_cancelar();
        $(".cotizacion_pagos_ver_interfaz").click(function(){
          $(this).siblings(".cotizacion_pagos_interfaz").modal('show');
        });
        //$(".cotizacion_pagos_interfaz").hide();
    }
    ,
    pagos: (function(){return pagos;})
    ,
    pagosBackup: (function(){return pagosBackup;})
    ,
    traer_pagos: (function(){
        function tp(id_proyecto=0){
          let registro = $(".cotizacion_pagos_container").attr("data-id_registro");
          traer_pagos(id_proyecto, registro);
        }
        return tp;
    })()
    ,
    guardable: guardable
    ,
    cargar_avatar: function(){
        let registro = $("#cotizacion_pagos_avatar .cotizacion_pagos_container").attr("data-id_registro");
        console.log("Cargando avatar con registro ", $("#cotizacion_pagos_avatar .cotizacion_pagos_container").attr("data-id_registro"));
        traer_pagos(0, registro);
        // $("#cotizacion_pagos_avatar .cotizacion_pagos_forma").each(function(ix, sel){
        //     let pago = $(sel).closest("[data-id_pago]").data("id_pago");
        //     if (pagos[registro][pago]){
        //       escribir_tag(sel, pagos[registro][pago].forma);
        //     } else escribir_tag(sel, "");
        // }
    }
    ,
    actualizar_esto: actualizar_esto
    ,
    guardar_esto: guardar_esto
    ,
    guardar_pago: guardar_pago
    ,
    borrar_esto: borrar_esto
    ,
    bind_boton_guardar: bind_boton_guardar
    ,
    bind_boton_nuevo_pagos: bind_boton_nuevo_pagos
    ,
    bind_boton_cancelar: bind_boton_cancelar
    ,
    cargar_modelo_de_datos: leer_data_modelo
  }
})();
