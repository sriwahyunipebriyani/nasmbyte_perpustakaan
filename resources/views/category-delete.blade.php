{{-- @extends('layout.mainLayout')
@section('title','category')
@section('content') --}}

<!-- Di dalam file blade template -->
{{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
    Hapus Kategori
</button> --}}

<!-- Modal Konfirmasi -->
{{-- <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus kategori ini?
            </div>
            <div class="modal-footer">
                
                    <a href="/category"  class="btn btn-secondary" data-dismiss="modal">  Batal</a>
                
                <form id="deleteForm" action="{{ route('category.destroy', ['category' => $category->slug]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <a href="/category-destroy/{{$category->slug}}">Hapus</a>

                    </button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
