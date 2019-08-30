const reIncompleto = /^(?:\d{0,4}|\d{4}-\d{0,8})$/;

function completarfactura(num) {
  //console.log(">>> En completarfactura: ", num);
    if (reIncompleto.test(num)){
    // Si faltan dígitos completa con ceros
    let cero = "0000-00000000";
    return num + cero.slice(num.length,);
  } else {
    //console.log("numero malo!");
  }
}

function puntearTextofactura(facTxt){
  num = facTxt;
  let re = reIncompleto;
  if (!re.test(num)) {
    //console.log("En puntear, cambiando ", num);
    // Remueve cualquier no-dígito
    num = num.replace(/\D/g,'');
    //console.log("sacando dígitos extraños ", num);
    // Si hay cuatro dígitos desde el inicio, les agrega un guión atrás
    num = num.replace(/^(\d{4})/,"$1-");
    //console.log("agregando '-' ", num);
    // Si hay más de 12 dígitos, trunca
    num = num.replace(/^(\d{4}-\d{8}).*$/,"$1")
    //console.log(".... resultado: ", num);
  } else {
    //console.log(".... ", num, " no precisó modificacion.");
  }
  return num;
}

function puntearfactura(txBox, e=null){
  if (e!==null&&(e.keyCode<=13||e.keyCode==32||46<=e.keyCode)){
    if('value' in txBox){
      //console.log("En puntearfactura ", txBox.value);
      // Cuenta los dígitos delante del cursor
      let sel = txBox.selectionStart;
      let pos = 0;
      if (sel>0){
        let mat = txBox.value.slice(0,sel).match(/[0-9]/g);
        pos = mat!==null ? mat.length : 0;
        //console.log("cursor ", pos);
      }
      txBox.value = puntearTextofactura(txBox.value);
      // Reubica el cursor
      let q = 0;
      if (pos>0){
        while (q<txBox.value.length && ( /[0-9]/g.test(txBox.value.slice(0,q+1)) ? txBox.value.slice(0,q+1).match(/[0-9]/g).length <= pos : true )) {
          q += 1;
        }
      }
      //console.log("final cursor: ",  q);
      txBox.setSelectionRange(q, q);
      //console.log("Final en puntearfactura ", txBox.value);
    }
  }
}

function abandonarfactura(txBox, e=null){
  if ('value' in txBox){
    //puntear(txBox, e);
    let num = puntearTextofactura(txBox.value);
    num = completarfactura(num);
    txBox.value = num;
    //console.log("Final en abandonarfactura: ", txBox.value);
  } else {
    let num = $(txBox).text();
    num = puntearTextofactura(num);
    num = completarfactura(num);
    $(txBox).text(num);
    //console.log("Final en abandonarfactura (para no-inputs): ", $(txBox).text());
  }
}

$(document).ready(function(){
  $(".factura").on({
    input: function(event) {
      puntearfactura(this, event);
    },
    keyup: function(event) {
      puntearfactura(this, event);
    },
    change: function(event) {
      abandonarfactura(this,event);
    },
    blur: function(event) {
      abandonarfactura(this, event);
    },
    dblclick: function() {
      this.selectionStart=0;
      this.selectionEnd=this.value.length;
      this.focus();
    }
  });
  $(".factura").each(function(){
    $(this).attr('placeholder','0000-00000000');
    abandonarfactura(this);
  });
});
