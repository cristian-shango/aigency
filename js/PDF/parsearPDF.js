function getRGB(color){
  //console.log(color+" "+color.indexOf('(') )
  let alfa = (color.indexOf('(')==4)&&(parseInt(color.slice(5,-1).split(',')[3])<128);
  //console.log(">>>>>>>>>>getRGB alfa: "+(color.indexOf('(')==4)+" && "+(parseInt(color.slice(5,-1).split(',')[3])<128)+"\n      "+color.slice(5, -1).split(',')[3]);
  let pRGB = color.slice(color.indexOf('(')+1,-1).split(',');
  let rgb = [parseInt(pRGB[0]), parseInt(pRGB[1]), parseInt(pRGB[2])];
  return { 'rgb': rgb, 'alfa': alfa };
}



function makeBox(tag, pdf_doc, offX, offY, scale) {
  let top = $(tag).offset().top + parseInt(offY);
  let left = $(tag).offset().left + parseInt(offX);
  let alto = $(tag).height();
  let anch = $(tag).width();

  let bkcol = $(tag).css('background-color');
  let bkObj = getRGB(bkcol);
  if (!bkObj.alfa) {
    pdf_doc.setFillColor( bkObj.rgb[0],
                          bkObj.rgb[1],
                          bkObj.rgb[2]
                        );

    pdf_doc.rect(left*scale, top*scale, anch*scale, alto*scale, 'F');
  }
}

function makeFrame(tag, pdf_doc, offX, offY, scale) {
  let top = $(tag).offset().top + parseInt(offY);
  let left = $(tag).offset().left + parseInt(offX);
  let alto = $(tag).height();
  let anch = $(tag).width();

  pdf_doc.setDrawColor(255,0,0);
  pdf_doc.rect(left*scale, top*scale, anch*scale, alto*scale, 'D');

}

function parsearTexto(htmlTag, pdf_doc, offX, offY, scale) {
  console.log("parsearTexto>>> ");
  for (let i=0; i<htmlTag.childNodes.length; i++){
    console.log("parsearTexto>>> parseando "); //+htmlTag.outerHTML);

    let type = htmlTag.childNodes[i].nodeType;
    console.log("parsearTexto>>> Node Type: "+type);
    if (type == 3) {
      // parsear texto
      let txTag = $(htmlTag.childNodes[i].parentNode);
      console.log("parsearTexto>>> txTag: "+txTag[0].nodeName);
      let texto = txTag[0].childNodes[0].nodeValue;
      if (texto != null) {
        makeFrame(txTag[0], pdf_doc, offX, offY, scale);
        let fontSize = parseInt(txTag.css('font-size').slice(0, -2)*scale)+1;
        let top = txTag.offset().top + parseInt(offY);
        let left = txTag.offset().left + parseInt(offX);
        console.log("parsearTexto>>> font-size: "+fontSize+" left: "+left+", top: "+top+", texto: "+texto);
        let ancho = txTag.width(); //parseInt(txTag.css('width').slice(0, -2));
        console.log("parsearTexto>>> largo de cadena: "+pdf_doc.getStringUnitWidth(texto)+" y ancho de caja: "+ancho);
        pdf_doc.setFontSize(fontSize);
        let sTexto = pdf_doc.splitTextToSize(texto, parseInt(ancho*scale)); //parseInt(ancho/fontSize));
        console.log("parsearTexto>>> texto wrapeado: "+sTexto)

        // ajustes a caja
        let deltaY = txTag.height() - parseInt(txTag.css('padding-bottom').slice(0, -2))


        pdf_doc.text(left*scale, (top+deltaY)*scale, sTexto);
      }
    } else if(type == 1) {
      parsearTexto(htmlTag.childNodes[i], pdf_doc, offX, offY, scale);
    }
  }
}
function parsearFondos(htmlTag, pdf_doc, offX, offY, scale){
  console.log("parsearFondos>>> henos aqui");
  $(htmlTag).find("*").each(function(ix) {
    //console.log("parsearFondos>>> tr: "+this.outerHTML)
    makeBox(this, pdf_doc, offX, offY, scale);/*
    let top = $(this).offset().top + parseInt(offY);
    let left = $(this).offset().left + parseInt(offX);
    let alto = $(this).height();
    let anch = $(this).width();

    let bkcol = $(this).css('background-color');
    let brcol = $(this).css('border');
    //console.log(">>>>>>>>>> border: "+brcol);
    //console.log(getRGB(bkcol));
    let bkObj = getRGB(bkcol);
    if (!bkObj.alfa) {
      pdf_doc.setFillColor( bkObj.rgb[0],
                            bkObj.rgb[1],
                            bkObj.rgb[2]
                          );

    if (bkcol == 'rgba(0, 0, 0, 0)') {
      pdf_doc.setFillColor(255, 255, 255);
    } else if (bkcol == 'rgb(238, 238, 238)') {
      pdf_doc.setFillColor(238, 238, 238);
    } else {
      pdf_doc.setFillColor(128, 128, 128);
    }

    pdf_doc.rect(left*scale, top*scale, anch*scale, alto*scale, 'F');
  } else {
    pdf_doc.setDrawColor(255,0,0);
    pdf_doc.rect(left*scale, top*scale, anch*scale, alto*scale, 'D');
  }
    //pdf_doc.text(left*scale+15, top*scale, bkcol);*/
  })

}
function parsearImg(htmlTag, pdf_doc) {}
