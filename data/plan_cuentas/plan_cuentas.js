$(document).on("ready",inicio);
function inicio (){			
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
	/*---------*/
	cargar_cuentas();
	/*----*/
	$("#btn_0").on('click',guardar_plan);
	/*------------*/	
	$("input").on("keyup click",function (e){//campos requeridos		
		comprobarCamposRequired(e.currentTarget.form.id)
	});	
	/*--------*/
	$('#td_cuentas tbody').on( 'dblclick', 'tr', function () {  		             	    	
        var data=$("#td_cuentas").dataTable().fnGetData($(this));
        //console.log(data);        
        $("#txt_0").val(data[0]);
        $("#codigo").val(data[3]);
        $("#txt_1").val(data[1]);
        $("#txt_2").val(data[2]);        
        $("#codigo").trigger("chosen:updated"); 	
        $("#btn_0").text("");
        $("#btn_0").append("<span class='glyphicon glyphicon-log-in'></span> Modificar");     	            
	});
}
function guardar_plan(){
	var resp=comprobarCamposRequired("form_plan_cuentas");
	if(resp==true){
		$("#form_plan_cuentas").on("submit",function (e){				
			var valores = $("#form_plan_cuentas").serialize();
			var texto=($("#btn_0").text()).trim();	
			if(texto=="Guardar"){						
				datos_plan(valores,"g",e);					
			}else{
				datos_plan(valores,"m",e);					
			}
			e.preventDefault();
    		$(this).unbind("submit")
		});
	}
}
function datos_plan(valores,tipo,p){	
	$.ajax({				
		type: "POST",
		data: valores+"&tipo="+tipo,		
		url: "plan_cuentas.php",			
	    success: function(data) {	
	    	if( data == 0 ){
	    		alert('Datos Agregados Correctamente');			
	    		limpiar_form(p);
	    		cargar_cuentas();	    		
	    	}else{
	    		if( data == 1 ){
	    			alert('El ' +$("#txt_1").val()+  ' ya existe ingrese otro');	
	    			$("#txt_2").val()	    			
	    		}else{
	    			alert("Error al momento de enviar los datos la página se recargara");	    			
	    			actualizar_form();
	    		}
	    	}
		}
	}); 
}
function cargar_cuentas(){		
	var dataTable = $('#td_cuentas').dataTable();
    $("#dynamic-table tbody").empty(); 
    $.ajax({
        type: "POST",
        url: "cuentas.php",          
        dataType: 'json',
        success: function(response) {   
        	dataTable.fnClearTable();
			for(var i = 0; i < response.length; i++) {
				dataTable.fnAddData([
					response[i][0],
					response[i][1],
					response[i][2],					
					response[i][3],
					response[i][4],
					response[i][5],
					response[i][6],
					response[i][7],				
				]);
			} // End For
		},
		error: function(e){
			console.log(e.responseText);
		}              	
                                
   	});      
}