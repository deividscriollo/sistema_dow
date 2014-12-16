$(document).on("ready",inicio);
function inicio (){
	/*funcion inicial de la imagen y  buscadores del select no topar plz*/
	$('#txt_0').ace_file_input({
		style:'well',
		btn_choose:'Seleccionar',
		btn_change:null,
		no_icon:'ace-icon fa fa-image',
		droppable:true,
		thumbnail:'small'
	});
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
	$("input").on("keyup click",function (e){//campos requeridos		
		comprobarCamposRequired(e.currentTarget.form.id)
	});	
	/*cargr el select de cargos*/
    $.ajax({      /*cargar el select ciudades*/         
        type: "POST",
        dataType: 'json',        
        url: "carga_ubicaciones.php?tipo=0&id=0&fun=4",        
        success: function(response) {         
            for (var i = 0; i < response.length; i=i+2) {            	
				$("#txt_4").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
            }   
            $("#txt_4").trigger("chosen:updated");                              
        }                   
    });     
	/*cargar el select pais*/
	$.ajax({        
        type: "POST",
        dataType: 'json',        
        url: "carga_ubicaciones.php?tipo=0&id=0&fun=1",        
        success: function(response) {         
            for (var i = 0; i < response.length; i=i+2) {            	
				$("#txt_9").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
            }   
            $("#txt_9").trigger("chosen:updated");                              
            $.ajax({       /*cargar el select provincia*/        
		        type: "POST",
		        dataType: 'json',        
		        url: "carga_ubicaciones.php?tipo=0&id="+$("#txt_9").val()+"&fun=2",        
		        success: function(response) {         
		            for (var i = 0; i < response.length; i=i+2) {            	
						$("#txt_10").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
		            }   
		            $("#txt_10").trigger("chosen:updated");      
		            $.ajax({      /*cargar el select ciudades*/         
				        type: "POST",
				        dataType: 'json',        
				        url: "carga_ubicaciones.php?tipo=0&id="+$("#txt_10").val()+"&fun=3",        
				        success: function(response) {         
				            for (var i = 0; i < response.length; i=i+2) {            	
								$("#txt_11").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
				            }   
				            $("#txt_11").trigger("chosen:updated");                              
				        }                   
				    });                        
		        }                   
		    });
        }                   
    });    
    /*----------------*/     
    $("#txt_9").change(function (){
    	$.ajax({       /*cargar el select provincia*/        
	        type: "POST",
	        dataType: 'json',        
	        url: "carga_ubicaciones.php?tipo=0&id="+$("#txt_9").val()+"&fun=2",        
	        success: function(response) {         
	        	$("#txt_10").html("");
	            for (var i = 0; i < response.length; i=i+2) {            	
					$("#txt_10").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
	            }   
	            $("#txt_10").trigger("chosen:updated");      
	            $.ajax({      /*cargar el select ciudades*/         
			        type: "POST",
			        dataType: 'json',        
			        url: "carga_ubicaciones.php?tipo=0&id="+$("#txt_10").val()+"&fun=3",        
			        success: function(response) {  
			        	$("#txt_11").html("");       
			            for (var i = 0; i < response.length; i=i+2) {            	
							$("#txt_11").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
			            }   
			            $("#txt_11").trigger("chosen:updated");                              
			        }                   
			    });                        
	        }                   
	    });
    });
	$("#txt_10").change(function (){
    	$.ajax({       /*cargar el select provincia*/        
	        type: "POST",
	        dataType: 'json',        
	        url: "carga_ubicaciones.php?tipo=0&id="+$("#txt_10").val()+"&fun=3",        
	        success: function(response) {         
	        	$("#txt_11").html("");
	            for (var i = 0; i < response.length; i=i+2) {            	
					$("#txt_11").append("<option value ="+response[i]+">"+response[i+1]+"</option>");            																																
	            }   
	            $("#txt_11").trigger("chosen:updated");      	                             
	        }                   
	    });
    });
}