    $(document).ready(function () {
      add_delete_buttons();

      $(window).on("tr_gone", function (e, tr) {
        add_come_back_button(tr);
      });

      // Initialize cell data
      $('td').each(function() {
        $(this).addClass($(this).parent().attr('color_class'));
        $(this).data('posx', $(this).position().left);
        if($(this).attr('rowspan')){
          $(this).data("rowspan", $(this).attr("rowspan"));  
        }
      });
    });

    function calculate_max_rowspans() {
      // Remove all temporary cells
      $(".tmp").remove();

      // Get all rows
      var trs = $('tr'), tds, tdsTarget,
          $tr, $trTarget, $td, $trFirst,
          cellPos, cellTargetPos, i;

      // Get the first row, this is the layout reference
      $trFirst = $('tr').first();

      // Iterate through all rows
      for(var rowIdx = 0; rowIdx < trs.length; rowIdx++){
        $tr = $(trs[rowIdx]);
        $trTarget = $(trs[rowIdx+1]);
        tds = $tr.children();
       
        // For each cell in row
        for(cellIdx = 0; cellIdx < tds.length; cellIdx++){
          $td = $(tds[cellIdx]);
          // Find which one has a rowspan
          if($td.data('rowspan')){
            var rowspan = Number($td.data('rowspan'));

            // Evaluate how the rowspan should be display in the current state
            // verify if the cell with rowspan has some hidden rows
            for(i = rowIdx; i < (rowIdx + Number($td.data('rowspan'))); i++){
              if(!$(trs[i]).is(':visible')){
                rowspan--;
              }
            }

            $td.attr('rowspan', rowspan);

            // if the cell doesn't have rows hidden within, evaluate the next cell
            if(rowspan == $td.data('rowspan')) continue;

            // If this row is hidden copy the values to the next row
            if(!$tr.is(':visible') && rowspan > 0) {
              $clone = $td.clone();
              // right now, the script doesn't care about copying data, 
              // but here is the place to implement it
              $clone.data('rowspan', $td.data('rowspan') - 1);
              $clone.data('posx', $td.data('posx'));
              $clone.attr('rowspan',  rowspan);
              $clone.addClass('tmp');

              // Insert the temp node in the correct position
              // Get the current cell position
              cellPos = getColumnVisiblePostion($trFirst, $td);

              // if  is the last just append it
              if(cellPos == $trFirst.children().length - 1){
                $trTarget.append($clone);
              }
              // Otherwise, insert it before its closer sibling
              else {
                tdsTarget = $trTarget.children();
                for(i = 0; i < tdsTarget.length; i++){
                  cellTargetPos = getColumnVisiblePostion($trFirst, $(tdsTarget[i]));
                  if(cellPos < cellTargetPos){
                    $(tdsTarget[i]).before($clone);  
                    break;
                  }
                }                
              }          
            }
          } 
        }

        // remove tmp nodes from the previous row 
        if(rowIdx > 0){
          $tr = $(trs[rowIdx-1]);
          if(!$tr.is(':visible')){
            $tr.children(".tmp").remove();  
          }
          
        } 
      }
    }

    // this function calculates the position of a column 
    // based on the visible position
    function getColumnVisiblePostion($firstRow, $cell){
      var tdsFirstRow = $firstRow.children();
      for(var i = 0; i < tdsFirstRow.length; i++){
        if($(tdsFirstRow[i]).data('posx') == $cell.data('posx')){
          return i;
        }
      }
    }

    function add_delete_buttons() {
      var $all_rows = $("tr");
      $all_rows.each(function () {
        // TR to remove
        var $tr = $(this);
        var delete_btn = $("<button>").text("x");
        delete_btn.on("click", function () {
          $tr.hide();
          calculate_max_rowspans();
          $(window).trigger("tr_gone", $tr);
        });
        var delete_cell = $("<td>");
        delete_cell.append(delete_btn);
        $(this).append(delete_cell);
      });
    }

    function add_come_back_button(tr) {
      var $tr = $(tr);
      var come_back_btn = $("<button>").text("come back " + $tr.attr("color_class"));
      come_back_btn.css({"background": $(tr).css("background")});
      come_back_btn.on("click", function () {
        $tr.show();
        come_back_btn.remove();
        calculate_max_rowspans();
      });
      $("table").before(come_back_btn);
    }