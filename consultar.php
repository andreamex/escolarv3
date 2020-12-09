<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor/autoload.php';
require 'config/database.php';

$user = DB::table('calificacion')
->leftJoin('alumno', 'calificacion.idalumno', '=', 'alumno.idalumno')
->get();

echo <<<_TABLE
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>consultando calificaciones</title>
        <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
    </head>
    <body>
    <h1 class="has-text-centered is-size-1">sistema escolar</h1> <br> <br>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>ALUMNO</th>
                  <th colspan="3" class="has-text-centered">CALIFICACIONES</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
                </tr>
            </thead>
_TABLE;

foreach ($user as $colum) {
    echo <<<_ROW
            <tr>
            <td>$colum->idcalificacion</td>
            <td>$colum->nombrecompleto</td>
            <td>español: {$colum->español}</td>
            <td>matematicas: {$colum->matematicas}</td>
            <td>historia: {$colum->historia}</td>
            <td><a class="button is-info" href='delete.php?id={$colum->idcalificacion}'>eliminar</a></td>
            <td><form action="update.php" method="POST">
                    <input id='idcalificacion' type='text' name='idcalificacion' value='{$colum->idcalificacion}' hidden>

                    <label>español:</label>
                    <input type="text" id="español"><br>

                    <label>matematicas:</label>
                    <input type="text" id="matematicas"><br>

                    <label>historia:</label>
                    <input type="text" idf="historia"><br>

                    <button class='button is-primary' type='submit'>actualizar</button>
                </form>
            </td>
        </tr>
    </table> <br><br>

    <a href='inicio.php'>regresar</a>
</body>
</html>
_ROW;
}