<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Estudio 4k</title>
        <!--<meta name="description" content="Sufee Admin - HTML5 Admin Template">-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="images/icon.ico">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="assets/scss/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body>


        <?php include './left_panel.php'; ?>
        <div id="right-panel" class="right-panel">
            <?php include './header.html'; ?>


            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Productos</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">

                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Productos con stock bajo</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <!--<th>ID</th>-->
                                                <th>Descripción</th>
                                                <th>Stock</th>
                                                <th>Stock Bajo</th>
                                                <th>Precio</th>
                                                <th>Moneda/th>
                                                <th>Ubicación</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
//
                                            include './Conexion.php';

                                            $query = 'select distinct productos_ubicacion.id_productos_ubicacion, productos.id_producto, productos.nombre, '
                                                    . 'productos.precio, stock, stock_bajo, productos.id_moneda, moneda, productos_ubicacion.ubicacion as pubicacion, '
                                                    . 'inventario  '
                                                    . 'from productos '
                                                    . 'inner join moneda on moneda.id_moneda = productos.id_moneda '
                                                    . 'inner join facturas_compra_detalle on facturas_compra_detalle.id_producto = productos.id_producto '
                                                    . 'inner join productos_ubicacion on productos_ubicacion.id_productos_ubicacion = facturas_compra_detalle.id_productos_ubicacion '
                                                    . 'where productos.borrado_int != 1 '
                                                    . 'and facturas_compra_detalle.borrado != 1 '
                                                    . 'order by productos.nombre';
                                            $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
//
                                            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {


                                                $compras = 0;
                                                $query_compras = 'select cantidad from facturas_compra_detalle '
                                                        . 'where id_producto = ' . $line['id_producto']
                                                        . 'and id_productos_ubicacion = ' . $line['id_productos_ubicacion'];
                                                $result_compras = pg_query($query_compras) or die('La consulta fallo: ' . pg_last_error());
                                                while ($line_compras = pg_fetch_array($result_compras, null, PGSQL_ASSOC)) {
                                                    $compras = $line_compras['cantidad'] + $compras;
                                                }

                                                $ventas = 0;
                                                $query_ventas = 'select SUM(cantidad) '
                                                        . 'from cuenta_detalle '
                                                        . 'inner join cuenta on cuenta.id_cuenta = cuenta_detalle.id_cuenta '
                                                        . 'where id_producto = ' . $line['id_producto']
                                                        . 'and id_productos_ubicacion = ' . $line['id_productos_ubicacion']
                                                        . 'and id_tipo_venta != 3';
                                                $result_ventas = pg_query($query_ventas) or die('La consulta fallo: ' . pg_last_error());
                                                while ($line_ventas = pg_fetch_array($result_ventas, null, PGSQL_ASSOC)) {
                                                    $ventas = $line_ventas['sum'];
                                                }

                                                $baja = 0;
                                                $query_baja = 'select SUM(cantidad) '
                                                        . 'from baja '
                                                        . 'where id_producto = ' . $line['id_producto']
                                                        . 'and id_productos_ubicacion = ' . $line['id_productos_ubicacion'];
                                                $result_baja = pg_query($query_baja) or die('La consulta fallo: ' . pg_last_error());
                                                while ($line_baja = pg_fetch_array($result_baja, null, PGSQL_ASSOC)) {
                                                    $baja = $line_baja['sum'];
                                                }

                                                $movido = 0;
                                                $query_movido = 'select SUM(cantidad) '
                                                        . 'from producto_mover '
                                                        . 'where id_producto = ' . $line['id_producto']
                                                        . 'and id_productos_ubicacion = ' . $line['id_productos_ubicacion'];
                                                $result_movido = pg_query($query_movido) or die('La consulta fallo: ' . pg_last_error());
                                                while ($line_movido = pg_fetch_array($result_movido, null, PGSQL_ASSOC)) {
                                                    $movido = $line_movido['sum'];
                                                }

                                                $stock_actual = $compras - $ventas - $baja + $movido;
                                                $stock_bajo = $line['stock_bajo'];

                                                if ($stock_bajo >= $stock_actual) {

                                                    if ($line['inventario'] > 0) {

                                                        echo " <tr>";

                                                        echo "<td>";
                                                        echo $line['nombre'];
                                                        echo "</td>\n";


                                                        echo "<td>";
                                                        echo $compras - $ventas - $baja + $movido;
                                                        echo "</td>\n";

                                                        echo "<td>";
                                                        echo $stock_bajo;
                                                        echo "</td>\n";

                                                        $nombre_format_francais = number_format($line['precio'], 2, ',', ' ');
                                                        echo "<td>";
                                                        echo $nombre_format_francais;
                                                        echo "</td>\n";

                                                        echo "<td>";
                                                        echo $line['moneda'];
                                                        echo "</td>\n";

                                                        echo "<td>";
                                                        echo $line['pubicacion'];
                                                        echo "</td>\n";
                                                        //}
                                                        echo "\t</tr>\n";
                                                    }
                                                }
                                            }

//                                           
                                            pg_free_result($result);
                                            pg_close($dbconn);
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->


        <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/jszip.min.js"></script>
        <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
        <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="assets/js/lib/data-table/datatables-init.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $('#bootstrap-data-table-export').DataTable();
            });
        </script>


    </body>
</html>
