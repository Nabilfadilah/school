@extends('admin.layout')

@section('content')
    {{-- content form --}}
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('student.read') }}" style="display: inline;">
                                <button type="submit" class="btn btn-secondary text-sm">
                                    <i class="nav-icon fas fa-solid fa-arrow-left text-xs"></i>
                                    Back
                                </button>
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Edit Siswa</h3>
                            </div>

                            {{-- metode default HTML hanya mendukung GET dan POST --}}
                            <form action="{{ route('student.update', $student->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Menentukan metode PUT -->

                                <input type="hidden" name="id" value="{{ $student->id }}">

                                <div class="card-body">

                                    <div class="row">
                                        {{-- select academic_years --}}
                                        <div class="form-group col-md-4">
                                            <label>Pilih Tahun Akademik</label>
                                            <select name="academic_year_id" class="form-control">
                                                <option value="">Select Academic Years</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}"
                                                        {{ $academic_year->id == $student->academic_year_id ? 'selected' : '' }}>
                                                        {{ $academic_year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- select class --}}
                                        <div class="form-group col-md-4">
                                            <label>Pilih Kelas</label>
                                            <select name="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ $class->id == $student->class_id ? 'selected' : '' }}>
                                                        {{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- addmoison date --}}
                                        <div class="form-group col-md-4">
                                            <label>Tanggal Penerimaan</label>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ old('admission_date', $student->admission_date) }}">
                                            @error('admission_date')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- student name --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Nama Siswa</label>
                                            <input type="text" name="name" class="form-control" id="exampleInput"
                                                placeholder="Enter nama siswa" value="{{ old('name', $student->name) }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- student's father name --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Nama Ayah Siswa</label>
                                            <input type="text" name="father_name" class="form-control" id="exampleInput"
                                                placeholder="Enter nama Ayah siswa"
                                                value="{{ old('father_name', $student->father_name) }}">
                                            @error('father_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- student's mother name --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Nama Ibu Siswa</label>
                                            <input type="text" name="mother_name" class="form-control" id="exampleInput"
                                                placeholder="Enter nama Ibu siswa"
                                                value="{{ old('mother_name', $student->mother_name) }}">
                                            @error('mother_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- dob --}}
                                        <div class="form-group col-md-6">
                                            <label for="exampleInput">Tanggal Lahir</label>
                                            <input type="date" name="dob" class="form-control" id="exampleInput"
                                                value="{{ old('dob', $student->dob) }}">
                                            @error('dob')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- mobno --}}
                                        <div class="form-group col-md-6">
                                            <label for="exampleInput">No Telepon</label>
                                            <input type="text" name="mobno" class="form-control" id="exampleInput"
                                                placeholder="Enter Nomor Telepon"
                                                value="{{ old('mobno', $student->mobno) }}">
                                            @error('mobno')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- email addreess --}}
                                        <div class="form-group col-md-6">
                                            <label for="exampleInput">Alamat Email</label>
                                            <input type="text" name="email" class="form-control" id="exampleInput"
                                                placeholder="Enter Alamat Email"
                                                value="{{ old('email', $student->email) }}">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary text-sm">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
