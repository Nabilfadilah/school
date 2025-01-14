@extends('admin.layout')

@section('content')
    {{-- content form --}}
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Struktur Penerima Biaya Mengajar</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('fee-structure.read') }}" style="display: inline;">
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
                                <h3 class="card-title">Edit Struktur Penerima Biaya Mengajar</h3>
                            </div>

                            {{-- metode default HTML hanya mendukung GET dan POST --}}
                            <form action="{{ route('fee-structure.update', $fee_structure->id) }}" method="post">

                                @csrf
                                @method('PUT') <!-- Mengubah metode menjadi PUT -->

                                <input type="hidden" name="id" value="{{ $fee_structure->id }}">

                                <div class="card-body">

                                    <div class="row">
                                        {{-- select class --}}
                                        <div class="form-group col-md-4">
                                            <label>Pilih Kelas</label>
                                            <select name="class_id" class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}"
                                                        {{ $fee_structure->class_id == $class->id ? 'selected' : null }}>
                                                        {{-- @if ($fee_structure->class_id == $class->id)
                                                            selected
                                                        @endif> --}}
                                                        {{ $class->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- select academic_years --}}
                                        <div class="form-group col-md-4">
                                            <label>Pilih Tahun Akademik</label>
                                            <select name="academic_year_id" class="form-control">
                                                <option value="">Select Academic Year</option>
                                                @foreach ($academic_years as $academic_year)
                                                    <option value="{{ $academic_year->id }}"
                                                        {{ $fee_structure->academic_year_id == $academic_year->id ? 'selected' : null }}>
                                                        {{-- @if ($fee_structure->academic_year_id == $academic_year->id) selected @endif> --}}
                                                        {{ $academic_year->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('academic_year_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        {{-- select fee_heads --}}
                                        <div class="form-group col-md-4">
                                            <label>Pilih Penerima Biaya</label>
                                            <select name="fee_head_id" class="form-control">
                                                <option value="" disabled selected>Select Fee Head</option>
                                                @foreach ($fee_heads as $fee_head)
                                                    <option value="{{ $fee_head->id }}"
                                                        {{ $fee_structure->fee_head_id == $fee_head->id ? 'selected' : null }}>
                                                        {{-- @if ($fee_structure->fee_head_id == $fee_head->id) selected @endif> --}}
                                                        {{ $fee_head->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('fee_head_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="h-4 bg-black border-none">

                                    <div class="row">
                                        {{-- january --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Januari</label>
                                            <input type="text" name="january" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya january"
                                                value="{{ old('january', $fee_structure->january) }}">
                                        </div>

                                        {{-- february --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Februari</label>
                                            <input type="text" name="february" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya februari"
                                                value="{{ old('february', $fee_structure->february) }}">
                                        </div>

                                        {{-- macrh --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Maret</label>
                                            <input type="text" name="march" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya maret"
                                                value="{{ old('march', $fee_structure->march) }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- april --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya April</label>
                                            <input type="text" name="april" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya April"
                                                value="{{ old('april', $fee_structure->april) }}">
                                        </div>

                                        {{-- may --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Mei</label>
                                            <input type="text" name="may" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya mei"
                                                value="{{ old('may', $fee_structure->may) }}">
                                        </div>

                                        {{-- june --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Juni</label>
                                            <input type="text" name="june" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya juni"
                                                value="{{ old('june', $fee_structure->june) }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- july --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Juli</label>
                                            <input type="text" name="july" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya juli"
                                                value="{{ old('july', $fee_structure->july) }}">
                                        </div>

                                        {{-- august --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Agustus</label>
                                            <input type="text" name="august" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya agustus"
                                                value="{{ old('august', $fee_structure->august) }}">
                                        </div>

                                        {{-- september --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya September</label>
                                            <input type="text" name="september" class="form-control"
                                                id="exampleInput" placeholder="Enter Biaya september"
                                                value="{{ old('september', $fee_structure->september) }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- october --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Oktober</label>
                                            <input type="text" name="october" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya oktober"
                                                value="{{ old('october', $fee_structure->october) }}">
                                        </div>

                                        {{-- november --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya November</label>
                                            <input type="text" name="november" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya november"
                                                value="{{ old('november', $fee_structure->november) }}">
                                        </div>

                                        {{-- december --}}
                                        <div class="form-group col-md-4">
                                            <label for="exampleInput">Biaya Desember</label>
                                            <input type="text" name="december" class="form-control" id="exampleInput"
                                                placeholder="Enter Biaya desember"
                                                value="{{ old('december', $fee_structure->december) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
