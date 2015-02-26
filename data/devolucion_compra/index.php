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
                            <li class="active">Devolución Compra</li>
                        </ul>
                    </div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Devolución Compra</h5>
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
												<form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_devolucionCompra">	
													<div class="row">
														<div class="col-xs-12 pull-right">														
															<div class="col-sm-3">
																<span class="bigger-120" id>
																	<span class="blue bolder">Fecha Actual:</span>
																	<span id ="fecha_actual"></span>
																</span>
															</div>
															<div class="col-sm-3">
																<span class="bigger-120" id>
																	<span class="blue bolder">Hora Actual:</span>
																	<span id="estado"></span>
																</span>
															</div>
															<div class="col-sm-3">
																<span class="bigger-120" id>
																	<span class="red bolder">Responsable:</span>
																	<span id="txt_responsable"><?php print($_SESSION['nombrescompletosdow']); ?></span>
																</span>
															</div>
														</div>
													</div>
													<div class="hr"></div>																									
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-6 control-label no-padding-right" for="txt_nro_identificacion"> Nro de Identificación:</label>
																	<div class="col-sm-6">
																	<input type="hidden" id="id_proveedor" name="id_proveedor">
																		<select class="chosen-select form-control" id="txt_nro_identificacion" name="txt_nro_identificacion" data-placeholder="Buscar...." >	                                                                        
	                                                                        <option value=""> </option>	                                                                        
	                                                                    </select>
																	</div>	
																</div>
															</div>
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="txt_nombre_proveedor"> Proveedor: </label>
																	<div class="col-sm-7">
																		<select class="chosen-select form-control" id="txt_nombre_proveedor" name="txt_nombre_proveedor" data-placeholder="Buscar....">	                                                                        
	                                                                        <option value=""> </option>	                                                                        
	                                                                    </select>
																	</div>
																</div>
															</div>														
															<div class="col-sm-4">
																<div class="form-group">
																	<label class="col-sm-5 control-label no-padding-right" for="txt_nro_factura"> Nro. Factura:</label>
																	<div class="col-sm-7">
																		<input type="hidden" id="id_factura_compra" name="id_factura_compra" />
																		<select class="chosen-select form-control" id="txt_nro_factura" name="txt_nro_factura" data-placeholder="Buscar....">	                                                                        
	                                                                        <option value=""> </option>	                                                                        
	                                                                    </select>
																	</div>																											
																</div>
															</div>													
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
																		<select class="chosen-select form-control" id="codigo_barras" name="codigo_barras" data-placeholder="Código de Barras del Producto">
																			<option value=""></option>
																		</select>																					
																	</div>
																</div>
															</div>
															<div class="col-xs-3">
																<div class="row">
																	<div class="col-xs-12">
																		<label> Código:</label>
																	</div>
																</div>
																<div class="row">
																	<div class="col-xs-12">
																		<select class="chosen-select form-control" id="codigo" name="codigo" data-placeholder="Código del Producto">
																			<option value=""></option>
																		</select>																		
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
																		<select class="chosen-select form-control" id="producto" name="producto" data-placeholder="Descripción del Producto">
																			<option value=""></option>
																		</select>																																				
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
																					<input type="text" id="cantidad" name="cantidad" class="form-control" data-toggle="tooltip"  value="" /> 
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
																					<input type="text" id="precio" name="precio" onkeydown="return validarNumeros(event)" value="0.00" class="form-control" data-toggle="tooltip" readonly  /> 
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
																					<input type="number" id="descuento" name="descuento" class="form-control" data-toggle="tooltip" onkeydown="return validarNumeros(event)" value="0" readonly /> 
																					<input type="hidden" id="id_productos" name="id_productos" class="form-control" data-toggle="tooltip" /> 
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
																<table id="detalle_factura" class="table table-striped table-bordered table-hover">
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
																			<th class="hidden" width="90px"><i class="ace-icon fa fa-cogs"></i> Iva</th>
																		</tr>
																	</thead>
																	<tbody>
																	</tbody>
																</table>
															</div>
															<div class="row">
																<div class="col-xs-12">
																	<div class="col-sm-8"></div>
																	<div class="col-sm-4">
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="tarifa0"> Tarifa 0:</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="tarifa0" name="tarifa0" readonly>
																					<i class="ace-icon fa fa-usd purple"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="tarifa12"> Tarifa 12:</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="tarifa12" name="tarifa12" readonly>
																					<i class="ace-icon fa fa fa-usd orange"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="iva"> 12 % Iva</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="iva" name="iva" readonly>
																					<i class="ace-icon fa fa fa-usd red"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="descuento_total"> Descuento</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="descuento_total" name="descuento_total" readonly>
																					<i class="ace-icon fa fa fa-usd green"></i>
																				</span>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="total"> Total</label>
																			<div class="col-sm-9">
																				<span class="input-icon">
																					<input type="text" value="00.00" id="total" name="total" readonly>
																					<i class="ace-icon fa fa-facebook blue"></i>
																				</span>
																			</div>
																		</div>
																	</div>																	
																</div>
															</div>
														</div>														
													</div>
												</form>
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
											</div>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
		<?php footer(); ?>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
		</div>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../dist/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../../dist/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../dist/js/bootstrap.min.js"></script>

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
		<script src="devolucion_compra.js"></script>
		<script src="../../dist/js/validCampoFranz.js" ></script>
	</body>
</html>  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">BUSCAR FACTURAS COMPRAS</h4>
        </div>
        <div class="modal-body">
            <table id="table"></table>
			<div id="pager"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div id="top-menu" class="modal aside" data-fixed="true" data-placement="top" data-background="true" data-backdrop="invisible" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body container">
				<div class="row">
					<div class="col-sm-5 col-sm-offset-1 white">
						<h3 class="lighter">Imprimir &amp; Factura</h3>
						
					</div>

					<div class="col-sm-5 text-center line-height-2">									
						&nbsp; &nbsp;
						<a class="btn btn-app btn-light no-radius" href="#">
							<i class="ace-icon fa fa-print bigger-230"></i>
							Imprmir
						</a>
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-inverse btn-app btn-xs ace-settings-btn aside-trigger" data-target="#top-menu" data-toggle="modal" type="button">
			<i data-icon="fa-chevron-down" data-icon="fa-chevron-up" class="ace-icon fa fa-chevron-down bigger-110 icon-only"></i>
		</button>
	</div>
 </div>

<script type="text/javascript">
$('.modal.aside').ace_aside();
	$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
	
	// tooltips 
	$('[data-rel=tooltip]').tooltip();
	var f = new Date();
	$('.date-picker').datepicker({
		autoclose: true,
		format:'yyyy-mm-dd',
		startView:0		
	});
	$('.date-picker').val(f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate());
	// seclect chosen 
	$('.chosen-select').chosen({
		allow_single_deselect:true,
		no_results_text:'No encontrado'		
	});
</script>