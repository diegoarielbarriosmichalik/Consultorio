<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Estudio 4k</title>
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
                            <h1>Clientes</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <!--<li><a href="#">Agregar Cliente</a></li>-->


                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Nuevo Cliente</strong> 
                    </div>
                    <div class="card-body card-block">
                        <form action="4k.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            
                            <input type="text" id="text-input" value="1" style="visibility: hidden" name="frm"  placeholder="" class="form-control">
                            
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="nombre" required="" placeholder="Nombre" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">CI</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="ci" placeholder="Número de Cédula" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">RUC</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="ruc" placeholder="Número de Registro Único del Contribuyente" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dirección</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="direccion" placeholder="Dirección" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telefono</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="telefono" placeholder="Telefono" class="form-control">
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9"><input type="email" id="email-input" name="email" placeholder="Correo Electronico" class="form-control"></div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Notificaciones por correo</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="select" id="select" class="form-control">
                                        <option value="0">Desactivada</option>
                                        <option value="1">Activada</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <!--<i class="fa fa-lock fa-lg"></i>&nbsp;-->
                                    <span id="payment-button-amount">Guardar</span>

                                </button>
                            </div>
                    </div>

                </div>


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
