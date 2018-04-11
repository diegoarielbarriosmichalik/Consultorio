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
                            <h1>Compras</h1>
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
                                    <strong class="card-title">Compras</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Proveedor</th>
                                                <th>Factura</th>
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
//
                                            include './Conexion.php';

                                            $query = 'SELECT nombre, fecha_date, total, numero '
                                                    . 'FROM facturas_compra '
                                                    . 'inner join proveedor on proveedor.id_proveedor = facturas_compra.id_proveedor '
                                                    . 'where total > 0 order by fecha ';
                                            $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
//
                                            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                                                

                                                echo "<tr>";
                                                
                                                echo "<td>";
                                                echo $line['fecha_date'];
                                                echo "</td>\n";
                                                
                                                echo "<td>";
                                                echo $line['nombre'];
                                                echo "</td>\n";
                                                
                                                echo "<td>";
                                                echo $line['numero'];
                                                echo "</td>\n";

                                                $total = str_replace(".00", "", $line['total']);
                                                $nombre_format_francais = number_format($total, 2, ',', ' ');
//                                                $número_formato_inglés = number_format($número);
                                                echo "<td>";
                                                echo $nombre_format_francais;
                                                echo "</td>\n";
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
