<div>
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="./">Inicio</a></li>
			<li><a href="clientes/mi-cuenta">Mi cuenta</a></li>
			<li class='active'>Mis Pedidos</li>
		</ul>
	</div>
</div>
<!-- /.breadcrumb -->
<div class="tm-page-client">
	<div class="container" id="postCliente">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- create a new account -->
				<div class="col-md-12 col-sm-12 create-new-account">
					<h4 class="sub-titulo">MIS PEDIDOS</h4>
					<p class="text title-tag-line"></p>
					<div class="well">
						<table class="table table-striped custab">
							<thead>
								<tr>
									<th>CODIGO</th>
									<!--<th>Estado</th>-->
									<th>TOTAL</th>
									<th class="text-center"></th>
								</tr>
							</thead>
							{pedidos}
								<tr>
									<td>{codigo_pedido}</td>
									<!--<td>{estado}</td>-->
									<td></td>
									<td class="text-center"><a class='btn btn-info btn-sm' href="clientes/pedido-detalle/{id}">Ver detalle <i class="fa fa-angle-right"></i> </a></td>
								</tr>
							{/pedidos}
						</table>
						<div class="clearfix blog-pagination filters-container  wow fadeInUp outer-top-bd">                  
                            <div class="text-right">
                                 <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        {paginacion}
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->  
                            </div><!-- /.text-right -->
                        </div>
						<!--end form -->
					</div>
				</div>
				<!-- create a new account -->     
			</div>
			<!-- /.row -->
		</div>
		<!-- /.sigin-in-->
	</div>
	<!-- /.container -->
</div>
<!-- /.body-content -->