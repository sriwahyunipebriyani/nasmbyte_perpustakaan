        <!DOCTYPE html>
        <!---Coding By CodingLab | www.codinglabweb.com--->
        <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <!--<title>Registration Form in HTML CSS</title>-->
            <title>@section('title','register')</title>
            <!---Custom CSS File--->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
            <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
            <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
            <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
            <link rel="stylesheet" href="assets/css/demo.css" />
            <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
            <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
            <script src="assets/vendor/js/helpers.js"></script>
            <script src="assets/js/config.js"></script>
            <link rel="stylesheet" href="{{asset('css/style.css')}}">
            <style>
            .main {
                /* height: 100vh; */
                box-sizing: border-box;
            }

            form div {
                margin-bottom: 15px;
            }
            </style>
        </head>
        <body>
            {{-- <div class="main d-flex flex-column justify-content-center align-items-center">
            </div> --}}
            <section class="container">
                @if ($errors->any())
                        <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                @endif
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            <header>Sign Up your account</header>
            <form action="#" class="form" method="POST">
                @csrf
                <div>
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required  />
                </div>
                <div class="form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="column">
                <div class="mt-2">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" placeholder="Enter your name" required />
                </div>
                <div class="mt-2">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required />
                </div>
                </div>
                <div>
                    <label for="Address" class="form-label">Addres</label>
                    <textarea  name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary form-control">Submit</button>
                </div>
                <div class="text-center mt-3"> do you want to Sign in ? <a href="login" > Here </a></div>
            </section>
            </form>
        </body>

                <!-- build:js assets/vendor/js/core.js -->
                <script src="assets/vendor/libs/jquery/jquery.js"></script>
                <script src="assets/vendor/libs/popper/popper.js"></script>
                <script src="assets/vendor/js/bootstrap.js"></script>
                <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            
                <script src="assets/vendor/js/menu.js"></script>
                <script src="assets/js/main.js"></script>
                <script async defer src="https://buttons.github.io/buttons.js"></script>
        
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </html>