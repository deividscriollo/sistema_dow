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
                            <li class="active">Usuario</li>
                            
                        </ul>
                    </div>
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title"><i class="ace-icon fa fa-user"></i> Usuarios</h5>

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
												<form class="form-horizontal" role="form" rol="form" action="" method="POST" id="form_usuario">												
													<div class="row">
														<div class="col-xs-12">
															<div class="col-sm-2">
																<div class="widget-box">
																	<div class="widget-header">
																		<h4 class="widget-title">Imagén</h4>
																	</div>

																	<div class="widget-body">
																		<div class="widget-main">
																			<div class="form-group">
																				<div class="col-xs-12">
																					<input type="file" class="txt_0" id="txt_0" name="txt_0" onchange='Test.UpdatePreview(this)' accept="image/*" />
																				</div>
																				<div class="center profile-picture " > 
																					<img src="img/default.png" width="100%" id="imagen">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>

															</div>
															<div class="col-sm-5">
																<div class="form-group has-error">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> C.I./RUC:</label>
																	<div class="col-sm-9">
																		<input type="text" id="txt_1" name="txt_1"  placeholder="Cedula" class="col-xs-10 col-sm-5" data-toggle="tooltip" data-original-title="Agregue el nro de CI en caso de ser extranjero seleccione la casilla Extranjero" required pattern="[0-9]{1,}" maxlength="10" />
																		<input type="hidden" id="txt_o" name="txt_o" />
																		<span class="help-inline col-xs-12 col-sm-7">																			
																			<div class="checkbox">
																				<label class="block">
																					<input name="form-field-checkbox" id="form-field-checkbox" type="checkbox" class="ace input-lg" />
																					<span class="lbl bigger-120"> Extranjero</span>
																				</label>
																			</div>
																		</span>

																	</div>
																</div>

																<div class="form-group has-error">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombres: </label>
																	<div class="col-sm-9">
																		<input type="text" id="txt_2" name="txt_2" placeholder="Nombre Completo" class="form-control" required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9 ]{1,}" data-toggle="tooltip" data-original-title="Nombres completos"  />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Teléfono: </label>

																	<div class="col-sm-9">
																		<input type="text" id="txt_3" name="txt_3" placeholder="Teléfono" class="form-control" onkeydown="return validarNumeros(event)" />
																	</div>
																</div>
																<div class="form-group has-error">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Usuario: </label>
																	<div class="col-sm-9">
																		<input type="text" id="txt_13" name="txt_13" placeholder="Nombre de usuario" class="form-control" required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9]{1,}" data-toggle="tooltip" data-original-title="Nombres de usuario"  />
																	</div>
																</div>																
																<div class="form-group has-error">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Password: </label>

																	<div class="col-sm-9">
																		<input type="password" id="txt_5" name="txt_5" placeholder="Password" class="form-control" required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9]{6,}" data-toggle="tooltip" data-original-title="Digite la contraseña del usuario mínimo 5 carácteres"/>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Repetir: </label>

																	<div class="col-sm-9">
																		<input type="password" id="txt_6" name="txt_6" placeholder="Repetir Password" class="form-control" data-toggle="tooltip" data-original-title="Repita la contraseña ingresada"/>
																	</div>
																</div>
															</div>
															<div class="col-sm-5">
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Celular: </label>
																	<div class="col-sm-9">																																				
																			<input type="text" id="txt_7" name="txt_7" placeholder="Celular" class="form-control" onkeydown="return validarNumeros(event)" />																																		
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Correo: </label>

																	<div class="col-sm-9">
																		<input type="mail" id="txt_8" name="txt_8" placeholder="Correo" class="form-control" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Cargo: </label>

																	<div class="col-sm-9">
																		<select class="chosen-select form-control" id="txt_4" name="txt_4" data-placeholder="Pais">																			
																		</select>
																	</div>
																</div>											
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> País: </label>

																	<div class="col-sm-9">
																		<select class="chosen-select form-control" id="txt_9" name="txt_9" data-placeholder="País">
																			
																			
																		</select>																	
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Provincia: </label>

																	<div class="col-sm-9">
																		<select class="chosen-select form-control" id="txt_10" name="txt_10" data-placeholder="Provincia">
																															
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Ciudad: </label>

																	<div class="col-sm-9">
																		<select class="chosen-select form-control" id="txt_11" name="txt_11" data-placeholder="Ciudad" >
																															
																		</select>
																	</div>
																</div>
																<div class="form-group has-error">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Dirección: </label>

																	<div class="col-sm-9">
																		<input type="text" id="txt_12" name="txt_12" placeholder="Dirección" class="form-control"  required pattern="[A-Za-záéíóúÁÉÍÓÚñÑ0-9]{1,}" data-toggle="tooltip" data-original-title="Ingrese la dirección del usuario a crear" />
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



		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>
		<script src="../../dist/js/jqGrid/jquery.jqGrid.min.js"></script>
        <script src="../../dist/js/jqGrid/i18n/grid.locale-en.js"></script>
		<script src="usuario.js"></script>
		<script src="../generales.js"></script>

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
