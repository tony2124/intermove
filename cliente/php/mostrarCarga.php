<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        		 	<div class="col-md-1"><i class="fa fa-truck fa-4x"></i></div>
        			 <div class="col-md-3">
        			 	<h3>Mostra Carga</h3>
        			 </div>
        		</h3>
      		</div>
</div>
<div class="container" style="margin-top:100px;">
	<section class="col-lg-offset-2 col-lg-7  panel-heading panel panel-default panel-accent-gold" style="height:200px; border-radius:5px;">
		<h3 class="panel-title"><i class="fa fa-truck"></i> Mostrar Carga</h3><br>
		<table class="table table-condensed">
			<tr>
				<th class="text-center">Precio</td>
				<th class="text-center">Tipo de Cotizacion</td>
			</tr>
			<?php
				$sql = "SELECT intencion_compra.importe_cotizado_cliente,intencion_compra.idintencion_compra,intencion_compra.tipo_cotizacion FROM publicacion_demanda_servicio
					JOIN confirmacion_compra ON publicacion_demanda_servicio.num_guia=confirmacion_compra.num_guia
					JOIN intencion_compra ON confirmacion_compra.idintencion_compra=intencion_compra.idintencion_compra
					WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
				$query = mysql_query($sql);
				$array = mysql_fetch_array($query);
			?>
			<tr>
				<td class="text-center"><?php echo $array['importe_cotizado_cliente']; ?></td>
				<td class="text-center"><?php echo $array['tipo_cotizacion']; ?></td>
			</tr>
		</table>
		<div class="col-lg-12">
			<center>
			<input type="button" onClick="window.location = 'pagina_principal.php?pagina=mostrar_mapa&id=<?php echo $array['idintencion_compra']; ?>'"; class="btn btn-default color-botones" value="Mostrar Mapa" />
			<button type="button" class="btn btn-default color-botones" data-toggle="modal" data-target="#myModal">
  				Carga entregada
			</button>
			<button type="button" class="btn btn-default color-botones" data-toggle="modal" data-target="#myModal3">
  				Carga recogida
			</button>
			<button type="button" class="btn btn-default color-botones" data-toggle="modal" data-target="#myModal2">
  				Calificar Entrega
			</button>
			</center>
		</div>
	</section>
</div>
<!-- Modal ENTREGA DE LA CARGA-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmacion Entrega Carga</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal" role="form" method="post">
	      	<div class="form-group">
		      	<label for="fecha" class="col-sm-2 control-label">fecha</label>
		      		<div class="col-sm-10">
		      			<input type="date" class="form-control input" id="FechaRecoleccion" name="FechaRecoleccion"/>
		      		</div>
			</div>
			<div class="form-group">
		      	<label for="fecha" class="col-sm-2 control-label">Descripcion entrega</label>
		      		<div class="col-sm-10">
		      			<input type="text" class="form-control input" id="DescripcionEntrega" name="DescripcionEntrega" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ]+([ ][A-Za-zÑñáéíóúÁÉÍÓÚ]+)*" title="Ingresa sólo letras y sin espacios extras" placeholder="Descripcion..." autofocus required/>
		      		</div>
			</div>
				<input type="hidden"  />
      </div>


      <div class="modal-footer">
      	<div id="respuetaEntrega">

      	</div>
      	<br>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id="enviar" type="submit" class="btn btn-primary" id="confirmacionEntrega" onClick="AgregarEntrega()"><i  class="glyphicon glyphicon-ok"></i> Registrar</a>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Calificar entrega</h4>
      </div>
      <div class="modal-body">
		<div class="ec-stars-wrapper" id="estrellas">
			<a href="#" class="selector"  data-value="1" title="Votar con 1 estrellas">&#9733;</a>
			<a href="#" class="selector"  data-value="2" title="Votar con 2 estrellas">&#9733;</a>
			<a href="#" class="selector"  data-value="3" title="Votar con 3 estrellas">&#9733;</a>
			<a href="#" class="selector"  data-value="4" title="Votar con 4 estrellas">&#9733;</a>
			<a href="#" class="selector" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
		</div>
		<noscript>Necesitas tener habilitado javascript para poder votar</noscript>
		<br>
		<div id="resultado" class="centro">res</div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal PARA LA RECOLECCION DE LA CARGA -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmacion Recoleccion</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal" role="form" method="post">
	      	<div class="form-group">
		      	<label for="fecha" class="col-sm-2 control-label">fecha</label>
		      		<div class="col-sm-10">
		      			<input type="date" class="form-control input" id="fechaRecoleccion" name="fechaRecoleccion"/>
		      		</div>
			</div>
			<div class="form-group">
		      	<label for="fecha" class="col-sm-2 control-label">Descripcion Recoleccion</label>
		      		<div class="col-sm-10">
		      			<input type="text" class="form-control input" id="DescripcionRecoleccion" name="DescripcionRecoleccion" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ]+([ ][A-Za-zÑñáéíóúÁÉÍÓÚ]+)*" title="Ingresa sólo letras y sin espacios extras" placeholder="Descripcion..." autofocus required/>
		      		</div>
			</div>
				<input type="hidden"  />
      </div>


      <div class="modal-footer">
      	<div id="respuetaRecoleccion">

      	</div>
      	<br>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a id="enviar" onClick="AgregarRecoleccion()" type="submit" class="btn btn-primary"><i  class="glyphicon glyphicon-ok"></i> Registrar</a>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="../../api/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
	$('.ec-stars-wrapper').on('click', '.selector', function(event) {
		$.ajax({
			url: '../php/nivel_satisfacion.php',
			type: 'POST',
			data: {nivel_satisfacion: $(this).attr('data-value')},
			beforeSend: function(){
				$('#resultado').html("Procesando informacion");
			},
			success: function(respuesta){
				$('#resultado').html(respuesta);
			}
		});
		return false;
	});
	function AgregarRecoleccion(){
		var fechaCarga = $('#fechaRecoleccion').val();
		var DescripcionCarga= $('#DescripcionRecoleccion').val();
		if(fechaCarga!=''&& DescripcionCarga!=''){
				var params = {
				'FechaRecoleccion':fechaCarga,
				'DescripcionEntrega':DescripcionCarga
				}
			$.ajax({
				url: '../php/carga_recogida.php',
				type: 'POST',
				data: params,
				beforeSend: function(){
					$('#respuetaRecoleccion').html("Procesando...");
				},
				success: function(respuesta){
					$('#respuetaRecoleccion').html(respuesta);
				}
			});
		}else{
				$('#respuetaRecoleccion').html('<center><div class="alert alert-danger" role="alert">No puedes dejar campos vacios</div><center>');
		}

		return false;
	}
	function AgregarEntrega(){
		var FechaRecoleccion = $('#FechaRecoleccion').val();
		var DescripcionEntrega = $('#DescripcionEntrega').val();
		var params ={
			'FechaRecoleccion':FechaRecoleccion,
			'DescripcionEntrega':DescripcionEntrega
		}
		$.ajax({
			url: '../php/carga_entregada.php',
			type: 'POST',
			data: params,
			beforeSend: function(){
				$('#respuetaEntrega').html('Espera.....');
			},
			success: function(respuesta){
				$('#respuetaEntrega').html(respuesta);
			}
		});

		return false;
	}

</script>
