@extends('dashboard.layout.main')

@section('container')
    
    <div class="row justify-content-center mt-4">
        <div class="col-lg-8">
            <form action ="/hewan/{{$hewans->id}}" method="post">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-header text-center">
                        Form Edit Data Hewan
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_hewan" class="form-label">Nama Hewan</label>
                            <input type="text" name="nama_hewan" id="nama_hewan" placeholder="nama_hewan" class="form-control @error('nama_hewan') is-invalid @enderror" value="{{ old('nama_hewan',$hewans->nama_hewan) }}">
                            @error('nama_hewan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        
                    <div class="mb-3">
                    <label for="nama_hewan" class="form-label">Jenis Hewan</label>

                        <select class="form-select" name="jns_hewan_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($jenis as $jns)
                                @if (old('jns_hewan_id',$hewans->jns_hewan_id)== $jns->id)
                                    <option value="{{ $jns->id }}" selected>{{ $jns->nama_jns }}</option>
                                @else
                                    <option value="{{ $jns->id }}">{{ $jns->nama_jns }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>

  

                    <div class="mb-3">
                    <label for="nama_hewan" class="form-label">Owner</label>

                        <select class="form-select" name="owner_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($owners as $owner)
                                @if (old('owner_id',$hewans->owner_id)== $owner->id)
                                    <option value="{{ $owner->id }}" selected>{{ $owner->nama_owner }}</option>
                                @else
                                    <option value="{{ $owner->id }}">{{ $owner->nama_owner }}</option>    
                                @endif
                            @endforeach
                        </select>
                    </div>

                   

                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk',$hewans->tanggal_masuk) }}">
                            @error('tanggal_masuk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="form-floating">
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Leave a Alamat here" id="floatingTextarea2" style="height: 100px">{{ old('alamat',$hewans->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" name="submit" type="submit">Edit Data Hewan</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection