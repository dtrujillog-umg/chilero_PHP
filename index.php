<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/Estilos.css">
    <link rel="icon" href="favicon.png" sizes="16x16" type="image/png">

    <script src="scripts/validaciones.js"></script>


    <script src="http://codeseven.github.com/toastr/toastr.js"></script>
    <link href="http://codeseven.github.com/toastr/toastr.css" rel="stylesheet" />
    <link href="http://codeseven.github.com/toastr/toastr-responsive.css" rel="stylesheet" />

    <script src="scripts/toastr.js"></script>

    <title>Documentos Emfama</title>
</head>

<body>
    <?php
    date_default_timezone_set('America/Tegucigalpa');
    $m = date("m");
    $y = date("Y");
    $hoy = date("d/m/y H:i");
    $rutaticket = "ticket/" . $y . $m . ".txt";

    $fht = fopen("imemail/ticket.txt", 'r') or die("Se produjo un error al leer un archivo") or die('Tampoco');
    $fhm = fopen($rutaticket, 'c+') or die('Se produjó un error al intentar leer el archivo');
    fwrite($fhm, $y . $m . '00000');
    fclose($fhm);
    $f = fopen($rutaticket, 'r') or die('Error');
    $cont = 0;
    while ($linea = fgets($f)) {
        $cont = $linea;
    }

    $cont = $cont + 1;
    ?>

    <div class="container-fluid" id="prueba">
        <form action="imemail/imEmailForm.php" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">Datos del solicitante</div>
                <div class="row card-body">
                    <div class="col-sm-2">
                        <label for="numeroticket">No. Ticket</label>
                        <input type="text" name="numeroticket" id="numeroticket" class="form-control nomodificar" required value="<?php echo $cont; ?>">
                    </div>
                    <div class="col-sm-2">
                        <label for="fecha" class="form-control-label">Fecha de la solicitud</label>
                        <input type="text" name="fecha" id="fecha" class="form-control nomodificar" required value="<?php echo $hoy; ?>">
                    </div>
                    <div class="col-sm-3">
                        <label for="correosolicitante">Correo electrónico</label>
                        <input type="email" name="correosolicitante" id="correosolicitante" class="form-control minuscula" data-toggle="tooltip" data-placement="top" title="Ingrese su correo de la empresa" placeholder="Ingrese su correo en minúsculas">
                    </div>
                    <div class="col-sm-3">
                        <label for="sucursal" class="form-control-label">Sucursal/Departamento</label>
                        <select name="sucursal" id="sucursal" class="custom-select" required>
                            <option value="seleccione...">Seleccione...</option>
                            <?php
                            //$fh = fopen("/home/fmoderna14/public_html/pruebas/sucursales/sucursales.txt", 'r')
                            //or die("Se produjo un error al leer un archivo") or die('Tampoco');
                            $fh = fopen("sucursales/sucursales.txt", 'r')
                                or die("Se produjo un error al leer un archivo") or die('Tampoco');
                            $texto = "";
                            $contador = 0;
                            while ($linea = fgets($fh)) {
                                $contador += 1;
                                $texto .= $linea;
                                echo '<option value="' . $linea . '">' . $linea . '</option>';
                            }
                            fclose($fh);
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Datos del documento</div>
                <small id="emailHelp" class="form-text text-muted">Si es un documento que no tiene serie, colocar
                    "NA"</small>
                <small id="descripcionHelp" class="form-text text-muted">Si la solicitud es por modificación, es
                    necesario que coloque en el campo Descripción los nuevos datos</small>
                <div class="row card-body">
                    <div class="col-sm-2">
                        <label for="accion" class="form-control-label">Procedimiento solicitado</label>
                        <select name="accion" id="accion" class="custom-select" required>
                            <option value="Seleccione">Seleccione...</option>
                            <option value="Modificar">Modificar</option>
                            <option value="Eliminar">Eliminar</option>
                            <option value="Anular">Anular</option>
                            <option value="Reimpresión">Reimpresión</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="documentos" class="form-control-label">Tipo de documento</label>
                        <select name="documentos" id="documentos" class="custom-select" required>
                            <option value="Selccione">Seleccione...</option>
                            <option value="Vale">Ajuste</option>
                            <option value="Factura">Factura</option>
                            <option value="Factura compras">Factura de compra</option>
                            <option value="Nota de crédito">Nota de crédito</option>
                            <option value="Nota de abono">Nota de abono</option>
                            <option value="Nota de débito">Nota de débito</option>
                            <option value="Recibo de Caja">Recibo de caja</option>
                            <option value="Envío">Envío</option>
                            <option value="Envío por Vale">Envío por Vale</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <label for="seriedocumento">Serie</label>
                        <input class="form-control mayuscula" type="text" name="seriedocumento" id="seriedocumento">

                    </div>
                    <div class="col-sm-1">
                        <label for="numerodocumento">Número</label>
                        <input class="form-control validar" type="text" name="numerodocumento" id="numerodocumento">
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="descripcion" cols="60" rows="1" data-toggle="tooltip" data-placement="top" title="Si la solicitud es de modificacion, coloque los nuevos datos"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Motivos de la solicitud</div>
                <div class="row card-body">
                    <div class="col-sm-3">
                        <!-- <label for="datomodificar" class="form-control-label">Motivos de la solicitud</label> -->
                        <div class="form-group">
                            <ul>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Fecha">
                                    Fecha</li>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Código cliente"> Código cliente</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- <label for="datomodificar" class="form-control-label">Motivos de la solicitud</label> -->
                        <div class="form-group">
                            <ul>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Código Vendedor"> Código Vendedor</li>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Factura mal totalizada"> Factura mal totalizada</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- <label for="datomodificar" class="form-control-label">Motivos de la solicitud</label> -->
                        <div class="form-group">
                            <ul>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Forma de pago"> Forma de pago</li>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Nit">
                                    Nit incorrecto o invalido</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- <label for="datomodificar" class="form-control-label">Motivos de la solicitud</label> -->
                        <div class="form-group">
                            <ul>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Factura sin movimiento"> Factura sin movimiento</li>
                                <li id="datomodificar"><input type="checkbox" name="datomodificar[]" value="Modificación de tipo de pago"> Modificación de tipo de pago</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Opciones</div>
                <div class="row card-body">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <input type="submit" value="Enviar correo" class="form-control" id="btn">
                            <!-- <input type="submit" value="Prueba" class="form-control" id="btn"> -->
                            <script>
                                function boton() {
                                    alert("Correo enviado exitosamente...");
                                }
                            </script>
                            <script>
                                function ejecutaAlerta() {
                                    var w = window.open('', '', 'width=100,height=100')
                                    w.document.write('Hola StackOverflow!')
                                    w.focus()
                                    setTimeout(function() {
                                        w.close();
                                    }, 2000)
                                }
                            </script>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <input type="reset" value="Limpiar" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>