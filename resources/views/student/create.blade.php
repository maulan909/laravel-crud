@extends('template.template')

@section('content')
    <div class="col-lg-6 mt-3">
        <form method="post" action="/student">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis')
                    is-invalid
                @enderror" id="nis" name="nis" value="{{ old('nis') }}">
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama')
                is-invalid
                @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select @error('jurusan')
                is-invalid
                @enderror" name="jurusan" id="jurusan">
                    <option value="0" selected>Pilih Jurusan</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                    <option value="Pemasaran">Pemasaran</option>
                    <option value="Usaha Perjalanan Pariwisata">Usaha Perjalanan Pariwisata</option>
                </select>
                @error('jurusan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="/student" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection