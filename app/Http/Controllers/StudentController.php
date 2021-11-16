<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', [
            'title' => 'List Data Siswa',
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', [
            'title' => 'Tambah Data Siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:255|unique:students',
            'nama' => 'required|max:255|string',
            'jurusan' => [
                'required',
                Rule::notIn([0, '0'])
            ]
        ]);
        Student::create($validatedData);
        return redirect('student')->with('message', '<div class="alert alert-success">Berhasil tambah data</div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.detail', [
            'title' => 'List Data Siswa',
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'title' => 'Edit Data Siswa',
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $rules = [
            'nama' => 'required|max:255|string',
            'jurusan' => [
                'required',
                Rule::notIn([0, '0'])
            ]
        ];
        $rules['nis'] = $request->nis == $student->nis ? 'required|max:255' : 'required|max:255|unique:students';
        $validatedData = $request->validate($rules);
        Student::where('id', $student->id)->update($validatedData);
        return redirect('student')->with('message', '<div class="alert alert-success">Berhasil edit data</div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('student')->with('message', '<div class="alert alert-success">Berhasil hapus data, ' . $student->nama . '</div>');
    }
}
