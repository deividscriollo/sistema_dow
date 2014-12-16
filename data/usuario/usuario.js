$(document).on("ready",inicio);
$(document).keypress(function(e) {
    if(e.which == 13) {
        guardar();
    }
});
$(function(){
    Test = {
        UpdatePreview: function(obj){
            // if IE < 10 doesn't support FileReader
            if(!window.FileReader){
            // don't know how to proceed to assign src to image tag
            } else {
                var reader = new FileReader();
                var target = null;
             
                reader.onload = function(e) {
                    target =  e.target || e.srcElement;
                    $("#foto").prop("src", target.result);
                };
                reader.readAsDataURL(obj.files[0]);
            }
        }
    };
});
/*--*/
function inicio (){
	/*----para la imagen----*/
	function getDoc(frame) {
    	var doc = null;     
     	
     	try {
        	if (frame.contentWindow) {
            	doc = frame.contentWindow.document;
         	}
     	} catch(err) {
    	}
	    if (doc) { 
	         return doc;
	    }
	    try { 
	         doc = frame.contentDocument ? frame.contentDocument : frame.document;
	    } catch(err) {
	       
	         doc = frame.document;
	    }
	    return doc;
 	}
 	/*------------*/
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
    /*igualar password*/
    $("#txt_6").focus(function (){
    	if($("#txt_5").val() == ""){
    		alert("Digite una contraseña");
    		$("#txt_5").focus();
    	}    	    	
    });    
    /*-----*/
    /*procesos de guardar buscar modificar*/    
	$("#btn_0").on("click",guardar);
    /*------*/

}
function guardar(){///funcion para guardar datos
	if($("#txt_5").val() == $("#txt_6").val())
	{
	    var resp=comprobarCamposRequired("form_usuario");	    
	    if(resp==true){    	
	        $("#form_usuario").on("submit",function (e){           	
	            var valores = $("#form_usuario").serialize();
	            var texto=($("#btn_0").text()).trim();   
				var formObj = $(this);		
				if(window.FormData !== undefined) {	
					var formData = new FormData(this); 		    					
					if(texto=="Guardar"){       
	                	guardar_datos(formData,"g",e);
		            }else{
		                guardar_datos(formData,"m",e);
		            }	    
					e.preventDefault();						
				}else{
				    var  iframeId = "unique" + (new Date().getTime());
				    var iframe = $('<iframe src="javascript:false;" name="'+iframeId+'" />');
				    iframe.hide();
				    formObj.attr("target",iframeId);
				    iframe.appendTo("body");
			    	iframe.load(function(e) {
			        	var doc = getDoc(iframe[0]);
				        var docRoot = doc.body ? doc.body : doc.documentElement;
				        var data = docRoot.innerHTML;
				    });			
				}	                    	            	            
		    });	  
		    $("#form_usuario").submit();	      	    
		    $("#form_usuario").unbind("submit")
	    }else{    	
	    	alert("Complete todos los campos requeridos")
	    	$('#form_usuario input:required').each(function(e){
	    		var com = $(this).parent().parent().attr("class");
	    		var patt = new RegExp("has-error");
    			var res = patt.test(com);    			
    			if(res == true){
    				$(this).focus();
    				return false;
    			}

	    	});
	    }
    }else{
    	$("#txt_6").val("");
    	$("#txt_6").focus();
    	alert("Repíta la contraseña ingresada")
    }
}
function guardar_datos(formData,tipo,p){
	$.ajax({
	    url: "usuario.php?tipo="+tipo,				    
	    type: "POST",
	    data:  formData,
	    mimeType:"multipart/form-data",
	    contentType: false,
	    cache: false,
	    processData:false,
	    success: function(data, textStatus, jqXHR)
	    {				    
	    	if( data == 0 ){
	    		alert('Datos Agregados Correctamente');	
	    		location.reload();
	    	}else{
	    		if( data == 1 ){
	    			alert('Este usuario ya existe. Ingrese otro');		    			
	    			$("#txt_13").val("");
	    			$("#txt_13").focus();
	    		}else{
	    			alert("Error al momento de enviar los datos. La página se recargara")
	    			location.reload();
	    		}
	    	}

		},
		error: function(jqXHR, textStatus, errorThrown) 
	    {
	    } 	
	}); 
}

