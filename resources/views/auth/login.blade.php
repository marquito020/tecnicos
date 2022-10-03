<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1402/1402219.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{asset('css/login2.css')}}"> -->
    <title>Ingresar</title>
</head>

<body>
    <div class="container @error('password')
    right-panel-active
    @enderror" id="container">
        <div class="form-container sign-up-container">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <h1>Crear Cuenta</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>o usa tu correo electronico para registrarte</span>

                <div class="contenedor">
                    <div class="user-box">
                        <input class="myInput" type="text" id="nombre" required name="nombre" value="{{old('nombre')}}">
                        <label>Nombre</label>
                    </div>
                    <div class="user-box">
                        <input class="myInput" type="text" id="apellido" required name="apellido_paterno" value="{{old('apellido_paterno')}}">
                        <label>Apellido Paterno</label>
                    </div>
                    <div class="user-box">
                        <input class="myInput" type="text" id="apellido" required name="apellido_materno" value="{{old('apellido_materno')}}">
                        <label>Apellido Materno</label>
                    </div>
                    <div class="user-box">
                        <input class="myInput" type="email" id="email" required name="email" value="{{old('email')}}">
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <input class="myInput" type="password" id="password" required name="password">
                        <label>Contraseña</label>
                    </div>
                    <div class="user-box">
                        <input class="myInput" type="password" id="password" required name="password_confirmation">
                        <label>Repita su Contraseña</label>
                    </div>
                </div>

                @error('password','nombre','apellido_paterno','apellido_materno','email')
                {{$message}}
                @enderror
                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
                @endif


                <div class="iniciar">
                    <button class="submit">
                        <a h="this.form.submit()">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Registar
                        </a>
                    </button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form id=Loginaction="{{route('login')}}" method="POST">
                @csrf
                <h1>Ingresa con</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>o usa tu cuenta</span>
                <div class="contenedor">
                    <div class="user-box">
                        <input type="text" name="nombre_usuario" required>
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    @error('nombre_usuario')
                    <div class="" style="color: red">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button id="buttonFormLogin" type="submit" style="visibility: hidden; display: none;"></button>
                <a href="">¿Olvidaste tu contraseña?</a>
                <div class="iniciar">
                    <button class="submit">
                        <a h="this.form.submit()">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Ingresar
                        </a>
                    </button>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido</h1>
                    <p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
                    <button class="ghost" id="signIn">Ingresar</button>
                    <img style="height: 270px; margin-top: 10%;" src="/images/login/perrito.png">
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hola, Amigo!</h1>
                    <p>Ingresa tus datos personales</p>
                    <button class="ghost" id="signUp">Registrar</button>
                    <img style="height: 270px;" src="/images/login/gato.png">
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="{{ asset('js/login2.js') }}"></script> -->


</body>

</html>