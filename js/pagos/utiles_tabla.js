var utiles_tabla = (function(){

    let $tabla = undefined;
    let $tr_previo = undefined;
    let mouse_previo = undefined;
    let $dragbox = undefined;

    function set_table($elementoEnTabla){
        $tabla = $elementoEnTabla.closest('table');
        // $tabla.find('td').on({
        //     mousedown: function(evento){ press_td($(this), evento); },
        //     mouseup: function(evento){ release_td($(this), evento); }
        // });
    }

    function data_tr($tagTD){
        console.log("Celda ", $tagTD);
        let datas = [];
        $tagTD.each(function(ix, td){
            console.log($(td).closest('tr'));
            datas.push($(td).closest('tr').data());
        });
        return datas;
    }

    function press_td($tagTD, evento=null){
        $tr_previo = $tagTD.closest('tr');
        $dragbox = $tagTD.closest('tr');
        mouse_previo = { x: evento.pageX, y: evento.pageY };
        console.log("td clickeado ", $tagTD);
    }

    function release_td($tagTD, evento=null){
        if ($tabla === undefined) console.log("No se definió ninguna tabla.");
        else {
            console.log("td clickeado ", $tagTD);
            console.log("primer tr ", $tr_previo[0]);
            let $tr_final = $tagTD.closest('tr');
            let ultimo_registro = $tr_final.data('id_registro');
            let mouseAvance = evento.pageY > mouse_previo.y;
            console.log("ultimo tr ", $tr_final[0]);
            let i = 0;
            let $tr = $tr_previo;
            while ($tr[0] !== $tr_final[0]) {
                console.log($tr.data('id_registro'), ultimo_registro, $tr.data('id_registro') !== ultimo_registro);
                console.log(i, data_tr($tr));
                $dragbox = $dragbox.add($tr[0]);
                //if (i++ > 10) break;
                if (mouseAvance) $tr = $tr.next();
                else $tr = $tr.prev();
            }
            $dragbox = $dragbox.add($tr_final[0]);
            console.log($dragbox);
        }
    }

    function suma($filas) {
        let suma = 0;
        $filas.each(function(){ suma += this.find(".")});
    }

    return {
        set_table: set_table
        ,
        data_tr: data_tr
    };
})()
