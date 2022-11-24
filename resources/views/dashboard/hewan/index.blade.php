@extends('dashboard.layout.main')

@section('container')
    <h1 class="text-center">Data Hewan</h1>    

    <a href="hewan/create" class="btn btn-primary">Tambah Data Hewan</a><br>
    @if (session()->has('pesan_tambah'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        Data Berhasil di Tambah
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session()->has('pesan_edit'))
        <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
            {{ session('pesan_edit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('pesan_hapus'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('pesan_hapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <table class="table table-bordered mt-4">
        <tr>
            <td>No</td>
            <td>Nama Hewan</td>
            <td>Jenis Hewan</td>
            <td>ID Owner</td>
            <td>Tanggal Masuk</td>
            <td>Alamat</td>
            <td>Option</td>
        </tr>

        @foreach ($hewans as $hwn)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hwn->nama_hewan }}</td>
                <td>{{ $hwn->jns_hewan_id }}</td>
                <td>{{ $hwn->owner_id }}</td>
                <td>{{ $hwn->tanggal_masuk}}</td>
                <td>{{ $hwn->alamat }}</td>
                <td>
                    <a href="/hewan/{{ $hwn->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/hewan/{{ $hwn->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $hewans->links('pagination::bootstrap-5') }}
@endsection
