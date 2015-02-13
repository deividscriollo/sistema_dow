$(document).on("ready",inicio);
function inicio (){			
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
}
function appendToChosen(id,value,text,extra){			
    $('#txt_nro_identificacion').append($("<option data-extra='"+extra+"'></option>").val(id).html(value)).trigger('chosen:updated');        
    var input_ci = $("#txt_nro_identificacion_chosen").children().next().children();	
    $(input_ci).children().val(text);        
    //console.log($("#txt_nro_identificacion_chosen").children().children().next())        
}
/*---------------------------------*/