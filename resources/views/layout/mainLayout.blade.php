<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>library | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="{{asset('css/main.css')}}">


</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        {{-- navbar --}}
        <nav class="navbar navbar-light navbar-expand-lg bg-body-light shadow p-2 rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        {{-- end navbar --}}
    </div>
    <div class="bodycontent h-100">
        {{-- bodycontent --}}
        <div class="row g-0 h-100">
            <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarSupportedContent">

                @if (Auth::user()->RolesID == 1)
                    <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class='active' @endif>Dahboard</a>
                    <a href="/category"  @if (request()->route()->uri == 'category' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted-list' || request()->route()->uri == 'category-delete/{slug}' ) class='active' @endif > Categories</a>
                    <a href="/books"  @if (request()->route()->uri == 'books' || request()->route()->uri == 'books-add'  || request()->route()->uri == 'books-deleted' || request()->route()->uri == 'books-delete/{slug}' ) class='active' @endif >Books</a>
                    <a href="/users"  @if (request()->route()->uri == 'users' || request()->route()->uri == 'registed-users' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'user-deleted-list' || request()->route()->uri == 'user-delete/{slug}' ) class='active' @endif> Users</a>
                    <a href="/rentLog"  @if (request()->route()->uri == 'rentLog') class='active' @endif > Rent Log</a>
                    
                    <a href="/book-rent"   @if (request()->route()->uri == 'book-rent') class='active' @endif>Rent a book</a>
                    <a href="/book-return"  @if (request()->route()->uri == 'book-return') class='active' @endif > Return Book</a>
                    <a href="/logout">Logout</a>
                    @else
                    <a href="/book-rent"   @if (request()->route()->uri == 'book-rent') class='active' @endif>rent a book</a>
                    <a href="/book-return"  @if (request()->route()->uri == 'book-return') class='active' @endif > Return Book</a>
                    <><a href="/profile"  @if (request()->route()->uri == 'profile') class='active' @endif>Profile</a>
                        <><a href="/logout">Logout</a>
                @endif

            </div>
            <div class="content p-5 col-lg-10">
                @yield('content')
            </div>
        </div>
        {{-- endbodycontent --}}
        {{-- footer --}}
        {{-- <div class="footer">
            <div class="links">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="social-media">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
            <p>&copy; 2022 My Website. All rights reserved.</p>
        </div> --}}
        {{-- endfooter --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
