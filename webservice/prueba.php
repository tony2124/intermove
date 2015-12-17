<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <div>
        <button id="boton" name="boton">boton</button>
        <div id="maickol">

        </div>
    </div>
</head>
<body>

</body>
<script src="../css/bootstrap/js/jquery.js"></script>
</html>
<script type="text/javascript">
    $("#boton").on('click',function(){
        var datos = {
       "search" :"apatzingan de la constitucion",
}


        $.ajax({
            url: 'http://ttr.sct.gob.mx/TTR/rest/GeoSearchLocationSvt?usr=sct&key=sct',
            type: 'POST',
            dataType: 'json',
            data: datos,
            beforeSend:function(){
                $('#maickol').html("espera");
            },
            success:function(){
                $('#maickol').html("maickol");
            }
        });

    });
</script>
