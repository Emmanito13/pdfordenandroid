<?php
ob_start();
session_start();
require "controller/Request.php";
$request = new Request();
$id_ser_venta = $_GET['id_ser_venta'];
$orden = $request->getOrdenServicio($id_ser_venta);
$checks_1 = $request->getChecksCategory($id_ser_venta, "1");
$checks_2 = $request->getChecksCategory($id_ser_venta, "2");
$checks_3 = $request->getChecksCategory($id_ser_venta, "3");
$checks_4 = $request->getChecksCategory($id_ser_venta, "4");
$checks_5 = $request->getChecksCategory($id_ser_venta, "5");
$checks_6 = $request->getChecksCategory($id_ser_venta, "6");
$checks_7 = $request->getChecksCategory($id_ser_venta, "7");
$fotos = $request->getFotosOrdenServicio($id_ser_venta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de servicio</title>
</head>

<style>
    .header_img {
        display: flex;
        justify-content: center;
        width: 130px;
        height: 130px;        
    }

    .container_title {
        justify-content: center;
        text-align: center;
        margin: 0 auto;
        margin-top: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 22px;
    }

    .title_mantenimiento{
        justify-content: center;
        text-align: center;
        justify-items: center;
        margin: 0 auto;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        /* background-color: rgb(199, 222, 234 ); */
        margin-top: 10px;
        padding: 10px;
        font-size: 18px;
    }

    .title-evidencias{
        justify-content: center;
        text-align: center;
        margin: 0 auto;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        padding: 10px;
        font-size: 18px;
        margin-top: 25px;
        border-top: 1px solid black;
    }

    .date_entry {
        justify-content: right;
        margin-top: 20px;
        text-align: right;
        font-family: Arial, Helvetica, sans-serif;
        padding-bottom: 30px;
    }

    .txt_fecha {
        font-family: Arial, Helvetica, sans-serif;
        word-wrap: break-word;
        font-weight: normal;
        text-align: center;
        margin: 10px;
    }

    .header_details {
        display: flex;
        justify-content: center;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        background-color: rgb(172, 216, 241);
        color: black;
        padding: 10px;
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }

    .body_details {
        background: #ccc;
        padding: 10px;
        display: flex;
        flex-flow: row wrap;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        height: auto;
        width: 80%;
        border-radius: 20px;
    }

    .static_text {
        background: aqua;
        color: black;
        width: 30%;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        text-align: right;
        margin: 3px;
        overflow: hidden;
    }

    .recived_text {
        background: grey;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: normal;
        width: 30%;
        text-align: left;
        margin: 3px;
        overflow: hidden;
    }

    table {
        width: 100%;
        overflow: hidden;
        border: 1px solid black;
        border-radius: 20px;
    }

    th {
        font-family: Arial, Helvetica, sans-serif;
    }

    td {
        font-family: Arial, Helvetica, sans-serif;
        padding-bottom: 10px;
    }

    #table_motor {
        width: 100%;
        margin-top: 10px;
        border: none;  
    }

    #table_transmision {
        width: 100%;
        margin-top: 70px;
        border: none;   
    }

    #table_frenos {
        width: 100%;
        margin-top: 10px;
        border: none;     
    }

    #table_electrico {
        width: 100%;
        margin-top: 10px;
        border: none;
    }

    #table_suspension {
        width: 100%;
        margin-top: 10px;
        border: none;
    }

    #table_enfriamiento {
        width: 100%;
        margin-top: 10px;
        border: none;
    }

    #table_equipos {
        width: 100%;
        margin-top: 10px;
        border: none;
    }

    #table_evidencias{
        width: 100%;
        border: none;
        font-family: Arial, Helvetica, sans-serif;
    }

    
</style>

<body>

    <center>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/logo_georgio.jpg" class="header_img">
    </center>

    <div class="container_title">
        INFORME ORDEN DE SERVICIO
    </div>

    <div class="date_entry">
        <b>FECHA DE INGRESO: </b> <?php echo date("d/m/Y", strtotime($orden['fecha_ingreso'])) ?>
    </div>

    <div class="body_details">
        <table>
            <thead>
                <tr>
                    <th style="padding-bottom: 30px;" colspan="4">DETALLES DE LA UNIDAD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right; font-weight: bold;">MARCA:</td>
                    <td style="text-align: left;"><?php echo $orden['marca'] ?></td>
                    <td style="text-align: right; font-weight: bold;">AÑO:</td>
                    <td style="text-align: left;"><?php echo $orden['anio'] ?></td>
                </tr>

                <tr>
                    <td style="text-align: right; font-weight: bold;">MODELO:</td>
                    <td style="text-align: left;"><?php echo $orden['modelo'] ?></td>
                    <td style="text-align: right; font-weight: bold;">MOTOR:</td>
                    <td style="text-align: left;"><?php echo $orden['motor'] ?></td>
                </tr>

                <tr>
                    <td style="text-align: right; font-weight: bold;">VIN:</td>
                    <td style="text-align: left;"><?php echo $orden['vin'] ?></td>
                    <td style="text-align: right; font-weight: bold;">PLACAS:</td>
                    <td style="text-align: left;"><?php echo $orden['placas'] ?></td>
                </tr>

                <tr>
                    <td colspan="4" style="text-align: center;"><b>CLIENTE: </b><?php echo $orden['nombre'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="title_mantenimiento">
        CHEQUEOS REALIZADOS
    </div>

    <div class="body_services">

            <?php
            $band1 = false;
            foreach ($checks_1 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band1 = true;
                }     
            }

            $band2 = false;
            foreach ($checks_2 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band2 = true;
                }     
            }

            $band3 = false;
            foreach ($checks_3 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band3 = true;
                }     
            }

            $band4 = false;
            foreach ($checks_4 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band4 = true;
                }     
            }

            $band5 = false;
            foreach ($checks_5 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band5 = true;
                }     
            }

            $band6 = false;
            foreach ($checks_6 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band6 = true;
                }     
            }

            $band7 = false;
            foreach ($checks_7 as $check) {
                if ($check['estado'] == 'realizado') {
                    $band7 = true;
                }     
            }

            if ($band1) {
            ?>
        
            <table id="table_motor">
                <thead>
                    <tr>
                        <th style="background-color: #ccc;" colspan="3"><b>MOTOR</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                foreach($checks_1 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                        <?php
                    }
                    
                }
                ?>                                    
                </tbody>
            </table>
            <?php
            }

            if ($band2) {
            ?>
            <table id="table_transmision">
                <thead>
                    <tr>
                        <th style="background-color: rgb(242, 231, 207);" colspan="3"><b>CAJA DE CAMBIOS Y TRANSMISIÓN</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($checks_2 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>

            <?php
            }
            if ($band3) {
            ?>

            <table id="table_frenos">
                <thead>
                    <tr>
                        <th style="background-color: #ccc;" colspan="3"><b>SISTEMA DE FRENOS</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($checks_3 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>

            <?php
            }
            if ($band4) {
            ?>

            <table id="table_electrico">
                <thead>
                    <tr>
                        <th style="background-color: rgb(242, 231, 207);" colspan="3"><b>SISTEMA ELECTRICO</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($checks_4 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>

            <?php
            }
            if ($band5) {
            ?>

            <table id="table_suspension">
                <thead>
                    <tr>
                        <th style="background-color: #ccc;" colspan="3"><b>SUSPENSIÓN</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($checks_5 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            if ($band6) {
            ?>

            <table id="table_enfriamiento">
                <thead>
                    <tr>
                        <th style="background-color: rgb(242, 231, 207);" colspan="3"><b>ENFRIAMIENTO</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($checks_6 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            if ($band7) {
            ?>

            <table id="table_equipos">
                <thead>
                    <tr>
                        <th style="background-color: #ccc;" colspan="3"><b>EQUIPOS DE SEGURIDAD</b></th>
                    </tr>
                    <tr>
                        <th><b>Servicio</b></th>
                        <th><b>Observaciones</b></th>
                        <th><b>Estatus</b></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($checks_7 as $check){
                    if ($check['estado'] == 'realizado') {
                        ?>
                        <tr>
                            <td style="text-align: left;"><?php echo $check['descripcion'] ?></td>
                            <td style="text-align: center;"><?php echo $check['comentarios'] == 'NA' ? ' ' : $check['comentarios']; ?></td>
                            <?php
                            if($check['estado'] == 'realizado'){
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/comprobado.png" alt="Sin foto" width="16px"></td>
                            <?php    
                            }else{
                                ?>
                                <td style="text-align: center;"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/georgio/mobil/pdfordenandroid/img/pend.png" alt="Sin foto" width="16px"></td>
                            <?php
                            }
                            
                            ?>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
            <?php
            }
            ?>    
    </div>

    <div class="body-evidencias">
        <div class="title-evidencias">
            EVIDENCIAS
        </div>

        <table id="table_evidencias">
            <tbody>

                <?php
                foreach($fotos as $foto){
                ?>
                <tr style="text-align: center;">
                    <img src="<?php echo 'http://ubiexpress.net:5610/georgio/mobil/imagenes/checklist/' . $foto['foto'] ?>" width="400px" alt="" srcset=""><p><?php echo $foto['observacion'] ?></p>
                </tr>
                <?php
                }
                ?>                        
            </tbody>
        </table>
    </div>

</body>

</html>

<?php

$html = ob_get_clean();

require_once 'lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

//opciones para agregar imagenes;
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->render();

$dompdf->stream('Informe_orden_servicio.pdf', array("Attachment" => false));

?>
