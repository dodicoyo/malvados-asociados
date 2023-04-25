<!doctype html>
<html lang="en">

<head>
    <title>login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../build/css/login/index.css">
</head>

<body class="body1">
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">

                        <h4 class="mb-0 pb-3"><span>Iniciar sesión &nbsp;</span><span>Registrarse</span></h4>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <!-- esto es el from de login -->
                                        <form action="validar.php" method="POST">
                                            <div class="section text-center">
                                                <h2 class="mb-4 pb-3">Iniciar sesión</h2>
                                             
                                                <div class="form-group">
                                                    <input id="usuario" name="usuario" type="email" class="form-style"
                                                        placeholder="E-mail">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>


                                                <div class="form-group mt-2">
                                                    <input id="password" name="password" type="password"
                                                        class="form-style" placeholder="Contraceña">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div>
                                                    <input type="text" class="login" id="login" name="login"
                                                        value="login"></input>

                                                </div>
                                                <div class="eventosDos">
                                                    <input class="btn  " name ="ingresar" type="submit" value="Iniciar sesión">
                                                </div>

                                                <p class="btn mb-0 mt-4 text-center">¿OLVIDASTE TU CONTRASEÑA?</p>
                                            </div>
                                        </form>
                                        <!-- fin form login -->
                                    </div>
                                </div>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <!-- aqui registramos suarios nuevos -->
                                        <form action="usuario_login.php" method="POST">

                                            <div class="section text-center">
                                                <h4 class="mb-3 pb-3">Registrarse</h4>
                                                                                                <div class="form-group">
                                                    <input id="nombreCompleto" name="nombreCompleto" type="text"
                                                        class="form-style" placeholder="Nombre Completo">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input id="numtel" name="numtel" type="tel" class="form-style"
                                                        placeholder="Numero Telefonico">
                                                    <i class="input-icon uil uil-phone"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input id="usuario" name="usuario" type="email" class="form-style"
                                                        placeholder="Correo">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input id="password" name="password" type="password"
                                                        class="form-style" placeholder="Contraceña">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input id="password1" name="password1" type="password"
                                                        class="form-style" placeholder="Vuelva a introducir la Contraceña">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <div>
                                                    <input type="text" class="login" id="login" name="login"
                                                        value="registrar"></input>

                                                </div>
                                                <div class="eventosDos">
                                                    <input class="btn  " type="submit" value="Registrarse">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>