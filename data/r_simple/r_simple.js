$(document).on("ready",inicio);
function inicio (){
	$('input[name=date-range-picker]').daterangepicker({
		'applyClass' : 'btn-sm btn-success',
		'cancelClass' : 'btn-sm btn-purple',
		locale: {
			applyLabel: 'Aplicar',
			cancelLabel: 'Cancelar',
		}
	});
	$("#mas_vendido").click(function(){
		window.open('../reportes/producto_mas_vendido.php','_blank');      				

	});
	$("#mas_compra").click(function(){
		window.open('../reportes/cliente_mas_compra.php','_blank');      				

	});
	$("#lista_productos").click(function(){
		window.open('../reportes/lista_productos.php','_blank');      				

	});
	$("#lista_clientes").click(function(){
		window.open('../reportes/clientes.php','_blank');      				

	});
	$("#lista_proveedores").click(function(){
		window.open('../reportes/proveedores.php','_blank');      				

	});
	$("#ventas_diarias").click(function(){
		window.open('../reportes/ventas_diarias.php?fecha='+$('#rango_fecha').val(),'_blank');      				

	});
}

