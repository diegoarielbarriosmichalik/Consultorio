<?php

$id_form = $_POST['frm'];

if ($id_form == 1) { // Clientes guardar
    include './Conexion.php';

    $id_cliente = MAX_Table('cliente', 'id_cliente');

    $query = "INSERT INTO cliente VALUES ($id_cliente,'$_POST[nombre]','$_POST[direccion]','$_POST[telefono]','0','0','$_POST[ruc]','1', '$_POST[email]','0','0','$_POST[ci]')";
    $result = pg_query($query);

    if (!$result) {
        $error .= "pg_last_error($dbconn)<li>";
    }
    include './Clientes.php';
}

function MAX_Table($table, $id_tabla) {
    $query = 'SELECT MAX(' . $id_tabla . ')'
            . 'FROM ' . $table;
    $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $id = $line["max"] + 1;
    }
    return $id;
}

?>
