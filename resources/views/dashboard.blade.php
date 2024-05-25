@extends('layout.layoutMain')
@section('matahari','dashboard')
@section('tengah')    
<h2>Welcome {{Auth::user()->username}}</h2>

<div class="row mt-3">
    <div class="col-lg-3"> 
        <div class="card-data shadow p-2 mb-4 bg-body rounded">
            <div class="row">
                <div class="col-6">
                    <div class="icon text-center">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-end">
                    <div class="card-dest">Books</div>
                    <div class="card-column">{{$book_count}}</div>
                </div>
            </div>
        </div></div>
    <div class="col-lg-3">
        <div class="card-data shadow p-2 mb-4 bg-body rounded">
            <div class="row">
                <div class="col-6">
                <div class="icon text-center ">
                    <i class="bi bi-list-ul"></i>
                </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-end">
                    <div class="card-dest">Categories</div>
                    <div class="card-column">{{$category_count}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-data shadow p-2 mb-4 bg-body rounded">
            <div class="row">
                <div class="col-6">
                    <div class="icon text-center">
                        <i class="bi bi-person-fill"></i> 
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-end">
                    <div class="card-dest">Users</div>
                    <div class="card-column">{{$user_count}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-data shadow p-2 mb-4 bg-body rounded">
            <div class="row">
                <div class="col-6">
                    <div class="icon text-center">
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="col-6 flex-column d-flex justify-content-center align-items-end">
                    <div class="card-dest">Review</div>
                    <div class="card-column">{{$ulasan_buku}}</div>
                </div>
            </div>
        </div>
    </div>
    <div>

        {{-- content dashboard --}}
        <div class="row">
                <div class="col-lg-7  mb-4">
                    <div class="container">
                    <div class=" p-3">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">let's read the book</p>
                            <h5 class="">Open the World with Books</h5>
                            <p class="mb-5">Books are time vessels, taking you to the past or helping you understand the future.</p>
                            <a class="text-body text-sm  mb-0 icon-move-right mt-auto" href="rentLog">
                                Read More
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <div class="border-radius-lg h-100">
                            {{-- <img src="../assets2/img//" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves"> --}}
                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                <img class="w-100  position-relative z-index-2 pt-4" src="../assets2/img/illustrations/6888606.jpg" alt="rocket">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                {{-- galery --}}
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('../assets3/img/1.jpg');
                                background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">Unlock Explore the Pages of Wisdom</h5>
                                    <p>Dive into the vast universe of knowledge within the pages of books.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('../assets3/img/2.jpg');
                                background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1"> Books as the Gateway to Wisdom</h5>
                                    <p>Books serve as the ultimate tool for expanding intellect and understanding.</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('../assets3/img/3.jpg');
                                background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-trophy text-dark opacity-10"></i>
                                    </div>
                                    <h5 class="text-white mb-1">The Path of Learning and Growth</h5>
                                    <p>Embark on a journey toward brilliance through the pursuit of knowledge and continuous learning.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                {{-- endgalery --}}
            </div>
            {{-- table --}}
            <h3 class="">Rent log</h3>
            <div class="mt-3"></div>
            <div class="row ">
                <div class="col-lg-5">
                    <div class="container">
                        <table class="table-responsive">
                            <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Books</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item )
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>{{$item->NamaKategori}}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                            </table>
                            </table>
                    </div>
                </div>
                
                <div class="col-lg-7 ">
                    <div class="kontener">
                        <x-rent-log-table :rentlog='$rent_logs'/>
                    </div>
                </div>
            </div>
        </div>
        {{-- end content dashboard --}}
    </div>
    </div>
</div>


@endsection