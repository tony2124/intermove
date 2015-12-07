    <?php
    require("../../scripts/conexion.php");
    $sql = "SELECT ST_X(ubicacion_gps.ubicacion_pgs) as puntoX, ST_Y(ubicacion_gps.ubicacion_pgs) as puntoY FROM publicacion_demanda_servicio
        JOIN servicio_transportista ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=servicio_transportista.idpublicacion_demanda_servicio
        JOIN transportista ON servicio_transportista.idtransportista=transportista.idtransportista
        JOIN ubicacion_gps ON transportista.idtransportista=ubicacion_gps.idtransportista
        WHERE publicacion_demanda_servicio.num_guia='".$_SESSION["numero_guia"]."'";
    $query = mysql_query($sql);
    $array = mysql_fetch_array($query);
    ?>

<div class="container" style="margin-top:50px;margin-left:200px;">
    <div id="mapa" class="panel-heading panel panel-default panel-accent-gold" style="width:820px; height:500px;">
       <h3 class="panel-title"><i class="fa fa-cube"></i> Mapa</h3>
        --ACA VA EL MAPA"
    </div>
    <script type="text/javascript">
        var divMapa = document.getElementById('mapa');
        navigator.geolocation.getCurrentPosition(fn_ok,fn_mal);
        function fn_mal(){

        }
        function fn_ok(rta){
            //var lat = rta.coords.latitude;
            //var lon = rta.coords.longitude;

            var gLatLon = new google.maps.LatLng(<?php echo $array['puntoX'];?>,<?php  echo $array['puntoY']; ?>);
            //var gLatLon2 = new google.maps.LatLng(19.02512113913126,-102.08805084228516);
            var objConfig ={
                zoom:10,
                center: gLatLon,
                title:"mi casa"
            }
            var gMapa = new google.maps.Map(divMapa,objConfig);

            var objConfigMarker = {
                position:gLatLon ,
                map: gMapa
            }
          //  var objConfigMarker2 = {
          //     position: gLatLon2,
          //    map:gMapa
          // }


            var gMarker = new google.maps.Marker(objConfigMarker);
            //var gMarker2 = new google.maps.Marker(objConfigMarker2);

          // var directionsDisplay = new google.maps.DirectionsRenderer();
          // var directionsService = new google.maps.DirectionsService();

         //   var request = {
         //      origin: gLatLon,
         //       destination: gLatLon2,
         //       travelMode: google.maps.DirectionsTravelMode.DRIVING
         //   };

       //     directionsService.route(request, function(response, status) {
       //        if (status == google.maps.DirectionsStatus.OK) {
       //            directionsDisplay.setMap(gMapa);
       //            directionsDisplay.setPanel($("#panel_ruta").get(0));
       //            directionsDisplay.setDirections(response);
       //        } else {
       //                alert("No existen rutas entre ambos puntos");
       //        }
       //         });

        }
    </script>

</div>