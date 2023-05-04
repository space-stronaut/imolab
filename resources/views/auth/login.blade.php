<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iMoLab</title>

        <!--CSS-->
        <link rel="stylesheet" href="{{ asset ('frontend/css/Login.css') }}">

        <!--Boxicons CSS-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Login</header>

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        {{-- <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div> --}}

                        <div class="field button-field">
                            <button>Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Don't have an account yet? <a href="{{ route('register') }}" class="link signup-link">Sign Up</a></span>
                    </div>
                </div>
            </div>

            <!--Signup Form-->

        </section>

        <!--JavaScript-->
        <script src="{{ asset('frontend/js/Login.js') }}"></script>
    </body>
</html>