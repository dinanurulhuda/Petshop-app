@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/owner/{{$owner->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Insert Nama Pemilik
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_owner" class="form-label">Nama Pemilik</label>
                            <input type="text" name="nama_owner" id="nama_hewan" placeholder="nama_owner" class="form-control @error('nama_owner') is-invalid @enderror" value="{{ old('nama_owner,$owner->nama_owner') }}">
                            @error('nama_owner')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                     
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telp</label>
                            <input type="text" name="no_telp" id="no_telp" placeholder="No Telp" class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp',$owner->no_telp) }}">
                            @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$owner->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="form-floating">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Leave a Alamat here" id="floatingTextarea2" style="height: 100px">{{ old('alamat',$owner->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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