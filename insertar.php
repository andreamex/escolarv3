<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';
    
 DB::table('calificacion')->insert([
     'alumno' => $_POST['alumno'],
     'español' => $_POST['español'],
    'matematicas' => $_POST['matematicas'],
    'historia' => $_POST['historia']
]);

echo "<p>CALIFICACION GUARDADA EXITOSAMENTE</p>
<br><a href='inicio.php'>regresar</a>";