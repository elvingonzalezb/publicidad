<div class="row">
	<div id="hero" class="col-lg-9 col-md-9 col-sm-12">
		<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
			{banners}
			<div class="item" style="background-image: url(files/banners/{BANNER_IMAGEN});">
				<div class="container-fluid">
					<div class="caption bg-color vertical-center text-left">
						<div class="big-text fadeInDown-1">
							{BANNER_TITULO}
						</div>
						<div class="excerpt fadeInDown-2 hidden-xs">
							<span>{BANNER_SUMILLA}</span>
						</div>
						{if {BANNER_LINK} !="" }
						<div class="button-holder fadeInDown-3">
							<a href="{BANNER_LINK}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Ver más</a>
						</div>
						{/if}
					</div>
					<!-- /.caption -->
				</div>
				<!-- /.container-fluid -->
			</div>
			{/banners}
			<div class="clearfix"></div>
			<!-- /.item -->
		</div>
		
		<!-- /.owl-carousel -->
	</div>
	<div id="banner-promo" class=" col-md-3">
		<div class="row">
			{promos}
			<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<div class="promociones" style="background-image: url(files/banners/{imagen})"></div>
			</div>
			{/promos}
		</div>
		
	</div>
</div>
