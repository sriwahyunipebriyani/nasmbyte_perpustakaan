<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title','login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
                <div class="card  " id="pouple" >
                    <form action="" method="post" >
                        @csrf
                        <section class="card-body">
                            <header>Sign in your account</header>
                            <div class="mt-3">
                                <label for="username" class=" mt-3 form-label">username</label>
                                <input type="text" name="username" id="username" class="form-control" required> 
                            </div>
                            <div class="mt-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class=" column flex items-center justify-between gap-2 ">
                                <!-- <div class="form-check">
                                    
                                    <input class="form-check-input col-md-6" type="checkbox" id="remember-me" />
                                    <label class="ml-2 block text-sm text-gray-900" for="remember-me"><small> Remember Me</small> </label>
                                    
                                    <a href="forgot-password" class=" justify-end col-md-6 " id="forgot">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div> -->
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-secondary form-control">Submit</button>
                            </div>
                            <div class="d-flex justify-content-center "> dont have accaount ? <a href="register" > Sign Up</a></div>
                        </section>
                    </form>
                </div>
        
    </div>
        <!-- build:js assets/vendor/js/core.js -->
        <script src="assets/vendor/libs/jquery/jquery.js"></script>
        <script src="assets/vendor/libs/popper/popper.js"></script>
        <script src="assets/vendor/js/bootstrap.js"></script>
        <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
        <script src="assets/vendor/js/menu.js"></script>
        <script src="assets/js/main.js"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>