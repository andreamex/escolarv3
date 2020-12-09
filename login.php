<?php
use Illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';

$user = DB::table('usuarios')
->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
->where('nombreusuario', $_POST['usuario'])
->first();

$msg="";
if ($user->password == $_POST['password']){
    $msg="<h1>BIENVENIDO: {$user->nombreperfil} {$user->nombreusuario}</h1>
    <br><a href='inicio.php'>entrar a sistema escolar</h1>";
}else{
    $msg="<h1> USUARIO Y/O CONTRASEÑA ERRONES, PORFAVOR VERIFIQUE Y VUELVA A INTENTARLO </h1>
    <br><a href='index.html'>regresar</a>";
}

echo $msg;