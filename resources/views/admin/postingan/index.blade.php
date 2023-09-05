@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard_postingan') }}
@endsection

@section('content')
    <h3>Data Postingan</h3>
    <hr>
    <a href="{{ route('postingan.create') }}" class="btn btn-primary my-2">+ Tambah Postingan</a>
    <table class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Url</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($data as $key => $post)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    <img width="100" src="{{ asset('') }}files/gambar_postingan/banner/{{ $post->gambar }}" alt="gambar">
                </td>
                <td>{{ $post->judul }}</td>
                <td>
                    <a href="{{ route('post', ['id' => $post->id]) }}">
                        <u>{{ route('post', ['id' => $post->id]) }}</u>
                    </a>
                </td>
                <td>Published</td>
                <td>
                    <form action="{{ route('postingan.delete', ['id' => $post->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm user-delete">Delete</button>
                    </form>
                    <a href="{{ route('postingan.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // confirm delete with sweetalert
            $('.user-delete').click(function (e) { 
                e.preventDefault();
                
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil dihapus.',
                            'success'
                        )
                    }
                })
            });

            // get flash message with sweetalert
            @if (session('success') != null)
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
@endsection