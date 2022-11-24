@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/makanan/{{$makanan->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Insert Jenis Makanan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_mkn" class="form-label">Nama Jenis Makanan</label>
                            <input type="text" name="nama_mkn" id="nama_mkn" placeholder="Jenis Makanan" class="form-control @error('nama_mkn') is-invalid @enderror" value="{{ old('nama_mkn',$makanan->nama_mkn) }}">
                            @error('nama_mkn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="merk_mkn" class="form-label">Merk Makanan</label>
                            <input type="text" name="merk_mkn" id="merk_mkn" placeholder="Merk Makanan" class="form-control @error('merk_mkn') is-invalid @enderror" value="{{ old('merk_mkn',$makanan->merk_mkn) }}">
                            @error('merk_mkn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Makanan</label>
                            <input type="integer" name="harga" id="harga" placeholder="Harga Makanan" class="form-control @error('harga_mkn') is-invalid @enderror" value="{{ old('harga_mkn',$makanan->harga) }}">
                            @error('nama_mkn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                       
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Edit Makanan Hewan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection