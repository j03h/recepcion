var ahora = new Date()
var dias = new Array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
var mes = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")

function reloj(){
	momentoActual = new Date();
	hora = momentoActual.getHours();
	minuto = momentoActual.getMinutes();
	segundo = momentoActual.getSeconds();

	str_segundo = new String (segundo)
	if (str_segundo.length == 1)
		segundo = "0" + segundo;

	str_minuto = new String (minuto)
	if (str_minuto.length == 1)
		minuto = "0" + minuto;

	str_hora = new String (hora)
	if (str_hora.length == 1)
		hora = "0" + hora;

	horaImprimible = hora + ":" + minuto + ":" + segundo;
	clock.innerHTML = horaImprimible;
	setTimeout("reloj()",1000);
}

$(document).ready(function() {
	//rut
	//$('#rut').numeric();
	$('#rut').Rut({
	  on_error: function(){ $("#rut").css("background-color", "#FF0000"); },
	  on_success: function(){ $("#rut").css("background-color", "#FFFFFF"); }
	});
	$("#rut").click(function(){
		$("#rut").val('');
	});
	$("#rut").focus(function(){
		$("#rut").val('');
	});
	$("#rut").blur(function(){
		if($(this).val() == '')
		{
			$("#rut").val('RUT VISITA');
		}

	});
	//nvis
	$("#nvis").click(function(){
		$("#nvis").val('');
		$("#nvis").Setcase({caseValue : 'upper'});
	});
	$("#nvis").focus(function(){
		$("#nvis").val('');
		$("#nvis").Setcase({caseValue : 'upper'});
	});
	$("#nvis").blur(function(){
		if($(this).val() == '')
		{
			$("#nvis").val('NOMBRE VISITA');
		}
	});
	//nanf
	$("#nanf").click(function(){
		$("#nanf").val('');
		$("#nanf").Setcase({caseValue : 'upper'});
	});
	$("#nanf").focus(function(){
		$("#nanf").val('');
		$("#nvis").Setcase({caseValue : 'upper'});
	});
	$("#nanf").blur(function(){
		if($(this).val() == '')
		{
			$("#nanf").val('NOMBRE ANFITRION');
		}
	});
	//mvis
	$("#mvis").click(function(){
		$("#mvis").val('');
		$("#mvis").Setcase({caseValue : 'upper'});
	});
	$("#mvis").focus(function(){
		$("#mvis").val('');
		$("#nvis").Setcase({caseValue : 'upper'});
	});
	$("#mvis").blur(function(){
		if($(this).val() == '')
		{
			$("#mvis").val('MOTIVO VISITA');
		}
	});
	//vobs
	$("#vobs").click(function(){
		$("#vobs").val('');
		$("#vobs").Setcase({caseValue : 'upper'});
	});
	$("#vobs").focus(function(){
		$("#vobs").val('');
		$("#nvis").Setcase({caseValue : 'upper'});
	});
	$("#vobs").blur(function(){
		if($(this).val() == '')
		{
			$("#vobs").val('OBSERVACIONES');
		}
	});
});

//search
$(function() {
	$("#nvis").autocomplete({
		source: "inc/name_search.php",
		minLength: 2,
		remoteDataType: 'json',
		select: function(event, ui) {
			$('#rut').val(ui.item.abbrev);
		}
	});
});
$(function() {
	$("#rut").autocomplete({
		source: "inc/rut_search.php",
		minLength: 2,
		remoteDataType: 'json',
		select: function(event, ui) {
			$('#nvis').val(ui.item.abbrev);
		}
	});
});
	//search


//case
(function($) {
	$.fn.Setcase = function(settings) {
		var config = {
			caseValue: 'Upper'
		};
		if(settings) $.extend(config, settings);

		this.each(function() {
			$(this).keyup(function(){
				if(config.caseValue == "upper")
				{
					var currVal = $(this).val();
					$(this).val(currVal.toUpperCase());
				}
				else if(config.caseValue == "lower")
				{
					var currVal = $(this).val();
					$(this).val(currVal.toLowerCase());
				}
				else if(config.caseValue == "title")
				{
					var currVal = $(this).val();
					$(this).val(currVal.charAt(0).toUpperCase() + currVal.slice(1).toLowerCase());
				}
				else if(config.caseValue == "pascal")
				{
					var currVal = $(this).val();
					currVal = currVal.toLowerCase().replace(/\b[a-z]/g, function(txtVal) {
						return txtVal.toUpperCase();
					});
				$(this).val(currVal);
				}
			});
		});
	};
})(jQuery);