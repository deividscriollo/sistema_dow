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


		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../../dist/css/fontdc.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../dist/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!-- ace settings handler -->
		<script src="../../dist/js/ace-extra.min.js"></script>
	</head>

	<body class="no-skin">
		<?php menu_arriba(); ?>

		<div class="main-container" id="main-container">
			

			<?php menu_lateral(); ?>

			 <div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Proceso</h5>

										<div class="widget-toolbar">
											<div class="widget-menu">
												<a href="#" data-action="settings" data-toggle="dropdown">
													<i class="ace-icon fa fa-bars"></i>
												</a>

												<ul class="dropdown-menu dropdown-menu-right dropdown-light-blue dropdown-caret dropdown-closer">
													<li>
														<a data-toggle="tab" href="#dropdown1">Opcion 1</a>
													</li>

													<li>
														<a data-toggle="tab" href="#dropdown2">Opcion 2</a>
													</li>
												</ul>
											</div>

											<a href="#" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>

											<a href="#" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>

											<a href="#" data-action="collapse">
												<i class="ace-icon fa fa-chevron-up"></i>
											</a>

											<a href="#" data-action="close">
												<i class="ace-icon fa fa-times"></i>
											</a>
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_cliente">												
													<div class="row">
														<div class="col-xs-12">	
															<div class="col-sm-12">
																<div class="tabbable">
																	<ul class="nav nav-tabs" id="myTab">
																		<li class="active">
																			<a data-toggle="tab" href="#info_pro">
																				<i class="green ace-icon fa fa-home bigger-120"></i>
																				Información Producto
																			</a>
																		</li>

																		<li>
																			<a data-toggle="tab" href="#deta_adici">
																				Detalles Adicionales
																				<span class="badge badge-danger">4</span>
																			</a>
																		</li>
																		
																	</ul>

																	<div class="tab-content">
																		<div id="info_pro" class="tab-pane fade">
																			<div class="col-sm-6">
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Código:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Código" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Nombre del Producto:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Nombre del Producto" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group ">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Utilidad Minorista:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Utilidad Minorista" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Precio Minorista:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Precio Minorista" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> El producto es: </label>
																					<div class="col-sm-8">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="El producto es">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Categoria: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="Categoria">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn">agregar</div>
																				</div>	
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Asignado a: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="Asignado a">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn">agregar</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Facturar sin existencia: </label>
																					<div class="col-sm-6">
																						<div class="col-xs-3">
																							<label>
																								<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox" checked>
																								<span class="lbl"></span>
																							</label>
																						</div>										
																					</div>																					
																				</div>																																						
																			</div>
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Código Barras:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Código Barras" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Precio Producto:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Precio Producto" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Utilidad Mayorista:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Utilidad Mayorista" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Precio Mayorista:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="Precio Mayorista" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Cantidad Inicial:</label>
																					<div class="col-sm-8">
																						<input type="text" id="txt_h" name="txt_h"  placeholder="Cantidad Inicial" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																						
																					</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Marcas: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="El producto es">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn">agregar</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Se vender por: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="Se vender por">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn">agregar</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1">y contiene.!:</label>
																					<div class="col-sm-6">
																						<input type="text" id="txt_2" name="txt_2"  placeholder="y contiene.!" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																					<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Unid(s)</label>

																				</div>
																			</div>
																		</div>
																		<div id="deta_adici" class="tab-pane fade in active">
																			<div class="col-xs-12">
																				<div class="row-fluid">
																					<div class="col-xs-2">
																						<div class="form-group">
																							<div class="col-xs-12">
																								<div class="col-xs-12">
																									<label class="ace-file-input ace-file-multiple"><input type="file" class="txt_0" id="txt_0" name="txt_0" onchange="Test.UpdatePreview(this)" accept="image/*"><span class="ace-file-container" data-title="Seleccionar"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-image"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
																								</div>																																														
																							</div>
																						</div>	
																					</div>
																					<div class="col-xs-5">
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Cantidad Mínima:</label>
																							<div class="col-sm-7">
																								<input type="text" id="txt_mi" name="txt_mi"  placeholder="Cantidad Mínima" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																						
																							</div>
																						</div>
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1-1"> Iva: </label>
																							<div class="col-sm-7">																								
																								<label>
																									<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox" checked>
																									<span class="lbl"></span>
																								</label>																																	
																							</div>																							
																						</div>
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1">Producto con Expiración:</label>
																								<div class="col-xs-3">
																									<label>
																										<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
																										<span class="lbl"></span>
																									</label>
																								</div>	
																							<div class="col-sm-2 btn">Asignar lotes</div>
																						</div>																																																																	
																					</div>
																					<div class="col-xs-5">
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Cantidad Máxima:</label>
																							<div class="col-sm-7">
																								<input type="text" id="txt_ma" name="txt_ma"  placeholder="Cantidad Máxima" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																						
																							</div>
																						</div>
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1">Producto series:</label>
																								<div class="col-xs-3">
																									<label>
																										<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
																										<span class="lbl"></span>
																									</label>
																								</div>	
																							<div class="col-sm-2 btn">Asignar series</div>
																						</div>
																						<div class="form-group has-error">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1">Detalle producto:</label>
																							<div class=" col-xs-7">
																								<textarea class="input-xlarge" name="txt_0" id="txt_0" placeholder="Comentario"></textarea>
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
													<h3 class="header smaller lighter green"></h3>
													<div class="center">
														<button type="submit" class="btn btn-white btn-info btn-bold" id="btn_0">
															<i class="ace-icon fa fa-floppy-o bigger-120 blue"></i>
															Guardar
														</button>
														<button type="button" id="btn_1" class="btn btn-white btn-info btn-bold">
															<i class="ace-icon fa fa-file-o bigger-120 blue"></i>
															Limpiar
														</button>
														<button type="button" id="btn_2" class="btn btn-white btn-info btn-bold">
															<i class="ace-icon fa fa-refresh bigger-120 blue"></i>
															Actualizar
														</button>														
														<button data-toggle="modal" href="#myModal" type="button" id="btn_3" class="btn btn-white btn-info btn-bold">
															<i class="ace-icon fa fa-search bigger-120 blue"></i>
															Buscar
														</button>
														<button type="button" id="btn_4" class="btn btn-white btn-info btn-bold">
															<i class="ace-icon fa fa-arrow-circle-left bigger-120 blue"></i>
															Atras
														</button>
														<button type="button" id="btn_5" class="btn btn-white btn-info btn-bold">
															<i class="ace-icon fa fa fa-arrow-circle-right bigger-120 blue"></i>
															Adelante
														</button>
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
		<script src="../../dist/js/fuelux/fuelux.spinner.min.js"></script>



		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(function(){

				// dar valor inicial para convertir input en spinner o seleccion
				$('#txt_h').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				$('#txt_mi').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				$('#txt_ma').ace_spinner({value:0,min:0,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				// fin dar valor inicial a los espinner
			});
		</script>
	</body>
</html>