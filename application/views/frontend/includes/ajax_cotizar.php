<div class="clearfix" id="cotizacionAjax">
	<div class="col-xs-12 col-md-6">
		<span class="cross" title="Cerrar Ventana"></span>
		<h3 class="title">
			<i class="fa fa-check"></i>
			Producto añadido correctamente a su carrito
		</h3>
		<div class="product-image">
			<img class="img-responsive" src="files/productos/thumbs/<?=$producto['imagen']?>" alt="<?=$producto['nombre']?>" title="<?=$producto['nombre']?>">
		</div>
		<div class="product_info">
			<span class="product-name"><?=$producto['nombre']?></span>
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<span class="title">
			<h4 class="ajax_cart_product_txt_s">
				Hay
				<span class="ajax_cart_quantity"><?=$items?></span>
				artículos en su carrito.
			</h4>
		</span>
		<div class="button-container">
			<a data-fancybox-close class="continue btn btn-default button" title="Seguir comprando">
				<span> <i class="icon-chevron-left left"></i>Seguir comprando </span>
			</a>
			<a class="btn btn-primary button btn-coti" href="cotizacion" title="Ir al carrito" rel="nofollow">
				<span> Ir al carrito<i class="icon-chevron-right right"></i> </span>
			</a>
		</div>
	</div>
</div>