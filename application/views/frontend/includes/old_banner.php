<!-- Slider -->
<?php //echo '<pre>';print_r($banners);echo '</pre>';die; ?>
	<div class="tm-home-slider">
		<div class="flexslider">
			<ul class="slides">
				<?php foreach ($banners as $Bkey => $banner): ?>
				<li>
					<div class="caption">
						<h3><?=$banner['BANNER_TITULO']?></h3>
						<h1></h1>
						<h1><span></span></h1>
						<p></p>
					</div>
					<?php if ($banner['BANNER_ENLACE'] !== ''): ?>
					<a href="<?=$banner['BANNER_ENLACE']?>"> <img alt="<?=$banner['BANNER_TITULO']?>" src="files/banners/<?=$banner['BANNER_IMAGEN']?>"></a>
					<?php else: ?>
					<img alt="<?=$banner['BANNER_TITULO']?>" src="files/banners/<?=$banner['BANNER_IMAGEN']?>">	
					<?php endif ?>
				</li>	
				<?php endforeach ?>
			</ul>
		</div>
	</div><!-- /Slider -->