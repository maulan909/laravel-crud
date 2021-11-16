@extends('template.template')

@section('content')
    <div class="col-lg-6 mt-3">
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title">{{ $student->nama }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $student->nis }}</h6>
                <p class="card-text">{{ $student->jurusan }}</p>
                <a href="/student" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
@endsection