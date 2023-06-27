<?php
$alert = '';
session_start();
if(!empty($_SESSION['active']))
    {
        header('location:sistema/');
    }else{
        
        if(!empty($_POST))
        {

        if(empty($_POST['username']) || empty($_POST['password']))
            {
                $alert='Ingrese usuario y contraseña';
            }else{
                require_once 'conexion.php';
                $user = mysqli_real_escape_string($conection,$_POST['username']);
                $pass = md5(mysqli_real_escape_string($conection,$_POST['password']));

                $query=mysqli_query($conection,"SELECT * FROM usuario WHERE  usuario = '$user' AND CLAVE = '$pass'");
                $result =mysqli_num_rows($query);
                if ($result >0)
                {
                    $data = mysqli_fetch_array($query);
                    
                    $_SESSION['active']=true;
                    $_SESSION['idusuario']=$data['idusuario'];
                    $_SESSION['nombre']=$data['nombre'];
                    $_SESSION['email']=$data['correo'];
                    $_SESSION['user']=$data['usuario'];
                    $_SESSION['rol']=$data['rol'];
                    header('location:sistema/');

                }else{$alert='Usuario o clave son incorrectas';
                    session_destroy();
                }
                
                
            }
    }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistema de Facturación</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <section id="container">
        <form action="" method="post">
            <h3>Iniciar Sesión</h3>
            <img src="/img/1.png" alt="Login">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <div class="container"><?php echo(isset($alert) ? $alert:''); ?></div>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </section>
</body>
</html>