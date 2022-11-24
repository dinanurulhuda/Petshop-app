@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
        <form action ="/jns_hwn/{{$jns_hwns->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Edit Jenis Hewan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_jns" class="form-label">Nama Jenis Hewan</label>
                            <input type="text" name="nama_jns" id="nama_jns" placeholder="nama_jns" class="form-control @error('nama_jns') is-invalid @enderror" value="{{ old('nama_jns',$jns_hwns->nama_jns) }}">
                            @error('nama_owner')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                       
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Edit Jenis Hewan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection