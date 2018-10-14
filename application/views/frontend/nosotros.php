 <div class="breadcrumb">
		 <?php if($dataset['visible']==1){?>
        <div  class="dez-bnr-inr overlay-black-middle" style="background-image:url(files/secciones/<?=$dataset['imagen']?>);">
        </div>
        <?php }?>
		<div class="breadcrumb-inner">
			<div class="container">
				<ul class="list-inline list-unstyled">
					<li><a href="./">Inicio</a></li>
					<li class='active'>Nosotros</li>
				</ul>
			</div>
		</div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-padding-bd">
	<div class="container-fluid">
		<div class="terms-conditions-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-2" id="carritoFloat">
                	<?=getItemsCarrito()?>
           		</div>
				<div class="col-md-10 terms-conditions">
					<h2 class="titulonosotros"><?= $dataset['titulo']?></h2>
					<div class="inner-top-sm">
						<p> <?= $dataset['descripcion']?> </p>
					</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div>
</div>