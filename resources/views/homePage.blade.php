<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Libarary</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="temp/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
        
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg ">
                <div class="container px-5">
                    <img class="navbar-brand " height="120px" src="{{ asset('image/logo.png') }}"></img>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto  mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/beranda">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/books-list">Books</a></li>
                            <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('collection.index') }}">Collection</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class=" ">
                <div class=" px-4">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-2 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder  mb-2">Unlock the Doors to Knowledge with Our Library web</h1>
                                <p class="lead fw-normal mb-4">Let's embark on a journey through the pages of knowledge together. Grab a book and explore the endless possibilities within</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary" style="background-color: #3884BC;" href="/login">
                                        Get Started
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-2" src="{{ asset('image/buku.jpg') }}" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Testimonial section-->
            <div class="py-5 text-light" style="background-color: #2D8BBA" >
                <div class=" px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"Books are the keys to unlock new worlds, broaden perspectives, and fuel imagination. Embrace the journey of reading and discover the endless possibilities that await within the pages."</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="{{ asset('image/wahyu.jpg') }}" height="40px" width="40px" alt="..." />
                                    <div class="fw-bold">
                                        Sri wahyuni febriyani
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        CEO, Nasmbyte Library
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class=" px-5 my-5 ">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Books list</h2>
                                
                            </div>
                        </div>
                    </div>
                    <div class="wrapper row gx-5">
                        <div class="carousel">
                            <div class="row  d-flex justify-content-center ">
                                @foreach ($book as $item)
                                    <a href="/books-detail/{{$item->slug}}" class="card h-100 lg-3 md-4 me-4  mt-3" style="width: 16rem; ">
                                        <img src="{{ $item->cover != null ? asset('storage/cover/' . $item->cover) : asset('image/Not-Found.jpg') }}"
                                            height="250px"class="card-img-top" draggable="false">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->Judul }}</h5>
                                            <p class="card-text">{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</p>
                                            <p class="text-end {{ $item->status == 'available' ? 'text-success' : 'text-danger' }}">
                                                {{ $item->status }}</p>
                                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <div class="py-4 mt-auto" style="background-color: #2D8BBA">
            <div class=" px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Nasmbyte library </div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="temp/js/scripts.js"></script>
        {{--  --}}
        <script>
            window.addEventListener('DOMContentLoaded', function() {
    let carousel = document.querySelector('.library-carousel');
    carousel.classList.add('auto-scroll');
});

        </script>
    </body>
</html>
