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
	/*----*/
	$("#btn_0").on('click',guardar_plan);
	/*------------*/	
	$("input").on("keyup click",function (e){//campos requeridos		
		comprobarCamposRequired(e.currentTarget.form.id)
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
	    	}else{
	    		if( data == 1 ){
	    			alert('El ' +$("#txt_1").val()+  ' ya existe ingrese otro');	
	    			$("#txt_2").val()	    			
	    		}else{
	    			alert("Error al momento de enviar los datos la página se recargara");	    			
	    			//actualizar_form();
	    		}
	    	}
		}
	}); 
}