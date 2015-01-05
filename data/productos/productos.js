$(document).on("ready",inicio);
function inicio (){	

	// dar valor inicial para convertir input en spinner o seleccion
		$('#txt_h').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
		$('#txt_mi').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
		$('#txt_ma').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
	// fin dar valor inicial a los espinner


	
}
/*---------------------------------*/