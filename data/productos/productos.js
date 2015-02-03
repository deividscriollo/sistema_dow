$(document).on("ready",inicio);
function inicio (){	
	///////////varias validaciones//////////////}					
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    				
	
	// *** editable avatar *** //
	try {//ie8 throws some harmless exceptions, so let's catch'em

		//first let's add a fake appendChild method for Image element for browsers that have a problem with this
		//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
		try {
			document.createElement('IMG').appendChild(document.createElement('B'));
		} catch(e) {
			Image.prototype.appendChild = function(el){}
		}

		var last_gritter
		$('#avatar').editable({
			type: 'image',
			name: 'avatar',
			value: null,
			image: {
				//specify ace file input plugin's options here
				btn_choose: 'Cambiar Imagen',
				droppable: true,
				maxSize: 110000,//~100Kb

				//and a few extra ones here
				name: 'avatar',//put the field name here as well, will be used inside the custom plugin
				on_error : function(error_type) {//on_error function will be called when the selected file has a problem
					if(last_gritter) $.gritter.remove(last_gritter);
					if(error_type == 1) {//file format error
						last_gritter = $.gritter.add({
							title: 'El archivo no es una imagen!',
							text: 'Por favor, elija un jpg | jpeg | imagen png!',
							class_name: 'gritter-error gritter-center'
						});
					} else if(error_type == 2) {//file size rror
						last_gritter = $.gritter.add({
							title: 'Archivo muy grande!',
							text: 'Tamaño de la imagen no debe superar los 100Kb!',
							class_name: 'gritter-error gritter-center'
						});
					}
					else {//other error
					}
				},
				on_success : function() {
					$.gritter.removeAll();
				}
			},
		    url: function(params) {
				// ***UPDATE AVATAR HERE*** //
				//for a working upload example you can replace the contents of this function with 
				//examples/profile-avatar-update.js

				var deferred = new $.Deferred

				var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
				if(!value || value.length == 0) {
					deferred.resolve();
					return deferred.promise();
				}


				//dummy upload
				setTimeout(function(){
					if("FileReader" in window) {
						//for browsers that have a thumbnail of selected image
						var thumb = $('#avatar').next().find('img').data('thumb');
						if(thumb) $('#avatar').get(0).src = thumb;
					}
					
					deferred.resolve({'status':'OK'});

					if(last_gritter) $.gritter.remove(last_gritter);
					last_gritter = $.gritter.add({
						title: 'Imagen Actualizada!',
						text: 'Carga en servidor puede ser fácilmente implementado . Un ejemplo de trabajo se incluye con la plantilla.',
						class_name: 'gritter-info gritter-center'
					});
					
				 } , parseInt(Math.random() * 800 + 800))

				return deferred.promise();
				
				// ***END OF UPDATE AVATAR HERE*** //
			},
			
			success: function(response, newValue) {
			}
		})
	}catch(e) {

	}		
	////////////////////////////////////////////			
	/*funcion inicial de la imagen y  buscadores del select no topar plz*/	
	$('.chosen-select').chosen({allow_single_deselect:true}); 
	$(window)
	.off('resize.chosen')
	.on('resize.chosen', function() {
		$('.chosen-select').each(function() {
			 var $this = $(this);
			 $this.next().css({'width': $this.parent().width()});
		})
	}).trigger('resize.chosen');
	//resize chosen on sidebar collapse/expand
	$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
		if(event_name != 'sidebar_collapsed') return;
		$('.chosen-select').each(function() {
			 var $this = $(this);
			 $this.next().css({'width': $this.parent().width()});
		})
	});
	/*-----------------------*/

	// dar valor inicial para convertir input en spinner o seleccion			
	$('#txt_12').ace_spinner({value:0,min:0,step:1,max:9999,btn_up_class:'btn btn-success' , btn_down_class:'btn btn-danger'})
	$('#txt_16').ace_spinner({value:0,min:0,max:9999,step:1, btn_up_class:'btn btn-success' , btn_down_class:'btn btn-danger'})
	$('#txt_17').ace_spinner({value:0,min:0,step:1,max:9999, btn_up_class:'btn btn-success' , btn_down_class:'btn btn-danger'})	
	// fin dar valor inicial a los espinner		
	carga_detalles_productos("txt_5",'7');//el producto es y el numero de funcion
	carga_detalles_productos("txt_6",'8');//categorias y el numero de funcion
	carga_detalles_productos("txt_7",'9');//asignado a y el numero de funcion
	carga_detalles_productos("txt_13",'10');//asignado a y el numero de funcion
	carga_detalles_productos_1("txt_14",'11');//asignado a y el numero de funcion

	////////////////////////
	/*guardar categorias productos*/
	$("#guardarCategoriaProducto").on("click",guardarCategoriaProducto);
	/*---------------------------*/
	/*guardar asisgnacion del producto*/
	$("#btn_guardarAsignacion").on("click",guardarAsignacion);
	/*---------------------------*/
	/*guardar marcs del producto*/
	$("#btn_guardarMarcaProducto").on("click",guardarMarcaProducto);
	/*---------------------------*/	
	/*change se vende por*/
	$("#txt_14").on("change",function(){
		var a = $(this).val();
		//// falta el data set
	})
	/*--------------*/
	$("input").on("keyup click",function (e){//campos requeridos				
		comprobarCamposRequired(e.currentTarget.form.id);
	});	
}

function guardarCategoriaProducto(){	
	var resp=comprobarCamposRequired("form_categoriasProductos");	    	
	if(resp==true){    		
		$("#form_categoriasProductos").on("submit",function (e){												
			var texto=($("#guardarCategoriaProducto").text()).trim();																		
			if(texto=="Guardar"){ 				
				guardar_categoriaProducto("add",e);							  					                	
	        }
	        e.preventDefault();
    		$(this).unbind("submit")		    			            			
		});	
		
	}				 
}
function guardar_categoriaProducto(tipo,p){		
	$.ajax({
	    url: "../categorias/categorias.php", 	    				    	    
	    data:  "nombre_categoria="+$("#txt_categoriaProducto").val() + "&oper="+tipo, 	    	    	    
	    type: "POST",				
	    success: function(data){	    	
	    	if( data == 2 ){		    		
	    		carga_detalles_productos("txt_6",'8');//categorias y el numero de funcion	    		
	    		alert('Datos Agregados Correctamente');	
	    		limpiar_form(p);		    		
	    	}else{
	    		if( data == 1 ){	    		
	    			alert('Esta categoría ya existe. Ingrese otra')	;
	    			$("#txt_categoriaProducto").val("");
	    			$("#txt_categoriaProducto").focus();
	    		}
	    	}
		},		
	}); 
}
function guardarAsignacion(){	
	var resp=comprobarCamposRequired("form_asignarProducto");	    	
	if(resp==true){    		
		$("#form_asignarProducto").on("submit",function (e){												
			var texto=($("#btn_guardarAsignacion").text()).trim();																		
			if(texto=="Guardar"){ 				
				guardar_asignacionProducto("add",e);							  					                	
	        }
	        e.preventDefault();
    		$(this).unbind("submit")		    			            			
		});	
		
	}				 
}
function guardar_asignacionProducto(tipo,p){		
	$.ajax({
	    url: "../bodegas/bodegas.php", 	    				    	    
	    data:  "nombre_bodega="+$("#txt_descripcionBodega").val() + "&oper="+tipo+ "&ubicacion_bodega="+$("#txt_ubicacionProducto").val(), 	    	    	    
	    type: "POST",				
	    success: function(data){	    	
	    	if( data == 2 ){		    		
	    		carga_detalles_productos("txt_7",'9');//categorias y el numero de funcion	    		
	    		alert('Datos Agregados Correctamente');	
	    		limpiar_form(p);		    		
	    	}else{
	    		if( data == 1 ){	    		
	    			alert('Esta bodega ya existe. Ingrese otra')	;
	    			$("#txt_descripcionBodega").val("");
	    			$("#txt_descripcionBodega").focus();
	    		}
	    	}
		},		
	}); 
}
function guardarMarcaProducto(){	
	var resp=comprobarCamposRequired("form_marcasProducto");	    	
	if(resp==true){    		
		$("#form_marcasProducto").on("submit",function (e){												
			var texto=($("#btn_guardarMarcaProducto").text()).trim();																		
			if(texto=="Guardar"){ 				
				guardar_marcaProducto("add",e);							  					                	
	        }
	        e.preventDefault();
    		$(this).unbind("submit")		    			            			
		});	
		
	}				 
}
function guardar_marcaProducto(tipo,p){		
	$.ajax({
	    url: "../marcas/marcas.php", 	    				    	    
	    data:  "nombre_marca="+$("#txt_marcaProductos").val() + "&oper="+tipo, 	    	    	    
	    type: "POST",				
	    success: function(data){	    	
	    	if( data == 2 ){		    		
	    		carga_detalles_productos("txt_13",'10');//marcas y el numero de funcion	    		
	    		alert('Datos Agregados Correctamente');	
	    		limpiar_form(p);		    		
	    	}else{
	    		if( data == 1 ){	    		
	    			alert('Esta marca ya existe. Ingrese otra')	;
	    			$("#txt_marcaProductos").val("");
	    			$("#txt_marcaProductos").focus();
	    		}
	    	}
		},		
	}); 
}
/*---------------------------------*/