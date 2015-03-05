<?php include('../menu/index.php'); ?>
<?php
if(!isset($_SESSION))
	{
		session_start();		
	}
	if(!isset($_SESSION["iddow"])) {

		header('Location: ../../');
	}
?>
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
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 col-sm-12 widget-container-col">
								<div class="widget-box">
									<div class="widget-header">
										<h5 class="widget-title">Privilegio de Usuario Usuario </h5>
										<div class="widget-toolbar">											
											<a href="#" data-action="fullscreen" class="orange2">
												<i class="ace-icon fa fa-expand"></i>
											</a>
											<a href="#" data-action="reload">
												<i class="ace-icon fa fa-refresh"></i>
											</a>
											<a href="#" data-action="collapse">
												<i class="ace-icon fa fa-chevron-up"></i>
											</a>											
										</div>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<div class="row">
												<div class="col-xs-12">
													<div class="col-sm-4"></div>
													<div class="col-sm-5">
														<form class="form-horizontal">
															<div class="row">
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> nombre privilegio </label>
																	<div class="col-sm-9">
																		<input type="text" id="" name="" placeholder="nombre privilegio" class="form-control">
																	</div>
																</div>
															</div>
															<div class="row pull-right">
																<button class="btn btn-info" type="button">
																	<i class="ace-icon fa fa-check bigger-110"></i>
																	Submit
																</button>
															</div>																
														</form>
													</div>
												</div>
											</div>
											<div class="row">												
												<div class="col-sm-6">
													<div class="widget-box widget-color-green2">
														<div class="widget-header">
															<h4 class="widget-title lighter smaller">Administrador</h4>
															<div class="widget-toolbar">																	
																<a href="#" data-action="fullscreen" class="orange2">
																	<i class="ace-icon fa fa-expand"></i>
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
															<div class="widget-main padding-8">
																<ul id="tree1"></ul>
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
		<script src="../../dist/js/fuelux/fuelux.tree.min.js"></script>



		<!-- ace scripts -->
		<script src="../../dist/js/ace-elements.min.js"></script>
		<script src="../../dist/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($){
			var sampleData = initiateDemoData();//see below


			$('#tree1').ace_tree({
				dataSource: sampleData['dataSource1'],
				multiSelect: true,
				cacheItems: true,
				'open-icon' : 'ace-icon tree-minus',
				'close-icon' : 'ace-icon tree-plus',
				'selectable' : true,
				'selected-icon' : 'ace-icon fa fa-check',
				'unselected-icon' : 'ace-icon fa fa-times',
				loadingHTML : '<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>'
			});
			
			$('#tree2').ace_tree({
				dataSource: sampleData['dataSource2'] ,
				loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
				'open-icon' : 'ace-icon fa fa-folder-open',
				'close-icon' : 'ace-icon fa fa-folder',
				'selectable' : false,
				multiSelect: false,
				'selected-icon' : null,
				'unselected-icon' : null
			});
			
			/**
			//please refer to docs for more info
			$('#tree1')
			.on('loaded.fu.tree', function(e) {
			})
			.on('updated.fu.tree', function(e, result) {
			})
			.on('selected.fu.tree', function(e) {
			})
			.on('deselected.fu.tree', function(e) {
			})
			.on('opened.fu.tree', function(e) {
			})
			.on('closed.fu.tree', function(e) {
			});
			*/
			
			
			function initiateDemoData(){
				var tree_data = {
					'for-sale' : {text: 'For Sale', type: 'folder'}	,
					'vehicles' : {text: 'Vehicles', type: 'folder'}	,
					'rentals' : {text: 'Rentals', type: 'folder'}	,
					'real-estate' : {text: 'Real Estate', type: 'folder'}	,
					'pets' : {text: 'Pets', type: 'folder'}	,
					'tickets' : {text: 'Tickets', type: 'item'}	,
					'services' : {text: 'Services', type: 'item'}	,
					'personals' : {text: 'Personals', type: 'item'}
				}
				tree_data['for-sale']['additionalParameters'] = {
					'children' : {
						'appliances' : {text: 'Appliances', type: 'item'},
						'arts-crafts' : {text: 'Arts & Crafts', type: 'item'},
						'clothing' : {text: 'Clothing', type: 'item'},
						'computers' : {text: 'Computers', type: 'item'},
						'jewelry' : {text: 'Jewelry', type: 'item'},
						'office-business' : {text: 'Office & Business', type: 'item'},
						'sports-fitness' : {text: 'Sports & Fitness', type: 'item'}
					}
				}
				tree_data['vehicles']['additionalParameters'] = {
					'children' : {
						'cars' : {text: 'Cars', type: 'folder'},
						'motorcycles' : {text: 'Motorcycles', type: 'item'},
						'boats' : {text: 'Boats', type: 'item'}
					}
				}
				tree_data['vehicles']['additionalParameters']['children']['cars']['additionalParameters'] = {
					'children' : {
						'classics' : {text: 'Classics', type: 'item'},
						'convertibles' : {text: 'Convertibles', type: 'item'},
						'coupes' : {text: 'Coupes', type: 'item'},
						'hatchbacks' : {text: 'Hatchbacks', type: 'item'},
						'hybrids' : {text: 'Hybrids', type: 'item'},
						'suvs' : {text: 'SUVs', type: 'item'},
						'sedans' : {text: 'Sedans', type: 'item'},
						'trucks' : {text: 'Trucks', type: 'item'}
					}
				}

				tree_data['rentals']['additionalParameters'] = {
					'children' : {
						'apartments-rentals' : {text: 'Apartments', type: 'item'},
						'office-space-rentals' : {text: 'Office Space', type: 'item'},
						'vacation-rentals' : {text: 'Vacation Rentals', type: 'item'}
					}
				}
				tree_data['real-estate']['additionalParameters'] = {
					'children' : {
						'apartments' : {text: 'Apartments', type: 'item'},
						'villas' : {text: 'Villas', type: 'item'},
						'plots' : {text: 'Plots', type: 'item'}
					}
				}
				tree_data['pets']['additionalParameters'] = {
					'children' : {
						'cats' : {text: 'Cats', type: 'item'},
						'dogs' : {text: 'Dogs', type: 'item'},
						'horses' : {text: 'Horses', type: 'item'},
						'reptiles' : {text: 'Reptiles', type: 'item'}
					}
				}

				var dataSource1 = function(options, callback){
					var $data = null
					if(!("text" in options) && !("type" in options)){
						$data = tree_data;//the root tree
						callback({ data: $data });
						return;
					}
					else if("type" in options && options.type == "folder") {
						if("additionalParameters" in options && "children" in options.additionalParameters)
							$data = options.additionalParameters.children || {};
						else $data = {}//no data
					}
					
					if($data != null)//this setTimeout is only for mimicking some random delay
						setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

					//we have used static data here
					//but you can retrieve your data dynamically from a server using ajax call
					//checkout examples/treeview.html and examples/treeview.js for more info
				}




				var tree_data_2 = {
					'pictures' : {text: 'Pictures', type: 'folder', 'icon-class':'red'}	,
					'music' : {text: 'Music', type: 'folder', 'icon-class':'orange'}	,
					'video' : {text: 'Video', type: 'folder', 'icon-class':'blue'}	,
					'documents' : {text: 'Documents', type: 'folder', 'icon-class':'green'}	,
					'backup' : {text: 'Backup', type: 'folder'}	,
					'readme' : {text: '<i class="ace-icon fa fa-file-text grey"></i> ReadMe.txt', type: 'item'},
					'manual' : {text: '<i class="ace-icon fa fa-book blue"></i> Manual.html', type: 'item'}
				}
				tree_data_2['music']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-music blue"></i> song1.ogg', type: 'item'},
						{text: '<i class="ace-icon fa fa-music blue"></i> song2.ogg', type: 'item'},
						{text: '<i class="ace-icon fa fa-music blue"></i> song3.ogg', type: 'item'},
						{text: '<i class="ace-icon fa fa-music blue"></i> song4.ogg', type: 'item'},
						{text: '<i class="ace-icon fa fa-music blue"></i> song5.ogg', type: 'item'}
					]
				}
				tree_data_2['video']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-film blue"></i> movie1.avi', type: 'item'},
						{text: '<i class="ace-icon fa fa-film blue"></i> movie2.avi', type: 'item'},
						{text: '<i class="ace-icon fa fa-film blue"></i> movie3.avi', type: 'item'},
						{text: '<i class="ace-icon fa fa-film blue"></i> movie4.avi', type: 'item'},
						{text: '<i class="ace-icon fa fa-film blue"></i> movie5.avi', type: 'item'}
					]
				}
				tree_data_2['pictures']['additionalParameters'] = {
					'children' : {
						'wallpapers' : {text: 'Wallpapers', type: 'folder', 'icon-class':'pink'},
						'camera' : {text: 'Camera', type: 'folder', 'icon-class':'pink'}
					}
				}
				tree_data_2['pictures']['additionalParameters']['children']['wallpapers']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper1.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper2.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper3.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> wallpaper4.jpg', type: 'item'}
					]
				}
				tree_data_2['pictures']['additionalParameters']['children']['camera']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo1.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo2.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo3.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo4.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo5.jpg', type: 'item'},
						{text: '<i class="ace-icon fa fa-picture-o green"></i> photo6.jpg', type: 'item'}
					]
				}


				tree_data_2['documents']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-file-text red"></i> document1.pdf', type: 'item'},
						{text: '<i class="ace-icon fa fa-file-text grey"></i> document2.doc', type: 'item'},
						{text: '<i class="ace-icon fa fa-file-text grey"></i> document3.doc', type: 'item'},
						{text: '<i class="ace-icon fa fa-file-text red"></i> document4.pdf', type: 'item'},
						{text: '<i class="ace-icon fa fa-file-text grey"></i> document5.doc', type: 'item'}
					]
				}

				tree_data_2['backup']['additionalParameters'] = {
					'children' : [
						{text: '<i class="ace-icon fa fa-archive brown"></i> backup1.zip', type: 'item'},
						{text: '<i class="ace-icon fa fa-archive brown"></i> backup2.zip', type: 'item'},
						{text: '<i class="ace-icon fa fa-archive brown"></i> backup3.zip', type: 'item'},
						{text: '<i class="ace-icon fa fa-archive brown"></i> backup4.zip', type: 'item'}
					]
				}
				var dataSource2 = function(options, callback){
					var $data = null
					if(!("text" in options) && !("type" in options)){
						$data = tree_data_2;//the root tree
						callback({ data: $data });
						return;
					}
					else if("type" in options && options.type == "folder") {
						if("additionalParameters" in options && "children" in options.additionalParameters)
							$data = options.additionalParameters.children || {};
						else $data = {}//no data
					}
					
					if($data != null)//this setTimeout is only for mimicking some random delay
						setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

					//we have used static data here
					//but you can retrieve your data dynamically from a server using ajax call
					//checkout examples/treeview.html and examples/treeview.js for more info
				}

				
				return {'dataSource1': dataSource1 , 'dataSource2' : dataSource2}
			}

		});
		</script>

	</body>
</html>