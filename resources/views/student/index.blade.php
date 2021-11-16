@extends('template.template')

@section('content')
    <div class="col-lg-6 mt-3">
        <a href="/student/create" class="btn btn-primary mb-3">Tambah Data Siswa</a>
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach ($students as $student)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>
                            {{ $student->nama }}
                        </span>
                        <span>
                            <a href="/student/{{ $student->id }}" class="badge rounded-pill bg-info text-decoration-none">detail</a>
                            <a href="/student/{{ $student->id }}/edit" class="badge rounded-pill bg-warning text-decoration-none">edit</a>
                            <form action="/student/{{ $student->id }}" class="d-inline" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus data?')" class="badge rounded-pill bg-danger text-decoration-none border-0">hapus</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection