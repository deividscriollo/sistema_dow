$(document).on("ready",inicio);

//////////////////para la hora///////////
function show() {
    var Digital = new Date();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();
    var dn = "AM";
    if (hours > 12) {
        dn = "PM";
        hours = hours - 12;
    }
    if (hours === 0)
        hours = 12;
    if (minutes <= 9)
        minutes = "0" + minutes;
    if (seconds <= 9)
        seconds = "0" + seconds;
    $("#hora_actual").val(hours + ":" + minutes + ":" + seconds + " " + dn);

    setTimeout("show()", 1000);
}
//////////////////////////


		//////////////////para punto////////
	function punto(e){
		 var key;
		if (window.event)
		{
		    key = e.keyCode;
		}
		else if (e.which)
		{
		    key = e.which;
		}

		if (key < 48 || key > 57)
		{
		    if (key === 46 || key === 8)
		    {
		        return true;
		    }
		    else
		    {
		        return false;
		    }
		}
		return true;   
	}
///////////////////////////////////

///////////////eventos////////////
function enter(e) {
    if (e.which === 13 || e.keyCode === 13) {
        agregar();
        return false;
    }
    return true;
}

function enter2(e) {
    if (e.which === 13 || e.keyCode === 13) {
        agregar2();
        return false;
    }
    return true;
}

function enter3(e) {
    if (e.which === 13 || e.keyCode === 13) {
        agregar3();
        return false;
    }
    return true;
}


/////////////////////////////////

///////////////eliminar filas//////////////
function fn_dar_eliminar(){

	alert("eliminar");
  //   var subtotal = 0;
  //   var subtotal_general = 0;
  //   var iva = 0;
  //   var iva_general = 0;
  //   var total_general = 0;  
  //   $("a.elimina").click(function(){   
  //   $(this).parents("tr").fadeOut("normal", function(){
  //   var va;
  //   $(this).children("td").each(function (index) {
  //           switch (index) {
  //           case 6:
  //          va=$(this).text();
  //           break;
  //           }
  //   });
    
    
  //   ///////////////calcular valores//////////////////////
  //   subtotal = (va / 1.12).toFixed(2);
  //   iva = (va-subtotal).toFixed(2);
    
  //   total_general = (parseFloat($("#total").val()) - parseFloat(va)).toFixed(2);
  //   subtotal_general = (parseFloat($("#subtotal").val()) - parseFloat(subtotal)).toFixed(2);
  //   iva_general= (parseFloat($("#iva").val()) - parseFloat(iva)).toFixed(2);
  //   $("#subtotal").val(subtotal_general);
  //   $("#iva").val(iva_general);
  //   $("#total").val(total_general);
  //   ///////////////////////////////////////////////////
    
  //  $(this).remove(); 
  // }) 
  // })
}
//////////////////////////////////////////

//////////////modificar filas/////////////
function fn_dar_modificar(){
	$("a.dc_btn_accion").click(function(){ 
    var id,codigo,producto,cantidad,precio,descuento;
		$("#detalle_factura tbody tr").each(function (index) {  
    	 $(this).children("td").each(function (index) {
	        switch (index) {
	            case 0:
	            id=$(this).text();
	            break;
	            case 1:
	            codigo=$(this).text();
	            break;
	            case 2:
	            producto=$(this).text();
	            break;
	            case 3:
	            cantidad=$(this).text();
	            break;
	            case 4:
	            precio=$(this).text();
	            break;
	            case 5:
	            descuento=$(this).text();
	            break;
            }
       	 });
      })
      // $("#id_productos").val("");
      // $("#codigo").val("");
      // $("#producto").val("");
      // $("#cantidad").val("");
      // $("#precio").val("");
      // $("#descuento").val("");		

     alert(id);
     alert(codigo);
     alert(producto);
     alert(cantidad);
     alert(precio);
     alert(descuento);
	})
}
////////////////////////////////////////



////////////funciones gregar///////////////
function agregar(){
    if ($("#id_productos").val() === "") {
        $("#codigo").focus();
        alert("Código");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Código");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                } else {
                    if ($("#cantidad").val() === "0") {
                        $("#cantidad").focus();
                        alert("Cantidad válida");
                    } else {
                        $("#precio").focus();
                    }
                }
            }
        }
    }

}

////////////////////////////////////////
function agregar2() {
    if ($("#id_productos").val() === "") {
        $("#codigo").focus();
        alert("Código");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Código");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                } else {
                    if ($("#cantidad").val() === "0") {
                        $("#cantidad").focus();
                        alert("Cantidad válida");
                    } else {
                        if ($("#precio").val() === "") {
                            $("#precio").focus();
                            alert("Precio");
                        } else {
                            $("#descuento").focus();
                        }
                    }
                }
            }
        }
    }
}


////////////////////////////////////////
function agregar3() {
    if ($("#id_productos").val() === "") {
        $("#codigo").focus();
        alert("Código");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Código");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                } else {
                    if ($("#cantidad").val() === "0") {
                        $("#cantidad").focus();
                        alert("Cantidad válida");
                    } else {
                        if ($("#precio").val() === "") {
                            $("#precio").focus();
                            alert("Precio");
                        } else {

                            ///////////////////agregar tabla////////////
                            var vect = new Array();
					        var cont=0;
					        var repe = 0;
					        var precio = 0;
					        var multi = 0;
                            var subtotal = 0;
					        var subtotal_general = 0;
					        var iva = 0;
					        var iva_general = 0;
					        var descuento = 0;
					        var desc = 0;
					        var total = 0;
					        var total_general = 0;

                            //////recorro toda la tabla                      
					        var contadort=0;
					        $("#detalle_factura tbody tr").each(function (index) {                                  
					            $(this).children("td").each(function (index) { 
					                contadort++;                                 
					            })                                                         
					        })     
					        /////////////////////////////////
					      if(contadort == 0){
						        //subtotal = (total / 1.12).toFixed(2);
						        //iva = (total-subtotal).toFixed(2);	
                                if ($("#descuento").val() !== "") {
                                    desc = $("#descuento").val();
                                    precio = (parseFloat($("#precio").val())).toFixed(2);
                                    multi = ($("#cantidad").val() * parseFloat($("#precio").val())).toFixed(2);
                                    descuento = ((multi * parseFloat($("#descuento").val()))/100).toFixed(2);
                                    total = (multi - descuento).toFixed(2);
                                }else{
                                	desc = 0;
                                    precio = (parseFloat($("#precio").val())).toFixed(2);
                                    total = (parseFloat($("#cantidad").val()) * precio).toFixed(2);
                                } 	

                               $("#detalle_factura tbody").append( "<tr>" +
				                "<td align=center>" + $("#id_productos").val() +"</td>" +
				                "<td align=center>" + $("#codigo").val() + "</td>" +
				                "<td align=center>" + $("#producto").val() +"</td>" +
				                "<td align=center>" + $("#cantidad").val() +"</td>" +
				                "<td align=center>" + precio + "</td>" +
				                "<td align=center>" + desc +"</td>" +
				                "<td align=center>" + total + "</td>" +
				                "<td align=center>" + "<div class=hidden-sm hidden-xs action-buttons> <a class='green dc_btn_accion tooltip-success' data-rel='tooltip' data-original-title='Modificar'><i class='ace-icon fa fa-pencil bigger-130' onclick='return fn_dar_modificar(event)'></i></a>  <a class='red dc_btn_accion tooltip-error' data-rel='tooltip' data-original-title='Eliminar'><i class='ace-icon fa fa-trash-o bigger-130' onclick='return fn_dar_eliminar(event)'></i></a></div>"+ "</td>" +
				                "</tr>" ); 
                                $("#id_productos").val("");
                                $("#codigo").val("");
                                $("#producto").val("");
                                $("#cantidad").val("");
                                $("#precio").val("");
                                $("#descuento").val("");


					      }
					      else{
                              //////////////comprobar repetidos/////////////// 
				               $("#detalle_factura tbody tr").each(function (index) {                                                                 
				               $(this).children("td").each(function (index) {                               
						               switch (index) {                                            
						                 case 0:
						                 vect[cont] = $(this).text();   
						                 break;                                                                                                                               
						              }                                          
						            });
						            cont++;  
					           });

					           for(var i=0 ; i<vect.length; i++) {
						            if(vect[i] == $("#id_productos").val()) {
						                repe++;
						            }
						          } 
					           //////////////////////////////////////////////
                              if(repe==0){
                                 if ($("#descuento").val() !== "") {
                                    desc = $("#descuento").val();
                                    precio = (parseFloat($("#precio").val())).toFixed(2);
                                    multi = ($("#cantidad").val() * parseFloat($("#precio").val())).toFixed(2);
                                    descuento = ((multi * parseFloat($("#descuento").val()))/100).toFixed(2);
                                    total = (multi - descuento).toFixed(2);
                                }else{
                                	desc = 0;
                                    precio = (parseFloat($("#precio").val())).toFixed(2);
                                    total = (parseFloat($("#cantidad").val()) * precio).toFixed(2);
                                } 	

                               $("#detalle_factura tbody").append( "<tr>" +
				                "<td align=center>" + $("#id_productos").val() +"</td>" +
				                "<td align=center>" + $("#codigo").val() + "</td>" +
				                "<td align=center>" + $("#producto").val() +"</td>" +
				                "<td align=center>" + $("#cantidad").val() +"</td>" +
				                "<td align=center>" + precio + "</td>" +
				                "<td align=center>" + desc +"</td>" +
				                "<td align=center>" + total + "</td>" +
				                "<td align=center>" + "<div class=hidden-sm hidden-xs action-buttons> <a class='green dc_btn_accion tooltip-success' data-rel='tooltip' data-original-title='Modificar'><i class='ace-icon fa fa-pencil bigger-130' fn_dar_modificar(event)></i></a>  <a class='red dc_btn_accion tooltip-error' data-rel='tooltip' data-original-title='Eliminar'><i class='ace-icon fa fa-trash-o bigger-130' fn_dar_eliminar(event)></i></a></div>"+ "</td>" +
				                "</tr>" ); 
                                $("#id_productos").val("");
                                $("#codigo").val("");
                                $("#producto").val("");
                                $("#cantidad").val("");
                                $("#precio").val("");
                                $("#descuento").val("");
                             }else{
                             	alert("Error... El producto ya esta ingresado");

                            }
					      }
                         alert("ok");


                        }
                    }
                }
            }
        }
    }
}

///////////////////////////////


function inicio (){		
	//////para hora////
	show();
	///////////////////

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
	/////////////////////////////////////////////

	//////////////para precio////////
    $("#precio").on("keypress",punto);
    ////////////////////////////////


    ////////////////////eventos campos/////////////
    $("#codigo").on("keypress", enter);
    $("#producto").on("keypress", enter);
    $("#cantidad").on("keypress", enter);
    $("#precio").on("keypress", enter2);
    $("#descuento").on("keypress", enter3);
    ///////////////////////////////////////


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
		        alert(data);
		    }	        
	     });
	});	
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
}
function appendToChosen(id,value,text,extra,chosen,chosen1){			
    $('#'+chosen).append($("<option data-extra='"+extra+"'></option>").val(id).html(value)).trigger('chosen:updated');        
    var input_ci = $("#"+chosen1).children().next().children();	
    $(input_ci).children().val(text);        
    //console.log($("#txt_nro_identificacion_chosen").children().children().next())        
}
/*---------------------------------*/