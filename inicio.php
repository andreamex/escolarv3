<?php
    use Illuminate\Database\Capsule\Manager as DB;

    require 'vendor\autoload.php';
    require 'config\database.php';


    $user = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.nombreusuario', $_POST['nombreusuario'])
    ->first();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistema escolar</title>
    <link rel="stylesheet" href="node_modules\bulma\css\bulma.min.css">
</head>
<body>
    <div class="container">
    <h1 class="has-text-centered is-size-1">sistema escolar</h1> <br> <br>

        <?php if ($user->nombreperfil == 'Profesor'){ ?>
            <h3>agregar calificacion:</h3>

            <form action="insertar.php" method="POST">
                <div class="field">
                    <label class="label">alumno</label>
                    <div class="control">
                      <input class="input" type="text" id="alumno">
                    </div>
                </div>

                <div class="field">
                    <label class="label">español</label>
                    <div class="control">
                      <input class="input" type="number" id="español">
                    </div>
                  </div>
                  
                  <div class="field">
                    <label class="label">matematicas</label>
                    <div class="control">
                      <input class="input" type="number" id="matematicas">
                    </div>
                  </div>

                  <div class="field">
                    <label class="label">historia</label>
                    <div class="control">
                      <input class="input" type="number" id="historia">
                    </div>
                  </div>

                  <div class="control">
                    <button class="button is-primary">guardar calificacion</button>
                  </div>
            </form>
        <?php } ?>

        <form action="consultar.php" method="POST">
          <input class="button is-info" type="submit" value="Consultar">
        </form>
    </div>
</body>
</html>