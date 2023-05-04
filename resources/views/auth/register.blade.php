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
                    <header>Register</header>

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="field input-field">
                            <input type="text" placeholder="Username" class="input" name="name">
                        </div>
                        <div class="field input-field">
                            <input type="text" placeholder="Alamat" class="input" name="alamat">
                        </div>
                        <div class="field input-field">
                            <input type="number" placeholder="Nomor HP" class="input" name="no_hp">
                        </div>
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Password" class="password" name="password" id="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Confirm Password" class="password" name="password_confirmation" id="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        {{-- <div class="form-link">
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div> --}}

                        <div class="field button-field">
                            <button>Sign Up</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already Have an account? <a href="{{ route('login') }}" class="link signup-link">Sign In</a></span>
                    </div>
                </div>
            </div>

            <!--Signup Form-->

        </section>

        <!--JavaScript-->
        <script src="{{ asset('frontend/js/Login.js') }}"></script>
    </body>
</html>