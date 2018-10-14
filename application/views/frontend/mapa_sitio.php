 <div class="breadcrumb">
		<div class="breadcrumb-inner">
			<div class="container">
				<ul class="list-inline list-unstyled">
					<li><a href="./">Inicio</a></li>
					<li class='active'>Mapa de Sitio</li>
				</ul>
			</div>
		</div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-padding-bd">
	<div class="container">
		<div class="terms-conditions-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 terms-conditions">
					<h2 class="titulonosotros">Mapa de Sitio</h2>
					<div class="inner-top-sm">

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title"></h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li><a href="./">Inicio</a></li>
									<li><a href="paquetes">Paquetes</a></li>
									<li><a href="productos">Productos</a></li>
									<li><a href="catalogos">Catalogos</a></li>
									<li><a href="servicio-de-impresion">Servicio de Impresión</a></li>
									<li><a href="ofertas">Ofertas</a></li>
									<li><a href="contactenos">Contáctenos</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">Información</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li><a href="empresa">A cerca de Nosotros</a></li>
									<li><a href="por-que-compramos">¿Por qué compranos?</a></li>
									<li><a href="mapa-de-sitio">Mapa de Sitio</a></li>
									<!-- <li><a href="boletin">Boletín</a></li> -->
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading outer-bottom-xs">
								<h4 class="module-title">Categorías</h4>
							</div>
							<div class="module-body">
								<?php $menu_categoria = getFrontCatFooter(); ?>
								<ul class='list-unstyled'>
									<?php foreach ($menu_categoria as $mc_key => $mc_value): ?>
									<li class="li-cat"><a href="productos/<?=$mc_value['url'].'-'.$mc_value['id']?>"><?=$mc_value['nombre']?></a></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>

					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div>
</div>