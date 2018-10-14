<div class="header-nav animate-dropdown">
	<div class="container">
		<div class="yamm navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
			</div>
			<div class="nav-bg-class">
				<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
					<div class="nav-outer">
						<ul class="nav navbar-nav">
							<li class="dropdown yamm">
								<a href="./" class="<?php if( ! empty($seo['seccion']) && 'inicio'== $seo['seccion']){ echo "active"; }?>">Inicio</a>
							</li>
							<li class="dropdown yamm">
								<a href="promociones">Promociones</a>
							</li>
							<!-- <li class="dropdown yamm">
								<a href="empresa">La Empresa</a>
							</li>
							<li class="dropdown yamm">
								<a href="paquetes">Paquetes</a>
							</li> -->
							<li class="dropdown yamm">
								<a href="productos">Productos</a>
								<!-- <a href="productos" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Productos</a> -->
								<?php 
									/*$headProd = getFrontCatFooter();
									$totalProd = count($headProd);
									$numRows = $totalProd/3;*/
								 ?>
								<!-- <ul class="dropdown-menu pages">
									<li>
										<div class="yamm-content">
											<div class="row">
												<?php 
												/*$h = 1;
												for ($j=0; $j < $totalProd; $j++) {
													if ($h == 1) {
														echo '<div class="col-xs-12 col-sm-4 col-md-4">';
														echo '<ul class="links">';
													}
													echo '<li><a href="productos/'.$headProd[$j]['url'].'-'.$headProd[$j]['id'].'">'. $headProd[$j]['nombre'].'</a></li>';
													if ((ceil($numRows) == $h) || ($j == ($totalProd - 1))) {
														$h = 1;
														echo '</ul>';
														echo '</div>';
													}else{
														$h++;
													}
												}*/
												?>
											</div>
										</div>
									</li>
								</ul> -->
							</li>
							<li class="dropdown yamm">
								<a href="catalogos">Catálogos</a>
							</li>
							<!-- <li class="dropdown yamm">
								<a href="servicio-de-impresion">Servicio de Impresión</a>
							</li> -->
							<li class="dropdown yamm">
								<a href="pedidos-por-web">Pedidos por WEB</a>
							</li>
							<!-- <li class="dropdown yamm">
								<a href="ofertas">Ofertas</a>
							</li> -->
							<li class="dropdown yamm">
								<a href="preguntas-frecuentes">Preguntas Frecuentes</a>
							</li>
							<!-- <li class="dropdown yamm">
								<a href="articulos">Artículos</a>
							</li> -->
							<li class="dropdown yamm">
								<a href="contactenos">Contáctenos</a>
							</li>
						</ul>
						<!-- /.navbar-nav -->
						<div class="clearfix"></div>
					</div>
					<!-- /.nav-outer -->
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.nav-bg-class -->
		</div>
		<!-- /.navbar-default -->
	</div>
	<!-- /.container-class -->
</div>
