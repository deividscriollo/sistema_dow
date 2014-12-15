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
	

}