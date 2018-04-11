<?php

$dbconn = pg_connect("host=localhost dbname=4k user=postgres password=postgres") or die('No se ha podido conectar: ' . pg_last_error());
//$dbconn = pg_connect("host=localhost dbname=litoral user=postgres password=postgres") or die('No se ha podido conectar: ' . pg_last_error());