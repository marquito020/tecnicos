<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Login</title>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="user-box">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label>Password</label>
            </div>
            <button class="submit" style="background-color: transparent; border-color: transparent;">
                <a h="this.form.submit()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Ingresar
                </a>
            </button>

            <a href="{{ route('register') }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Registrarse
                </a>
        </form>
    </div>
</body>

</html>