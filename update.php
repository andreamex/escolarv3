<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

DB::table('calificacion')
->where('idcalificacion', $_POST['idcalificacion'])
->update([
    'español' => $_POST['español'],
    'matematicas' => $_POST['matematicas'],
    'historia' => $_POST['historia'],
]);

echo "<p>LA CALIFICACION FUE ACTUALIZADA</p> 
        <br><a class='button' href='consultar.php'>regresar</a>";