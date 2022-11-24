@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/penitipan" method="post">
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Insert Penitipan
                    </div>
                    <div class="card-body">
                    <div class="mb-3">
                    <label for="nama_hewan" class="form-label">Nama Hewan</label>
                        <select class="form-select" name="nama_hewan" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($hewans as $hewan)
                                @if (old('hewan_id')== $hewan->id)
                                    <option value="{{ $hewan->id }}" selected>{{ $hewan->nama_hewan }}</option>
                                @else
                                    <option value="{{ $hewan->id }}">{{ $hewan->nama_hewan }}</option>   
                                @endif
                            @endforeach
                        </select>
                    </div>

  

                    <div class="mb-3">
                    <label for="nama_hewan" class="form-label">Owner</label>

                        <select class="form-select" name="owner_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($owners as $owner)
                                @if (old('owner_id')== $owner->id)
                                    <option value="{{ $owner->id }}" selected>{{ $owner->nama_owner }}</option>
                                @else
                                    <option value="{{ $owner->id }}">{{ $owner->nama_owner }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="tgl_nitip" class="form-label">Tanggal Penitipan</label>
                            <input type="date" name="tgl_nitip" id="tgl_nitip" placeholder="Masukkan Tanggal" class="form-control @error('tgl_nitip') is-invalid @enderror" value="{{ old('tgl_nitip') }}">
                            @error('tgl_nitip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                   

                        <div class="mb-3">
                            <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                            <input type="date" name="tgl_keluar" id="tgl_keluar" placeholder="Tanggal Keluar" class="form-control @error('tgl_keluar') is-invalid @enderror" value="{{ old('tgl_keluar') }}">
                            @error('tgl_keluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                      
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Data Hewan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection