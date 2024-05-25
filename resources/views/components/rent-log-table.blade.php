<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->

    {{-- {{$rentlog}} --}}
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Book</th>
                    <th>Borrowing date</th>
                    <th>Return date</th>
                    <th>Actual Return date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentlog as $item )
                <tr class="{{ $item->actual_return_date  == null ? '' : ($item->TanggalPengembalian < 
                $item->actual_return_date ? 'text-bg-danger' : 'text-bg-success')}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->book->Judul}}</td>
                    <td>{{$item->TanggalPeminjaman}}</td>
                    <td>{{$item->TanggalPengembalian}}</td>
                    <td>{{$item->actual_return_date}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>