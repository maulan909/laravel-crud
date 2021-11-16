@extends('template.template')

@section('content')
    <div class="col-lg-6 mt-3">
        <form method="post" action="/student/{{ $student->id }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" class="form-control @error('nis')
                    is-invalid
                @enderror" id="nis" name="nis" value="{{ old('nis', $student->nis) }}">
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
                @enderror" id="nama" name="nama" value="{{ old('nama', $student->nama) }}">
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
                    <option value="0" @if (old('jurusan', $student->jurusan) == 0)
                        selected
                    @endif>Pilih Jurusan</option>
                    <option value="Akuntansi" @if (old('jurusan', $student->jurusan) == 'Akuntansi')
                        selected
                    @endif>Akuntansi</option>
                    <option value="Multimedia" @if (old('jurusan', $student->jurusan) == 'Multimedia')
                        selected
                    @endif>Multimedia</option>
                    <option value="Administrasi Perkantoran" @if (old('jurusan', $student->jurusan) == 'Administrasi Perkantoran')
                        selected
                    @endif>Administrasi Perkantoran</option>
                    <option value="Pemasaran" @if (old('jurusan', $student->jurusan) == 'Pemasaran')
                        selected
                    @endif>Pemasaran</option>
                    <option value="Usaha Perjalanan Pariwisata" @if (old('jurusan', $student->jurusan) == 'Usaha Perjalanan Pariwisata')
                        selected
                    @endif>Usaha Perjalanan Pariwisata</option>
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