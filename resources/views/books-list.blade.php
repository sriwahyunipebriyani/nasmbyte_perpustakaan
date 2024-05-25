<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>

        library | books-list
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/books-list.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <nav class="navbar bg-body-white">
        <ul class="p-20">
            <li>
                <div class="container-fluid">
                    <b>Nasmbyte library</b>

                </div>
            </li>
        </ul>
        <div class="dropdownuser">
            @if (Auth::check())
                <p class="flex">Welcome, {{ Auth::user()->username }}</p>
                <div class="dropdown-contentuser">
                    <a href="/profile"><i class="bi bi-person-fill"></i> Profile</a>
                    <a href="{{ route('collection.index') }}"><i class="bi bi-collection"></i> Collection</a>
                    <a href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
                </div>
            @else
                <a class="flex" href="/login">Login
                    <i class="bi bi-box-arrow-in-right"></i>
                </a>
            @endif
        </div>



    </nav>
    <nav class="navbar bg-body-white">
        <form action="" method="GET">
            <ul>
                <li><a href="/beranda"><i class="bi bi-house-door"></i> home page</a></li>
                <li><a href="/books-list"><i class="bi bi-journals"></i> book list</a></li>
                <li>
                    <a href="{{ route('collection.index') }}"><i class="bi bi-collection"></i> Collection</a>
                </li>
                <li>
                    <a href="/profile"><i class="bi bi-person-fill"></i> Profile</a>
                </li>
            </ul>
        </form>
    </nav>
    {{-- pencarian --}}
    <h2 class="text-center text-2xl my-4 font-bold mb-2 pb-1 border-b-2 border-blue-500" style="color: #3884BC;">Experience Book’s</h2>
    <div class="kotak mt-3 p-2">
        <form action="" method="get">
            
            <div class="row" >
                <div class="col-12 col-sm-7">
                    <p><b>books waiting for you to read</b></p>
                </div>
                <div class="col-12 col-sm-5 ">
                    <div class="input-group ">

                        <input type="text" name="Judul" class="form-control" placeholder="seach book title..."
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- books list --}}
    <div class="mt-3 ">
        <div class="row container d-flex justify-content-center ">
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
        
        <!-- Footer -->
        <div class="mt-4">
            <footer>
                <div>
                    <p>Copyright &copy; 2024 Nasmbyte Library</p>
                </div>
            </footer>
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').classList.add('fade-out');
            }, 5000); // Waktu dalam milidetik (5 detik)
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
