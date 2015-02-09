$(document).on("ready",inicio);
function inicio (){			
	var input = $("#txt_nro_identificacion_chosen").children().next().children();	
	$(input).on("keyup",function(input){
		var text = $(this).children().val()
		 $.ajax({        
	        type: "POST",
	        dataType: 'json',        
	        url: "../carga_ubicaciones.php?tipo=0&id=0&fun=12&val="+text,        
	        success: function(data, status) {
	        	$('#txt_nro_identificacion').html("");
	        	for (var i = 0; i < data.length; i=i+3) {            				            		            	
		        	appendToChosen(data[i],data[i+1]);
		        }
		    },
		    error: function (data) {
		        alert(data);
		    }	        
	     });
	});
	

}
function appendToChosen(id,value){	
    $('#txt_nro_identificacion')
        .append($('<option></option>')
        .val(id)
        //.attr('selected', 'selected')
        .html(value)).trigger('chosen:updated');
}



/*---------------------------------*/