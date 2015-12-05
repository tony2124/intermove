
<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<img class="img-header" src="../../img/Administrator.png"> Agregar Producto
        		</h3>
      		</div>
</div>
<div class="container" style="margin-top:100px;">
	<section class="col-lg-offset-3 col-lg-6 bg-primary" style="height:200px; border-radius:5px;">
		<center><h3>Mostrar Carga</h3></center>
		<table class="table table-condensed">
			<tr>
				<td class="text-center">Precio</td>
				<td clasS="text-center">Tipo de Cotizacion</td>
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
			<input type="button" onClick="window.location = 'pagina_principal.php?pagina=mostrar_mapa&id=<?php echo $array['idintencion_compra']; ?>'"; class="btn btn-default" value="Mostrar Mapa" />
			<input type="button" onClick="window.location = '../php/generar_factura.php?id=<?php echo $array['idintencion_compra']; ?>'"; class="btn btn-default" value="Generar factura" />
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
  				Confirmacion Entrega
			</button>
			</center>
		</div>
	</section>
</div>
<!-- Modal -->
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
		      			<input type="text" class="form-control input" id="DescripcionEntrega" name="DescripcionEntrega" pattern="[A-Za-zÑñáéíóúÁÉÍÓÚ]+([ ][A-Za-zÑñáéíóúÁÉÍÓÚ]+)*" title="Ingresa sólo letras y sin espacios extras" placeholder="Nombre del producto..." autofocus required/>
		      		</div>
			</div>
				<input type="hidden"  />
      </div>
      <div class="checkbox">
 		 <label>
   			  <input type="checkbox" value="1" id="product1" name="check" />
  		</label>
  		 <label>
   			  <input type="checkbox" value="2" id="product-1-2" name="check" />
  		</label>
	</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="enviar" type="submit" class="btn btn-primary"><i  class="glyphicon glyphicon-ok"></i> Registrar</button>
        </form>
        <script src="../../css/bootstrap/js/jquery.js"></script>
        <script type="text/javascript">
			jQuery(document).ready(function($) {
				('#product1').mousedown(function(event) {
					alert("si");
				});
			});
		</script>
      </div>
    </div>
  </div>
</div>
