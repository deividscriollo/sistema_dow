$(document).on("ready",inicio);
function inicio (){					
	$('.chosen-select').chosen({allow_single_deselect:true}); 	
	$("#btn_agregar").click(function(){
		data();
		$.ajax({        
	        type: "POST",
	        dataType: 'json',        
	        url: "carga_permisos.php?id="+$("#txt_0").val(),        
	        success: function(data, status) {
        	}
        });
	})
	/*--buscadores--*/
	var input_ci = $("#txt_1_chosen").children().next().children();			
	$(input_ci).on("keyup",function(input_ci){		
		var text = $(this).children().val();
		if(text != ""){			
			$.ajax({        
		        type: "POST",
		        dataType: 'json',        
	    	    url: "../carga_ubicaciones.php?tipo=0&id=0&fun=26&val="+text,        
	        	success: function(data, status) {
	        		$('#txt_1').html("");	        	
	        		for (var i = 0; i < data.length; i=i+3) {            				            		            	
			            appendToChosen(data[i],data[i+1],text,data[i+2],"txt_1","txt_1_chosen");
			          }		        
			        $('#txt_2').html("");
			        $('#txt_2').append($("<option data-extra='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                    
			        $("#txt_0").val(data[0])            			        
			    },
			    error: function (data) {
			        console.log(data)
		    	}	        
		    });
	    }	  
	});
	$("#txt_1").chosen().change(function (event,params){
		if(params == undefined){			
			$('#txt_1').html("");
			$('#txt_1').append($("<option></option>"));    			
			$('#txt_1').trigger('chosen:updated')
			$('#txt_2').html("");
			$('#txt_2').append($("<option></option>"));    			
			$('#txt_2').trigger('chosen:updated');			
      		$("#txt_0").val("");            
		}else{        
      var a = $("#txt_1 option:selected");            
      $('#txt_2').html("");
      $('#txt_2').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
      $("#txt_0").val($(a).val());
    }
	});	
	var input_nombre = $("#txt_2_chosen").children().next().children();			
	$(input_nombre).on("keyup",function(input_nombre){				
		var text = $(this).children().val();
		if(text != ""){
			$.ajax({        
		        type: "POST",
		        dataType: 'json',        
	    	    url: "../carga_ubicaciones.php?tipo=0&id=0&fun=27&val="+text,        
	        	success: function(data, status) {
	        		$('#txt_2').html("");	        	
	        		for (var i = 0; i < data.length; i=i+3) {            		        			
			            appendToChosen(data[i],data[i+2],text,data[i+1],"txt_2","txt_2_chosen");
			          }		        
			        $('#txt_1').html("");
			        $('#txt_1').append($("<option data-extra='"+data[2]+"'></option>").val(data[0]).html(data[1])).trigger('chosen:updated');                    
			        $("#txt_0").val(data[0])            			        
			    },
			    error: function (data) {
			        console.log(data)
		    	}	        
		    });
	    }	  
	});
	$("#txt_2").chosen().change(function (event,params){
		if(params == undefined){			
			$('#txt_2').html("");
			$('#txt_2').append($("<option></option>"));    			
			$('#txt_2').trigger('chosen:updated')
			$('#txt_1').html("");
			$('#txt_1').append($("<option></option>"));    			
			$('#txt_1').trigger('chosen:updated');			
      		$("#txt_0").val("");            
		}else{        
      var a = $("#txt_2 option:selected");            
      $('#txt_1').html("");
      $('#txt_1').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
      $("#txt_0").val($(a).val());
    }
	});	
	/*-------------*/
}
function data(){
	var jsonData = inicializarData();//see below		
	$('#tree1').ace_tree({
		dataSource: jsonData['dataSource1'],
		multiSelect: true,
		cacheItems: true,
		'open-icon' : 'ace-icon tree-minus',
		'close-icon' : 'ace-icon tree-plus',
		'selectable' : true,
		'selected-icon' : 'ace-icon fa fa-check',
		'unselected-icon' : 'ace-icon fa fa-times',
		loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>'
	});

}
function inicializarData(){
	var tree_data = {
		'inicio' : {text: 'Inicio', type: 'item',dataAttributes: {id:'n1_1'}},
		'ingresos' : {text: 'Ingresos', type: 'folder',dataAttributes: {id:'n1_2'}}	,
		'procesos' : {text: 'Procesos', type: 'folder',dataAttributes: {id:'n1_3'}}	,
		'reportes' : {text: 'Reportes', type: 'folder',dataAttributes: {id:'n1_4'}}	,
		'administracion' : {text: 'Administración', type: 'folder',dataAttributes: {id:'n1_5'}}	,			
	}		
	tree_data['ingresos']['additionalParameters'] = {
		'children' : {
			'generales' : {text: 'Generales', type: 'folder',dataAttributes: {id:'n2_1'}},
			'empresa' : {text: 'Empresa', type: 'item',dataAttributes: {id:'n2_2'}},
			'usuario' : {text: 'Usuario', type: 'item',dataAttributes: {id:'n2_3'}},
			'clientes' : {text: 'Clientes', type: 'item',dataAttributes: {id:'n2_4'}},
			'proveedores' : {text: 'Proveedores', type: 'item',dataAttributes: {id:'n2_5'}},
			'productos' : {text: 'Productos', type: 'item',dataAttributes: {id:'n2_6'}},
		}
	}
	tree_data['ingresos']['additionalParameters']['children']['generales']['additionalParameters'] = {
		'children' : {
			'bodegas' : {text: 'Bodegas', type: 'item',dataAttributes: {id:'n3_1'}},
			'categorias' : {text: 'Categorías', type: 'item',dataAttributes: {id:'n3_2'}},
			'marcas' : {text: 'Marcas', type: 'item',dataAttributes: {id:'n3_3'}},
			'unidades_meidad' : {text: 'Unidades Medida', type: 'item',dataAttributes: {id:'n3_4'}},
			'tipo_producto' : {text: 'Tipo Producto', type: 'item',dataAttributes: {id:'n3_5'}},				
		}
	}
	tree_data['procesos']['additionalParameters'] = {
		'children' : {
			'inventario' : {text: 'Inventario', type: 'item',dataAttributes: {id:'n2_7'}},
			'compras' : {text: 'Compras', type: 'folder',dataAttributes: {id:'n2_8'}},
			'ventas' : {text: 'Ventas', type: 'folder',dataAttributes: {id:'n2_9'}},
			'kardex' : {text: 'Kardex', type: 'item',dataAttributes: {id:'n2_10'}},
		}
	}
	tree_data['procesos']['additionalParameters']['children']['compras']['additionalParameters'] = {
		'children' : {
			'productos_bodega' : {text: 'Productos bodega', type: 'item',dataAttributes: {id:'n3_6'}},
			'devolucion_compra' : {text: 'Ddevolución Compra', type: 'item',dataAttributes: {id:'n3_7'}},								
			
		}
	}
	tree_data['procesos']['additionalParameters']['children']['ventas']['additionalParameters'] = {
		'children' : {
			'facturacion_venta' : {text: 'Facturación Venta', type: 'item',dataAttributes: {id:'n3_8'}},				
			
		}
	}
	tree_data['reportes']['additionalParameters'] = {
		'children' : {
			'estadisticos' : {text: 'Estadísticos', type: 'item',dataAttributes: {id:'n2_11'}},
			'simples' : {text: 'Simples', type: 'item',dataAttributes: {id:'n2_12'}},				
		}
	}
	tree_data['administracion']['additionalParameters'] = {
		'children' : {
			'privilegios' : {text: 'Privilegios', type: 'item',dataAttributes: {id:'n2_13'}},				
		}
	}

	var dataSource1 = function(options, callback){				
		var $data = null				
		if(!("text" in options) && !("type" in options)){			
			$data = tree_data;//the root tree
			callback({ data: $data });
			return;
		}
		else if("type" in options && options.type == "folder") {						
			if("additionalParameters" in options && "children" in options.additionalParameters)
				$data = options.additionalParameters.children || {};
			else $data = {}//no data
		}		
		if($data != null)//this setTimeout is only for mimicking some random delay									
			setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

	}			
	return {'dataSource1': dataSource1}
	}
