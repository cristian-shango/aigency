const rePunteadoIncompleto = /^[+-]?(?:0|[1-9][0-9]{0,2}(?:\.[0-9]{3})*)(,[0-9]*)?$/;

function completar(num) {
  //console.log(">>> En completar: ", num);
  // Si no termina con coma y dígitos se le agrega la coma con al menos dos ceros
  if (!/,\d*$/.test(num)) num += ',00';
  else num += '00'
  //console.log(">>> con ceros ", num);
  // Se desccarta todo lo q esté detrás del segundo dígito decimal
  num = num.replace(/(,[0-9]{2})[0-9]*$/,'$1').replace(/^,/, '0,');
  //console.log(">>> Final en completar:", num);
  return num;
}

function puntearTexto(numTxt){
  num = numTxt;
  let re = rePunteadoIncompleto;
  if (!re.test(num)) {
    //console.log("En puntear, cambiando ", num);
    // Captura cualquier "+" o "-" inicial
    let signo = num.match(/^\s*([+-]).*$/);
    signo = signo!==null ? signo[1] : "";
    // Remueve cualquier no-dígito ni "." o "," del inicio
    num = num.replace(/[^0-9\.,]/g,'');
    //console.log("sacando dígitos extraños ", num);
    // Remueve "." o "," que no esté seguido por dígitos hasta el final
    num = num.replace(/\D+(?!\d*$)/g,'').replace(".", ",");
    //console.log("sacando comas no decimales ", num);
    // Si el primcipio es no-dígito agrega un 0
    if (/^[^0-9]/.test(num)) {
      num = '0'+num;
    }
    //console.log("agregando cero si empieza en no-dígito ", num);
    // Si hay ceros delante, removerlos y ajustar la cantidad de dígitos (pos)
    let rz = /^0+(?=[0-9])/;
    if (rz.test(num)) {
      //console.log(rz.exec(num));
      let zeros = rz.exec(num).length;
      num = num.replace(rz,'');
      //pos -= zeros;
    }
    //console.log("sacando ceros del frente de mas ", num);
    // Iterativamente coloca un punto atrás de cada dígito q tenga exactamente 3 dígitos detrás.
    dot = /(^\d+)(?=\d{3}\b)/;
    while (dot.test(num)) {
      num = num.replace(dot, '$1.');
    }
    // Finalmente re-agrega el signo
    num = signo+num;
    //console.log("....resultado: ", num);
  } else {
    //console.log(".... ", num, " no precisó modificacion.");
  }
  return num;
}

function puntear(txBox, e=null){
  if('value' in txBox){
    //console.log("En puntear ", txBox.value);
    // Cuenta los dígitos delante del cursor
    let sel = txBox.selectionStart;
    let pos = 0;
    if (sel>0){
      let mat = txBox.value.slice(0,sel).match(/[0-9]/g);
      pos = mat!==null ? mat.length : 0;
      //console.log("cursor ", pos);
      // Si me estaba moviendo a la izquierda y cruzo un no-dígito disminuyo la posicion
      if (e!==null&&e.keyCode==37) {
        //console.log("retrocediendo");
        let s = txBox.selectionStart;
        //console.log("selection start ", s, txBox.value.slice(s,s+1));
        if (/[^0-9]/.test(txBox.value.slice(s,s+1))) {
          //console.log(pos);
          pos -= 1;
          //console.log(pos);
        }
      }
    }
    txBox.value = puntearTexto(txBox.value);
    // Reubica el cursor
    let q = 0;
    if (pos>0){
      while (q<txBox.value.length && ( /[0-9]/g.test(txBox.value.slice(0,q+1)) ? txBox.value.slice(0,q+1).match(/[0-9]/g).length <= pos : true )) {
        q += 1;
      }
    }
    //console.log("final cursor: ",  q);
    txBox.setSelectionRange(q, q);
  }
}

function abandonar(txBox, e=null){
  if ('value' in txBox){
    //puntear(txBox, e);
    let num = puntearTexto(txBox.value);
    num = completar(num);
    txBox.value = num;
    //console.log("Final en abandonar (para inputs): ", txBox.value);
  } else {
    let num = $(txBox).text();
    num = puntearTexto(num);
    num = completar(num);
    $(txBox).text(num);
    //console.log("Final en abandonar (para no-inputs): ", $(txBox).text());
  }
}

function enPegado(txBox, e){
  e.preventDefault();
  // access the clipboard using the api
  let pastedData = e.originalEvent.clipboardData.getData('text');
  //console.log("paste: ", pastedData);
  pastedData = pastedData.replace(/^\s*([+-]?\s*[0-9]+[\.,][0-9]{2})[0-9]*\s*$/,'$1');
  //console.log("paste despues: ", pastedData);
  //e.originalEvent.clipboardData.setData('text', pastedData);
  let pos1 = txBox.selectionStart;
  let pos2 = txBox.selectionEnd;
  txBox.value = txBox.value.slice(0,pos1)+pastedData+txBox.value.slice(pos2,);
  abandonar(txBox, e);
}

function pasarafloat(strValue) {
  //console.log("Pasando a float ", strValue, typeof strValue);
  let re = /^\s*[+-]?\s*(?:0|[1-9][0-9]{0,2}(?:\.[0-9]{3})*)(?:,[0-9]*)*\s*$/;
  let v = (typeof strValue == "string" && re.test(strValue)) ? strValue.replace(/\.(?![0-9]{0,2}$)|\s+/g,'').replace(",",".") : strValue;
  //console.log("      devuelve ", parseFloat(v));
  return parseFloat(v);
}

function bienpunteado(strValue) {
  let re = /^[+-]?(?:0|[1-9][0-9]{0,2}(?:.[0-9]{3})*),[0-9]{2}$/;
  return re.test(strValue);
}

function asociareventonumerable() {
  $(".numerable").on({
    input: function(event) {
      puntear(this, event);
    },
    keyup: function(event) {
      puntear(this, event);
    },
    change: function(event) {
      abandonar(this,event);
    },
    blur: function(event) {
      abandonar(this, event);
    },
    paste: function(event) {
      enPegado(this, event);
    },
    dblclick: function() {
      this.selectionStart=0;
      this.selectionEnd=this.value.length;
      this.focus();
    }
  });
}

$(document).ready(function(){
  asociareventonumerable();
  $(".numerable").each(function(){abandonar(this);})
});
