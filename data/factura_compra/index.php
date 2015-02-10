<?php include('../menu/index.php'); ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		
		<link rel="shortcut icon" href="../../dist/images/logo.fw.png">
		<title>Inicio - <?php empresa(); ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../../dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../../dist/css/font-awesome.min.css" />
		<!-- Select -->
		<link rel="stylesheet" href="../../dist/css/chosen.min.css" />		
		<link rel="stylesheet" href="../../dist/css/ui.jqgrid.min.css" />
		<link rel="stylesheet" href="../../dist/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="../../dist/css/datepicker.min.css" />
		<link rel="stylesheet" href="../../dist/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="../../dist/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="../../dist/css/bootstrap-datetimepicker.min.css" />



		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../../dist/css/fontdc.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link type="text/css" rel="stylesheet" id="ace-skins-stylesheet" href="../../dist/css/ace-skins.min.css">

		<!-- ace settings handler -->
		<script src="../../dist/js/ace-extra.min.js"></script>
	</head>

	<body class="skin-1">
		<?php menu_arriba(); ?>

		<div class="main-container" id="main-container">
			

			<?php menu_lateral(); ?>

			 <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="../inicio/">Inicio</a>
                            </li>
                            <li class="active">Ingresos</li>
                            <li class="active">Clientes</li>
                            
                        </ul>
                    </div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title"><i class="ace-icon fa fa-user"></i> Factura Compra</h5>

										<div class="widget-toolbar">
											

											<a href="#" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>

											<a href="#" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>
										</div>
									</div>									
									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_cliente">	
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-3 hide">
																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Comprobante:</label>
																	<div class="col-sm-8">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" readonly data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																																																						
																	</div>
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Responsable:</label>
																	<div class="col-sm-6">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" readonly data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																																																						
																	</div>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Fecha Actual:</label>
																	<div class="col-sm-8">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" readonly data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																																																						
																	</div>
																</div>
															</div>
															<div class="col-sm-3">
																<div class="form-group">
																	<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Hora Actual:</label>
																	<div class="col-sm-8">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" readonly data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																																																						
																	</div>
																</div>
															</div>
															
														</div>
													</div>
													<div class="hr"></div>																									
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Nro de Identificación:</label>
																	<div class="col-sm-6">
																		<select class="chosen-select form-control" id="txt_nro_identificacion" name="txt_nro_identificacion" data-placeholder="Nro de identifiación">	                                                                        
	                                                                        <option value=""> </option>	                                                                        
	                                                                    </select>
																	</div>																													
																</div>
															</div>
															
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="form-field-1-1"> Proveedor: </label>
																	<div class="col-sm-7">
																		<select class="chosen-select form-control" id="txt_nombre_proveedor" name="txt_nombre_proveedor" data-placeholder="Nro de identifiación">	                                                                        
	                                                                        <option value=""> </option>	                                                                        
	                                                                    </select>
																	</div>
																</div>
															</div>															
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="form-field-1">Tipo de Comprobante</label>
																	<div class="col-sm-7">
																		<select class="chosen-select form-control" id="txt_8" name="txt_8" data-placeholder="Tipo de Comprobante">
	                                                                        <option value="Factura"> Factura</option>
	                                                                        <option value="Nota_venta"> Nota o boleta de venta</option>
	                                                                    </select>
																	</div>																	
																</div>
															</div>															
														</div>
													</div>													
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Fecha Registro:</label>
																	<div class="col-sm-6">
																		<div class="input-group">
																			<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	</div>																													
																</div>
															</div>
															
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="form-field-1-1"> Fecha Emisión: </label>
																	<div class="col-sm-7">
																		<div class="input-group">
																			<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	</div>
																</div>
															</div>															
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="form-field-1">Fecha Caducidad:</label>
																	<div class="col-sm-7">
																		<div class="input-group">
																			<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
																			<span class="input-group-addon">
																				<i class="fa fa-calendar bigger-110"></i>
																			</span>
																		</div>
																	</div>																	
																</div>
															</div>															
														</div>
													</div>
													<div class="row">
														<div class="col-xs-12">
															
															<div class="col-sm-4">
																<div class="form-group">																	
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Nro de Autorización:</label>
																	<div class="col-sm-6">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																	</div>																														
																</div>
															</div>
															<div class="col-xs-8">															
																<div class="form-group">
																	<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Numero de serie:</label>
																	<div class="col-sm-4">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																		
																	</div>	
																	<div class="col-sm-3">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																		
																	</div>	
																	<div class="col-sm-3">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" />																		
																	</div>																													
																</div>												
															</div>
														</div>
													</div>
													<div class="row ">
														<div class="col-xs-12">																													
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Fecha cancelación:</label>
																	<div class="col-sm-6">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																	</div>																														
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> Forma de Pago:</label>
																	<div class="col-sm-6">
																		<select class="chosen-select form-control" id="txt_8" name="txt_8" data-placeholder="Forma de Pago">
	                                                                        <option value="CONTADO">CONTADO</option>
	                                                                        <option value="CREDITO">CREDITO</option>
	                                                                    </select>
																	</div>																														
																</div>														
															</div>
															<div class="col-xs-4"></div>
														</div>
													</div>
													<div class="row ">
														<div class="col-xs-12">
															<div class="col-xs-12">
																<h3 class="header smaller lighter green">
																	<i class="ace-icon fa fa-bullhorn"></i>
																	Detalle Factura
																</h3>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-12">
															<div class="col-xs-3">
																<div class="row">
																	<div class="col-xs-12">
																		<label> Codigo de Barra:</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																	</div>
																</div>
															</div>
															<div class="col-xs-3">
																<div class="row">
																	<div class="col-xs-12">
																		<label> Codigo:</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																	</div>
																</div>
															</div>
															<div class="col-xs-3">
																<div class="row">
																	<div class="col-xs-12">
																		<label> Producto:</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12">
																		<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																	</div>
																</div>
															</div>
															<div class="col-xs-3">
																<div class="row">
																	<div class="col-xs-12">
																		<div class="col-sm-4">
																			<div class="row">
																				<div class="col-xs-12">
																					<label> Cantidad:</label>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12">
																					<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4">
																			<div class="row">
																				<div class="col-xs-12">
																					<label> Precio:</label>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12">
																					<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																				</div>
																			</div>
																		</div>
																		<div class="col-sm-4">
																			<div class="row">
																				<div class="col-xs-12">
																					<label> Descuento:</label>
																				</div>
																			</div>
																			<div class="row">
																				<div class="col-xs-12">
																					<input type="text" id="txt_2" name="txt_2" class="form-control" data-toggle="tooltip" maxlength="3" required pattern="" /> 
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-12">
																<div class="hr hr-18 dotted hr-double"></div>
															</div>
														</div>
													</div>
													
													<div class="row">														
														<div class="col-xs-12">
														 	<div class="col-sm-12">
																<table id="" class="table table-striped table-bordered table-hover">
																	<thead>
																		<tr style="background-color: #428BCA; color: white;">
																			<th class="center" width="2px"><i class="ace-icon fa fa-bars"></i></th>
																			<th class="center" width="100px"><i class="ace-icon fa fa-barcode"></i> Codigo</th>
																			<th class="center"><i class="ace-icon fa fa-info"></i> Detalle</th>
																			<th class="center" width="100px"><i class="ace-icon fa fa-list-ol"></i> Cantidad</th>
																			<th class="center" width="100px"><i class="ace-icon fa fa-money"></i> Precio U.</th>
																			<th class="center" width="100px"><i class="ace-icon fa fa-area-chart"> Descuento</th>
																			<th class="center" width="100px"><i class="ace-icon fa fa-usd"> Total</th>
																			<th class="center" width="90px"><i class="ace-icon fa fa-cogs"></i> Accion</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="center">1</td>
																			<td class="center">12340000000000</td>
																			<td class="center">esto es ejemplo</td>
																			<td class="center">25</td>
																			<td class="center">12.05</td>
																			<td class="center">1</td>
																			<td class="center">10.15</td>
																			<td class="center">
																				<div class="hidden-sm hidden-xs action-buttons ">															
																					<a class="green dc_btn_accion tooltip-success" data-rel="tooltip" data-original-title="Modificar">
																						<i class="ace-icon fa fa-pencil bigger-130" ></i>
																					</a>

																					<a class="red dc_btn_accion tooltip-error" data-rel="tooltip" data-original-title="Eliminar">
																						<i class="ace-icon fa fa-trash-o bigger-130"></i>
																					</a>
																				</div>																				
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="row">
																<div class="col-xs-12">
																	<div class="col-sm-9"></div>
																	<div class="col-sm-3">
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook"> Tarifa 0:</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="form-field-facebook">
																					<i class="ace-icon fa fa-usd purple"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook"> Tarifa 12:</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="form-field-facebook">
																					<i class="ace-icon fa fa fa-usd orange"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook"> 12 % Iva</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="form-field-facebook">
																					<i class="ace-icon fa fa fa-usd red"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook"> Descuento</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="form-field-facebook">
																					<i class="ace-icon fa fa fa-usd green"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-facebook"> Total</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="form-field-facebook">
																					<i class="ace-icon fa fa-facebook blue"></i>
																				</span>
																			</div>
																		</div>
																	</div>																	
																</div>
															</div>
														</div>														
													</div>
													<div class="row">
														<div class="center">													 
															<button type="submit" class="btn btn-primary" id="btn_0">
																<i class="ace-icon fa fa-floppy-o bigger-120 write"></i>
																Guardar
															</button>
															<button type="button" id="btn_1" class="btn btn-primary">
																<i class="ace-icon fa fa-file-o bigger-120 write"></i>
																Limpiar
															</button>
															<button type="button" id="btn_2" class="btn btn-primary">
																<i class="ace-icon fa fa-refresh bigger-120 write"></i>
																Actualizar
															</button>														
															<button data-toggle="modal" href="#myModal" type="button" id="btn_3" class="btn btn-primary">
																<i class="ace-icon fa fa-search bigger-120 write"></i>
																Buscar
															</button>
															<button type="button" id="btn_4" class="btn btn-primary">
																<i class="ace-icon fa fa-arrow-circle-left bigger-120 write"></i>
																Atras
															</button>
															<button type="button" id="btn_5" class="btn btn-primary">
																<i class="ace-icon fa fa fa-arrow-circle-right bigger-120 write"></i>
																Adelante
															</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div><!-- /.main-content -->

			<?php footer(); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		
		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../../dist/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../dist/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../../dist/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../../dist/js/jquery-ui.custom.min.js"></script>
		<script src="../../dist/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../../dist/js/jquery.easypiechart.min.js"></script>
		<script src="../../dist/js/jquery.sparkline.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.pie.min.js"></script>
		<script src="../../dist/js/flot/jquery.flot.resize.min.js"></script>
		<script src="../../dist/js/chosen.jquery.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="../../dist/js/date-time/moment.min.js"></script>
		<script src="../../dist/js/date-time/daterangepicker.min.js"></script>
		<script src="../../dist/js/date-time/bootstrap-datetimepicker.min.js"></script>




		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		<script src="../../dist/js/jqGrid/jquery.jqGrid.min.js"></script>
        <script src="../../dist/js/jqGrid/i18n/grid.locale-en.js"></script>
		
		<script src="../generales.js"></script>
		<script src="factura_compra.js"></script>
		

		<!-- inline scripts related to this page -->

	

	</body>
</html>  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">BUSCAR USUARIOS</h4>
        </div>
        <div class="modal-body">
            <table id="table"></table>
			<div id="pager"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<script type="text/javascript">
	// tooltips 
	$('[data-rel=tooltip]').tooltip();
	//calendario
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	});
	// seclect chosen 
	$('.chosen-select').chosen({
		allow_single_deselect:true,
		no_results_text:'No encontrado'		
	});

	//console.log($('#txt_nro_identificacion_chosen chosen-drop chosen-search input').children())


</script>
<!-- <a class="chosen-single" tabindex="-1">
	<span>Factura</span><div><b></b></div>
</a>
<div class="chosen-drop">
	<div class="chosen-search">
		<input type="text" autocomplete="off">
	</div>
	<ul class="chosen-results"></ul>
</div> -->