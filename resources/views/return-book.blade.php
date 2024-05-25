@extends("layout.layoutMain")
@section('matahari','return-book')
@section('tengah')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="kepalakotak my-4">
        return your books
    </div>
    @if (session('message'))
    <div class="alert mt-3 {{session('alert-class')}}">
        {{ session('message') }}
    </div>
    @endif
        <div class="container mt-3 ">

            <form action="book-return" method="POST" id="returnForm">
                @csrf
                <div class="mb-3 ">
                    <label for="user" class="form-label">User</label>
                    <select name="UserID" id="UserID" class="form-control inputbox">
                        <option value="">Select User</option>
                        @foreach ($users as $item )
                            <option value="{{$item->UserID}}">{{$item->username}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="books" class="form-label">Books</label>
                    <select name="BukuID" id="BookID" class="form-control inputbox">
                        <option value="">Select Books</option>
                        @foreach ($books as $item )
                            <option value="{{$item->BukuID}}">{{$item->Judul}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100">submit</button>
                </div>
            </form>
        </div>
        <div class="konek"></div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.inputbox').select2();
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#UserID').change(function () {
                var UserID = $(this).val();
                if (UserID) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('get-books') }}/" + UserID,
                        success: function (response) {
                            $('#BookID').html(response);
                            $('#BookID').prop('disabled', false);
                        }
                    });
                } else {
                    $('#BookID').html('<option value="">Select Books</option>');
                    $('#BookID').prop('disabled', true);
                }
            });
        });
    </script>
    
@endsection