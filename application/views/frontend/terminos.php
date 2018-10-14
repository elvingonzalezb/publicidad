<?php if($dataset['visible']==1){?>
    <div class="tm-breadcrumb" style="background-image:url(files/secciones/<?=$dataset['imagen']?>);">
		<div class="container">
			<h1 class="tm-section-heading"><?=$dataset['titulo']?></h1>
			<ul>
				<li>
					<a href="./">INICIO</a>
				</li>
				<li>
					<a href="">/ <?=$dataset['titulo']?></a>
				</li>
			</ul>
		</div>
	</div><!-- /Breadcrumb header -->
<?php } ?>
	<!-- Welcome -->
	<div class="tm-welcome about">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2><?= $dataset['titulo']?></h2>
					<p> <?= $dataset['descripcion']?> </p>
				</div>
			</div>
		</div>
	</div><!-- /Welcome -->