$(document).on("ready",inicio);


function inicio (){		
 mostrar("hora_actual");	
 fecha_actual("fecha_actual");   

 ////////////////validaciones/////////////////
 $("#cantidad").validCampoFranz("0123456789");
 $("#serie3").validCampoFranz("0123456789");
 $("#descuento").validCampoFranz("0123456789");
 $("#serie3").attr("maxlength", "9");
 $("#precio").on("keypress",punto);


	var input_ci = $("#txt_nro_identificacion_chosen").children().next().children();		
	$(input_ci).on("keyup",function(input_ci){
		var text = $(this).children().val();
		 $.ajax({        
	        type: "POST",
	        dataType: 'json',        
	        url: "../carga_ubicaciones.php?tipo=0&id=0&fun=13&val="+text,        
	        success: function(data, status) {
	        	$('#txt_nro_identificacion').html("");	        	
	        	for (var i = 0; i < data.length; i=i+3) {            				            		            	
		        	appendToChosen(data[i],data[i+1],text,data[i+2]);
		        }		        
		    },
		    error: function (data) {
		        console.log(data)
		    }	        
	     });
	  
	});

	$("#txt_nro_identificacion").chosen().change(function (event,params){
		if(params == undefined){			
			$('#txt_nro_identificacion').html("");
			$('#txt_nro_identificacion').append($("<option></option>"));    			
			$('#txt_nro_identificacion').trigger('chosen:updated')
			$('#txt_nombre_proveedor').html("");
			$('#txt_nombre_proveedor').append($("<option></option>"));    			
			$('#txt_nombre_proveedor').trigger('chosen:updated')
		}
	});
	
	$("#txt_nro_identificacion").chosen().change(function(){
		var valor=$("#txt_nro_identificacion").val()
		$.ajax({
			url:'factura_venta.php',
			type:'POST',
			dataType:'json',
			data:{buscar_nombre:'ok', id:valor},
			success:function(data){				
				$('#lbl_client_nombre').html(data[0]);
				$('#lbl_client_telefono').html(data[2]);
				$('#lbl_client_correo').html(data[3]);
				$('#lbl_client_direccion').html(data[1]);

			}
		});
	})

  /*buscador del codigo del producto*/
  var input_codigoProducto = $("#codigo_chosen").children().next().children();    
  $(input_codigoProducto).on("keyup",function(input_ci){
    var text = $(this).children().val();
      if(text != ""){
        $.ajax({        
          type: "POST",
          dataType: 'json',        
          url: "../carga_ubicaciones.php?tipo=0&id=0&fun=15&val="+text,        
          success: function(data, status) {
            $('#codigo').html("");            
            for (var i = 0; i < data.length; i=i+8) {                                                 
              appendToChosenProducto(data[i],data[i+1],data[i+2],data[i+3],data[i+4],data[i+5],data[i+6],data[i+7],text,"codigo","codigo_chosen");
            }           
            $('#producto').html("");
            $('#producto').append($("<option data-barras='"+data[2]+"' data-codigo='"+data[1]+"' data-precio='"+data[4]+"' data-stock='"+data[5]+"' data-iva='"+data[6]+"' data-inventariable='"+data[7]+"' ></option>").val(data[0]).html(data[3])).trigger('chosen:updated');            
            $("#id_productos").val(data[0]);
            $('#codigo_barras').html("");
            $('#codigo_barras').append($("<option data-barras='"+data[3]+"' data-codigo='"+data[1]+"' data-precio='"+data[4]+"' data-stock='"+data[5]+"' data-iva='"+data[6]+"' data-inventariable='"+data[7]+"' ></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                        
            $("#precio").val(data[4]);
            //$("#cantidad").val(data[5]);
          },
          error: function (data) {
            alert(data);
          }         
        });     
    }
  });
  $("#codigo_chosen").children().next().children().click(function (){
    $("#cantidad").focus(); 
  });

   /*buscador del nombre del producto*/
  var input_nombreProducto = $("#producto_chosen").children().next().children();    
  $(input_nombreProducto).on("keyup",function(input_ci){    
    var text = $(this).children().val();
    if(text != ""){
      $.ajax({        
        type: "POST",
        dataType: 'json',        
        url: "../carga_ubicaciones.php?tipo=0&id=0&fun=16&val="+text,        
        success: function(data, status) {
          $('#producto').html("");            
          for (var i = 0; i < data.length; i=i+8) {                                                 
            appendToChosenProducto(data[i],data[i+3],data[i+2],data[i+1],data[i+4],data[i+5],data[i+6],data[i+7],text,"producto","producto_chosen");
          }           
          $('#codigo').html("");
          $('#codigo').append($("<option data-barras='"+data[2]+"' data-codigo='"+data[3]+"' data-precio='"+data[4]+"' data-stock='"+data[5]+"' data-iva='"+data[6]+"' data-inventariable='"+data[7]+"' ></option>").val(data[0]).html(data[1])).trigger('chosen:updated');            
          $("#id_productos").val(data[0]);
          $('#codigo_barras').html("");
          $('#codigo_barras').append($("<option data-barras='"+data[3]+"' data-codigo='"+data[1]+"' data-precio='"+data[4]+"' data-stock='"+data[5]+"' data-iva='"+data[6]+"' data-inventariable='"+data[7]+"' ></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                        
          $("#precio").val(data[4]);
          //$("#cantidad").val(data[5]);
        },
        error: function (data) {
          alert(data);
        }          
      });
    }
  }); 
  $("#producto_chosen").children().next().children().click(function (){
    $("#cantidad").focus(); 
  });  

  /*eventos change del chosen*/

  $("#codigo").chosen().change(function (event,params){    
    if(params == undefined){     
      limpiar_chosen_codigo();          
    }else{              
      var a = $("#codigo option:selected");            
      $('#producto').html("");                   
      $('#codigo_barras').html("");             
      $('#producto').append($("<option data-barras='"+$(a).data("barras")+"' data-codigo='"+$(a).text()+"' data-precio='"+$(a).data("precio")+"' data-stock='"+$(a).data("stock")+"' data-iva='"+$(a).data("iva")+"' data-inventariable='"+$(a).data("inventariable")+"' ></option>").val($(a).val()).html($(a).data("codigo"))).trigger('chosen:updated');                  
      $('#codigo_barras').append($("<option data-barras='"+$(a).data("codigo")+"' data-codigo='"+$(a).text()+"' data-precio='"+$(a).data("precio")+"' data-stock='"+$(a).data("stock")+"' data-iva='"+$(a).data("iva")+"' data-inventariable='"+$(a).data("inventariable")+"' ></option>").val($(a).val()).html($(a).data("barras"))).trigger('chosen:updated');                  
      $("#id_productos").val($(a).val());
      $("#precio").val($(a).data("precio"));       
      $("#cantidad").focus();
    }
  }); 
  $("#producto").chosen().change(function (event,params){    
    if(params == undefined){         
      $('#codigo').html("");
      $('#codigo').append($("<option></option>"));          
      $('#codigo').trigger('chosen:updated')
      $('#producto').html("");
      $('#producto').append($("<option></option>"));          
      $('#producto').trigger('chosen:updated');     
      $('#codigo_barras').html("");
      $('#codigo_barras').append($("<option></option>"));          
      $('#codigo_barras').trigger('chosen:updated');     
      $("#id_productos").val("");
      $("#precio").val("");       
      //$("#cantidad").val(0)
    }else{              
      var a = $("#producto option:selected");            
      $('#codigo').html("");                   
      $('#codigo_barras').html("");             
      $('#codigo').append($("<option data-barras='"+$(a).data("barras")+"' data-codigo='"+$(a).text()+"' data-precio='"+$(a).data("precio")+"' data-stock='"+$(a).data("stock")+"' data-iva='"+$(a).data("iva")+"' data-inventariable='"+$(a).data("inventariable")+"' ></option>").val($(a).val()).html($(a).data("codigo"))).trigger('chosen:updated');                  
      $('#codigo_barras').append($("<option data-barras='"+$(a).data("codigo")+"' data-codigo='"+$(a).text()+"' data-precio='"+$(a).data("precio")+"' data-stock='"+$(a).data("stock")+"' data-iva='"+$(a).data("iva")+"' data-inventariable='"+$(a).data("inventariable")+"' ></option>").val($(a).val()).html($(a).data("barras"))).trigger('chosen:updated');                  
      $("#id_productos").val($(a).val());
      $("#precio").val($(a).data("precio"));      
      $("#cantidad").focus(); 
    }
  });  

  /*---agregar a la tabla---*/
  $("#cantidad").on("keypress",function (e){
    if(e.keyCode == 13){//tecla del alt para el entrer poner 13
      $("#precio").focus();  
    }
  });
  $("#precio").on("keypress",function (e){
    if(e.keyCode == 13){//tecla del alt para el entrer poner 13
      $("#descuento").focus();  
    }
  });
  $("#descuento").on("keypress",function (e){
    if(e.keyCode == 13){//tecla del alt para el entrer poner 13      
      if($("#cantidad").val() != ""){
        if($("#precio").val() != ""){
          if($("#id_productos").val() != ""){
            //agregar_fila(id_tabla,id_productos,codigo_producto,detalle_producto,cantidad_producto,limite,precio_unitario,descuento,total);
            var a = $("#producto option:selected");      
            agregar_fila("detalle_factura",$("#id_productos").val(),$(a).data("codigo"),$(a).text(),$("#cantidad").val(),$(a).data("stock"),$("#precio").val(),$("#descuento").val(),$(a).data("iva"));            
          }else{
            alert("Seleccione un producto antes de continuar");                        
            //$('#codigo').trigger('chosen:open');            
            $('#codigo_chosen').trigger('mousedown');
          }
        }else{
          alert("Ingrese un precio");
          $("#precio").focus();  
        }
      }else{
        alert("Ingrese una cantidad");
        $("#cantidad").focus();
      }
    }
  });




}




function appendToChosen(id,value,text,extra){			
    $('#txt_nro_identificacion').append($("<option data-extra='"+extra+"'></option>").val(id).html(value)).trigger('chosen:updated');        
    var input_ci = $("#txt_nro_identificacion_chosen").children().next().children();	
    $(input_ci).children().val(text);        
    //console.log($("#txt_nro_identificacion_chosen").children().children().next())        
}
/*---------------------------------*/