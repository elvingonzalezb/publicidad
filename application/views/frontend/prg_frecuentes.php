<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container-fluid">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Preguntas frecuentes</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container-fluid">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-2" id="carritoFloat">
                	<?=getItemsCarrito()?>
           		</div>
				<div class="col-md-10">
					<h2><?php echo mostrarTitulo(6) ?></h2>
					<div class="panel-group checkout-steps" id="accordion">
						<?php foreach ($dataset as $key => $value): ?>
						<?php $class = (($key==0) ? 'panel-collapse collapse in': 'panel-collapse collapse')?>
						<?php switch ($key) {
							case '0':
								$id='collapseOne';break;
							case '1':
								$id='collapseTwo';break;
							case '2':
								$id='collapseThree';break;
							case '3':
								$id='collapseFour';break;
							case '4':
								$id='collapseFive';break;
							case '5':
								$id='collapseSix';break;
							case '6':
								$id='collapseSeven';break;
							case '7':
								$id='collapseEight';break;
							case '8':
								$id='collapseNine';break;
							default:
								break;
						} ?>
							<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">
							<!-- panel-heading -->
							<div class="panel-heading">
						    	<h4 class="unicase-checkout-title">
							        <a data-toggle="collapse" class="" data-parent="#accordion" href="#<?=$id?>">
							          <span><?= $key+1?></span><?= $value['pregunta']?>
							        </a>
							     </h4>
						    </div>
						    <!-- panel-heading -->
							<div id="<?=$id?>" class="<?=$class?>">
								<div class="panel-body">
								   	<?= $value['respuesta']?>		
								</div>
									<!-- panel-body  -->
							</div>
							<!-- checkout-step-01  -->
						</div>		    
				 		<?php endforeach;?>				
								  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /.container -->
</div><!-- /.body-content -->