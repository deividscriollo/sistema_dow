<?php
	include 'conexion.php';
	include 'funciones_generales.php';		
	$conexion = conectarse();
	$sql = "";
	if($_GET['fun'] == "1"){//para paises
		if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
			$sql = "select id_pais,descripcion from pais";
			cargarSelect($conexion,$sql);
		}else{

		}
	}else{
		if($_GET['fun'] == "2"){//para provincias
			if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
				$sql = "select id_provincia,descripcion from provincia where id_pais = '$_GET[id]'";
				cargarSelect($conexion,$sql);
			}else{

			}
		}else{
			if($_GET['fun'] == "3"){//para ciudades
				if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
					$sql = "select id_ciudad,descripcion from ciudad where id_provincia = '$_GET[id]'";
					cargarSelect($conexion,$sql);
				}else{

				}
			}else{
				if($_GET['fun'] == "4"){//para cargos
					if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
						$sql = "select id_cargo,descripcion from cargo";
						cargarSelect($conexion,$sql);
					}else{

					}
				}else{
					if($_GET['fun'] == "5"){//para pais modificar
						if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
							$sql = "select id_provincia from ciudad where id_ciudad = '$_GET[id]'";							
							id($conexion,$sql);
						}else{

						}
					}else{
						if($_GET['fun'] == "6"){//para pais modificar
							if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
								$sql = "select id_pais from provincia where id_provincia = '$_GET[id]'";															
								id($conexion,$sql);
							}else{
								
							}
						}else{
							if($_GET['fun'] == "7"){//para el producto
								if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
									$sql = "select id_tipo,descripcion from tipo_producto";															
									cargarSelect($conexion,$sql);
								}else{
									
								}
							}else{
								if($_GET['fun'] == "8"){//para la categoria
									if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
										$sql = "select id_categoria,nombre_categoria from categoria";															
										cargarSelect($conexion,$sql);
									}else{
										
									}
								}else{
									if($_GET['fun'] == "9"){//para la categoria
										if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
											$sql = "select id_bodega,nombre_bodega from bodega order by fecha_creacion asc";															
											cargarSelect($conexion,$sql);
										}else{
											
										}
									}else{
										if($_GET['fun'] == "10"){//para la categoria
											if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
												$sql = "select id_marca,nombre_marca from marca";															
												cargarSelect($conexion,$sql);
											}else{
												
											}
										}else{
											if($_GET['fun'] == "11"){//para la categoria
												if($_GET['tipo'] == "0"){//indica que se carga al inicio de la pagina
													$sql = "select id_unidad,descripcion,cantidad from unidades_medida";															
													cargarSelect_1($conexion,$sql);
												}else{
													
												}
											}else{
												if($_GET['fun'] == "12"){//para la busqueda de ci de  proveedores
													if($_GET['tipo'] == "0"){
														$sql = "select id_proveedor,identificacion,nombres_completos from proveedor where identificacion like '%$_GET[val]%'";															
														cargarSelect_1($conexion,$sql);
													}else{

													}
												}
												if($_GET['fun'] == "13"){//para la busqueda de clientes
													if($_GET['tipo'] == "0"){
														$sql = "select id_cliente,identificacion,nombres_completos from cliente where identificacion like '%$_GET[val]%'";															
														cargarSelect_1($conexion,$sql);
													}else{
														
													}
												}else{
													if($_GET['fun'] == "14"){//para la busqueda de nombres de proveedor
														if($_GET['tipo'] == "0"){
															$sql = "select id_proveedor,nombres_completos,identificacion from proveedor where nombres_completos like '%$_GET[val]%'";
															cargarSelect_1($conexion,$sql);
														}else{
															
														}
													}
													else{
														if($_GET['fun'] == "15"){//para la busqueda del codigo del producto
															if($_GET['tipo'] == "0"){
																$sql = "select id_productos,codigo,codigo_barras,descripcion,precio_minorista,stock,iva_producto,facturar_existencia from productos where codigo like '%$_GET[val]%'";
																
																cargarSelect_8($conexion,$sql);//select de 5 datos
															}else{
																
															}
														}else{
															if($_GET['fun'] == "16"){//para la busqueda del nombre del producto
																if($_GET['tipo'] == "0"){
																	$sql = "select id_productos,codigo,codigo_barras,descripcion,precio_minorista,stock,iva_producto,facturar_existencia from productos where descripcion like '%$_GET[val]%'";
																	
																	cargarSelect_8($conexion,$sql);//select de 5 datos
																}else{
																	
																}
															}
														}
													}													
												}
											}
										}
									}
								}
							}
						}	
					}	
				}
			}
		}
	}

?>