@extends('dashboard.layout.main')

@section('container')
    <h1 class="text-center">Data Karyawan</h1>    

    <a href="karyawan/create" class="btn btn-primary">Tambah Data Hewan</a><br>
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
            <td>Nama Karyawan</td>
            <td>Jenis Kelamin</td>
            <td>No Telp</td>
            <td>Email</td>
            <td>Alamat</td>
            <td>Option</td>
        </tr>

        @foreach ($karyawan as $kry)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kry->nama_karyawan }}</td>
                <td>{{ $kry->jenis_kelamin }}</td>
                <td>{{ $kry->no_telp }}</td>
                <td>{{ $kry->email}}</td>
                <td>{{ $kry->alamat }}</td>
                <td>
                    <a href="/karyawan/{{ $kry->id }}/edit" class="btn btn-warning">Edit</a>

                    <form action="/karyawan/{{ $kry->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    {{ $karyawan->links('pagination::bootstrap-5') }}
@endsection
