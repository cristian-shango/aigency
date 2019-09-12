
(function ( $ ) {
 
    $.fn.pcsFormatNumber = function( options ) {

        // Default options.
        var settings = $.extend({
            // These are the defaults.
	        decimal_separator: ".",
	        number_separator: ",",
			currency: "$",
            to_fixed: 2
        }, options );
 
        // Format
        var el = $(this);
        var val = el.val();
		el.val(formatNumber(val.replace(settings.decimal_separator, settings.number_separator), settings.currency));

		el.change(function(event) {
			var val = $(this).val();

			$(this).val(formatNumber(val, settings.currency));
		});

        // Functions
        function formatNumber(number, currency) {
            number = number.replace(currency, '');
            number = number.replace(settings.decimal_separator, "");
            number = number.replace(settings.number_separator, settings.decimal_separator);
            number = Number(number.trim());

            return currency + ' ' + number.toFixed(settings.to_fixed).replace(/(\d)(?=(\d{3})+\.)/g, '$1'+settings.number_separator).replace(settings.decimal_separator, settings.number_separator).replace(settings.number_separator, settings.decimal_separator);
        }

        

$('#nuevo_precio_cliente').pcsFormatNumber();

$('#nuevo_costo_presupuestado').pcsFormatNumber();
$('#precio_cliente_editar_proyecto').pcsFormatNumber();
$('#editar_costo_presupuestado').pcsFormatNumber();
        
    };

});



