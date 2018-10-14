<?php if($banner['visible']==1){?>
    <div class="tm-breadcrumb" style="background-image:url(files/secciones/<?=$banner['imagen']?>);">
		<div class="container">
			<h1 class="tm-section-heading"><?=$banner['titulo']?></h1>
			<ul>
				<li>
					<a href="./">Inicio</a>
				</li>
				<li>
					<a href="#">/ <?=$banner['titulo']?></a>
				</li>
			</ul>
		</div>
	</div><!-- /Breadcrumb header -->
<?php } ?>


	<!-- <div class="tm-home-services">
		<div class="container">
			<h1 class="tm-section-heading"><?=$banner['titulo']?></h1>
			<div class="row">
				{dataset}
				<div class="col-sm-6">
					<div class="service-box">
						<div class="service-image">
							<div class="doctor-thumbnail"><img alt="{nombre}" src="files/testimonios/medianas/{imagen}"></div>
						</div>
						<div class="service-caption">
							{testimonio}
							<h2 class="tm-box-heading-serv">{nombre}</h2>
						</div>
					</div>
				</div>
				{/dataset}
			</div>
		</div>
	</div> --><!-- /Our Dentists -->
	<div class="tm-home-services">
		<div class="container">
			<h1 class="tm-section-heading"><?=$banner['titulo']?></h1>
			<div class="row">
				{dataset}
				<div class="col-sm-12">
					<div class="service-box">
						<div class="service-image">
							<div class="doctor-thumbnail"><img alt="{nombre}" src="files/testimonios/medianas/{imagen}"></div>
							<!-- <span class="icon-molar"></span> -->
						</div>
						<div class="service-caption">
							{testimonio}
							<h2 class="tm-box-heading-serv">{nombre}</h2>
						</div>
					</div>
				</div>
				{/dataset}
				<div class="tm-pagination">
                        <ul>
                            {paginacion}
                        </ul>
                    </div>
			</div>
		</div>
	</div><!-- /Our Dentists -->
