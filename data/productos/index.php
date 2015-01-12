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
		<link rel="stylesheet" href="../../dist/css/bootstrap-editable.min.css" />

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
												<form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_proveedores">
													<div class="row">
														<div class="col-xs-12">	
															<div class="col-sm-12">
																<div class="tabbable">
																	<ul class="nav nav-tabs" id="myTab">
																		<li class="active">
																			<a data-toggle="tab" href="#info_pro">
																				<i class="green ace-icon fa fa-cube bigger-120"></i>
																				Información Producto
																			</a>
																		</li>

																		<li>
																			<a data-toggle="tab" href="#deta_adici">
																			<i class="purple ace-icon fa fa-cubes bigger-120"></i>
																				Detalles Adicionales
																			</a>
																		</li>
																		
																	</ul>

																	<div class="tab-content">
																		<div id="info_pro" class="tab-pane fade in active">
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
																					<div class="col-sm-2 btn btn-sm btn-success" id="btn_agr_cat" data-toggle="modal" href="#modal_categoria" > Agregar</div>
																				</div>	
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Asignado a: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="Asignado a">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn btn-sm btn-success" id="btn_asi_a" data-toggle="modal" href="#modal_asi_a"> Agregar</div>
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
																					<div class="col-sm-2 btn btn-sm btn-success" id="btn_agr_mar" data-toggle="modal" href="#modal_marcas"> Agregar</div>
																				</div>
																				<div class="form-group has-error">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Se vender por: </label>
																					<div class="col-sm-6">
																						<select class="chosen-select form-control" id="txt_1" name="txt_1" data-placeholder="Se vender por">																																										
																						</select>						
																						<input type="hidden" id="txt_0" name="txt_0" />											
																					</div>
																					<div class="col-sm-2 btn btn-sm btn-success" id="btn_se-ven_por" data-toggle="modal" href="#modal_se-vender_por"> Agregar</div>
																				</div>
																				<div class="form-group">
																					<label class="col-sm-4 control-label no-padding-right" for="form-field-1">y contiene:</label>
																					<div class="col-sm-6">
																						<input type="text" readonly id="txt_2" name="txt_2"  class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
																					</div>
																					<label class="col-sm-1 control-label no-padding-right" for="form-field-1">Unid(s)</label>

																				</div>
																			</div>
																		</div>
																		<div id="deta_adici" class="tab-pane fade ">
																			<div class="col-xs-12">
																				<div class="row-fluid">
																					<div class="col-xs-2">
																						<div class="form-group">
																							<div class="col-xs-12">
																								<div class="col-xs-12">																									
																									<span class="profile-picture">
																										<img id="avatar" class="editable img-responsive" alt="Empresa x" src="img/profile-pic.jpg" accept="image/*"/>
																									</span>

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
																							<div class="col-sm-3 btn btn-sm btn-success" id="btn_asig_lot"> Asignar lotes</div>
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
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Producto series:</label>
																								<div class="col-xs-3">
																									<label>
																										<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox">
																										<span class="lbl"></span>
																									</label>
																								</div>	
																							<div class="col-sm-3 btn btn-sm btn-success" id="btn_asig_series"> Asignar series</div>																							
																						</div>
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Producto Activo:</label>
																								<div class="col-xs-3">
																									<label>
																										<input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox" checked>
																										<span class="lbl"></span>
																									</label>
																								</div>	
																						</div>
																						<div class="form-group">
																							<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Detalle producto:</label>
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

		<!-- basic scripts modales-->
		<!-- Modal categoria-->
		  <div class="modal fade" id="modal_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content blue">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">AGREGAR CATEGORIAS</h4>
		        </div>
		        <div class="modal-body">
		            <form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_proveedores">
		            	<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Descripción:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese categoria" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>						
		            </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary">Guardar</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->

		<!-- Modal categoria-->
		  <div class="modal fade" id="modal_asi_a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content blue">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">ASIGNAR A</h4>
		        </div>
		        <div class="modal-body">
		            <form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_proveedores">
		            	<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Descripción:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese bodega" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>	
						<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Ubicacion:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese ubicación" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>						
		            </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary">Guardar</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->

		<!-- Modal categoria-->
		  <div class="modal fade" id="modal_marcas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content blue">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">AGREGAR MARCAS</h4>
		        </div>
		        <div class="modal-body">
		            <form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_proveedores">
		            	<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Descripción:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese marca" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>				
		            </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary">Guardar</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
		<!-- Modal unidades-->
		  <div class="modal fade" id="modal_se-vender_por" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		      <div class="modal-content blue">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		          <h4 class="modal-title">SE VENDE POR</h4>
		        </div>
		        <div class="modal-body">
		            <form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_proveedores">
		            	<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Descripción:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese marca" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>
						<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Abreviatura:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese Abreviatura" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>
						<div class="form-group has-error">
							<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Cantidad:</label>
							<div class="col-sm-5">
								<input type="text" id="txt_2" name="txt_2"  placeholder="Ingrese cantidad" class="form-control" data-toggle="tooltip" data-original-title="" required pattern="[0-9]{1,}" />																																																						
							</div>
						</div>				
		            </form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		          <button type="button" class="btn btn-primary">Guardar</button>
		        </div>
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
		
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
		<script src="../../dist/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="../../dist/js/x-editable/ace-editable.min.js"></script>

		
		




		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		<script src="productos.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
				
				//editables 
				
				//text editable
			    $('#username')
				.editable({
					type: 'text',
					name: 'username'
			    });
			
			
				
				//select2 editable
				var countries = [];
			    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
			        countries.push({id: k, text: v});
			    });
			
				var cities = [];
				cities["CA"] = [];
				$.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
					cities["CA"].push({id: v, text: v});
				});
				cities["IN"] = [];
				$.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
					cities["IN"].push({id: v, text: v});
				});
				cities["NL"] = [];
				$.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
					cities["NL"].push({id: v, text: v});
				});
				cities["TR"] = [];
				$.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
					cities["TR"].push({id: v, text: v});
				});
				cities["US"] = [];
				$.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
					cities["US"].push({id: v, text: v});
				});
				
				var currentValue = "NL";
			    $('#country').editable({
					type: 'select2',
					value : 'NL',
					//onblur:'ignore',
			        source: countries,
					select2: {
						'width': 140
					},		
					success: function(response, newValue) {
						if(currentValue == newValue) return;
						currentValue = newValue;
						
						var new_source = (!newValue || newValue == "") ? [] : cities[newValue];
						
						//the destroy method is causing errors in x-editable v1.4.6+
						//it worked fine in v1.4.5
						/**			
						$('#city').editable('destroy').editable({
							type: 'select2',
							source: new_source
						}).editable('setValue', null);
						*/
						
						//so we remove it altogether and create a new element
						var city = $('#city').removeAttr('id').get(0);
						$(city).clone().attr('id', 'city').text('Select City').editable({
							type: 'select2',
							value : null,
							//onblur:'ignore',
							source: new_source,
							select2: {
								'width': 140
							}
						}).insertAfter(city);//insert it after previous instance
						$(city).remove();//remove previous instance
						
					}
			    });
			
				$('#city').editable({
					type: 'select2',
					value : 'Amsterdam',
					//onblur:'ignore',
			        source: cities[currentValue],
					select2: {
						'width': 140
					}
			    });
			
			
				
				//custom date editable
				$('#signup').editable({
					type: 'adate',
					date: {
						//datepicker plugin options
						    format: 'yyyy/mm/dd',
						viewformat: 'yyyy/mm/dd',
						 weekStart: 1
						 
						//,nativeUI: true//if true and browser support input[type=date], native browser control will be used
						//,format: 'yyyy-mm-dd',
						//viewformat: 'yyyy-mm-dd'
					}
				})
			
			    $('#age').editable({
			        type: 'spinner',
					name : 'age',
					spinner : {
						min : 16,
						max : 99,
						step: 1,
						on_sides: true
						//,nativeUI: true//if true and browser support input[type=number], native browser control will be used
					}
				});
				
			
			    $('#login').editable({
			        type: 'slider',
					name : 'login',
					
					slider : {
						 min : 1,
						  max: 50,
						width: 100
						//,nativeUI: true//if true and browser support input[type=range], native browser control will be used
					},
					success: function(response, newValue) {
						if(parseInt(newValue) == 1)
							$(this).html(newValue + " hour ago");
						else $(this).html(newValue + " hours ago");
					}
				});
			
				$('#about').editable({
					mode: 'inline',
			        type: 'wysiwyg',
					name : 'about',
			
					wysiwyg : {
						//css : {'max-width':'300px'}
					},
					success: function(response, newValue) {
					}
				});
				
				
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Change Avatar',
							droppable: true,
							maxSize: 110000,//~100Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'File is not an image!',
										text: 'Please choose a jpg|gif|png image!',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'File too big!',
										text: 'Image size should not exceed 100Kb!',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with 
							//examples/profile-avatar-update.js
			
							var deferred = new $.Deferred
			
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								if(last_gritter) $.gritter.remove(last_gritter);
								last_gritter = $.gritter.add({
									title: 'Avatar Updated!',
									text: 'Uploading to server can be easily implemented. A working example is included with the template.',
									class_name: 'gritter-info gritter-center'
								});
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
							
							// ***END OF UPDATE AVATAR HERE*** //
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
				/**
				//let's display edit mode by default?
				var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
				if(blank_image) {
					$('#avatar').editable('show').on('hidden', function(e, reason) {
						if(reason == 'onblur') {
							$('#avatar').editable('show');
							return;
						}
						$('#avatar').off('hidden');
					})
				}
				*/
			
								
			
				
			
				///////////////////////////////////////////
				$('#user-profile-3')
				.find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(999) 999-9999');
			
				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
			
			
				////////////////////
				//change profile
				$('[data-toggle="buttons"] .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					$('.user-profile').parent().addClass('hide');
					$('#user-profile-'+which).parent().removeClass('hide');
				});
				
				
				
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					try {
						$('.editable').editable('destroy');
					} catch(e) {}
					$('[class*=select2]').remove();
				});
			});
		</script>

	</body>
</html>