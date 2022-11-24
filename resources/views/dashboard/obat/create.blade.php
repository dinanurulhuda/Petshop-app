@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/obat" method="post">
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Insert Obat
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Jenis Obat</label>
                            <input type="text" name="nama_obat" id="nama_obat" placeholder="Nama Obat" class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat') }}">
                            @error('nama_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_obat" class="form-label">Jenis Obat</label>
                            <input type="text" name="jenis_obat" id="jenis_obat" placeholder="Jenis Obat" class="form-control @error('jenis_obat') is-invalid @enderror" value="{{ old('jenis_obat') }}">
                            @error('jenis_obat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Obat</label>
                            <input type="integer" name="harga" id="harga" placeholder="Harga Obat" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                       
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Insert Obat</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection