<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/login.css" rel="stylesheet">
    <script src="js/main.js"></script>
</head>
<body>
    <div class="container" id="container">
        {{-- <div class="form-container sign-up-container">
            <form action="#">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="{{url('auth/google/')}}" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" />
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <button>Sign Up</button>
            </form>
        </div> --}}
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="{{url('auth/google/')}}" class="social"><i class="fab fa-google-plus-g"></i></a>
                </div>
                {{-- <span>or use your account</span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button> --}}
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                {{-- <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn" onclick="switchPanel(panel=1)">Sign In</button>
                </div> --}}
                <div class="overlay-panel overlay-right">
                    <h1>Selamat Datang!</h1>
                    <p>Silakan login menggunakan akun google anda untuk melanjutkan</p>
                    <a class="btn-black" href="{{url('/')}}">Kembali ke halaman awal</a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="js/login.js"></script> --}}
    <script src="https://kit.fontawesome.com/0cf4c39c1c.js" crossorigin="anonymous"></script>
</body>
</html>