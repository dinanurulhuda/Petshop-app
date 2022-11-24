@extends('dashboard.layout.main')

@section('container')
    <h1 class="text-center">Data Penitipan</h1>    

    <a href="penitipan/create" class="btn btn-primary">Tambah Nama Pemilik</a><br>
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
            <td>ID Owner</td>
            <td>Tanggal Penitipan</td>
            <td>Tanggal Keluar</td>
            <td>Option</td>
        </tr>

        @foreach ($penitipans as $ptp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ptp->nama_hewan }}</td>
                <td>{{ $ptp->owner_id }}</td>
                <td>{{ $ptp->tgl_titip }}</td>
                <td>{{ $ptp->tgl_keluar }}</td>
                <td>
                    <a href="/penitipan/{{ $ptp->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/penitipan/{{ $ptp->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $penitipans->links('pagination::bootstrap-5') }}
@endsection
