{banners}
<!-- Welcome Section -->
	<div class="tm-welcome">
		<div class="container">
			<div class="row">
				{brochure}
				<div class="col-sm-5">
					<a href="files/brochures/{documento}" download="brochure-{documento}" target="_blank"><img src="files/brochures/{imagen}" class="img-responsive"></a>
				</div><!-- /Opening Hours -->
				<div class="col-sm-7">
					<h2 class="tm-box-heading">{titulo}</h2>
					{descripcion}
				</div><!-- Opening Hours -->
				{/brochure}
			</div>
		</div>
	</div><!-- /Welcome Section -->
	<!-- Shop -->
	<div class="tm-shop-list">
		<div class="container">
			<h1 class="tm-section-heading">NUESTROS PRODUCTOS</h1>
			<div class="row">
				{productosDestacados}
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 smf">
					<div class="tm-product-box">
						<a href="productos/{url}-{id}/detalle"><div class="product-image"><img alt="{nombre}" src="files/productos/medianas/{imagen}"></div></a>
						<div class="product-details">
							<h4 class="product-title"><a href="productos/{url}-{id}/detalle">{nombre}</a></h4>
							<div class="col-sm-12 nopadding">
								<div class="product-detalle">
									<a href="productos/{url}-{id}/detalle">VER DETALLE</a></span>
									<!-- <span class="old">$364.00</span> <span class="new">$344.00</span> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				{/productosDestacados}
			</div>
		</div>
	</div><!-- /Shop -->
	<!-- Testimonials -->
	<div class="tm-testimonials-home">
		<div class="container">
			<div class="row">
				<h1 class="tm-section-heading">TESTIMONIOS</h1>
				<div class="owl-carousel">
					{testimonios}
					<div class="testimonial">
						<div class="client-photo"><img alt="{nombre}" src="files/testimonios/medianas/{imagen}"></div>
						<div class="client-message">
							<h4>{nombre}</h4>
							<p>{sumilla}...</p>
						</div>
					</div>
					{/testimonios}
				</div>
			</div>
		</div>
	</div><!-- /Testimonials -->
	<!-- Latest News -->
	<div class="tm-news-home">
		<div class="container">
			<div class="row">
				<h1 class="tm-section-heading">ÚLTIMOS ARTÍCULOS</h1>
				{articulos}
				<div class="col-sm-4">
					<div class="news">
						<div class="news-thumbnail">
						<div class="post-date">
							{creado}
						</div><img alt="{nombre}" src="files/articulos/medianas/{imagen}"></div>
						<div class="news-title">
							<a href="articulos/{url}-{id}">{nombre}</a>
						</div>
						<div class="news-meta">
							<ul>
								<li><span class="icon-user"></span>POR {autor}</li>
							</ul>
						</div>
						<div class="separator"></div>
						<p>{resumen}</p>
					</div>
				</div>
				{/articulos}
			</div>
		</div>
	</div><!-- /Latest News -->