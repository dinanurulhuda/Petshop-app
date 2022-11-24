@extends('dashboard.layout.main')

@section('container')
    <h1 class="text-center">Data Obat</h1>    

    <a href="obat/create" class="btn btn-primary">Tambah Data Hewan</a><br>
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
            <td>Nama Obat</td>
            <td>Jenis Obat</td>
            <td>Harga</td>
            <td>Option</td>
        </tr>

        @foreach ($obat as $obt)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $obt->nama_obat }}</td>
                <td>{{ $obt->jenis_obat }}</td>
                <td>{{ $obt->harga }}</td>
                <td>
                    <a href="/obat/{{ $obt->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/obat/{{ $obt->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $obat->links('pagination::bootstrap-5') }}
@endsection
