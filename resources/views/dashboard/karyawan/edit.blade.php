@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/karyawan/{{$karyawan->id}}" method="post">
            @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Insert Data Karyawan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                            <input type="text" name="nama_karyawan" id="nama_karyawan" placeholder="Nama" class="form-control @error('nama_karyawan') is-invalid @enderror" value="{{ old('nama_karyawan',$karyawan->nama_karyawan) }}">
                            @error('nama_karyawan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{ old('jenis_kelamin')=='L' ? 'checked' : ''}} checked>Laki-laki
                            </div>
                            <div class="form-check me-3">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin')=='P')>Perempuan
                            </div>
                        </div>
                       
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" name="no_telp" id="no_telp" placeholder="No Telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp',$karyawan->no_telp) }}">
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$karyawan->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="form-floating">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Leave a Alamat here" id="floatingTextarea2" style="height: 100px">{{ old('alamat',$karyawan->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                       
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Edit Data Karyawan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection