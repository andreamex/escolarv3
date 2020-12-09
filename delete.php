<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

DB::table('calificacion')->where('idcalificacion', $_GET['id'])->delete();

echo "SE ELIMINO CALIFICACION CON ID: {$_GET['id']} 
        <br><a class='button' href='consultar.php'>regresar</a>";