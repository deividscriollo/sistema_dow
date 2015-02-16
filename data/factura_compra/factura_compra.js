$(document).on("ready",inicio);	

function guardar_factura(){
var vect1 = new Array();
var vect2 = new Array();
var vect3 = new Array();
var vect4 = new Array();
var vect5 = new Array();
var cont=0;
$("#detalle_factura tbody tr").each(function (index) {                                                                 
    $(this).children("td").each(function (index) {                               
        switch (index) {                                            
            case 0:
                vect1[cont] = $(this).text();   
                break; 
            case 3:
                vect2[cont] = $(this).text();                                       
                break; 
            case 4:
                vect3[cont] = $(this).text();                                       
                break;
            case 5:
                vect4[cont] = $(this).text();                                       
                break;
            case 6:
                vect5[cont] = $(this).text();                                       
                break;        
        }                          
    });
    cont++;  
});

   if($("#id_proveedor").val() == ""){
     $("#txt_nro_identificacion").trigger("chosen:open") 
   }else
     {
    if(vect1.length == 0){
       alert("Ingrese los productos");  
       }else{
  $.ajax({        
    type: "POST",
    data: "tipo="+$("#form_facturaCompra").serialize()+"&campo1="+vect1+"&campo2="+vect2+"&campo3="+vect3+"&campo4="+vect4+"&campo5="+vect5,
    //contentType: "application/x-www-form-urlencoded;charset=ISO-8859-15",
    url: "factura_compra.php",      
      success: function(data) { 
        if( data == 0 ){
          alert('Datos Agregados Correctamente');     
         // limpiar_form(p);  
         // $('#table').trigger('reloadGrid');              
        }else{
         // if( data == 1 ){
           // alert('Este nro de ' +$("#txt_1").val()+  ' ya existe ingrese otro'); 
           // $("#txt_2").val("");
           // $("#txt_2").focus();            
         // }else{
          //  alert("Error al momento de enviar los datos la página se recargara");           
         //   actualizar_form();
         // }
        }
      }
    }); 
  }
 }
}

function inicio (){		
   mostrar("estado");	    
	////////////////validaciones/////////////////
	$("#cantidad").validCampoFranz("0123456789");
	$("#autorizacion").validCampoFranz("0123456789");
	$("#serie1").validCampoFranz("0123456789");
	$("#serie1").attr("maxlength", "3");
	$("#serie2").validCampoFranz("0123456789");
	$("#serie2").attr("maxlength", "3");
	$("#serie3").validCampoFranz("0123456789");
	$("#serie3").attr("maxlength", "9");
	$("#descuento").validCampoFranz("0123456789");	
  $("#precio").on("keypress",punto);  

  /*buscador de ci proveedor*/
	var input_ci = $("#txt_nro_identificacion_chosen").children().next().children();		
	$(input_ci).on("keyup",function(input_ci){
		var text = $(this).children().val();
		 $.ajax({        
	        type: "POST",
	        dataType: 'json',        
	        url: "../carga_ubicaciones.php?tipo=0&id=0&fun=12&val="+text,        
	        success: function(data, status) {
	        	$('#txt_nro_identificacion').html("");	        	
	        	for (var i = 0; i < data.length; i=i+3) {            				            		            	
		          appendToChosen(data[i],data[i+1],text,data[i+2],"txt_nro_identificacion","txt_nro_identificacion_chosen");
		        }		        
            $('#txt_nombre_proveedor').html("");
            $('#txt_nombre_proveedor').append($("<option data-extra='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                    
            $("#id_proveedor").val(data[0])            
		    },
		    error: function (data) {		        
		    }	        
	     });
	});	
  /*buscador del nombre del proveedor*/
  var input_nombre = $("#txt_nombre_proveedor_chosen").children().next().children();    
  $(input_nombre).on("keyup",function(input_ci){
    var text = $(this).children().val();
     $.ajax({        
          type: "POST",
          dataType: 'json',        
          url: "../carga_ubicaciones.php?tipo=0&id=0&fun=14&val="+text,        
          success: function(data, status) {
            $('#txt_nombre_proveedor').html("");            
            for (var i = 0; i < data.length; i=i+3) {                                                 
              appendToChosen(data[i],data[i+1],text,data[i+2],"txt_nombre_proveedor","txt_nombre_proveedor_chosen");
            }           
            $('#txt_nro_identificacion').html("");
            $('#txt_nro_identificacion').append($("<option data-extra='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                    
            $("#id_proveedor").val(data[0])            
        },
        error: function (data) {
            alert(data);
        }         
       });
  }); 
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
	$("#txt_nro_identificacion").chosen().change(function (event,params){
		if(params == undefined){			
			$('#txt_nro_identificacion').html("");
			$('#txt_nro_identificacion').append($("<option></option>"));    			
			$('#txt_nro_identificacion').trigger('chosen:updated')
			$('#txt_nombre_proveedor').html("");
			$('#txt_nombre_proveedor').append($("<option></option>"));    			
			$('#txt_nombre_proveedor').trigger('chosen:updated');			
      $("#id_proveedor").val("");            
		}else{        
      var a = $("#txt_nro_identificacion option:selected");            
      $('#txt_nombre_proveedor').html("");
      $('#txt_nombre_proveedor').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
      $("#id_proveedor").val($(a).text());
    }
	});	
  $("#txt_nombre_proveedor").chosen().change(function (event,params){    
    if(params == undefined){      
      $('#txt_nro_identificacion').html("");
      $('#txt_nro_identificacion').append($("<option></option>"));          
      $('#txt_nro_identificacion').trigger('chosen:updated')
      $('#txt_nombre_proveedor').html("");
      $('#txt_nombre_proveedor').append($("<option></option>"));          
      $('#txt_nombre_proveedor').trigger('chosen:updated');     
      $("#id_proveedor").val("")            
    }else{        
      var a = $("#txt_nombre_proveedor option:selected");            
      $('#txt_nro_identificacion').html("");
      $('#txt_nro_identificacion').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
      $("#id_proveedor").val($(a).val());
    }
  }); 	
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


///////////////////////////guardar factura compra/////////////////////7
$("#btn_0").on("click",guardar_factura);



/////////////////////////////////////////////////////////////////////



}

/*---------------------------------*/